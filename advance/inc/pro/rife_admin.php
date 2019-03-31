<?php
class Apollo13Framework_Rife_Admin {

	private $blocked_license_option_name = 'a13_rife_blocked_license';

	//main class instance
	private $rife;

	/**
	 * Binds some actions and filters
	 */
	function __construct(){
		$this->rife = Apollo13Framework_Rife::instance();

		add_action( 'admin_menu', array( $this, 'admin_help_links' ) );
		add_action( 'apollo13framework_apollo13_info_page_content', array( $this, 'info_page' ) );
		add_action( 'apollo13framework_license_is_needed_msg', array( $this, 'license_is_needed_msg') );
		add_action( 'apollo13framework_license_code_input', array( $this, 'license_code_form' ) );
		add_action( 'apollo13framework_theme_notices', array( $this, 'rating_notice' ) );
		add_action( 'wp_ajax_apollo13framework_rife_block_license_info', array( $this, 'block_license_info' ) );
		add_action( 'apollo13framework_before_export_theme_options_section', array( $this, 'before_export_theme_options_section' ), 10 );

		//From main Rife Class
		add_action( 'wp_ajax_apollo13framework_rife_invalidate_license_data', array( $this->rife, 'invalidate_license_data' ) );
		add_filter( 'apollo13framework_valid_license', array( $this->rife, 'is_valid_license' ) );
		add_filter( 'apollo13framework_register_license', array( $this->rife, 'set_license_data' ), 10, 2 );

		if($this->rife->is_valid_license()){
			//auto updates
			if(!$this->rife->is_valid_and_active_license()){
				//display notice about old license key
				add_action('apollo13framework_theme_notices', array( $this, 'add_license_notice' ));
			}
		}
		else{
			global $pagenow;
			$allowed_pages= array(
				'themes.php',
				'admin-ajax.php'
			);
			$allowed_theme_sub_pages= array(
				'',
				'info',
				'import',
				'export',
				'help'
			);

			//if not proper page
			if ( ! in_array( $pagenow, $allowed_pages ) || ( $pagenow === 'themes.php' && isset( $_GET['subpage'] ) && ! in_array( wp_unslash( $_GET['subpage'] ), $allowed_theme_sub_pages ) ) ) {
				wp_redirect( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=info' ) );
				exit;
			}
		}
	}



	/**
	 * Add scripts responsible for billing operations
	 */
	function add_scripts(){
		wp_enqueue_script( 'a13-paddle-com', 'https://cdn.paddle.com/paddle/paddle.js',false,false,true);
		wp_add_inline_script( 'a13-paddle-com',
			<<<A13PADDLESCRIPT
			(function ($) {
	Paddle.Setup({
		vendor: 19710,
		eventCallback: function(eventData) {
			//delete transient if user attempted to cancel subscription, so we would have fresh data
			if(eventData.event === 'Checkout.Close'){
				var cancel_link = $('#cancel_subscription');

				if(typeof eventData.checkoutData.override !== 'undefined' && eventData.checkoutData.override === cancel_link.data('override')){
					$.ajax({
						type    : "POST",
						url     : ajaxurl,
						dataType: "json",
						data    : {
							action: 'apollo13framework_rife_invalidate_license_data' //called in backend
						}
					});
				}
			}
		}
	});

	$(document).ready(function () {
		$('#cancel_subscription').on('click', function (e) {
			e.preventDefault();
			var link = $(this).data('override');

			Paddle.Checkout.open({
                override: link
			});
		});

		$('#block-license-info').on('click', function (e) {
			e.preventDefault();
			var button = $(this),
				parent = button.parent();

			if(parent.hasClass('loading')){
				return;
			}

			if(window.confirm('Are you sure you want to block license information on this installation?')){
				parent.addClass('loading');
				$.ajax({
					type    : "POST",
					url     : ajaxurl,
					dataType: "json",
					data    : {
						action: 'apollo13framework_rife_block_license_info' //called in backend
					},
					success : function () {
						location.reload(true);
					},
					error   : function () {
						alert('There was an error while doing the request for hiding license data. Try again later or contact Apollo13Themes.');
					}
				})
					.always(
					function () {
						parent.removeClass('loading');
					});
			}
		});
	});
})(jQuery);
A13PADDLESCRIPT
		);
	}



	/**
	 * Prints form for license code
	 */
	function license_code_form(){
		global $apollo13framework_a13;
		$code = $this->rife->get_license_code();
		$code = $code === false? '' : apollo13framework_mask_code($code);
		if($this->is_license_info_blocked()) {
			echo '<h3 class="info-blocked">'.esc_html__('The license information is blocked on this installation, probably by the developer of this site.', 'rife' ).'</h3>';
		}
		else{
			$this->add_scripts();
			?>
			<div class="info_box license_code_info">
				<?php $this->display_license_details();	?>
				<div class="license_code">
					<label for="add_license_code"><?php esc_attr_e( 'Your license code', 'rife' ); ?></label>
					<input id="add_license_code" name="add_license_code" placeholder="<?php esc_attr_e( 'Your license code', 'rife' ); ?>" value="<?php echo esc_attr($code); ?>"  />
					<span class="code_submit"><?php echo esc_html_x( 'Submit', 'submit the form', 'rife' ); ?><span class="ll-animation"></span></span>
				</div>
				<?php
				echo '<p>'.
				     esc_html__( 'Here you can add or update your license code.', 'rife' ) .
				     ' <a href="'.esc_url( $apollo13framework_a13->get_docs_link('license-code') ).'" target="_blank">'.esc_html__( 'Where to find your code?', 'rife' ).'</a>'.
				     '</p>';
				if(strlen($code) > 0) {
					echo '<p>'.esc_html__( 'The code is protected, so nobody can steal it when logging in to the admin panel.', 'rife' ).'</p>';
				}
				?>
			</div>
			<?php
		}
	}



	/**
	 * Displays all details about current license depending on status and type of license
	 */
	function display_license_details(){
		$option   = $this->rife->get_license_option();
		$code     = $this->rife->get_license_code();
		$has_code = $code !== false;

		if($option !== false){
			$license_time_info = '';
			$data = $this->rife->get_license_data();

			if(isset($option['subscription'])){
				$license_time_info .= '<ul>';
				$license_time_info .= '<li><strong>'.esc_html__('License status', 'rife' ).'</strong>: '.$this->translate_status($data->status).'</li>';
				$license_time_info .= '<li><strong>'.esc_html__('Updates', 'rife' ).'</strong>: '.($this->rife->is_valid_and_active_license()? esc_html__('Active', 'rife' ) : esc_html__('Not active', 'rife' )).'</li>';
				if($data->status === 'deleted'){
					$license_time_info .= '<li><strong>'.esc_html__('Effective date of cancellation', 'rife' ).'</strong>: '.$data->cancellation_effective_date.'</li>';
				}
				else{
					$license_time_info .= '<li><strong>'.esc_html__('Billing cycle', 'rife' ).'</strong>: '.$this->translate_plan_type($data->subscription_plan_id).'</li>';
					$license_time_info .= '<li><strong>'.esc_html__('Next billing date', 'rife' ).'</strong>: '.$data->next_bill_date.'</li>';
				}


				if($data->status !== 'deleted') {
					$license_time_info .= '<li><a class="paddle_button" data-theme="none" data-override="'.esc_attr($data->update_url).'" href="'.esc_url( $data->update_url ).'">'.esc_html__('Update the payment method', 'rife' ).'</a></li>';
					$license_time_info .= '<li><a id="cancel_subscription" data-override="' . esc_attr( $data->cancel_url ) . '" href="#">' . esc_html__( 'Cancel subscription', 'rife' ) . '</a></li>';
				}

				$license_time_info .= '</ul>';
			}
			else{
				if($has_code){
					$license_active_for_seconds = $option['length'] * DAY_IN_SECONDS;
					$license_ends = $data+$license_active_for_seconds;
					$license_precise_time = date('jS F Y', $license_ends);
					$license_time_info = esc_html__( 'Active to'). ': ' .$license_precise_time;
				}
			}

			if ( $has_code && strlen( $license_time_info ) ) {
				echo '<div class="license_info">';
				echo $license_time_info;
				?>
				<div class="hide-license-info">
					<button id="block-license-info" class="button action"><?php esc_html_e('Hide license information in this installation', 'rife' ); ?></button><i class="ll-animation"></i>
					<?php apollo13framework_input_help_tip( __('<p>By clicking this button the license information will not appear anywhere in the theme.</p><p>This is a good option if you create a website for someone and you do not want that person to have access to your license.</p>', 'rife' ) ); ?>
				</div>
				<?php
				echo '</div>';
			}

		}
	}




	/**
	 * Translates status to user readable one
	 * @param string $status status from API
	 *
	 * @return string Status that can be showed to user
	 */
	private function translate_status( $status){
		$translations = array(
			'active'   => esc_html__( 'Subscribed', 'rife' ),
			'past_due' => esc_html__( 'Overdue payment', 'rife' ),
			'deleted'  => esc_html__( 'Subscription canceled', 'rife' ),
		);

		return isset($translations[$status])?  $translations[$status] : '';
	}



	/**
	 * Translates plan to user readable one
	 * @param string $plan plan type
	 *
	 * @return string Plan that can showed to user
	 */
	private function translate_plan_type($plan){
		$plans = $this->rife->get_plan();
		$type = $plans[$plan];

		$translations = array(
			1   => esc_html__( 'Monthly', 'rife' ),
			12  => esc_html__( 'Yearly', 'rife' ),
		);

		return isset($translations[$type])?  $translations[$type] : '';
	}




	/**
	 * Checks if license info was blocked on this installation
	 * @return bool
	 */
	function is_license_info_blocked(){
		$license_view_blocked = get_option($this->blocked_license_option_name);
		return $license_view_blocked !== false;
	}



	/**
	 * Blocks displaying license info
	 */
	function block_license_info(){
		update_option( $this->blocked_license_option_name, true );
		exit;
	}



	/**
	 * Adds menu with help links for theme
	 */
	function admin_help_links() {
		if(!current_user_can('switch_themes')){
			return;
		}
		global $submenu, $apollo13framework_a13;
		$submenu['themes.php'][503] = array( A13FRAMEWORK_OPTIONS_NAME_PART.' - '.esc_html__( 'Online Documentation', 'rife' ), 'manage_options', $apollo13framework_a13->get_docs_link() );
		$submenu['themes.php'][504] = array( A13FRAMEWORK_OPTIONS_NAME_PART.' - '.esc_html__( 'Changelog', 'rife' ), 'manage_options', 'https://www.apollo13.eu/themes_update/changelog.php?t=apollo13_framework_theme' . '' );
		$submenu['themes.php'][505] = array( A13FRAMEWORK_OPTIONS_NAME_PART.' - '.esc_html__( 'Support Forum', 'rife' ), 'manage_options', 'https://support.apollo13.eu/' . '' );
	}



	/**
	 * Displays content of Rife info page
	 */
	function info_page() {
		global $apollo13framework_a13;
		$is_valid = $this->rife->is_valid_license();
		$is_active = $this->rife->is_valid_and_active_license();
		$license_option = $this->rife->get_license_option();

		$is_new_comer = $license_option === false;
		$is_canceled_midway = !$is_valid && !$is_new_comer;
		$is_just_not_active = $is_valid && !$is_active;

		if($is_new_comer){
			echo '<h2>'.esc_html__( 'How to start?', 'rife' ).'</h2>';
			echo '<p>'.esc_html__( 'Before you will be able to do anything, you must enter the license code in the form below to activate the theme.', 'rife' ).'</p>';
			echo '<p><a href="'.esc_url( $apollo13framework_a13->get_docs_link('license-code') ).'" target="_blank">'.esc_html__( 'Where to find your code?', 'rife' ).'</a></p>';
			do_action('apollo13framework_license_code_input');
		}

		elseif($is_canceled_midway){
			echo '<h2>'.esc_html__( 'The theme is blocked. What now?', 'rife' ).'</h2>';
			echo '<p>'.esc_html__( 'It looks like your license key is no longer valid and that is why you can not use this theme anymore.', 'rife' ).'</p>';
			echo '<h3>'.esc_html__( 'How to unlock the theme?', 'rife' ).'</h3>';
			echo '<ol>';
			echo '<li><p><a href="https://apollo13themes.com/rife/">'. esc_html__( 'Get a new license', 'rife' ).'</a></p></li>';
			echo '<li><p><a href="https://apollo13themes.com/contact/">'. esc_html__( 'Contact Apollo13Themes', 'rife' ).'</a></p></li>';
			echo '</ol>';
			echo '<p>'.esc_html__( 'Another thing you can do is change the theme to another one.', 'rife' ).'</p>';
			do_action('apollo13framework_license_code_input');
		}
		else{
			if($is_just_not_active){
				echo '<h2>'.esc_html__( 'The license code has expired.', 'rife' ).'</h2>';
				echo '<p>'.esc_html__( 'When the license code is not active, access to updates and the support is not available. However, you can still use the theme normally.', 'rife' ).'</p>';
				echo '<h3>'.esc_html__( 'How do I activate the support and updates again?', 'rife' ).'</h3>';
				echo '<ol>';
				echo '<li><p><a href="https://apollo13themes.com/rife/">'. esc_html__( 'Get a new license', 'rife' ).'</a></p></li>';
				echo '<li><p><a href="https://apollo13themes.com/contact/">'. esc_html__( 'Contact Apollo13Themes', 'rife' ).'</a></p></li>';
				echo '</ol>';
			}
			else{
				echo '<h2>'.esc_html__( 'License status', 'rife' ).'</h2>';
			}
			do_action('apollo13framework_license_code_input');

			echo '<h2>'.esc_html__( 'What\'s next?', 'rife' ).'</h2>';
			//check for companion plugin
			if( apollo13framework_is_companion_plugin_ready( esc_html__( 'Some features(like Albums, Works, shortcodes, plugins support) of the Theme requires an additional plugin before you will be able to use it. ', 'rife' ) ) ){
				echo '<p>'.esc_html__( 'You can check out what is new in the Changelog or just move on with your usual work.', 'rife' ).
				     ' <a href="https://www.apollo13.eu/themes_update/apollo13_framework_theme/index.html#change-log">'.esc_html__( 'Visit the Changelog', 'rife').'</a>'.
				     '</p>';

				echo '<p>'.esc_html__( 'If you have fresh installation then it would be good time to import one of our designs.', 'rife' ).
				     ' <a class="button" href="'.esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=import' ) ).'">'.esc_html__( 'Go to Design Importer', 'rife').'</a>'.
				     '</p>';

				echo '<p>'.esc_html__( 'If you have an existing website, then you can start from scratch by changing theme options.', 'rife' ).
				     ' <a class="button" href="'.esc_url( admin_url( 'customize.php') ).'">'.esc_html__( 'Go to Customizer', 'rife').'</a>'.
				     '</p>';

				echo '<p>'.esc_html__( 'If you have an existing website, you can also try to import one of our designs to speed up your work. You will have to do it without demo data.', 'rife' ).
				     ' <a href="'.esc_url( $apollo13framework_a13->get_docs_link('importer-configuration') ).'">'.esc_html__( 'How to do it is explained in the documentation here.', 'rife').'</a>'.
				     '</p>';
			}
		}
	}



	/**
	 * Prints message on importer page
	 */
	function license_is_needed_msg() {
		echo '<h2>'.esc_html__( 'The license code is needed to access the importer.', 'rife' ).'</h2>';
		echo '<p class="center">'. esc_html__( 'You must provide the license code to access Design Importer.', 'rife' ).
		     ' <a href="'.esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=info' ) ).'">'.esc_html__( 'You can do this on the License &amp; Info page.', 'rife' ).'</a>'.
		     '</p>';
	}

	public static function old_builder_source(){
		return 'https://rifetheme.com/wp-content/themes/fatmoon/advance/plugins/js_composer.zip';
	}

	public static function old_slider_source(){
		return 'https://rifetheme.com/wp-content/themes/fatmoon/advance/plugins/revslider.zip';
	}


	/**
	 * Adds notice to admin if license has expired
	 */
	function add_license_notice(){
		if( !apollo13framework_is_admin_notice_active('rife-license-expired') ){
			return;
		}
		echo '<div class="a13fe-admin-notice notice notice-warning is-dismissible" data-notice_id="rife-license-expired"><p>'.
		     esc_html__( 'The license code has expired.', 'rife' ).
		     ' <a href="'.esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=info' ) ).'">'.esc_html__('Go to the Rife Pro theme license page for more information.', 'rife' ).'</a>'.
		     '</p></div>';
	}


	function rating_notice(){
		//we display rating only for owners of license
		if( $this->is_license_info_blocked() ){
			return;
		}

		$display_rating_notice = true;
		$option_name = 'a13_'.A13FRAMEWORK_TPL_SLUG.'_rating';
		$rating_option = get_option( $option_name );

		if($rating_option !== false){
			//we have date saved
			if($rating_option !== 'disabled'){
				$now = time();
				//days that passed since last time we displayed rating notice
				$days = floor(($now - $rating_option) / (60 * 60 * 24));

				//less then week
				if($days < 7){
					$display_rating_notice = false;
				}
			}
			//message have been disabled
			else{
				$display_rating_notice = false;
			}
		}
		//they have just installed theme, lets give them a week before asking for rating
		else{
			update_option( $option_name, time() );
			$display_rating_notice = false;
		}

		if($display_rating_notice){
			echo '<div class="notice notice-info is-dismissible rating-notice">';

			//text
			echo '<p>'.esc_html( 'Thank you for using our Rife Pro Theme, we hope everything is working good for you.' ).'</p>';
			echo '<p>'.esc_html( 'Have you seen our reviews? You guys rock &amp; your reviews do help us a ton!' ).'</p>';
			echo '<p>'.esc_html( 'If you have spare 2 minutes please rate Rife Pro Theme. If not, no big deal, just keep on rocking :-)' ).'</p>';
			echo '<p>'.esc_html( 'Daniel &amp; Air. from Apollo13Themes.' ).'</p>';

			//links
			echo '<p class="links">';

			echo '<a href="https://apollo13themes.com/rife/reviews/#add-review" target="_blank">'.esc_html( 'Rate Rife Pro' ).'</a> | ';
			/** @noinspection HtmlUnknownAnchorTarget */
			echo '<a href="#remind-later" target="_blank">'.esc_html( 'Maybe later&#8230;(hide for 7 days)' ).'</a> | ';
			/** @noinspection HtmlUnknownAnchorTarget */
			echo '<a href="#disable-rating" target="_blank">'.esc_html( 'Don\'t show this notice again' ).' <i class="fa fa-times" aria-hidden="true"></i></a>';

			echo '</p>';

			echo '</div>';
		}
	}

	function before_export_theme_options_section(){
		$other_themes_settings = array(
			'apollo13_option' => 'FatMoon',
			'apollo13_option_starter' => 'Starter',
			'apollo13_option_a13agency' => 'A13Agency',
			'apollo13_option_photoproof' => 'PhotoProof',
			'apollo13_option_onelander' => 'A13 OneLander',
		);

		$html = '';

		foreach($other_themes_settings as $option_name => $theme_name){
			$save_option = get_option($option_name);
			if($save_option !== false ){
				$html .= '<p style="text-align: center;">';
				/* translators: %s: theme name */
				$html .= '<button class="button button-primary import-theme-settings" data-import-field="theme_options_'.esc_attr( $option_name ).'" type="submit">'. sprintf( esc_html__( 'Import settings from the %s theme', 'rife' ), '<strong>'.$theme_name.'</strong>' ) . '</button>';
				$html .= '<textarea style="display: none;" rows="10" cols="20" class="large-text" id="theme_options_'.esc_attr( $option_name ).'" readonly>'.esc_textarea( wp_json_encode( $save_option ) ).'</textarea>';
				$html .= '</p>';
			}
		}
		if( strlen($html) ){
			?>
			<h2><?php echo esc_html__( 'Import theme options to the Rife theme', 'rife' ); ?></h2>
			<p style="text-align: center;"><?php echo esc_html__( 'No content will be deleted. Only the Rife Theme theme settings will be replaced with those from the selected theme.', 'rife' ); ?></p>
			<?php echo $html;//escaped above ?>
			<hr />
			<?php
		}
	}
}

//run
new Apollo13Framework_Rife_Admin();