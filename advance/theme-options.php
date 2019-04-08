<?php

function apollo13framework_setup_theme_options() {
	global $apollo13framework_a13;

	//get all cursors
	$cursors = array(
		'christmas.png'         => 'christmas.png',
		'empty_black.png'       => 'empty_black.png',
		'empty_black_white.png' => 'empty_black_white.png',
		'superior_cursor.png'   => 'superior_cursor.png'
	);
	$apollo13framework_a13->set_settings_set( 'cursors', $cursors );

	//get all menu effects
	$menu_effects = array(
		'none'      => esc_html__( 'None', 'rife' ),
		'show_icon' => esc_html__( 'Show icon', 'rife' )
	);
	$dir          = get_theme_file_path( 'css/menu-effects' );
	if ( is_dir( $dir ) ) {
		//The GLOB_BRACE flag is not available on some non GNU systems, like Solaris. So we use merge:-)
		foreach ( (array) glob( $dir . '/*.css' ) as $file ) {
			$name                  = basename( $file, '.css' );
			$menu_effects[ $name ] = $name;
		}
	}
	$apollo13framework_a13->set_settings_set( 'menu_effects', $menu_effects );

	//get all custom sidebars
	$header_sidebars = $apollo13framework_a13->get_option( 'custom_sidebars' );
	if ( ! is_array( $header_sidebars ) ) {
		$header_sidebars = array();
	}
	//create 2 arrays for different purpose
	$header_sidebars            = array_merge( array( 'off' => esc_html__( 'Off', 'rife' ) ), $header_sidebars );
	$header_sidebars_off_global = array_merge( array( 'G' => esc_html__( 'Global settings', 'rife' ) ), $header_sidebars );
	//re-indexing these arrays
	array_unshift( $header_sidebars, null );
	unset( $header_sidebars[0] );
	array_unshift( $header_sidebars_off_global, null );
	unset( $header_sidebars_off_global[0] );
	$apollo13framework_a13->set_settings_set( 'header_sidebars', $header_sidebars );
	$apollo13framework_a13->set_settings_set( 'header_sidebars_off_global', $header_sidebars_off_global );

	$on_off = array(
		'on'  => esc_html__( 'Enable', 'rife' ),
		'off' => esc_html__( 'Disable', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'on_off', $on_off );

	$font_weights = array(
		'100'    => esc_html__( '100', 'rife' ),
		'200'    => esc_html__( '200', 'rife' ),
		'300'    => esc_html__( '300', 'rife' ),
		'normal' => esc_html__( 'Normal 400', 'rife' ),
		'500'    => esc_html__( '500', 'rife' ),
		'600'    => esc_html__( '600', 'rife' ),
		'bold'   => esc_html__( 'Bold 700', 'rife' ),
		'800'    => esc_html__( '800', 'rife' ),
		'900'    => esc_html__( '900', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'font_weights', $font_weights );

	$font_transforms = array(
		'none'      => esc_html__( 'None', 'rife' ),
		'uppercase' => esc_html__( 'Uppercase', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'font_transforms', $font_transforms );

	$text_align = array(
		'left'   => esc_html__( 'Left', 'rife' ),
		'center' => esc_html__( 'Center', 'rife' ),
		'right'  => esc_html__( 'Right', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'text_align', $text_align );

	$image_fit = array(
		'cover'    => esc_html__( 'Cover', 'rife' ),
		'contain'  => esc_html__( 'Contain', 'rife' ),
		'fitV'     => esc_html__( 'Fit Vertically', 'rife' ),
		'fitH'     => esc_html__( 'Fit Horizontally', 'rife' ),
		'center'   => esc_html__( 'Just center', 'rife' ),
		'repeat'   => esc_html__( 'Repeat', 'rife' ),
		'repeat-x' => esc_html__( 'Repeat X', 'rife' ),
		'repeat-y' => esc_html__( 'Repeat Y', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'image_fit', $image_fit );

	$content_layouts = array(
		'center'        => esc_html__( 'Center fixed width', 'rife' ),
		'left'          => esc_html__( 'Left fixed width', 'rife' ),
		'left_padding'  => esc_html__( 'Left fixed width + padding', 'rife' ),
		'right'         => esc_html__( 'Right fixed width', 'rife' ),
		'right_padding' => esc_html__( 'Right fixed width + padding', 'rife' ),
		'full_fixed'    => esc_html__( 'Full width + fixed content', 'rife' ),
		'full_padding'  => esc_html__( 'Full width + padding', 'rife' ),
		'full'          => esc_html__( 'Full width', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'content_layouts', $content_layouts );

	$parallax_types = array(
		"tb"   => esc_html__( 'top to bottom', 'rife' ),
		"bt"   => esc_html__( 'bottom to top', 'rife' ),
		"lr"   => esc_html__( 'left to right', 'rife' ),
		"rl"   => esc_html__( 'right to left', 'rife' ),
		"tlbr" => esc_html__( 'top-left to bottom-right', 'rife' ),
		"trbl" => esc_html__( 'top-right to bottom-left', 'rife' ),
		"bltr" => esc_html__( 'bottom-left to top-right', 'rife' ),
		"brtl" => esc_html__( 'bottom-right to top-left', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'parallax_types', $parallax_types );

	$header_color_variants = array(
		'normal' => esc_html__( 'Normal', 'rife' ),
		'light'  => esc_html__( 'Light', 'rife' ),
		'dark'   => esc_html__( 'Dark', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'header_color_variants', $header_color_variants );

	$content_under_header = array(
		'content' => esc_html__( 'Yes, hide the content', 'rife' ),
		'title'   => esc_html__( 'Yes, hide the content and add top padding to the outside title bar.', 'rife' ),
		'off'     => esc_html__( 'Turn it off', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'content_under_header', $content_under_header );

	$social_colors = array(
		'black'            => esc_html__( 'Black', 'rife' ),
		'color'            => esc_html__( 'Color', 'rife' ),
		'white'            => esc_html__( 'White', 'rife' ),
		'semi-transparent' => esc_html__( 'Semi transparent', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'social_colors', $social_colors );

	$bricks_hover = array(
		'cross'      => esc_html__( 'Show cross', 'rife' ),
		'drop'       => esc_html__( 'Drop', 'rife' ),
		'shift'      => esc_html__( 'Shift', 'rife' ),
		'pop'        => esc_html__( 'Pop text', 'rife' ),
		'border'     => esc_html__( 'Border', 'rife' ),
		'scale-down' => esc_html__( 'Scale down', 'rife' ),
		'none'       => esc_html__( 'None', 'rife' ),
	);
	$apollo13framework_a13->set_settings_set( 'bricks_hover', $bricks_hover );

	//tags allowed in descriptions
	$valid_tags = array(
		'a'      => array(
			'href' => array(),
		),
		'br'     => array(),
		'code'   => array(),
		'em'     => array(),
		'strong' => array(),
	);
	$apollo13framework_a13->set_settings_set( 'valid_tags', $valid_tags );

	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

//GENERAL SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'General settings', 'rife' ),
		'desc'     => '',
		'id'       => 'section_general_settings',
		'icon'     => 'el el-adjust-alt',
		'priority' => 3,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Front page', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_general_front_page',
		'icon'       => 'fa fa-home',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'fp_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'What to show on the front page?', 'rife' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you choose <strong>Page</strong> then make sure that in <a href="%s">WordPress Homepage Settings</a> you have selected <strong>A static page</strong>, that you wish to use as the front page.', 'rife' ), $valid_tags ), 'javascript:wp.customize.section( \'static_front_page\' ).focus();' ),
				'options'     => array(
					'page'         => esc_html__( 'Page', 'rife' ),
					'blog'         => esc_html__( 'Blog', 'rife' ),
					'single_album' => esc_html__( 'Single album', 'rife' ),
					'albums_list'  => esc_html__( 'Albums list', 'rife' ),
					'single_work'  => esc_html__( 'Single work', 'rife' ),
					'works_list'   => esc_html__( 'Works list', 'rife' ),
				),
				'default'     => 'page',

			),
			array(
				'id'       => 'fp_album',
				'type'     => 'wp_dropdown_albums',
				'title'    => esc_html__( 'Select album to use as the front page', 'rife' ),
				'required' => array( 'fp_variant', '=', 'single_album' ),

			),
			array(
				'id'       => 'fp_work',
				'type'     => 'wp_dropdown_works',
				'title'    => esc_html__( 'Select work to use as the front page', 'rife' ),
				'required' => array( 'fp_variant', '=', 'single_work' ),

			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'General layout', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_main_settings',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'appearance_body_image',
				'type'    => 'image',
				'title'   => esc_html__( 'Background image', 'rife' ),
				'partial' => array(
					'selector'            => '.page-background',
					'container_inclusive' => true,
					'settings'            => array(
						'appearance_body_image',
						'appearance_body_image_fit',
						'appearance_body_bg_color',
					),
					'render_callback'     => 'apollo13framework_page_background',
				),
			),
			array(
				'id'      => 'appearance_body_image_fit',
				'type'    => 'select',
				'title'   => esc_html__( 'How to fit the background image', 'rife' ),
				'options' => $image_fit,
				'default' => 'cover',
				'partial' => true,
			),
			array(
				'id'      => 'appearance_body_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '#999999',
				'partial' => true,
			),
			array(
				'id'      => 'layout_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Layout', 'rife' ),
				'options' => array(
					'full'     => esc_html__( 'Full width', 'rife' ),
					'bordered' => esc_html__( 'Framed', 'rife' ),
					'boxed'    => esc_html__( 'Boxed', 'rife' ),
				),
				'default' => 'full',
			),
			array(
				'id'       => 'boxed_layout_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Boxed layout', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'layout_type', '=', 'boxed' ),
				'js'       => true,
			),
			array(
				'id'       => 'theme_borders_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Border color', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'layout_type', '=', 'bordered' ),
				'js'       => true,
			),
			array(
				'id'       => 'theme_borders',
				'type'     => 'button-set',
				'multi'    => true,
				'title'    => esc_html__( 'Borders to show', 'rife' ),
				'options'  => array(
					'top'    => esc_html__( 'Top', 'rife' ),
					'right'  => esc_html__( 'Right', 'rife' ),
					'bottom' => esc_html__( 'Bottom', 'rife' ),
					'left'   => esc_html__( 'Left', 'rife' ),
				),
				'default'  => array( 'top', 'left', 'bottom', 'right' ),
				'required' => array( 'layout_type', '=', 'bordered' ),
				'js'       => true,
				'sanitize' => 'button_set_multi'
//				'partial' => array(
//					'selector' => '.theme-borders div',
////					'render_callback' => false,
//				)
			),
			array(
				'id'      => 'custom_cursor',
				'type'    => 'radio',
				'title'   => esc_html__( 'Mouse cursor', 'rife' ),
				'options' => array(
					'default' => esc_html__( 'Normal', 'rife' ),
					'select'  => esc_html__( 'Predefined', 'rife' ),
					'custom'  => esc_html__( 'Custom', 'rife' ),
				),
				'default' => 'default',
				'js'      => true,
			),
			array(
				'id'       => 'cursor_select',
				'type'     => 'select',
				'title'    => esc_html__( 'Cursor', 'rife' ),
				'options'  => $cursors,
				'default'  => 'empty_black_white.png',
				'required' => array( 'custom_cursor', '=', 'select' ),
				'js'       => true,
			),
			array(
				'id'       => 'cursor_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Custom cursor image', 'rife' ),
				'required' => array( 'custom_cursor', '=', 'custom' ),
				'js'       => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Page preloader', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_page_preloader',
		'icon'       => 'fa fa-spinner',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'preloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Page preloader', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'js'          => true,
			),
			array(
				'id'          => 'preloader_hide_event',
				'type'        => 'radio',
				'title'       => esc_html__( 'Hide event', 'rife' ),
				'description' => wp_kses( __( '<strong>On load</strong> is called when the whole site, with all the images, is loaded, which can take a lot of time on heavier sites, and even more time on mobile devices. Also,  it can sometimes hang and never hide the preloader, when there is a problem with some resource. <br /><strong>On DOM ready</strong> is called when the whole HTML with CSS is loaded, so after the preloader is hidden, you can still see the loading of images. This is a much safer option.', 'rife' ), $valid_tags ),
				'options'     => array(
					'ready' => esc_html__( 'On DOM ready', 'rife' ),
					'load'  => esc_html__( 'On load', 'rife' ),
				),
				'default'     => 'ready',
				'required'    => array( 'preloader', '=', 'on' ),
				'js'          => true,
			),
			array(
				'id'       => 'preloader_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#preloader',
					'container_inclusive' => true,
					'settings'            => array(
						'preloader_bg_image',
						'preloader_bg_image_fit',
						'preloader_bg_color',
						'preloader_type',
						'preloader_color',
					),
					'render_callback'     => 'apollo13framework_page_preloader',
				),
			),
			array(
				'id'       => 'preloader_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Type', 'rife' ),
				'options'  => array(
					'none'              => esc_html__( 'none', 'rife' ),
					'atom'              => esc_html__( 'Atom', 'rife' ),
					'flash'             => esc_html__( 'Flash', 'rife' ),
					'indicator'         => esc_html__( 'Indicator', 'rife' ),
					'radar'             => esc_html__( 'Radar', 'rife' ),
					'circle_illusion'   => esc_html__( 'Circle Illusion', 'rife' ),
					'square_of_squares' => esc_html__( 'Square of squares', 'rife' ),
					'plus_minus'        => esc_html__( 'Plus minus', 'rife' ),
					'hand'              => esc_html__( 'Hand', 'rife' ),
					'blurry'            => esc_html__( 'Blurry', 'rife' ),
					'arcs'              => esc_html__( 'Arcs', 'rife' ),
					'tetromino'         => esc_html__( 'Tetromino', 'rife' ),
					'infinity'          => esc_html__( 'Infinity', 'rife' ),
					'cloud_circle'      => esc_html__( 'Cloud circle', 'rife' ),
					'dots'              => esc_html__( 'Dots', 'rife' ),
					'jet_pack_man'      => esc_html__( 'Jet-Pack-Man', 'rife' ),
					'circle'            => 'Circle'
				),
				'default'  => 'flash',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Animation color', 'rife' ),
				'required' => array(
					array( 'preloader', '=', 'on' ),
					array( 'preloader_type', '!=', 'tetromino' ),
					array( 'preloader_type', '!=', 'blurry' ),
					array( 'preloader_type', '!=', 'square_of_squares' ),
					array( 'preloader_type', '!=', 'circle_illusion' ),
				),
				'default'  => '',
				'partial'  => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Cookie message', 'rife' ),
		'id'         => 'subsection_top_message',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'top_message',
				'type'    => 'radio',
				'title'   => esc_html__( 'Cookie message', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
				'js'      => true,
			),
			array(
				'id'      => 'top_message_position',
				'type'    => 'radio',
				'title'   => esc_html__( 'Position', 'rife' ),
				'options' => array(
					'top'    => esc_html__( 'Top', 'rife' ),
					'bottom' => esc_html__( 'Bottom', 'rife' ),
				),
				'default' => 'top',
				'required' => array( 'top_message', '=', 'on' ),
				'js'      => true,
			),
			array(
				'id'       => 'top_message_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#top-closable-message',
					'container_inclusive' => true,
					'settings'            => array(
						'top_message_position',
						'top_message_bg_color',
						'top_message_text_color',
						'top_message_link_color',
						'top_message_link_color_hover',
						'top_message_text_transform',
						'top_message_text',
						'top_message_button',
					),
					'render_callback'     => 'apollo13framework_cookie_message',
				),
			),
			array(
				'title'    => esc_html__( 'Text color', 'rife' ),
				'type'     => 'color',
				'id'       => 'top_message_text_color',
				'default'  => '#000000',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,

			),
			array(
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'type'     => 'color',
				'id'       => 'top_message_link_color',
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_text_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'none',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Content', 'rife' ),
				'desc'     => esc_html__( 'You can use HTML here.', 'rife' ),
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'top_message_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Closing button', 'rife' ). ' : ' .esc_html__( 'Text', 'rife' ),
				'description' => esc_html__( 'If no text is given, "X" will appear instead.', 'rife' ),
				'default'     => '',
				'required'    => array( 'top_message', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Theme Header', 'rife' ),
		'desc'       => esc_html__( 'Theme header is a place where you usually find the logo of your site, main menu, and a few other elements.', 'rife' ),
		'id'         => 'subsection_header',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Theme Header', 'rife' ),
				'description' => esc_html__( 'If you do not plan to use theme header or want to replace it with something else, just disable it here.', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			)
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Footer', 'rife' ),
		'id'         => 'subsection_footer',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'footer_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Footer', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
				'partial'     => array(
					'selector'            => '#footer',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_switch',
						'footer_unravel_effect',
						'footer_widgets_columns',
						'footer_text',
						'footer_privacy_link',
						'footer_content_width',
						'footer_content_style',
						'footer_bg_color',
						'footer_lower_bg_color',
						'footer_lower_bg_color',
						'footer_widgets_color',
						'footer_separator',
						'footer_separator_color',
						'footer_font_size',
						'footer_widgets_font_size',
						'footer_font_color',
						'footer_link_color',
						'footer_hover_color',
					),
					'render_callback'     => 'apollo13framework_theme_footer',
				),
			),
			array(
				'id'          => 'footer_unravel_effect',
				'type'        => 'radio',
				'title'       => esc_html__( 'Parallax', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ) .' '. esc_html__( 'It makes the footer uncover while you are scrolling the page to the bottom.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'footer_switch', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Widgets columns number', 'rife' ),
				'options'  => array(
					'1' => esc_html__( '1', 'rife' ),
					'2' => esc_html__( '2', 'rife' ),
					'3' => esc_html__( '3', 'rife' ),
					'4' => esc_html__( '4', 'rife' ),
					'5' => esc_html__( '5', 'rife' ),
				),
				'default'  => '3',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_text',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'rife' ),
				'description' => esc_html__( 'You can use HTML here.', 'rife' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_privacy_link',
				'type'        => 'radio',
				'title'       => esc_html__( 'Privacy Policy Link', 'rife' ),
				'description' => esc_html__( 'Since WordPress 4.9.6 there is an option to set Privacy Policy page. If you enable this option it will display a link to it in the footer after footer content.', 'rife' ).' <a href="'.esc_url( admin_url( 'privacy.php' ) ).'">'.esc_html__( 'Here you can set your Privacy Policy page', 'rife' ).'</a>',
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'rife' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'rife' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => array(
					'selector'            => '.f-links',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_socials',
						'footer_socials_color',
						'footer_socials_color_hover',
					),
					'render_callback'     => 'footer_socials'
				),
			),
			array(
				'id'       => 'footer_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'rife' ),
					'full'   => esc_html__( 'Full width', 'rife' ),
				),
				'default'  => 'narrow',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Style', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_lower_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Lower part', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'desc'     => esc_html__( 'If you want to have a different color in the lower part than in the footer widgets.', 'rife' ),
				'default'  => '',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_color',
				'type'     => 'radio',
				'title'    => esc_html__( 'Widgets colors', 'rife' ),
				'desc'     => esc_html__( 'Depending on what background you have set up, choose proper option.', 'rife' ),
				'options'  => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'rife' ),
					'light-sidebar' => esc_html__( 'On light', 'rife' ),
				),
				'default'  => 'dark-sidebar',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_separator',
				'type'     => 'radio',
				'title'    => esc_html__( 'Separator between widgets and footer content', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_separator_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_separator', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Lower part', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Widgets part', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_font_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'rife' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_link_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'rife' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'rife' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Hidden sidebar', 'rife' ),
		'desc'       => esc_html__( 'It is active only if it contains active widgets. After activation, displays the opening button in the header.', 'rife' ),
		'id'         => 'subsection_hidden_sidebar',
		'icon'       => 'fa fa-columns',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'hidden_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'hidden_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'default' => 10,
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'          => 'hidden_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'rife' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'rife' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'rife' ),
					'light-sidebar' => esc_html__( 'On light', 'rife' ),
				),
				'default'     => 'dark-sidebar',
			),
			array(
				'id'      => 'hidden_sidebar_side',
				'type'    => 'radio',
				'title'   => esc_html__( 'Side', 'rife' ),
				'options' => array(
					'left'  => esc_html__( 'Left', 'rife' ),
					'right' => esc_html__( 'Right', 'rife' ),
				),
				'default' => 'left',
			),
			array(
				'id'      => 'hidden_sidebar_effect',
				'type'    => 'select',
				'title'   => esc_html__( 'Opening effect', 'rife' ),
				'options' => array(
					'1' => esc_html__( 'Slide in on top', 'rife' ),
					'2' => esc_html__( 'Reveal', 'rife' ),
					'3' => esc_html__( 'Push', 'rife' ),
					'4' => esc_html__( 'Slide along', 'rife' ),
					'5' => esc_html__( 'Reverse slide out', 'rife' ),
					'6' => esc_html__( 'Fall down', 'rife' ),
				),
				'default' => '2',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Fonts settings', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_fonts_settings',
		'icon'       => 'fa fa-font',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'nav_menu_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for main navigation menu and overlay menu:', 'rife' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'titles_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for Titles/Headings:', 'rife' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'normal_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for normal(content) text:', 'rife' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'logo_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for text logo:', 'rife' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Headings', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_heading_styles',
		'icon'       => 'fa fa-header',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'headings_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'rife' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'headings_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'rife' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'page_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Main titles', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'default' => 36,
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
			),
			array(
				'id'          => 'page_title_font_size_768',
				'type'        => 'slider',
				'title'       => esc_html__( 'Main titles', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ). ' - ' .esc_html__( 'on mobile devices', 'rife' ),
				'description' => esc_html__( 'It will be used on devices less than 768 pixels wide.', 'rife' ),
				'min'         => 10,
				'max'         => 60,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 32,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Content', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_content_styles',
		'icon'       => 'fa fa-align-left',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'content_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'rife' ),
				'description' => esc_html__( 'It will change the default white background color that is set under content on pages, blog, posts, works, and albums.', 'rife' ),
				'default'     => '#ffffff',
			),
			array(
				'id'      => 'content_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'content_link_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'content_link_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'content_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'default' => 16,
				'min'     => 10,
				'step'    => 1,
				'max'     => 30,
				'unit'    => 'px',
			),
			array(
				'id'          => 'first_paragraph',
				'type'        => 'radio',
				'title'       => esc_html__( 'First paragraph', 'rife' ). ' : ' .esc_html__( 'Highlight', 'rife' ),
				'description' => esc_html__( 'If enabled, it highlights(font size and color) the first paragraph in the content(blog, post, page).', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'       => 'first_paragraph_color',
				'type'     => 'color',
				'title'    => esc_html__( 'First paragraph', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'first_paragraph', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Social icons', 'rife' ),
		'desc'       => esc_html__( 'These icons will be used in various places across theme if you decide to activate them.', 'rife' ),
		'id'         => 'section_social',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'socials_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type of icons', 'rife' ),
				'options' => array(
					'squares'    => esc_html__( 'Squares', 'rife' ),
					'circles'    => esc_html__( 'Circles', 'rife' ),
					'icons-only' => esc_html__( 'Only icons', 'rife' ),
				),
				'default' => 'squares',
			),
			array(
				'id'          => 'social_services',
				'type'        => 'socials',
				'title'       => esc_html__( 'Links', 'rife' ),
				'description' => esc_html__( 'Drag and drop to change order of icons. Only filled links will show up as social icons.', 'rife' ),
				'label'       => false,
				'options'     => $apollo13framework_a13->get_social_icons_list( 'names' ),
				'default'     => $apollo13framework_a13->get_social_icons_list( 'empty' )
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Lightbox settings', 'rife' ),
		'desc'       => esc_html__( 'If you wish to use some other plugin/script for images and items, you can switch off default theme lightbox. If you are planning to use different lightbox script instead, then you will have to do some extra work with scripting to make it work in every theme place.', 'rife' ),
		'id'         => 'subsection_lightbox',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'apollo_lightbox',
				'type'    => 'radio',
				'title'   => esc_html__( 'Theme lightbox', 'rife' ),
				'options' => array(
					'lightGallery' => esc_html__( 'Light Gallery', 'rife' ),
					'off'          => esc_html__( 'Disable', 'rife' ),
				),
				'default' => 'lightGallery',
			),
			array(
				'id'          => 'lightbox_single_post',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use theme lightbox for images in posts', 'rife' ),
				'description' => esc_html__( 'If enabled, the theme will use a lightbox to display images in the post content. To work properly, Images should link to "Media File".', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_mode',
				'type'        => 'select',
				'title'       => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Transition', 'rife' ) . ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'Animation between slides.', 'rife' ),
				'options'     => array(
					'lg-slide'                    => 'lg-slide',
					'lg-fade'                     => 'lg-fade',
					'lg-zoom-in'                  => 'lg-zoom-in',
					'lg-zoom-in-big'              => 'lg-zoom-in-big',
					'lg-zoom-out'                 => 'lg-zoom-out',
					'lg-zoom-out-big'             => 'lg-zoom-out-big',
					'lg-zoom-out-in'              => 'lg-zoom-out-in',
					'lg-zoom-in-out'              => 'lg-zoom-in-out',
					'lg-soft-zoom'                => 'lg-soft-zoom',
					'lg-scale-up'                 => 'lg-scale-up',
					'lg-slide-circular'           => 'lg-slide-circular',
					'lg-slide-circular-vertical'  => 'lg-slide-circular-vertical',
					'lg-slide-vertical'           => 'lg-slide-vertical',
					'lg-slide-vertical-growth'    => 'lg-slide-vertical-growth',
					'lg-slide-skew-only'          => 'lg-slide-skew-only',
					'lg-slide-skew-only-rev'      => 'lg-slide-skew-only-rev',
					'lg-slide-skew-only-y'        => 'lg-slide-skew-only-y',
					'lg-slide-skew-only-y-rev'    => 'lg-slide-skew-only-y-rev',
					'lg-slide-skew'               => 'lg-slide-skew',
					'lg-slide-skew-rev'           => 'lg-slide-skew-rev',
					'lg-slide-skew-cross'         => 'lg-slide-skew-cross',
					'lg-slide-skew-cross-rev'     => 'lg-slide-skew-cross-rev',
					'lg-slide-skew-ver'           => 'lg-slide-skew-ver',
					'lg-slide-skew-ver-rev'       => 'lg-slide-skew-ver-rev',
					'lg-slide-skew-ver-cross'     => 'lg-slide-skew-ver-cross',
					'lg-slide-skew-ver-cross-rev' => 'lg-slide-skew-ver-cross-rev',
					'lg-lollipop'                 => 'lg-lollipop',
					'lg-lollipop-rev'             => 'lg-lollipop-rev',
					'lg-rotate'                   => 'lg-rotate',
					'lg-rotate-rev'               => 'lg-rotate-rev',
					'lg-tube'                     => 'lg-tube',
				),
				'default'     => 'lg-slide',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_speed',
				'type'     => 'slider',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Transition', 'rife' ). ' : ' .esc_html__( 'Speed', 'rife' ),
				'min'      => 100,
				'max'      => 1000,
				'unit'     => 'ms',
				'default'  => '600',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_preload',
				'type'        => 'slider',
				'title'       => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Preload items', 'rife' ),
				'description' => esc_html__( 'How many previous and next items should be preloaded.', 'rife' ),
				'min'         => 0,
				'max'         => 5,
				'unit'        => '',
				'default'     => '1',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_hide_delay',
				'type'     => 'slider',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Delay of hiding the interface', 'rife' ),
				'min'      => 100,
				'max'      => 10000,
				'unit'     => 'ms',
				'default'  => '2000',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay_open',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Autoplay', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_progressbar',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Progress bar', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay_pause',
				'type'     => 'slider',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Time between slides', 'rife' ),
				'min'      => 500,
				'max'      => 10000,
				'unit'     => 'ms',
				'default'  => '5000',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_controls',
				'type'        => 'radio',
				'title'       => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Slides navigation', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_download',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Controls', 'rife' ). ' : ' .esc_html__( 'Download', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_full_screen',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Controls', 'rife' ). ' : ' .esc_html__( 'Full screen', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_zoom',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Controls', 'rife' ). ' : ' .esc_html__( 'Zooming', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay',
				'type'     => 'radio',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Controls', 'rife' ). ' : ' .esc_html__( 'Autoplay', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_share',
				'type'     => 'radio',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Controls', 'rife' ) . ' : ' . esc_html__( 'Social icons', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_counter',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Counter', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbnail',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'rife' ) . '] ' .esc_html__( 'Thumbnails', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_show_thumbs',
				'type'        => 'radio',
				'title'       => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Thumbnails', 'rife' ) . ' : ' . esc_html__( 'Open', 'rife' ),
				'description' => __( 'If thumbnails are enabled, should they be open by default?', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_bg_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_elements_bg_color',
				'type'        => 'color',
				'title'       => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Semi transparent elements', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'     => '#000000',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Semi transparent elements', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_color_hover',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Semi transparent elements', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_text_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Semi transparent elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_bg_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Thumbnails', 'rife' ) . ' : ' . esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_border_bg_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Thumbnails', 'rife' ) . ' : ' .esc_html__( 'Border color', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_border_bg_color_hover',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'rife' ) . '] ' . esc_html__( 'Thumbnails', 'rife' ) . ' : ' .esc_html__( 'Border color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Widgets', 'rife' ),
		'id'         => 'subsection_widgets',
		'icon'       => 'fa fa-puzzle-piece',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'widgets_top_margin',
				'type'        => 'radio',
				'title'       => esc_html__( 'Top margin', 'rife' ),
				'description' => esc_html__( 'It only affects the widgets in the vertical sidebars.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'widget_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Main titles', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 14,
			),
			array(
				'id'          => 'widget_font_size',
				'type'        => 'slider',
				'title'       => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'description' => esc_html__( 'It only affects the widgets in the vertical sidebars.', 'rife' ),
				'min'         => 5,
				'max'         => 30,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 12,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'To top button', 'rife' ),
		'id'         => 'subsection_to_top',
		'icon'       => 'fa fa-chevron-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'to_top_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'to_top_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'to_top_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'to_top_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'to_top_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Icon', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'          => 'to_top_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon', 'rife' ),
				'default'     => 'chevron-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Buttons', 'rife' ),
		'desc'       => esc_html__( 'You can change here colors of buttons that submit forms. For shop buttons, go to the shop settings.', 'rife' ),
		'id'         => 'subsection_buttons',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_submit_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_submit_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_submit_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_submit_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_submit_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_submit_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'rife' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_submit_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'rife' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_submit_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'rife' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
			array(
				'id'          => 'button_submit_radius',
				'type'        => 'slider',
				'title'       => esc_html__( 'Border radius', 'rife' ),
				'min'         => 0,
				'max'         => 20,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 20,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Flyout box', 'rife' ),
		'id'         => 'subsection_flyout_box',
		'icon'       => 'fa fa-info-circle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'flyout_box',
				'type'    => 'radio',
				'title'   => esc_html__( 'Flyout box', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'          => 'flyout_box_content',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'rife' ),
				'description' => esc_html__( 'You can use HTML here.', 'rife' ),
				'default'     => '',
				'required'    => array( 'flyout_box', '=', 'on' ),
			),
			array(
				'id'          => 'flyout_box_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Opening icon', 'rife' ),
				'default'     => 'info-circle',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'flyout_box', '=', 'on' ),
				)
			),
		)
	) );

