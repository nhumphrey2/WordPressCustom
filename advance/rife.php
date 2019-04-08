<?php
class Apollo13Framework_Rife {
	/**
	 * Instance.
	 *
	 * Holds the plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @var Apollo13Framework_Rife
	 */
	public static $instance = null;

	private $option_name = 'a13_valid_lc';

	private $transient_name = 'a13_rife_supports_us';

	private $support_products_ids = array(
		'515206' => 365, //features + 1 month support
		'515123' => 365, //features + 12 months support
		'support-31' => 31, //support + updates 1 month
	);

	private $support_subscription_ids = array(
		'514998' => 1,
		'516974' => 12,
		'530273' => 1,
		'530177' => 12,
		'537651' => 12
	);


	/**
	 * Binds some actions and filters
	 */
	function __construct(){
		$admin = is_admin();
		$customizer = is_customize_preview();

		if( $admin || $customizer ){
			//get Rife Universal first so it could fire its actions first
			/** @noinspection PhpIncludeInspection */
			require_once( get_theme_file_path( 'advance/rife_uni.php' ));
		}
		if( $admin ){
			/** @noinspection PhpIncludeInspection */
			require_once( get_theme_file_path( 'advance/inc/pro/pro_admin.php' ));
			/** @noinspection PhpIncludeInspection */
			require_once( get_theme_file_path( 'advance/inc/pro/rife_admin.php' ));
		}
		//things that can not be in public theme
		/** @noinspection PhpIncludeInspection */
		require_once( get_theme_file_path( 'advance/inc/pro/pro_fe.php' ));

		add_filter( 'apollo13framework_get_license', array( $this, 'get_license_code' ) );

		if($this->is_valid_license()){
			//auto updates
			/** @noinspection PhpIncludeInspection */
			require_once( get_theme_file_path( 'advance/inc/theme-update-checker.php' ));
			new ThemeUpdateChecker(
				A13FRAMEWORK_TPL_SLUG,
				'http://apollo13.eu/themes_update/rife/info.json'
			);
		}
		else{
			if(!$admin){
				add_action( 'get_header', array( $this, 'kill_frontend' ) );
			}
		}
	}


	/**
	 * Instance.
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.11.0
	 * @access public
	 * @static
	 *
	 * @return Apollo13Framework_Rife An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * Get subscription plans
	 *
	 * @return array
	 */
	public function get_plan(){
		return $this->support_subscription_ids;
	}




	/**
	 * @param $code string  code that user provided to register
	 *
	 * @return array    status of verification
	 */
	function verify_provided_code($code) {
		if(!strlen($code)){
			$return_msg = array( false, __( 'The code has not been entered.', 'rife' ) );
		}
		else{
			//to fix:
			//while using wp_safe_remote_post(probably) it gets in conflict with import CURL get. We get error:
			//cURL error 56: Recv failure: Connection was reset

			$request = wp_remote_post('https://api.apollo13.eu/check_code.php?code='.trim($code), array(
				'sslverify'   => true, //Without this it results in: cURL Error #:SSL certificate problem: unable to get local issuer certificate
				'redirection' => 10,
				'timeout'     => 30,
				'httpversion' => CURL_HTTP_VERSION_1_1,
				'blocking'    => true,
				'headers'     => array(
					'accept' => 'application/json',
					'content-type' => 'application/json'
				),
				'cookies'     => array()
			));

			$response = false;
			$response_code = false;
			$err = '';

			//check first if curl went smooth
			if ( is_wp_error( $request ) ) {
				$error_message = $request->get_error_message();
				$err = "Something went wrong: $error_message";
			} else {
				$response_code = wp_remote_retrieve_response_code($request);
				$response = wp_remote_retrieve_body($request);
			}


			//server down
			if ( $response_code === 404 ) {
				$return_msg = array(
					false,
					__( 'It looks like the license server could be down. Please try again later.', 'rife' )
				);
			}
			//server active
			elseif ( $response_code === 200 ) {
				$answer = json_decode( $response );
				$is_subscription = property_exists($answer, 'subscription_id');

				//valid code
				if($answer->success === true){
					//proper subscription
					if($is_subscription && array_key_exists($answer->subscription_plan_id, $this->support_subscription_ids)){
						$return_msg = array( true, 'subscription', $answer );
					}
					//proper old product
					elseif( !$is_subscription && array_key_exists($answer->product_id, $this->support_products_ids) ){
						$days = $this->support_products_ids[$answer->product_id];

						$return_msg = array( true, $days, $answer );
					}
					//deleted product/subscription ?
					else{
						$return_msg = array(
							false,
							esc_html__( 'The provided code is invalid.', 'rife' ).' '.esc_html__( 'Please contact the Apollo13Themes.', 'rife' )
						);
					}
				}

				//invalid code
				else{
					$return_msg = array(
						false,
						esc_html__( 'The provided code is invalid.', 'rife' ).' '.esc_html__( ' Please try again.', 'rife' )
					);
				}
			}
			//error on curl request
			elseif ( strlen( $err ) ) {
				$return_msg = array( false, 'cURL Error #:' . $err );
			}
			//different problem
			else {
				$return_msg = array( false, __( 'Unknown error.', 'rife' ) );
			}
		}

		// Check our results
		if ( $return_msg[0] === false ) {
			/* translators: %s: error returned */
			$return_msg[1] = sprintf( __( 'Error while checking the license code: %s', 'rife' ), $return_msg[1] );
		}

		return $return_msg;
	}



