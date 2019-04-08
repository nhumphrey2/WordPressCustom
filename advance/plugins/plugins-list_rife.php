<?php
//additional plugins for only if previously used
function apollo13framework_needed_plugins_rife($plugins){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active('js_composer/js_composer.php') ) {
		$temp = apollo13framework_wpbakery_plugin_install_details();
		$temp['source'] = Apollo13Framework_Rife_Admin::old_builder_source();
		$plugins[] = $temp;
	}
	else{
		//add Elementor
		$plugins[] = apollo13framework_elementor_plugin_install_details();
		$plugins[] = apollo13framework_rife_elementor_extensions_plugin_install_details();
	}

	//Revo Slider
	if ( is_plugin_active('revslider/revslider.php') ) {
		$temp = apollo13framework_revoslider_plugin_install_details();
		$temp['source'] = Apollo13Framework_Rife_Admin::old_slider_source();
		$plugins[] = $temp;
	}

	return $plugins;
}

add_filter('apollo13framework_needed_plugins', 'apollo13framework_needed_plugins_rife');