//HEADER SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Header settings', 'rife' ),
		'desc'     => '',
		'id'       => 'section_header_settings',
		'icon'     => 'el el-magic',
		'priority' => 6,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Type, variant, background', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_header_type',
		'icon'       => 'fa fa-cogs',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'The vertical header does not work in a boxed layout.', 'rife' ),
				'options'     => array(
					'vertical'   => esc_html__( 'Vertical', 'rife' ),
					'horizontal' => esc_html__( 'Horizontal', 'rife' ),
				),
				'default'     => 'horizontal',
			),
			array(
				'id'       => 'header_horizontal_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Sticky version', 'rife' ),
				'options'  => array(
					'default-sticky'     => esc_html__( 'Hiding when scrolling down', 'rife' ),
					'sticky-no-hiding'   => esc_html__( 'No hiding sticky', 'rife' ),
					'no-sticky no-fixed' => esc_html__( 'Disabled, show only default header(not fixed)', 'rife' ),
					'no-sticky'          => esc_html__( 'Disabled, show only default header fixed', 'rife' )
				),
				'default'  => 'default-sticky',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_side',
				'type'     => 'radio',
				'title'    => esc_html__( 'Side', 'rife' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'rife' ),
					'right' => esc_html__( 'Right', 'rife' ),
				),
				'default'  => 'left',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_side_rtl',
				'type'     => 'radio',
				'title'    => esc_html__( 'Side', 'rife' ). ' - ' .esc_html__( 'in RTL languages', 'rife' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'rife' ),
					'right' => esc_html__( 'Right', 'rife' ),
				),
				'default'  => 'left',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_horizontal_variant',
				'type'     => 'select',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'one_line'               => esc_html__( 'One line, logo on side', 'rife' ),
					'one_line_menu_centered' => esc_html__( 'One line, menu centered', 'rife' ),
					'one_line_centered'      => esc_html__( 'One line, logo centered', 'rife' ),
					'menu_below'             => esc_html__( 'Logo centered, menu below', 'rife' ),
					'menu_above'             => esc_html__( 'Logo centered, menu above', 'rife' ),
				),
				'default'  => 'one_line',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'header_color_variants',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variants', 'rife' ),
				'description' => esc_html__( 'If you want to use theme header color variants(light and dark variants) or the sticky header variant, then enable this option. Some settings of the header can then be overridden in color & sticky variants.', 'rife' ),
				'options'     => array(
					'on'     => esc_html__( 'Enable', 'rife' ),
					'sticky' => esc_html__( 'Turn on only for a sticky variant', 'rife' ),
					'off'    => esc_html__( 'Disable', 'rife' ),
				),
				'default'     => 'on',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content width', 'rife' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'rife' ),
					'full'   => esc_html__( 'Full width', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width_narrow_bg',
				'type'     => 'radio',
				'title'    => esc_html__( 'Narrow the entire header as well', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_content_width', '=', 'narrow' )
				),
			),
			array(
				'id'          => 'header_content_padding',
				'type'        => 'slider',
				'title'       => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Left/right padding', 'rife' ),
				'min'         => 0,
				'max'         => 40,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'       => 'header_vertical_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'        => esc_html__( 'Classic', 'rife' ),
					'content_in_mid' => esc_html__( 'Vertical centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_center_content',
				'type'     => 'radio',
				'title'    => esc_html__( 'Center the entire content', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'      => 'header_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '#ffffff',
			),
			array(
				'id'          => 'header_bg_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'description' => esc_html__( 'Useful in special cases, like when you make a transparent header.', 'rife' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_bg_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Background image', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ),
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'       => 'header_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'header_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'header_separators_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator and lines color', 'rife' ),
				'default'  => '',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_custom_sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Custom sidebar', 'rife' ),
				'options'  => $header_sidebars,
				'default'  => 'off',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'rife' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'rife' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'rife' ),
					'light-sidebar' => esc_html__( 'On light', 'rife' ),
				),
				'default'     => 'light-sidebar',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'rife' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'rife' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_socials_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'rife' ). ' - ' .esc_html__( 'Display it on mobiles', 'rife' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Logo', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_logo',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'logo_from_variants',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use logos from header variants', 'rife' ),
				'description' => esc_html__( 'If you want to be able to change the logo in header color variants (light and dark variants) or in the sticky header variant, then enable this option.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_color_variants', '!=', 'off' ),
				)
			),
			array(
				'id'      => 'logo_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'rife' ),
				'options' => array(
					'image' => esc_html__( 'Image', 'rife' ),
					'text'  => esc_html__( 'Text', 'rife' ),
				),
				'default' => 'image',
			),
			array(
				'id'          => 'logo_svg',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use the SVG logo', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Image', 'rife' ),
				'description' => esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Image for HIGH DPI screen', 'rife' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'rife' ) . ' ' . esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'          => 'logo_with_shield',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use a shield for the logo', 'rife' ),
				/* translators: %s: "One line, logo centered" */
				'description' => sprintf( esc_html__( 'Works only in the horizontal header with the variant "%s".', 'rife' ), esc_html__( 'One line, logo centered', 'rife' ) ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
				)
			),
			array(
				'id'       => 'logo_shield_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Shield', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'default'  => '#000000',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_padding',
				'type'        => 'slider',
				'title'       => esc_html__( 'Shield', 'rife' ). ' : ' .esc_html__( 'Area height', 'rife' ),
				'description' => esc_html__( 'If your logo does not fit in the shield, try increasing this setting.', 'rife' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'default'     => 15,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_hide',
				'type'        => 'slider',
				'title'       => esc_html__( 'Sticky header', 'rife' ). ' : ' .esc_html__( 'How many % logo should fold up', 'rife' ),
				'description' => esc_html__( 'Works only with the sticky header.', 'rife' ) .' '. esc_html__( 'How many percent(%) of the logo should should be hidden by folding up. The percentage is counted from the header height, not the shield height, so you may need to use values above 100%.', 'rife' ),
				'min'         => 0,
				'max'         => 250,
				'step'        => 1,
				'unit'        => '%',
				'default'     => 50,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_hide_mobile',
				'type'        => 'slider',
				'title'       => esc_html__( 'How many % logo should fold up', 'rife' ). ' - ' .esc_html__( 'on mobile devices', 'rife' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'rife' ) .' '. esc_html__( 'How many percent(%) of the logo should should be hidden by folding up. The percentage is counted from the header height, not the shield height, so you may need to use values above 100%.', 'rife' ),
				'min'         => 0,
				'step'        => 1,
				'max'         => 250,
				'unit'        => '%',
				'default'     => 50,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width', 'rife' ). ' - ' .esc_html__( 'on desktop', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width', 'rife' ). ' - ' .esc_html__( 'on mobile devices', 'rife' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'rife' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
				)
			),
			array(
				'id'          => 'logo_image_height',
				'type'        => 'slider',
				'title'       => esc_html__( 'Height', 'rife' ),
				'description' => esc_html__( 'Leave empty if you do not need anything fancy', 'rife' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_normal_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'rife' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '1.00',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_hover_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '0.50',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_text',
				'type'        => 'text',
				'title'       => esc_html__( 'Text', 'rife' ),
				'description' => wp_kses( __( 'If you use more than one word in the logo, you can use <code>&amp;nbsp;</code> instead of a white space, so the words will not break into many lines.', 'rife' ), $valid_tags ).
				                 /* translators: %s: Customizer JS URL */
				                 '<br />'.sprintf( wp_kses( __( 'If you want to change the font for logo go to <a href="%s">Font settings</a>.', 'rife' ), $valid_tags ), 'javascript:wp.customize.control( \''.A13FRAMEWORK_OPTIONS_NAME.'[logo_fonts]\' ).focus();' ),
				'default'     => get_bloginfo( 'name' ),
				'required'    => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'rife' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 26,
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'          => 'logo_padding',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding', 'rife' ). ' - ' .esc_html__( 'on desktop', 'rife' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
			array(
				'id'          => 'logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding', 'rife' ). ' - ' .esc_html__( 'on mobile devices', 'rife' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'rife' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Main Menu', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_header_menu',
		'icon'       => 'fa fa-bars',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_main_menu',
				'type'    => 'radio',
				'title'   => esc_html__( 'Main Menu', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'header_main_menu_width',
				'type'     => 'slider',
				'title'       => esc_html__( 'Reserved space for the main menu', 'rife' ),
				/* translators: %s: "One line, logo centered" */
				'description' => sprintf( esc_html__( 'Works only in the horizontal header with the variant "%s".', 'rife' ), esc_html__( 'One line, logo centered', 'rife' ) ) .' '. esc_html__( 'By default, 70% width is reserved for the main menu in this header variant. You can increase this value if it is not enough for the menu.', 'rife' ),
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
				'unit'     => '%',
				'default'  => 70,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
				)
			),
			array(
				'id'          => 'menu_hover_effect',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'rife' ),
				'description' => esc_html__( 'It works only for first level links.', 'rife' ),
				'options'     => $menu_effects,
				'default'     => 'none',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_close_mobile_menu_on_click',
				'type'        => 'radio',
				'title'       => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Close menu after click', 'rife' ),
				'description' => esc_html__( 'After turning on the mobile menu will be closed after clicking the link menu. This option is good for "one page" sites. For traditional websites, it is recommended to disable this option.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_allow_mobile_menu',
				'type'        => 'radio',
				'title'       => esc_html__( 'Allow for the mobile menu', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ) .' '. esc_html__( 'If you disable this then menu will not switch to mobile menu. You should consider disabling this option only if you have a clean header with a short menu.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default' => '#ffffff',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'rife' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 14,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_line_height',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu item height', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '',
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'vertical' ),
				)
			),
			array(
				'id'       => 'menu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'It works only for first level links.', 'rife' ),
				'default'     => '#000000',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_separator_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mega-Menu separator color', 'rife' ),
				'default'  => '',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_active_open',
				'type'     => 'radio',
				'title'    => esc_html__( 'Keep the submenu open for the current page', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. esc_html__( 'If the current page has the link in a the submenu, this option opens the ancestor submenu.', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'vertical' )
				)
			),
			array(
				'id'       => 'submenu_open_icons',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Opening/Closing icons', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'submenu_opener',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Opening icon', 'rife' ),
				'default'     => 'angle-down',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)

			),
			array(
				'id'          => 'submenu_closer',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Closing icon', 'rife' ),
				'default'     => 'angle-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)
			),
			array(
				'id'          => 'submenu_third_lvl_opener',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu 3rd level', 'rife' ). ' : ' .esc_html__( 'Opening icon', 'rife' ),
				'default'     => 'angle-right',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)

			),
			array(
				'id'          => 'submenu_third_lvl_closer',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu 3rd level', 'rife' ). ' : ' .esc_html__( 'Closing icon', 'rife' ),
				'default'     => 'angle-left',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)
			),
			array(
				'id'       => 'submenu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'required' => array( 'header_main_menu', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'submenu_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 10,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'rife' ). ' : ' .esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Top bar', 'rife' ),
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'rife' ),
		'id'         => 'subsection_header_top_bar',
		'icon'       => 'fa fa-arrow-circle-o-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_top_bar',
				'type'    => 'radio',
				'title'   => esc_html__( 'Top bar', 'rife' ),
				'default' => 'on',
				'options' => $on_off,
			),
			array(
				'id'          => 'header_top_bar_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display it on mobiles', 'rife' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'rife' ),
				'default'  => 'on',
				'options'  => $on_off,
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_text_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'none',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_msg_part',
				'type'     => 'select',
				'title'    => esc_html__( 'Message part', 'rife' ),
				'options'  => array(
					'message' => esc_html__( 'Use message', 'rife' ),
					/* translators: %s: "Alternative short top bar menu" */
					'menu'    => sprintf( esc_html__( 'Use the menu from the "%s" position', 'rife' ), esc_html__( 'Alternative short top bar menu', 'rife' ) ),
					'off'     => esc_html__( 'Disable', 'rife' ),
				),
				'default'  => 'message',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_msg_part_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Message part', 'rife' ). ' : ' .esc_html__( 'Text align', 'rife' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required'    => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_msg_part', '!=', 'off' ),
				)
			),
			array(
				'id'          => 'top_bar_message',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'rife' ),
				'description' => esc_html__( 'You can use HTML here.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_msg_part', '=', 'message' ),
				)
			),
			array(
				'id'          => 'top_bar_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'rife' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'rife' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'top_bar_lang_switcher',
				'type'        => 'radio',
				'title'       => esc_html__( 'Language switcher', 'rife' ),
				'description' => esc_html__( 'Shows only if the WPML plugin is enabled.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Variant light', 'rife' ). ' - ' .esc_html__( 'Override normal settings', 'rife' ),
		/* translators: %s: URL */
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'rife' ) .' '. sprintf( wp_kses( __( 'Read more in <a href="%s">the documentation</a>.', 'rife' ), $valid_tags ), esc_url( $apollo13framework_a13->get_docs_link( 'header-color-variants' ) ) ),
		'id'         => 'subsection_header_light',
		'icon'       => 'fa fa-sun-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_light_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Image', 'rife' ),
				'description' => esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_light_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'rife' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'rife' ) . ' ' . esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'       => 'header_light_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_light_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'header_light_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'It works only for first level links.', 'rife' ),
				'default'     => '#000000',
			),
			array(
				'id'      => 'header_light_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_light_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default' => '#222222',
			),
			array(
				'id'      => 'header_light_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_light_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Separator and lines color', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_light_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_light_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ),
				'default'  => 'rgba(255,255,255,0.3)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(255,255,255,0.5)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(0,0,0,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => 'rgba(255,255,255,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => 'rgba(255,255,255,0.7)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'white',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Variant dark', 'rife' ). ' - ' .esc_html__( 'Override normal settings', 'rife' ),
		/* translators: %s: URL */
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'rife' ) .' '. sprintf( wp_kses( __( 'Read more in <a href="%s">the documentation</a>.', 'rife' ), $valid_tags ), esc_url( $apollo13framework_a13->get_docs_link( 'header-color-variants' ) ) ),
		'id'         => 'subsection_header_dark',
		'icon'       => 'fa fa-moon-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_dark_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Image', 'rife' ),
				'description' => esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_dark_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'rife' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'rife' ) . ' ' . esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'       => 'header_dark_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_dark_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'header_dark_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'It works only for first level links.', 'rife' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_dark_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_dark_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_dark_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_dark_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Separator and lines color', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_dark_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_dark_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(255,255,255,0)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => 'rgba(0,0,0,0.5)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => 'rgba(0,0,0,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => 'rgba(0,0,0,0.7)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Sticky header', 'rife' ). ' - ' .esc_html__( 'Override normal settings', 'rife' ),
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'rife' ) .' '. esc_html__( 'You can change some options here to modify the appearance of the sticky header(if it is enabled).', 'rife' ),
		'id'         => 'subsection_header_sticky',
		'icon'       => 'fa fa-thumb-tack',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_sticky_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Image', 'rife' ),
				'description' => esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'rife' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'rife' ) . ' ' . esc_html__( 'Upload an image for logo.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Max width', 'rife' ). ' - ' .esc_html__( 'on desktop', 'rife' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Max width', 'rife' ). ' - ' .esc_html__( 'on mobile devices', 'rife' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'rife' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_sticky_logo_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Padding', 'rife' ). ' - ' .esc_html__( 'on desktop', 'rife' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ),
				'mode'    => 'padding',
				'sides'   => array( 'top', 'bottom' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'          => 'header_sticky_logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Padding', 'rife' ). ' - ' .esc_html__( 'on mobile devices', 'rife' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'rife' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'       => 'header_sticky_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_sticky_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'header_sticky_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'It works only for first level links.', 'rife' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_sticky_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_sticky_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_sticky_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_sticky_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Separator and lines color', 'rife' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_sticky_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_sticky_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_top_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Top bar', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_sticky_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'rife' ). ' : ' .esc_html__( 'Social icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Tools icons', 'rife' ). ' - ' .esc_html__( 'General settings', 'rife' ),
		'id'         => 'subsection_header_tools',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '#000000',
			),
			array(
				'id'          => 'header_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'rife' ). ' : ' .esc_html__( 'Color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'rife' ),
				'default'     => '#000000',
			),
			array(
				'id'      => 'header_search',
				'type'    => 'radio',
				'title'   => esc_html_x( 'Search', 'tool', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_language_switcher',
				'type'    => 'radio',
				'title'       => esc_html__( 'Language switcher', 'rife' ),
				'description' => esc_html__( 'Shows only if the WPML plugin is enabled.', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'header_language_switcher_options',
				'type'     => 'button-set',
				'multi'    => true,
				'title'    => esc_html__( 'Language switcher', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'options'  => array(
					'flags'    => esc_html__( 'Flags', 'rife' ),
					'codes'  => esc_html__( 'Codes', 'rife' ),
				),
				'default'  => array( 'flags', 'codes' ),
				'required' => array( 'header_language_switcher', '=', 'on' ),
				'sanitize' => 'button_set_multi'
			),
			array(
				'id'          => 'header_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Content', 'rife' ),
				'description' => esc_html__( 'If left empty then the button will not be displayed.', 'rife' ),
				'default'     => '',
				'partial' => array(
					'selector' => '.tools_button',
					'container_inclusive' => true,
					'settings' => array(
						'header_button',
						'header_button_link',
						'header_button_link_target',
						'header_button_font_size',
						'header_button_weight',
						'header_button_bg_color',
						'header_button_bg_color_hover',
						'header_button_border_color',
						'header_button_border_color_hover',
						'header_button_display_on_mobile',
					),
					'render_callback' => 'apollo13framework_header_button',
				)
			),
			array(
				'id'       => 'header_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Link', 'rife' ),
				'default'  => '',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'          => 'header_button_link_target',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Open link in new tab', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Font size', 'rife' ),
				'min'      => 5,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '12',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'rife' ). ' : ' .esc_html__( 'Border color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'          => 'header_button_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button', 'rife' ). ' - ' .esc_html__( 'Display it on mobiles', 'rife' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Tools icons', 'rife' ). ' - ' .esc_html__( 'Individual icons', 'rife' ),
		'id'         => 'subsection_header_tools_individual',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_tools_mobile_menu_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ). ' - ' .esc_html__( 'Type', 'rife' ),
				'default' => 'default',
				'options' => array(
					'default'  => esc_html__( 'Default for the theme', 'rife' ),
					'animated' => esc_html__( 'Animated', 'rife' ),
					'custom'   => esc_html__( 'Custom', 'rife' ),
				),
			),
			array(
				'id'          => 'header_tools_mobile_menu_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Mobile menu', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_mobile_menu_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_mobile_menu_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Mobile menu', 'rife' ) . ' : ' . esc_html__( 'Icon', 'rife' ) . ' - ' . esc_html__( 'Size', 'rife' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 18,
				'required' => array(
					array( 'header_tools_mobile_menu_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_mobile_menu_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Mobile menu', 'rife' ) . ' : ' . esc_html__( 'Closing icon', 'rife' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'rife' ),
					'la' => esc_html__( 'Left arrow', 'rife' ),
					'ra' => esc_html__( 'Right arrow', 'rife' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_mobile_menu_icon_type', '=', 'animated' ),
				)
			),
			array(
				'id'      => 'header_tools_basket_sidebar_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Basket sidebar', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ). ' - ' .esc_html__( 'Type', 'rife' ),
				'options' => array(
					'default' => esc_html__( 'Default for the theme', 'rife' ),
					'custom'  => esc_html__( 'Custom', 'rife' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_basket_sidebar_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Basket sidebar', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_basket_sidebar_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'      => 'header_tools_basket_sidebar_icon_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Basket sidebar', 'rife' ) . ' : ' . esc_html__( 'Icon', 'rife' ) . ' - ' . esc_html__( 'Size', 'rife' ),
				'default' => 16,
				'min'     => 10,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'      => 'header_tools_header_search_icon_type',
				'type'    => 'radio',
				'title'   => esc_html_x( 'Search', 'action', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ). ' - ' .esc_html__( 'Type', 'rife' ),
				'default' => 'default',
				'options' => array(
					'default' => esc_html__( 'Default for the theme', 'rife' ),
					'custom'  => esc_html__( 'Custom', 'rife' ),
				),
			),
			array(
				'id'          => 'header_tools_header_search_icon',
				'type'        => 'text',
				'title'       => esc_html_x( 'Search', 'action', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_header_search_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'      => 'header_tools_header_search_icon_size',
				'type'    => 'slider',
				'title'   => esc_html_x( 'Search', 'action', 'rife' ) . ' : ' . esc_html__( 'Icon', 'rife' ) . ' - ' . esc_html__( 'Size', 'rife' ),
				'min'     => 10,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 16,
			),
			array(
				'id'      => 'header_tools_hidden_sidebar_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Hidden sidebar', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ). ' - ' .esc_html__( 'Type', 'rife' ),
				'options' => array(
					'default'  => esc_html__( 'Default for the theme', 'rife' ),
					'animated' => esc_html__( 'Animated', 'rife' ),
					'custom'   => esc_html__( 'Custom', 'rife' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_hidden_sidebar_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Hidden sidebar', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_hidden_sidebar_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_hidden_sidebar_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hidden sidebar', 'rife' ) . ' : ' . esc_html__( 'Icon', 'rife' ) . ' - ' . esc_html__( 'Size', 'rife' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array(
					array( 'header_tools_hidden_sidebar_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_hidden_sidebar_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Hidden sidebar', 'rife' ) . ' : ' . esc_html__( 'Closing icon', 'rife' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'rife' ),
					'la' => esc_html__( 'Left arrow', 'rife' ),
					'ra' => esc_html__( 'Right arrow', 'rife' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_hidden_sidebar_icon_type', '=', 'animated' ),
				)
			),
			array(
				'id'      => 'header_tools_menu_overlay_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Menu overlay', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ). ' - ' .esc_html__( 'Type', 'rife' ),
				'options' => array(
					'default'  => esc_html__( 'Default for the theme', 'rife' ),
					'animated' => esc_html__( 'Animated', 'rife' ),
					'custom'   => esc_html__( 'Custom', 'rife' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_menu_overlay_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Menu overlay', 'rife' ). ' : ' .esc_html__( 'Icon', 'rife' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_menu_overlay_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_menu_overlay_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu overlay', 'rife' ) . ' : ' . esc_html__( 'Icon', 'rife' ) . ' - ' . esc_html__( 'Size', 'rife' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array(
					array( 'header_tools_menu_overlay_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_menu_overlay_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Menu overlay', 'rife' ) . ' : ' . esc_html__( 'Closing icon', 'rife' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'rife' ),
					'la' => esc_html__( 'Left arrow', 'rife' ),
					'ra' => esc_html__( 'Right arrow', 'rife' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_menu_overlay_icon_type', '=', 'animated' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Menu overlay', 'rife' ),
		'id'         => 'subsection_header_menu_overlay',
		'desc'       => esc_html__( 'Enabling this will add a button that displays a full-screen menu.', 'rife' ).' '.esc_html__( 'It works only for first level links.', 'rife' ),
		'icon'       => 'fa fa-align-center',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_menu_overlay',
				'type'    => 'radio',
				'title'   => esc_html__( 'Menu overlay', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'header_menu_overlay_effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Opening effect', 'rife' ),
				'options'  => array(
					'default'     => esc_html__( 'Default', 'rife' ),
					'slide-top'   => esc_html__( 'Slide in from the top', 'rife' ),
					'slide-left'  => esc_html__( 'Slide in from the left', 'rife' ),
					'slide-right' => esc_html__( 'Slide in from the right', 'rife' ),
					'scale'       => esc_html__( 'Scale up', 'rife' ),
					'circle'      => esc_html__( 'Growing circle', 'rife' ),
				),
				'default'  => 'default',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'          => 'header_menu_overlay_on_click',
				'type'        => 'radio',
				'title'       => esc_html__( 'Close menu after click', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text align', 'rife' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#aaaaaa',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default'  => '#ffffff',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'rife' ),
				'min'      => 10,
				'step'     => 1,
				'max'      => 70,
				'unit'     => 'px',
				'default'  => 54,
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
		)
	) );

//BLOG SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Blog settings', 'rife' ),
		'desc'     => esc_html__( 'Posts list refers to Blog, Search and Archives pages', 'rife' ),
		'id'       => 'section_blog_layout',
		'icon'     => 'fa fa-pencil',
		'priority' => 9,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'rife' ),
		'id'         => 'subsection_blog_bg',
		'desc'       => esc_html__( 'This will be the default background for pages related to the blog.', 'rife' ),
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_blog',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'blog_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'blog_content_padding',
				'type'    => 'select',
				'title'   => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Top/bottom padding', 'rife' ),
				'options' => array(
					'both'   => esc_html__( 'Both on', 'rife' ),
					'top'    => esc_html__( 'Only top', 'rife' ),
					'bottom' => esc_html__( 'Only bottom', 'rife' ),
					'off'    => esc_html__( 'Both off', 'rife' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ). ' - ' .esc_html__( 'in RTL languages', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_post_look',
				'type'    => 'select',
				'title'   => esc_html__( 'Post look', 'rife' ),
				'options' => array(
					'vertical_no_padding' => esc_html__( 'Vertical no padding', 'rife' ),
					'vertical_padding'    => esc_html__( 'Vertical with padding', 'rife' ),
					'vertical_centered'   => esc_html__( 'Vertical centered', 'rife' ),
					'horizontal'          => esc_html__( 'Horizontal', 'rife' ),
				),
				'default' => 'vertical_padding',
			),
			array(
				'id'          => 'blog_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'rife' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'rife' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'rife' ),
					'fitRows' => esc_html__( 'Each row from new line', 'rife' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'blog_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'rife' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'rife' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'rife' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'rife' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 1920,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'rife' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'blog_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'rife' ),
					'auto'   => esc_html__( 'On scroll', 'rife' ),
				),
				'default'  => 'button',
				'required' => array( 'blog_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'blog_read_more',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display "Read more" link', 'rife' ),
				'description' => esc_html__( 'Should "Read more" link be displayed after excerpts on blog list/search results.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_excerpt_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type of post excerpts', 'rife' ),
				'description' => wp_kses( __(
					'In the Manual mode, excerpts are used only if you add the "Read More Tag" (&lt;!--more--&gt;).<br /> In the Automatic mode, if you will not provide the "Read More Tag" or explicit excerpt, the content of the post will be truncated automatically.<br /> This setting only concerns blog list, archive list, search results.', 'rife' ), $valid_tags ),
				'options'     => array(
					'auto'   => esc_html__( 'Automatic', 'rife' ),
					'manual' => esc_html__( 'Manual', 'rife' ),
				),
				'default'     => 'auto',
			),
			array(
				'id'          => 'blog_excerpt_length',
				'type'        => 'slider',
				'title'       => esc_html__( 'Number of words to cut post', 'rife' ),
				'description' => esc_html__( 'After this many words post will be cut in the automatic mode.', 'rife' ),
				'min'         => 3,
				'max'         => 200,
				'step'        => 1,
				'unit'        => 'words',
				'default'     => 40,
				'required'    => array( 'blog_excerpt_type', '=', 'auto' ),
			),
			array(
				'id'          => 'blog_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'rife' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of the post brick.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_videos',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display of posts video', 'rife' ),
				'description' => esc_html__( 'You can set to display videos as featured image on posts list. This can speed up loading of pages with many posts(blog, archive, search results) when the videos are used.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Date of publish or last update', 'rife' ),
				'description' => esc_html__( 'You can\'t use both dates, because the Search Engine will not know which date is correct.', 'rife' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'rife' ),
					'updated' => esc_html__( 'Updated', 'rife' ),
					'off'     => esc_html__( 'Disable', 'rife' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'blog_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Author', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Comments number', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Categories', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'blog_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'rife' ),
				'description' => esc_html__( 'Displays list of post tags under a post content.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'blog_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Custom sidebar', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_blog_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'centered',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '#ffffff',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'blog_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'rife' ). ' - ' .esc_html__( 'Filter', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_blog_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'rife' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'required' => array( 'blog_filter', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'      => 'blog_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'blog_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'rife' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single post', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_post',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'post_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'post_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'post_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'post_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'post_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ). ' - ' .esc_html__( 'in RTL languages', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'          => 'post_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'rife' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of the post.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_author_info',
				'type'        => 'radio',
				'title'       => esc_html__( 'Author info', 'rife' ),
				'description' => esc_html__( 'Will show information about author below post content.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'post_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Date of publish or last update', 'rife' ),
				'description' => esc_html__( 'You can\'t use both dates, because the Search Engine will not know which date is correct.', 'rife' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'rife' ),
					'updated' => esc_html__( 'Updated', 'rife' ),
					'off'     => esc_html__( 'Disable', 'rife' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'post_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Author', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Comments number', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'rife' ). ' : ' .esc_html__( 'Categories', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'post_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'rife' ),
				'description' => esc_html__( 'Displays list of post tags under a post content.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_navigation',
				'type'        => 'radio',
				'title'       => esc_html__( 'Posts navigation', 'rife' ),
				'description' => esc_html__( 'Links to next and prev post.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single post', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_post_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'post_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'post_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'rife' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'rife' ),
					'inside'  => esc_html__( 'Inside the content', 'rife' ),
				),
				'default'  => 'inside',
				'required' => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

//SHOP SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Shop(WooCommerce) settings', 'rife' ),
		'desc'     => '',
		'id'       => 'section_shop_general',
		'icon'     => 'fa fa-shopping-cart',
		'priority' => 12,
		'woocommerce_required' => true,//only visible with WooCommerce plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'rife' ),
		'desc'       => esc_html__( 'These options will work for all shop pages - product list, single product and other.', 'rife' ),
		'id'         => 'subsection_shop_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'shop_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Products list', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_shop',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_search',
				'type'        => 'radio',
				'title'       => esc_html__( 'Search in products instead of pages', 'rife' ),
				'description' => esc_html__( 'It will change WordPress default search function to make shop search. So when this is activated search function in header or search widget will act as WooCommerece search widget.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'shop_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'shop_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'full',
			),
			array(
				'id'      => 'shop_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'      => 'shop_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ). ' - ' .esc_html__( 'in RTL languages', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'shop_products_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Look of products on list', 'rife' ),
				'options' => array(
					'overlay' => esc_html__( 'Text as overlay', 'rife' ),
					'under'   => esc_html__( 'Text under photo', 'rife' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'shop_products_subvariant',
				'type'     => 'select',
				'title'    => esc_html__( 'Look of products on list', 'rife' ),
				'options'  => array(
					'left'   => esc_html__( 'Texts to left', 'rife' ),
					'center' => esc_html__( 'Texts to center', 'rife' ),
					'right'  => esc_html__( 'Texts to right', 'rife' ),
				),
				'default'  => 'center',
				'required' => array( 'shop_products_variant', '=', 'under' ),
			),
			array(
				'id'      => 'shop_products_second_image',
				'type'    => 'radio',
				'title'   => esc_html__( 'Show second image of product on hover', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'shop_products_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'rife' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'rife' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'rife' ),
					'fitRows' => esc_html__( 'Each row from new line', 'rife' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'shop_products_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'rife' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'rife' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => 'columns',
				'default'     => 4,
			),
			array(
				'id'      => 'shop_products_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'rife' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'products',
				'default' => 12,
			),
			array(
				'id'      => 'shop_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'rife' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 20,
			),
			array(
				'id'      => 'shop_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'rife' ),
					'auto'   => esc_html__( 'On scroll', 'rife' ),
				),
				'default'  => 'auto',
				'required' => array( 'shop_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'shop_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Custom sidebar', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Products list', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_shop_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'shop_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single product', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_product',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'product_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'product_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'product_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
			array(
				'id'      => 'product_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'      => 'product_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'rife' ). ' - ' .esc_html__( 'in RTL languages', 'rife' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'rife' ),
					'right-sidebar' => esc_html__( 'Right', 'rife' ),
					'off'           => esc_html__( 'Off', 'rife' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'          => 'product_custom_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Theme thumbnails', 'rife' ),
				'description' => esc_html__( 'If disabled it will display standard WooCommerce thumbnails.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'product_related_products',
				'type'        => 'radio',
				'title'       => esc_html__( 'Related products', 'rife' ),
				'description' => esc_html__( 'Should related products be displayed on single product page.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single product', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_product_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'product_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'product_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'rife' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'rife' ),
					'inside'  => esc_html__( 'Inside the content', 'rife' ),
				),
				'default'  => 'inside',
				'required' => array( 'product_title', '=', 'on' ),
			),
			array(
				'id'       => 'product_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'product_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
					array( 'product_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'product_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
					array( 'product_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'product_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'product_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Other shop pages', 'rife' ),
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'rife' ),
		'id'         => 'subsection_shop_no_major_pages',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_no_major_pages_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'shop_no_major_pages_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_no_major_pages_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'rife' ),
		'title'      => esc_html__( 'Other shop pages', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'id'         => 'subsection_shop_no_major_pages_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_no_major_pages_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Pop up basket', 'rife' ),
		'desc'       => esc_html__( 'When WooCommerce is activated, button opening this basket will appear in the header. There also have to be some active widgets in "Basket sidebar" for this.', 'rife' ),
		'id'         => 'subsection_basket_sidebars',
		'icon'       => 'fa fa-shopping-basket',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'basket_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '',
			),
			array(
				'id'      => 'basket_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'          => 'basket_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'rife' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'rife' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'rife' ),
					'light-sidebar' => esc_html__( 'On light', 'rife' ),
				),
				'default'     => 'light-sidebar',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Buttons', 'rife' ),
		'desc'       => esc_html__( 'You can change here the colors of buttons used in the shop. Alternative buttons colors are used in various places in the shop.', 'rife' ),
		'id'         => 'subsection_buttons_shop',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_shop_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_alt_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_alt_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_alt_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_alt_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_shop_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'rife' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_shop_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'rife' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_shop_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'rife' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
		)
	) );

//PAGE SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Page settings', 'rife' ),
		'desc'     => '',
		'id'       => 'section_page',
		'icon'     => 'el el-file-edit',
		'priority' => 15,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single page', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_page',
		'icon'       => 'el el-file-edit',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'page_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'page_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'page_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'          => 'page_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar', 'rife' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'rife' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'rife' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'rife' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'rife' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'rife' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'rife' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'rife' ),
					'off'                   => esc_html__( 'Off', 'rife' ),
				),
				'default'     => 'off',
			),
			array(
				'id'          => 'page_sidebar_rtl',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar', 'rife' ). ' - ' .esc_html__( 'in RTL languages', 'rife' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'rife' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'rife' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'rife' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'rife' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'rife' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'rife' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'rife' ),
					'off'                   => esc_html__( 'Off', 'rife' ),
				),
				'default'     => 'off',
			),
			array(
				'id'      => 'page_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'page_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single page', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_page_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'page_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'rife' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'rife' ),
					'inside'  => esc_html__( 'Inside the content', 'rife' ),
				),
				'default'  => 'outside',
				'required' => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'page_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( '404 page template', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_404_page',
		'icon'       => 'fa fa-exclamation-triangle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_404_template_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'rife' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'rife' ),
					'custom'  => esc_html__( 'Custom', 'rife' ),
				),
				'default' => 'default',
			),
			array(
				'id'       => 'page_404_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change the background image', 'rife' ),
				'required' => array( 'page_404_template_type', '=', 'default' ),
			),
			array(
				'id'       => 'page_404_template',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Choose the page as your template', 'rife' ),
				'required' => array( 'page_404_template_type', '=', 'custom' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Maintenance mode', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_maintenance_page',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'maintenance_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'Maintenance mode', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'       => 'maintenance_mode_page',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Choose the page as your template', 'rife' ),
				'required' => array( 'maintenance_mode', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Password protected page template', 'rife' ),
		'id'         => 'subsection_password_page',
		'icon'       => 'fa fa-lock',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_password_template_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'rife' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'rife' ),
					'custom'  => esc_html__( 'Custom', 'rife' ),
				),
				'default' => 'default',
			),
			array(
				'id'       => 'page_password_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change the background image', 'rife' ),
				'required' => array( 'page_password_template_type', '=', 'default' ),
			),
			array(
				'id'       => 'page_password_template',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Choose the page as your template', 'rife' ),
				'required' => array( 'page_password_template_type', '=', 'custom' ),
			),
		)
	) );