	/**
	 * Used for old type of licenses to find out is it still active
	 * @param $license_started
	 * @param $days
	 *
	 * @return mixed
	 */
	private function time_left($license_started, $days){
		$license_available_for_seconds = $days * DAY_IN_SECONDS;
		$current_time = time();

		return $license_started + $license_available_for_seconds - $current_time;
	}



	/**
	 * Returns time details about registered license
	 * @return array|bool
	 */
	function get_license_option(){
		return get_option( $this->option_name );
	}



	/**
	 * Check if we have valid license
	 *
	 * @return bool
	 */
	function is_valid_license(){
		$result = false;
		$option = $this->get_license_option();

		if($option !== false ){
			//subscription
			if(isset($option['subscription'])){
				$data = $this->get_license_data();

				if($data !== false){
					//owns theme
					if($data->months_payed >= 12){
						$result = true;
					}
					//paying regularly
					elseif($data->status === 'active'){
						$result = true;
					}
					//not paying, but we give user week of time, cause of possible holidays
					elseif($data->status === 'past_due' && (strtotime( $data->next_bill_date )+ 8*DAY_IN_SECONDS ) > time() ){
						$result = true;
					}
					//canceled subscription, we add 1 day to effective cancellation day to accommodate for time zones and add extra day just in case
					elseif($data->status === 'deleted' && (strtotime( $data->cancellation_effective_date )+ 2*DAY_IN_SECONDS ) > time() ){
						$result = true;
					}
				}
			}
			//license
			elseif(isset($option['code'])){
				$result = true;
			}
		}

		return $result;
	}



	/**
	 * Check if we have still active license
	 *
	 * @return bool
	 */
	function is_valid_and_active_license(){
		$result = false;
		$option = $this->get_license_option();

		if($option !== false ){
			$data = $this->get_license_data();
			//subscription
			if(isset($option['subscription'])){
				if($data !== false){
					//paying regularly
					if($data->status === 'active'){
						$result = true;
					}
					//not paying, but we give user week of time, cause of possible holidays
					elseif($data->status === 'past_due' && (strtotime( $data->next_bill_date )+ 8*DAY_IN_SECONDS ) > time() ){
						$result = true;
					}
					//canceled subscription, we add 1 day to effective cancellation day to make sure it will last for whole day and add extra day just in case
					elseif($data->status === 'deleted' && (strtotime( $data->cancellation_effective_date )+ 2*DAY_IN_SECONDS ) > time() ){
						$result = true;
					}
				}
			}
			//license
			elseif(isset($option['code'])){
				$time_left = $this->time_left($data, $option['length']);
				$result = $time_left > 0;
			}
		}

		return $result;
	}



	/**
	 * Gets registered code for rife theme. If there is none it returns false
	 *
	 * @return bool|string  code or false
	 */
	function get_license_code(){
		$option = $this->get_license_option();
		//return code if there is one registered
		if($option !== false && isset($option['code'])){
			return $option['code'];
		}

		return false;
	}



	/**
	 * Returns data about current license that can be used for verification
	 *
	 * @return object|int|bool depending on type of license it will return registration time or last saved answer
	 */
	function get_license_data(){
		//get saved data
		$option          = $this->get_license_option();
		$transient       = get_transient( $this->transient_name );
		$is_subscription = isset( $option['subscription'] );

		//check if we have code
		if($option !== false && isset($option['code'])){
			if($transient === 'failed'){
				//connection failed probably
				//we can't use transient right now
			}
			//check if we have transient
			elseif($transient === false || $transient === '' || !is_object($transient)){
				//try to get new data
				$result = $this->set_license_data(array(), $option['code']);
				if($result['response'] === 'success'){
					$transient = get_transient( $this->transient_name );
				}
			}

			//do we have now proper transient
			if(is_object($transient)){
				if($is_subscription){
					return $transient;
				}
				else{
					return strtotime($transient->register_date);
				}
			}
			//return last saved answer
			else{
				//try to emulate result from what we have
				if($is_subscription){
					return $option['answer'];
				}
				else{
					return $option['register-date'];
				}
			}
		}
		//no code
		else{
			return false;
		}
	}



	/**
	 * Validate code and on success save info about registered code
	 *
	 * @param $out  array   status of validation and message
	 * @param $code string  registered code
	 *
	 * @return array        status of validation and message
	 */
	function set_license_data($out, $code){
		$validation_result = $this->verify_provided_code( $code );

		//failed
		if ( $validation_result[0] === false ) {
			$out['response'] = 'error';
			$out['message']  =  $validation_result[1];

			//cache result for 10 minutes
			set_transient( $this->transient_name, 'failed', 10*MINUTE_IN_SECONDS);
		}
		//code is valid
		else {
			$out['response'] = 'success';
			$out['message']  = __( 'The code is correct. Thank you!', 'rife' );

			$cache_time = WEEK_IN_SECONDS;

			//update option with latest answer
			if($validation_result[1] === 'subscription'){
				update_option( $this->option_name,
					array(
						'subscription' => true,
						'code'         => $code, //for compatibility
						'answer'       => $validation_result[2]
					)
				);

				$cache_time = $this->decide_cache_time($validation_result[2], $cache_time);
			}
			else{
				update_option( $this->option_name,
					array(
						'code'          => $code,
						'register-date' => time(),
						'length'        => $validation_result[1],
					)
				);
			}

			//cache result for week
			set_transient( $this->transient_name, $validation_result[2], $cache_time);
		}

		return $out;
	}


	/**
	 * Removes stored transient, so on next page view we will ask API for fresh one
	 */
	function invalidate_license_data(){
		delete_transient( $this->transient_name );
	}



	/**
	 * Returns cache time for API reply
	 * Depending on subscription status it will return different time
	 *
	 * @param object $result reply from API
	 * @param int $default default number of seconds for cache
	 *
	 * @return int number of seconds
	 */
	private function decide_cache_time($result, $default){
		$cache_time = $default;
		$next_bill_time = strtotime($result->next_bill_date);
		$now = time();

		if( $result->status !== 'canceled' ){
			//lass then a week to bill
			if($now + $default > $next_bill_time){
				$cache_time = DAY_IN_SECONDS;

				//if it is bill day or past it
				if($now > $next_bill_time){
					$cache_time = HOUR_IN_SECONDS;
				}
			}
		}

		return $cache_time;
	}



	/**
	 * Displays Maintenance message until everything is back to normal
	 */
	function kill_frontend() {//I am sorry:-(
		wp_die( '<h1>Website under Maintenance</h1><p>We are performing scheduled maintenance. We will be back online shortly!</p>' );
	}
}

//run
//new Apollo13Framework_Rife();
Apollo13Framework_Rife::instance();