//WORKS SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Works settings', 'rife' ),
		'desc'     => '',
		'id'       => 'section_works',
		'icon'     => 'fa fa-cogs',
		'priority' => 18,
		'companion_required' => true,//only visible with companion plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'rife' ),
		'desc'       => esc_html__( 'These will work for Works list and single work.', 'rife' ),
		'id'         => 'subsection_works_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'works_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'works_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'works_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_works_list',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'works_list_page',
				'type'        => 'dropdown-pages',
				'title'       => esc_html__( 'Works list', 'rife' ). ' - ' .esc_html__( 'Main page', 'rife' ),
				'description' => esc_html__( 'This page will list all your works and also give the main title for "work category" pages.', 'rife' ),
			),
			array(
				'id'          => 'works_list_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'works_list_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'works_list_work_how_to_open',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to open work', 'rife' ),
				'description' => esc_html__( '"In lightbox" will load work content dynamically with JavaScript. Cause of that use JavaScripts plugins is very limited in such works. If you need page builder elements, then use normal mode.', 'rife' ),
				'options'     => array(
					'normal'      => esc_html__( 'Normal', 'rife' ),
					'in-lightbox' => esc_html__( 'In lightbox', 'rife' ),
				),
				'default'     => 'normal',
			),
			array(
				'id'       => 'works_list_protected_titles',
				'type'     => 'radio',
				'title'    => esc_html__( 'Hide titles of password protected items', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'works_list_work_look',
				'type'    => 'radio',
				'title'   => esc_html__( 'Work look', 'rife' ),
				'options' => array(
					'overlay' => esc_html__( 'Title over photo', 'rife' ),
					'under'   => esc_html__( 'Title under photo', 'rife' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'works_list_work_overlay_title_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Texts position', 'rife' ),
				'options'  => array(
					'top_left'      => esc_html__( 'Top left', 'rife' ),
					'top_center'    => esc_html__( 'Top center', 'rife' ),
					'top_right'     => esc_html__( 'Top right', 'rife' ),
					'mid_left'      => esc_html__( 'Middle left', 'rife' ),
					'mid_center'    => esc_html__( 'Middle center', 'rife' ),
					'mid_right'     => esc_html__( 'Middle right', 'rife' ),
					'bottom_left'   => esc_html__( 'Bottom left', 'rife' ),
					'bottom_center' => esc_html__( 'Bottom center', 'rife' ),
					'bottom_right'  => esc_html__( 'Bottom right', 'rife' ),
				),
				'default'  => 'top_left',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_cover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_cover_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'works_list_work_overlay_gradient',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'works_list_work_overlay_gradient_hover',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_texts',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_texts_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_under_title_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Texts position', 'rife' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required' => array( 'works_list_work_look', '=', 'under' ),
			),
			array(
				'id'          => 'works_list_bricks_hover',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'rife' ),
				'options'     => $bricks_hover,
				'default'     => 'cross',
			),
			array(
				'id'      => 'works_list_items_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'rife' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'works',
				'default' => 12,
			),
			array(
				'id'          => 'works_list_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'rife' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'rife' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'rife' ),
					'fitRows' => esc_html__( 'Each row from new line', 'rife' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'works_list_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'rife' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'rife' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 3,
				'unit'        => 'columns',
			),
			array(
				'id'          => 'works_list_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'rife' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'rife' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2000,
			),
			array(
				'id'      => 'works_list_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'rife' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'works_list_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose the proportions of the bricks', 'rife' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'rife' ),
					'1/1'  => esc_html__( '1:1', 'rife' ),
					'2/3'  => esc_html__( '2:3', 'rife' ),
					'3/2'  => esc_html__( '3:2', 'rife' ),
					'3/4'  => esc_html__( '3:4', 'rife' ),
					'4/3'  => esc_html__( '4:3', 'rife' ),
					'9/16' => esc_html__( '9:16', 'rife' ),
					'16/9' => esc_html__( '16:9', 'rife' ),
				),
				'default' => '0',
			),
			array(
				'id'      => 'works_list_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'rife' ),
					'auto'   => esc_html__( 'On scroll', 'rife' ),
				),
				'default'  => 'button',
				'required' => array( 'works_list_lazy_load', '=', 'on' ),
			),
			array(
				'id'      => 'works_list_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Work info', 'rife' ). ' : ' .esc_html__( 'Categories', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'works_list_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Custom sidebar', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_works_list_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_list_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'works_list_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'works_list_title', '=', 'on' ),
					array( 'works_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'works_list_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'works_list_title', '=', 'on' ),
					array( 'works_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'works_list_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'works_list_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'rife' ). ' - ' .esc_html__( 'Filter', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_works_list_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_list_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'rife' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'required' => array( 'works_list_filter', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'      => 'works_list_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'works_list_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'rife' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_single_work',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'work_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'work_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'work_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'work_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'rife' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'work_content_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Categories in content', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'work_navigation',
				'type'    => 'radio',
				'title'   => esc_html__( 'Works navigation', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'work_navigate_by_categories',
				'type'        => 'radio',
				'title'       => esc_html__( 'Navigate by categories', 'rife' ),
				'description' => esc_html__( 'If enabled, navigation leads to the next/previous item in the same category. If disabled, it will navigate through items according to the order of the "publication date".', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'work_navigation', '=', 'on' ),
			),
			array(
				'id'          => 'work_similar_works',
				'type'        => 'radio',
				'title'       => esc_html__( 'Similar works', 'rife' ),
				'description' => esc_html__( 'Will display list(up to 3 items) of similar works at bottom of work content.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'work_bricks_thumb_video',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display thumbnails instead of video', 'rife' ),
				'description' => esc_html__( 'If enabled, the video will be displayed in the lightbox.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_single_work_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'work_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'work_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'rife' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'rife' ),
//				'inside'  => esc_html__( 'Inside the content', 'rife' ), //for future if inside title will be also needed
				),
				'default'  => 'outside',
				'required' => array( 'work_title', '=', 'it_is_hidden' ),
				//way to make it hidden, but still have value, as we don't have "hidden" type of field
			),
			array(
				'id'       => 'work_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'          => 'work_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'work_title', '=', 'on' ),
					array( 'work_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'work_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'work_title', '=', 'on' ),
					array( 'work_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'work_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'          => 'work_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'work_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'rife' ). ' - ' .esc_html__( 'Slider', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_single_work_slider',
		'icon'       => 'fa fa-exchange',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'work_slider_autoplay',
				'type'        => 'radio',
				'title'       => esc_html__( 'Autoplay', 'rife' ),
				'description' => esc_html__( 'If autoplay is on, slider will run on page load.', 'rife' ). ' ' . esc_html__( 'Can be overridden in each work.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'work_slider_slide_interval',
				'type'        => 'slider',
				'title'       => esc_html__( 'Time between slides', 'rife' ),
				'description' => esc_html__( 'Global for all works.', 'rife' ),
				'min'         => 0,
				'max'         => 15000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 7000,
			),
			array(
				'id'          => 'work_slider_transition_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Transition', 'rife' ). ' : ' .esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'Animation between slides.', 'rife' ),
				'options'     => array(
					'0' => esc_html__( 'None', 'rife' ),
					'1' => esc_html__( 'Fade', 'rife' ),
					'2' => esc_html__( 'Carousel', 'rife' ),
					'3' => esc_html__( 'Zooming', 'rife' ),
				),
				'default'     => '2',
			),
			array(
				'id'          => 'work_slider_transition_time',
				'type'        => 'slider',
				'title'       => esc_html__( 'Transition', 'rife' ). ' : ' .esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'Speed of transition.', 'rife' ) . ' ' . esc_html__( 'Global for all works.', 'rife' ),
				'min'         => 0,
				'step'        => 1,
				'max'         => 10000,
				'unit'        => 'ms',
				'default'     => 600,
			),
			array(
				'id'          => 'work_slider_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Thumbnails', 'rife' ),
				'description' => esc_html__( 'Global for all works.', 'rife' ) . ' ' . esc_html__( 'Can be overridden in each work.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

//ALBUMS SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Albums settings', 'rife' ),
		'desc'     => '',
		'id'       => 'section_albums',
		'icon'     => 'fa fa-picture-o',
		'priority' => 21,
		'companion_required' => true,//only visible with companion plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'rife' ),
		'desc'       => esc_html__( 'These will work for Albums list and single album.', 'rife' ),
		'id'         => 'subsection_albums_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'albums_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'albums_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'albums_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'albums_list_page',
				'type'        => 'dropdown-pages',
				'title'       => esc_html__( 'Albums list', 'rife' ). ' - ' .esc_html__( 'Main page', 'rife' ),
				'description' => esc_html__( 'This page will list all your albums and also give the main title for "album category" pages.', 'rife' ),
			),
			array(
				'id'          => 'albums_list_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'albums_list_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'albums_list_protected_titles',
				'type'     => 'radio',
				'title'    => esc_html__( 'Hide titles of password protected items', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'albums_list_album_look',
				'type'    => 'radio',
				'title'   => esc_html__( 'Album look', 'rife' ),
				'options' => array(
					'overlay' => esc_html__( 'Title over photo', 'rife' ),
					'under'   => esc_html__( 'Title under photo', 'rife' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'albums_list_album_overlay_title_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Texts position', 'rife' ),
				'options'  => array(
					'top_left'      => esc_html__( 'Top left', 'rife' ),
					'top_center'    => esc_html__( 'Top center', 'rife' ),
					'top_right'     => esc_html__( 'Top right', 'rife' ),
					'mid_left'      => esc_html__( 'Middle left', 'rife' ),
					'mid_center'    => esc_html__( 'Middle center', 'rife' ),
					'mid_right'     => esc_html__( 'Middle right', 'rife' ),
					'bottom_left'   => esc_html__( 'Bottom left', 'rife' ),
					'bottom_center' => esc_html__( 'Bottom center', 'rife' ),
					'bottom_right'  => esc_html__( 'Bottom right', 'rife' ),
				),
				'default'  => 'top_left',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_cover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_cover_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'albums_list_album_overlay_gradient',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'albums_list_album_overlay_gradient_hover',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_texts',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_texts_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_under_title_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Texts position', 'rife' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required' => array( 'albums_list_album_look', '=', 'under' ),
			),
			array(
				'id'          => 'albums_list_bricks_hover',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'rife' ),
				'options'     => $bricks_hover,
				'default'     => 'cross',
			),
			array(
				'id'      => 'albums_list_items_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'rife' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'default' => 12,
				'unit'    => 'albums',
			),
			array(
				'id'          => 'albums_list_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'rife' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'rife' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'rife' ),
					'fitRows' => esc_html__( 'Each row from new line', 'rife' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'albums_list_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'rife' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'rife' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 3,
				'unit'        => 'columns',
			),
			array(
				'id'          => 'albums_list_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'rife' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'rife' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2000,
			),
			array(
				'id'      => 'albums_list_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'rife' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'albums_list_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose the proportions of the bricks', 'rife' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'rife' ),
					'1/1'  => esc_html__( '1:1', 'rife' ),
					'2/3'  => esc_html__( '2:3', 'rife' ),
					'3/2'  => esc_html__( '3:2', 'rife' ),
					'3/4'  => esc_html__( '3:4', 'rife' ),
					'4/3'  => esc_html__( '4:3', 'rife' ),
					'9/16' => esc_html__( '9:16', 'rife' ),
					'16/9' => esc_html__( '16:9', 'rife' ),
				),
				'default' => '0',
			),
			array(
				'id'      => 'albums_list_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'rife' ),
					'auto'   => esc_html__( 'On scroll', 'rife' ),
				),
				'default'  => 'button',
				'required' => array( 'albums_list_lazy_load', '=', 'on' ),
			),
			array(
				'id'      => 'albums_list_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Album meta: Categories', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'albums_list_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'rife' ). ' : ' .esc_html__( 'Custom sidebar', 'rife' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'rife' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_list_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'albums_list_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'albums_list_title', '=', 'on' ),
					array( 'albums_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'albums_list_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'albums_list_title', '=', 'on' ),
					array( 'albums_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'albums_list_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'albums_list_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'rife' ). ' - ' .esc_html__( 'Filter', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_list_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'rife' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'      => 'albums_list_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'albums_list_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'rife' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'rife' ). ' - ' .esc_html__( 'Title bar', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_single_album_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'rife' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'album_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'rife' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'rife' ),
					'centered' => esc_html__( 'Centered', 'rife' ),
				),
				'default'  => 'classic',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'rife' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'rife' ),
					'boxed' => esc_html__( 'Boxed', 'rife' ),
				),
				'default'  => 'full',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'rife' ),
				'default'  => '',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'rife' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'rife' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'          => 'album_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'album_title', '=', 'on' ),
					array( 'album_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'album_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'album_title', '=', 'on' ),
					array( 'album_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'album_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'rife' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'rife' ),
				'default'     => '',
				'required'    => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'          => 'album_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'rife' ),
				'default'     => '',
				'required'    => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'rife' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'album_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_single_album',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'album_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => array(
					'content' => esc_html__( 'Yes, hide the content', 'rife' ),
					'off'     => esc_html__( 'Turn it off', 'rife' ),
				),
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'album_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'rife' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'rife' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'album_slider_scroller_content',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display text content in slider or scroller albums', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'       => 'album_content_title',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title in content', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'       => 'album_content_categories',
				'type'     => 'radio',
				'title'    => esc_html__( 'Categories in content', 'rife' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'album_navigation',
				'type'    => 'select',
				'title'   => esc_html__( 'Albums navigation', 'rife' ),
				'options'     => array(
					'on'          => esc_html__( 'Displayed in text content', 'rife' ),
					'after_title' => esc_html__( 'At the top of an album', 'rife' ),
					'after_album' => esc_html__( 'At the end of an album', 'rife' ),
					'off'         => esc_html__( 'Do not display it', 'rife' ),
				),
				'default' => 'on',
			),
			array(
				'id'          => 'album_navigate_by_categories',
				'type'        => 'radio',
				'title'       => esc_html__( 'Navigate by categories', 'rife' ),
				'description' => esc_html__( 'If enabled, navigation leads to the next/previous item in the same category. If disabled, it will navigate through items according to the order of the "publication date".', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'album_navigation', '!=', 'off' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'rife' ). ' - ' .esc_html__( 'Bricks', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_album_bricks',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'          => 'album_content',
				'type'        => 'select',
				'title'       => esc_html__( 'Content column', 'rife' ),
				'description' => esc_html__( 'This will display separate block with title and text about the album.', 'rife' ),
				'options'     => array(
					'left'  => esc_html__( 'Show on the left', 'rife' ),
					'right' => esc_html__( 'Show on the right', 'rife' ),
					'off'   => esc_html__( 'Do not display it', 'rife' ),
				),
				'default'     => 'right',
			),
			array(
				'id'          => 'album_bricks_thumb_video',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display thumbnails instead of video', 'rife' ),
				'description' => esc_html__( 'If enabled, the video will be displayed in the lightbox.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'rife' ). ' - ' .esc_html__( 'Bricks filter', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_album_bricks_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_bricks_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'album_bricks_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'rife' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'rife' ),
				'default'  => '',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ). ' - ' .esc_html__( 'on hover/active', 'rife' ),
				'default'  => '#000000',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'      => 'album_bricks_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'rife' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'album_bricks_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'rife' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'rife' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'rife' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Photo Proofing', 'rife' ),
		'id'         => 'subsection_albums_proofing',
		'icon'       => 'fa fa-check',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'proofing_send_email',
				'type'        => 'radio',
				'title'       => esc_html__( 'Send an e-mail after accepting the album', 'rife' ),
				'description' => esc_html__( 'Sends an email after your client has marked the album as completed in the photo proofing process.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'proofing_email',
				'type'        => 'text',
				'title'       => esc_html__( 'Where to send?', 'rife' ),
				'description' => esc_html__( 'If the field is left blank, it will use the administrator\'s email address.', 'rife' ),
				'default'     => '',
				'required'    => array( 'proofing_send_email', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'rife' ). ' - ' .esc_html__( 'Slider', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_album_slider',
		'icon'       => 'fa fa-exchange',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'album_slider_autoplay',
				'type'        => 'radio',
				'title'       => esc_html__( 'Autoplay', 'rife' ),
				'description' => esc_html__( 'If autoplay is on, slider will run on page load.', 'rife' ). ' ' . esc_html__( 'Can be overridden in each album.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'album_slider_slide_interval',
				'type'        => 'slider',
				'title'       => esc_html__( 'Time between slides', 'rife' ),
				'description' => esc_html__( 'Global for all albums.', 'rife' ),
				'min'         => 0,
				'max'         => 15000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 7000,
			),
			array(
				'id'          => 'album_slider_transition_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Transition', 'rife' ). ' : ' .esc_html__( 'Type', 'rife' ),
				'description' => esc_html__( 'Animation between slides.', 'rife' ),
				'options'     => array(
					'0' => esc_html__( 'None', 'rife' ),
					'1' => esc_html__( 'Fade', 'rife' ),
					'2' => esc_html__( 'Carousel', 'rife' ),
					'3' => esc_html__( 'Zooming', 'rife' ),
				),
				'default'     => '2',
			),
			array(
				'id'          => 'album_slider_transition_time',
				'type'        => 'slider',
				'title'       => esc_html__( 'Transition', 'rife' ). ' : ' .esc_html__( 'Speed', 'rife' ),
				'description' => esc_html__( 'Speed of transition.', 'rife' ) . ' ' . esc_html__( 'Global for all albums.', 'rife' ),
				'min'         => 0,
				'max'         => 10000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 600,
			),
			array(
				'id'          => 'album_slider_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Thumbnails', 'rife' ),
				'description' => esc_html__( 'Can be overridden in each album.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'rife' ). ' - ' .esc_html__( 'Social icons', 'rife' ),
		'desc'       => esc_html__( 'If you are using AddToAny plugin for sharing, then you should check these options.', 'rife' ),
		'id'         => 'subsection_album_socials',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_social_icons',
				'type'    => 'radio',
				'title'   => esc_html__( 'Use social icons in albums', 'rife' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'album_share_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Share a link to the album or to the attachment page', 'rife' ),
				'description' => esc_html__( 'When using the share plugin choose one way of sharing. More details in the documentation.', 'rife' ),
				'options'     => array(
					'album'           => esc_html__( 'Album', 'rife' ),
					'attachment_page' => esc_html__( 'Attachment page', 'rife' ),
				),
				'default'     => 'album',
				'required'    => array( 'album_social_icons', '=', 'on' ),
			),
		)
	) );

//MISCELLANEOUS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Miscellaneous', 'rife' ),
		'desc'     => '',
		'id'       => 'section_miscellaneous',
		'icon'     => 'fa fa-question',
		'priority' => 24,
		'fields'   => array(),
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Anchors', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_anchors',
		'icon'       => 'fa fa-external-link',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'anchors_in_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display anchors in address bar', 'rife' ),
				/* translators: %1$s: Link example, %2$s: Link example */
				'description' => sprintf( esc_html__( 'If disabled it will not show anchors, in the address bar of your browser, when they are clicked or entered. So address like %1$s will be displayed as %2$s.', 'rife' ), '<code>https://apollo13themes.com/rife/#downloads</code>', '<code>https://apollo13themes.com/rife/</code>' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'scroll_to_anchor',
				'type'        => 'radio',
				'title'       => esc_html__( 'Scroll to anchor handling', 'rife' ),
				'description' => esc_html__( 'If enabled it will scroll to anchor after it is clicked on the same page. It can, however, conflict with plugins that uses the same mechanism, and the page can scroll in a weird way. In such case disable this feature.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Writing effect', 'rife' ),
		'desc'       => '',
		'id'         => 'subsection_writing_effect',
		'icon'       => 'fa fa-pencil',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'writing_effect_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Writing effect', 'rife' ). ' - ' .esc_html__( 'on mobiles', 'rife' ),
				'description' => esc_html__( 'If disabled it will show all written lines as separate paragraphs on small devices(less than 600 pixels wide). It is good to disable it to save CPU of your user devices, and to remove "jumping screen" effect on smaller screens.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'writing_effect_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Writing effect', 'rife' ). ' : ' .esc_html__( 'Text write speed', 'rife' ),
				'description' => esc_html__( 'How many ms should pass between printing each character. Bigger value is slower writing.', 'rife' ),
				'default'     => 10,
				'min'         => 10,
				'max'         => 1000,
				'step'        => 1,
				'unit'        => 'ms',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Optimization', 'rife' ),
		'id'         => 'subsection_optimization',
		'icon'       => 'fa fa-pencil',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'use_webfontloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use the web-font loading script', 'rife' ),
				'description' => esc_html__( 'Once enabled, web-fonts will be loaded using the "Web Font Loader" script. If you want to use the plugin to combine web-fonts added by plugins and the theme, you should disable this.', 'rife' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	/*
 * <--- END SECTIONS
 */

	do_action( 'apollo13framework_additional_theme_options' );
}

apollo13framework_setup_theme_options();