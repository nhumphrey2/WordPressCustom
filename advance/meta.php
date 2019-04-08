<?php

function apollo13framework_meta_boxes_post() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'rife' ),
			'off' => __( 'Off', 'rife' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Posts list
		 *
		 */
		'posts_list' => array(
			array(
				'name' => __('Posts list', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'rife' ),
				'description' => __( 'What should be the width of this post on the Posts list?', 'rife' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
		),


		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'rife' ),
				'description' => __( 'Choose between image, video and images slider. For the image use the Featured Image option. For the <strong>Images slider</strong> you need plugin the <a href="https://wordpress.org/plugins/featured-galleries/" target="_blank">Featured galleries</a>.', 'rife' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'rife' ),
					'post_slider' => __( 'Images slider', 'rife' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured Image ', 'rife' ). ' : ' . __( 'Parallax', 'rife' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Area height', 'rife' ),
				'description' => __( 'This limits the height of the image so that the parallax can work.', 'rife' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'rife' ),
					'content' => __( 'Yes, hide the content', 'rife' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'rife' ),
					'off'     => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'rife' ),
					'normal' => __( 'Normal', 'rife' ),
					'light'  => __( 'Light', 'rife' ),
					'dark'   => __( 'Dark', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'rife' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'rife' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'rife' ),
				'description' => __( 'You can use global settings or override them here', 'rife' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'rife' ),
					'custom' => __( 'Use custom settings', 'rife' ),
					'off'    => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Position', 'rife' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before the content', 'rife' ),
					'inside'  => __( 'Inside the content', 'rife' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'rife' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'rife' ),
					'centered' => __( 'Centered', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'rife' ),
					'boxed' => __( 'Boxed', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'rife' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'rife' ),
					'contain'  => __( 'Contain', 'rife' ),
					'fitV'     => __( 'Fit Vertically', 'rife' ),
					'fitH'     => __( 'Fit Horizontally', 'rife' ),
					'center'   => __( 'Just center', 'rife' ),
					'repeat'   => __( 'Repeat', 'rife' ),
					'repeat-x' => __( 'Repeat X', 'rife' ),
					'repeat-y' => __( 'Repeat Y', 'rife' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ). ' : ' . __( 'Type', 'rife' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'rife' ),
					"bt"   => __( 'bottom to top', 'rife' ),
					"lr"   => __( 'left to right', 'rife' ),
					"rl"   => __( 'right to left', 'rife' ),
					"tlbr" => __( 'top-left to bottom-right', 'rife' ),
					"trbl" => __( 'top-right to bottom-left', 'rife' ),
					"bltr" => __( 'bottom-left to top-right', 'rife' ),
					"brtl" => __( 'bottom-right to top-left', 'rife' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ). ' : ' . __( 'Speed', 'rife' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'description' => __( 'Will be placed above the image(if used)', 'rife' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => __( 'Used in breadcrumbs.', 'rife' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'rife' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o',
				'companion_required' => true
			),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_post', $meta );
}



function apollo13framework_meta_boxes_page() {
	$user_sidebars = apollo13framework_meta_get_user_sidebars();
	$sidebars = array_merge(
		array(
			'default' => __( 'Default for pages', 'rife' ),
		),
		$user_sidebars
	);
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'rife' ),
			'off' => __( 'Off', 'rife' ),
		),
		$user_sidebars
	);

	$meta = array(
		/*
		 *
		 * Tab: Layout &amp; Sidebar
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout &amp; Sidebar', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'rife' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'page_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'rife' ),
					'center'        => __( 'Center fixed width', 'rife' ),
					'left'          => __( 'Left fixed width', 'rife' ),
					'left_padding'  => __( 'Left fixed width + padding', 'rife' ),
					'right'         => __( 'Right fixed width', 'rife' ),
					'right_padding' => __( 'Right fixed width + padding', 'rife' ),
					'full_fixed'    => __( 'Full width + fixed content', 'rife' ),
					'full_padding'  => __( 'Full width + padding', 'rife' ),
					'full'          => __( 'Full width', 'rife' ),
				),
			),
			array(
				'name'        => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Top/bottom padding', 'rife' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'rife' ),
					'top'    => __( 'Only top', 'rife' ),
					'bottom' => __( 'Only bottom', 'rife' ),
					'off'    => __( 'Both off', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Content', 'rife' ). ' : ' .esc_html__( 'Left/right padding', 'rife' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'rife' ),
					'off'    => __( 'Both off', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Sidebar', 'rife' ),
				'id'            => 'widget_area',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_sidebar',
				'options'       => array(
					'G'                     => __( 'Global settings', 'rife' ),
					'left-sidebar'          => __( 'Sidebar on the left', 'rife' ),
					'left-sidebar_and_nav'  => __( 'Children Navigation', 'rife' ) . ' + ' . __( 'Sidebar on the left', 'rife' ),
					/* translators: %s: Children Navigation */
					'left-nav'             => sprintf( __( 'Only %s on the left', 'rife' ), __( 'Children Navigation', 'rife' ) ),
					'right-sidebar'         => __( 'Sidebar on the right', 'rife' ),
					'right-sidebar_and_nav' => __( 'Children Navigation', 'rife' ) . ' + ' . __( 'Sidebar on the right', 'rife' ),
					/* translators: %s: Children Navigation */
					'right-nav'             => sprintf( __( 'Only %s on the right', 'rife' ), __( 'Children Navigation', 'rife' ) ),
					'off'                   => __( 'Off', 'rife' ),
				),
				'type'          => 'select',
			),
			array(
				'name'     => __( 'Sidebar to show', 'rife' ),
				'id'       => 'sidebar_to_show',
				'default'  => 'default',
				'options'  => $sidebars,
				'type'     => 'select',
				'required' => array( 'widget_area', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'rife' ),
					'content' => __( 'Yes, hide the content', 'rife' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'rife' ),
					'off'     => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'rife' ),
					'normal' => __( 'Normal', 'rife' ),
					'light'  => __( 'Light', 'rife' ),
					'dark'   => __( 'Dark', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Show header from the Nth row', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ). '<br />' . __( 'If you use Elementor or WPBakery Page Builder, then you can decide to show header after the content is scrolled to Nth row. Thanks to that you can have a clean welcome screen.', 'rife' ),
				'id'            => 'horizontal_header_show_header_at',
				'default'       => '0',
				'type'          => 'select',
				'options'       => array(
					'0' => __( 'Show always', 'rife' ),
					'1' => __( 'from 1st row', 'rife' ),
					'2' => __( 'from 2nd row', 'rife' ),
					'3' => __( 'from 3rd row', 'rife' ),
					'4' => __( 'from 4th row', 'rife' ),
					'5' => __( 'from 5th row', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'rife' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'rife' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'rife' ),
				'description' => __( 'You can use global settings or override them here', 'rife' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'rife' ),
					'custom' => __( 'Use custom settings', 'rife' ),
					'off'    => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Position', 'rife' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before the content', 'rife' ),
					'inside'  => __( 'Inside the content', 'rife' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'rife' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'rife' ),
					'centered' => __( 'Centered', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'rife' ),
					'boxed' => __( 'Boxed', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'rife' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'rife' ),
					'contain'  => __( 'Contain', 'rife' ),
					'fitV'     => __( 'Fit Vertically', 'rife' ),
					'fitH'     => __( 'Fit Horizontally', 'rife' ),
					'center'   => __( 'Just center', 'rife' ),
					'repeat'   => __( 'Repeat', 'rife' ),
					'repeat-x' => __( 'Repeat X', 'rife' ),
					'repeat-y' => __( 'Repeat Y', 'rife' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ). ' : ' . __( 'Type', 'rife' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'rife' ),
					"bt"   => __( 'bottom to top', 'rife' ),
					"lr"   => __( 'left to right', 'rife' ),
					"rl"   => __( 'right to left', 'rife' ),
					"tlbr" => __( 'top-left to bottom-right', 'rife' ),
					"trbl" => __( 'top-right to bottom-left', 'rife' ),
					"bltr" => __( 'bottom-left to top-right', 'rife' ),
					"brtl" => __( 'bottom-right to top-left', 'rife' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ). ' : ' . __( 'Speed', 'rife' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'description' => __( 'Will be placed above the image(if used)', 'rife' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => __( 'Used in breadcrumbs.', 'rife' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'rife' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'rife' ),
				'description' => __( 'Choose between image, video and images slider. For the image use the Featured Image option. For the <strong>Images slider</strong> you need plugin the <a href="https://wordpress.org/plugins/featured-galleries/" target="_blank">Featured galleries</a>.', 'rife' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'rife' ),
					'post_slider' => __( 'Images slider', 'rife' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured Image ', 'rife' ). ' : ' . __( 'Parallax', 'rife' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => esc_html__( 'Parallax', 'rife' ). ' : ' . esc_html__( 'Area height', 'rife' ),
				'description' => __( 'This limits the height of the image so that the parallax can work.', 'rife' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o',
				'companion_required' => true
			),
		),

		/*
		 *
		 * Tab: Sticky one page mode
		 *
		 */
		'sticky_one_page' => array(
			array(
				'name' => __('Sticky One Page mode', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-anchor'
			),
			array(
				'name'        => __( 'Sticky One Page mode', 'rife' ),
				'description' => __( 'This works only when page is designed with WPBakery Page Builder. With this option enabled, the page will turn into a vertical slider to the full height of the browser window, and each row created in the WPBakery Page Builder is a single slide.', 'rife' ),
				'id'          => 'content_sticky_one_page',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
			),
			array(
				'name'     => __( 'Color of navigation bullets', 'rife' ),
				'id'       => 'content_sticky_one_page_bullet_color',
				'default'  => 'rgba(0,0,0,1)',
				'type'     => 'color',
				'required' => array(
					array( 'content_sticky_one_page', '=', 'on' )
				)
			),
			array(
			'name'        => __( 'Default bullets icon', 'rife' ),
			'id'          => 'content_sticky_one_page_bullet_icon',
			'default'     => '',
			'type'        => 'text',
			'input_class' => 'a13-fa-icon a13-full-class',
			'required'    => array(
				array( 'content_sticky_one_page', '=', 'on' )
			)
		),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_page', $meta );
}



function apollo13framework_meta_boxes_album() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'rife' ),
			'off' => __( 'Off', 'rife' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Albums list
		 *
		 */
		'albums_list' => array(
			array(
				'name' => __('Albums list', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),

			array(
				'name'        => __( 'Size of brick', 'rife' ),
				'description' => __( 'What should be the width of this album on the Albums list?', 'rife' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'id'          => 'cover_color',
				'description' => __( 'Works only when titles are displayed over images in the Albums list.', 'rife' ),
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color'
			),
			array(
				'name'        => __( 'Exclude from the Albums list page', 'rife' ),
				'description' => __( 'If enabled, then this Album will not be listed on the Albums list page, but you can still select it for the front page or in other places.', 'rife' ),
				'id'          => 'exclude_in_albums_list',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
			),
		),

		/*
		 *
		 * Tab: Album media
		 *
		 */
		'album_media' => array(
			array(
				'name' => __('Album media', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-th',
			),
			array(
				'name'        => __( 'Items order', 'rife' ),
				'description' => __( 'It will display your images/videos from the first to the last or in a different way.', 'rife' ),
				'id'          => 'order',
				'default'     => 'ASC',
				'options'     => array(
					'ASC'    => __( 'First on the list, first displayed', 'rife' ),
					'DESC'   => __( 'First on the list, last displayed', 'rife' ),
					'random' => __( 'Random', 'rife' ),
				),
				'type'        => 'select',
			),
			array(
				'name'        => __( 'Show title and description of album items', 'rife' ),
				'description' => __( 'If enabled, then it will affect displaying in bricks and slider option, and also in lightbox.', 'rife' ),
				'id'          => 'enable_desc',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
			),
			array(
				'name'    => __( 'Show media in', 'rife' ),
				'description'   => __( 'Slider and Bricks work for both images and videos.', 'rife' ) .' '. __( 'Scrollers only work with images.', 'rife' ),
				'id'      => 'theme',
				'default' => 'bricks',
				'options' => array(
					'bricks' => __( 'Bricks', 'rife' ),
					'slider' => __( 'Slider', 'rife' ),
					'scroller' => __( 'Scroller', 'rife' ),
					'scroller-parallax' => __( 'Scroller with parallax', 'rife' ),
				),
				'type'    => 'radio',
			),
			array(
				'name'          => __( 'Content column', 'rife' ),
				'description'   => __( 'This will display separate block with title and text about the album.', 'rife' ),
				'id'            => 'album_content',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_content',
				'options'       => array(
					'G'     => __( 'Global settings', 'rife' ),
					'left'  => __( 'Show on the left', 'rife' ),
					'right' => __( 'Show on the right', 'rife' ),
					'off'   => __( 'Do not display it', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Bricks columns', 'rife' ),
				'id'          => 'brick_columns',
				'default'     => '3',
				'unit'        => '',
				'min'         => 1,
				'max'         => 6,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'The maximum width of the brick layout', 'rife' ),
				'description' => __( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'rife' ),
				'id'          => 'bricks_max_width',
				'default'     => '1920px',
				'unit'        => 'px',
				'min'         => 200,
				'max'         => 2500,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Brick margin', 'rife' ),
				'id'       => 'brick_margin',
				'default'  => '10px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Choose the proportions of the bricks', 'rife' ),
				'description' => __( 'It works only for images. If you change the theme option, which is called "Display thumbnails instead of video", then for videos that have set a featured image, it will also work.', 'rife' ),
				'id'       => 'bricks_proportions_size',
				'default'  => '0',
				'options' => array(
					'0'    => __( 'Original size', 'rife' ),
					'1/1'  => __( '1:1', 'rife' ),
					'2/3'  => __( '2:3', 'rife' ),
					'3/2'  => __( '3:2', 'rife' ),
					'3/4'  => __( '3:4', 'rife' ),
					'4/3'  => __( '4:3', 'rife' ),
					'9/16' => __( '9:16', 'rife' ),
					'16/9' => __( '16:9', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_lightbox',
				'type'     => 'radio',
				'name'     => __( 'Open bricks to lightbox', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'description' => __( 'Leave empty to not set any background', 'rife' ),
				'id'          => 'slide_cover_color',
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Hover effect', 'rife' ),
				'id'       => 'bricks_hover',
				'default'  => 'cross',
				'options'  => array(
					'cross'  => __( 'Show cross', 'rife' ),
					'drop'   => __( 'Drop', 'rife' ),
					'shift'  => __( 'Shift', 'rife' ),
					'pop'    => __( 'Pop', 'rife' ),
					'border' => __( 'Border', 'rife' ),
					'none'   => __( 'None', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_title_position',
				'type'     => 'select',
				'name'     => __( 'Texts position', 'rife' ),
				'options'  => array(
					'top_left'      => __( 'Top left', 'rife' ),
					'top_center'    => __( 'Top center', 'rife' ),
					'top_right'     => __( 'Top right', 'rife' ),
					'mid_left'      => __( 'Middle left', 'rife' ),
					'mid_center'    => __( 'Middle center', 'rife' ),
					'mid_right'     => __( 'Middle right', 'rife' ),
					'bottom_left'   => __( 'Bottom left', 'rife' ),
					'bottom_center' => __( 'Bottom center', 'rife' ),
					'bottom_right'  => __( 'Bottom right', 'rife' ),
				),
				'default'  => 'top_left',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover_hover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'off',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'rife' ),
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'     => 'on',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient_hover',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'rife' ),
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_texts',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'id'       => 'bricks_overlay_texts_hover',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'name'        => __( 'Fit images', 'rife' ),
				'description' => __( 'How pictures will fit in the area of the slider. <strong>Fit when needed</strong> is best suited for small images that should not be stretched to larger sizes, only to smaller ones (so that they are always completely visible).', 'rife' ),
				'id'          => 'fit_variant',
				'default'     => '0',
				'options'     => array(
					'0' => __( 'Fit always', 'rife' ),
					'1' => __( 'Fit landscape', 'rife' ),
					'2' => __( 'Fit portrait', 'rife' ),
					'3' => __( 'Fit when needed', 'rife' ),
					'4' => __( 'Cover the whole screen', 'rife' ),
				),
				'type'        => 'select',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Autoplay', 'rife' ),
				'description'   => __( 'If autoplay is on, slider will run on page load.', 'rife' ),
				'id'            => 'autoplay',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_slider_autoplay',
				'options'       => array(
					'G'   => __( 'Global settings', 'rife' ),
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Transition', 'rife' ). ' : ' .esc_html__( 'Type', 'rife' ),
				'description'   => __( 'Animation between slides.', 'rife' ),
				'id'            => 'transition',
				'default'       => '-1',
				'global_value'  => '-1',
				'parent_option' => 'album_slider_transition_type',
				'options'       => array(
					'-1' => __( 'Global settings', 'rife' ),
					'0'  => __( 'None', 'rife' ),
					'1'  => __( 'Fade', 'rife' ),
					'2'  => __( 'Carousel', 'rife' ),
					'3'  => __( 'Zooming', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Zoom in %', 'rife' ),
				'description' => __( 'How big the zooming effect will be', 'rife' ),
				'id'          => 'ken_scale',
				'default'     => 120,
				'unit'        => '%',
				'min'         => 100,
				'max'         => 200,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '=', 'slider' ),
					array( 'transition', '=', '3' ),
				)
			),
			array(
				'name'        => __( 'Gradient above photos', 'rife' ),
				'description' => __( 'Good for better readability of slide titles.', 'rife' ),
				'id'          => 'gradient',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Title', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'description' => __( 'Leave empty to not set any background', 'rife' ),
				'id'          => 'slide_title_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'enable_desc', '=', 'on' ),
					array( 'theme', '=', 'slider' )
				)
			),
			array(
				'name'     => __( 'Pattern above photos', 'rife' ),
				'id'       => 'pattern',
				'default'  => '0',
				'options'  => array(
					'0' => __( 'None', 'rife' ),
					'1' => __( 'Type 1', 'rife' ),
					'2' => __( 'Type 2', 'rife' ),
					'3' => __( 'Type 3', 'rife' ),
					'4' => __( 'Type 4', 'rife' ),
					'5' => __( 'Type 5', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Thumbnails', 'rife' ),
				'id'            => 'thumbs',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_slider_thumbs',
				'options'       => array(
					'G'   => __( 'Global settings', 'rife' ),
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Thumbnails', 'rife' ). ' : ' .esc_html__( 'Open', 'rife' ),
				'description' => __( 'If thumbnails are enabled, should they be open by default?', 'rife' ),
				'id'          => 'thumbs_on_load',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			//scroller
			array(
				'name'     => __( 'Cell width', 'rife' ),
				'id'       => 'scroller_cell_width',
				'default'  => '33',
				'options'  => array(
					'20' => '20%',
					'25' => '25%',
					'33' => '33%',
					'50' => '50%',
					'66' => '66%',
					'75' => '75%',
					'90' => '90%',
				),
				'type'     => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'     => __( 'Cell width', 'rife' ). ' - ' .esc_html__( 'on mobiles', 'rife' ),
				'description' => __( 'Works on devices less than 600 pixels wide.', 'rife' ),
				'id'       => 'scroller_cell_width_mobile',
				'default'  => '75',
				'options'  => array(
					'20' => '20%',
					'25' => '25%',
					'33' => '33%',
					'50' => '50%',
					'66' => '66%',
					'75' => '75%',
					'90' => '90%',
				),
				'type'     => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Effect on inactive elements', 'rife' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'rife' ) .' '. __( 'Effects on images require high computing power, therefore they are disabled on mobile devices.', 'rife' ),
				'id'          => 'scroller_effect',
				'default'     => 'off',
				'options'     => array(
					'off'        => __( 'Disable', 'rife' ),
					'opacity'    => __( 'Opacity', 'rife' ),
					'scale-down' => __( 'Scale down', 'rife' ),
					'grayscale'  => __( 'Grayscale', 'rife' ),
					'blur'       => __( 'Blur', 'rife' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Space between cells', 'rife' ),
				'id'          => 'scroller_cell_margin',
				'default'     => '10px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 100,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Fit images', 'rife' ),
				'description' => __( 'How pictures will fit in the area of the cell.', 'rife' ),
				'id'          => 'scroller_photo_cover',
				'default'     => 'cover',
				'options'     => array(
					'cover'  => __( 'Cover', 'rife' ),
					'contain' => __( 'Contain', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        =>__( 'Fit images', 'rife' ). ' - ' .esc_html__( 'after opening', 'rife' ),
				'id'          => 'scroller_opened_photo_behavior',
				'default'     => 'cover',
				'options'     => array(
					'cover'  => __( 'Cover', 'rife' ),
					'contain' => __( 'Contain', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Loop', 'rife' ),
				'description' => __( 'Combine both ends for infinite scrolling.', 'rife' ),
				'id'          => 'scroller_wrap_around',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Contain', 'rife' ),
				'description' => __( 'Eliminate the empty space at the ends. Has no effect if "Loop" is enabled.', 'rife' ),
				'id'          => 'scroller_contain',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_wrap_around', '=', 'off' ),
				)
			),
			array(
				'name'        => __( 'Free scroll', 'rife' ),
				'id'          => 'scroller_free_scroll',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => esc_html__( 'Slides navigation', 'rife' ),
				'id'          => 'scroller_arrows',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => esc_html__( 'Points navigation', 'rife' ),
				'id'          => 'scroller_dots',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'rife' ),
				'id'          => 'scroller_autoplay',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'rife' ). ' : ' .esc_html__( 'Time between slides', 'rife' ). ' - ' .esc_html__( 'in seconds', 'rife' ),
				'id'          => 'scroller_autoplay_time',
				'default'     => 3,
				'step'        => 0.1,
				'unit'        => '',
				'min'         => 0.1,
				'max'         => 10,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_autoplay', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'rife' ). ' : ' .esc_html__( 'Pause', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'id'          => 'scroller_pause_autoplay',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_autoplay', '=', 'on' ),
				)
			),
		),



		/*
		 *
		 * Tab: Photo Proofing
		 *
		 */
		'photo_proofing' => array(
			array(
				'name' => __('Photo Proofing', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-thumb-tack',
				'notice' => __( 'This option works only if the album is displayed in bricks mode.', 'rife' )
			),
			array(
				'name'        => __( 'Photo Proofing', 'rife' ),
				'description' => __( 'Allows you to comment and select photos and videos from this album.', 'rife' ),
				'id'          => 'proofing',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Items IDs', 'rife' ),
				'id'          => 'proofing_ids',
				'description' => __( 'The IDs for YouTube and Vimeo videos can only be manually added.', 'rife' ),
				'default'     => 'auto',
				'options'     => array(
					'auto'   => __( 'Automatic', 'rife' ),
					'manual' => __( 'Manual', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array( 'proofing', '=', 'on' ),
			),
		),


		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs',
			),
			array(
				'name'          => __( 'Hide content under the header', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'album_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'rife' ),
					'content' => __( 'Yes, hide the content', 'rife' ),
					'off'     => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'album_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'rife' ),
					'normal' => __( 'Normal', 'rife' ),
					'light'  => __( 'Light', 'rife' ),
					'dark'   => __( 'Dark', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'rife' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'rife' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_album', $meta );
}



function apollo13framework_meta_boxes_images_manager() {
	return apply_filters( 'apollo13framework_meta_boxes_images_manager', array('images_manager' => array()) );
}



function apollo13framework_get_socials_array() {
	global $apollo13framework_a13;

	$tmp_arr = array();
	$socials = $apollo13framework_a13->get_social_icons_list();
	foreach ( $socials as $id => $social ) {
		array_push( $tmp_arr, array( 'name' => $social, 'id' => $id, 'type' => 'text' ) );
	}
	return $tmp_arr;
}



function apollo13framework_meta_boxes_people() {
	$meta =
		array(
			/*
			 *
			 * Tab: General
			 *
			 */
			'general' => array(
				array(
					'name' => __('General', 'rife'),
					'type' => 'fieldset',
					'tab'   => true,
					'icon'  => 'fa fa-wrench'
				),
				array(
						'name'        => __( 'Subtitle', 'rife' ),
						'description' => __( 'You can use HTML here.', 'rife' ),
						'id'          => 'subtitle',
						'default'     => '',
						'type'        => 'text'
				),
				array(
						'name'    => __( 'Testimonial', 'rife' ),
						'desc'    => '',
						'id'      => 'testimonial',
						'default' => '',
						'type'    => 'textarea'
				),
				array(
						'name'        => __( 'Overlay color', 'rife' ),
						'id'          => 'overlay_bg_color',
						'default'     => 'rgba(0,0,0,0.5)',
						'type'        => 'color'
				),
				array(
						'name'        => __( 'Overlay', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
						'id'          => 'overlay_font_color',
						'default'     => 'rgba(255,255,255,1)',
						'type'        => 'color'
				),
			),
			/*
			 *
			 * Tab: Socials
			 *
			 */
			'socials' => array_merge(
				array(
					array(
						'name' => __('Social icons', 'rife'),
						'type' => 'fieldset',
						'tab'   => true,
						'icon'  => 'fa fa-facebook-official'
					),
				),
				apollo13framework_get_socials_array()
			),
		);

	return $meta;
}



function apollo13framework_meta_boxes_work() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'rife' ),
			'off' => __( 'Off', 'rife' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Works list
		 *
		 */
		'works_list' => array(
			array(
				'name' => __('Works list', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'rife' ),
				'description' => __( 'What should be the width of this work on the Works list?', 'rife' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'id'          => 'cover_color',
				'description' => __( 'Works only when titles are displayed over images in the Works list.', 'rife' ),
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color'
			),
			array(
				'name'        => __( 'Exclude from the Works list page', 'rife' ),
				'description' => __( 'If enabled, then this Work will not be listed on the Works list page, but you can still select it for the front page or in other places.', 'rife' ),
				'id'          => 'exclude_in_works_list',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
			),
		),
		/*
		 *
		 * Tab: Work media
		 *
		 */
		'works_media' => array(
			array(
				'name' => __('Work media', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-th'
			),
			array(
				'name'        => __( 'Items order', 'rife' ),
				'description' => __( 'It will display your images/videos from the first to the last or in a different way.', 'rife' ),
				'id'          => 'order',
				'default'     => 'ASC',
				'options'     => array(
					'ASC'    => __( 'First on the list, first displayed', 'rife' ),
					'DESC'   => __( 'First on the list, last displayed', 'rife' ),
					'random' => __( 'Random', 'rife' ),
				),
				'type'        => 'select',
			),
			array(
				'name'        => __( 'Show title and description of work items', 'rife' ),
				'description' => __( 'If enabled, then it will affect displaying in bricks and slider option, and also in lightbox.', 'rife' ),
				'id'          => 'enable_desc',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
			),
			array(
				'name'    => __( 'Show media in', 'rife' ),
				'id'      => 'theme',
				'default' => 'bricks',
				'options' => array(
					'bricks' => __( 'Bricks', 'rife' ),
					'slider' => __( 'Slider', 'rife' ),
					'off' => __( 'Do not display it', 'rife' ),
				),
				'type'    => 'radio',
			),
			array(
				'name'        => __( 'Bricks columns', 'rife' ),
				'id'          => 'brick_columns',
				'default'     => '3',
				'unit'        => '',
				'min'         => 1,
				'max'         => 6,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'The maximum width of the brick layout', 'rife' ),
				'description' => __( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'rife' ),
				'id'          => 'bricks_max_width',
				'default'     => '1920px',
				'unit'        => 'px',
				'min'         => 200,
				'max'         => 2500,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Brick margin', 'rife' ),
				'id'       => 'brick_margin',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Choose the proportions of the bricks', 'rife' ),
				'description' => __( 'It works only for images. If you change the theme option, which is called "Display thumbnails instead of video", then for videos that have set a featured image, it will also work.', 'rife' ),
				'id'       => 'bricks_proportions_size',
				'default'  => '0',
				'options' => array(
					'0'    => __( 'Original size', 'rife' ),
					'1/1'  => __( '1:1', 'rife' ),
					'2/3'  => __( '2:3', 'rife' ),
					'3/2'  => __( '3:2', 'rife' ),
					'3/4'  => __( '3:4', 'rife' ),
					'4/3'  => __( '4:3', 'rife' ),
					'9/16' => __( '9:16', 'rife' ),
					'16/9' => __( '16:9', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_lightbox',
				'type'     => 'radio',
				'name'     => __( 'Open bricks to lightbox', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'description' => __( 'Leave empty to not set any background', 'rife' ),
				'id'          => 'slide_cover_color',
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Hover effect', 'rife' ),
				'id'       => 'bricks_hover',
				'default'  => 'cross',
				'options'  => array(
					'cross'  => __( 'Show cross', 'rife' ),
					'drop'   => __( 'Drop', 'rife' ),
					'shift'  => __( 'Shift', 'rife' ),
					'pop'    => __( 'Pop', 'rife' ),
					'border' => __( 'Border', 'rife' ),
					'none'   => __( 'None', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_title_position',
				'type'     => 'select',
				'name'     => __( 'Texts position', 'rife' ),
				'options'  => array(
					'top_left'      => __( 'Top left', 'rife' ),
					'top_center'    => __( 'Top center', 'rife' ),
					'top_right'     => __( 'Top right', 'rife' ),
					'mid_left'      => __( 'Middle left', 'rife' ),
					'mid_center'    => __( 'Middle center', 'rife' ),
					'mid_right'     => __( 'Middle right', 'rife' ),
					'bottom_left'   => __( 'Bottom left', 'rife' ),
					'bottom_center' => __( 'Bottom center', 'rife' ),
					'bottom_right'  => __( 'Bottom right', 'rife' ),
				),
				'default'  => 'bottom_center',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'off',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover_hover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'rife' ),
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient_hover',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'rife' ),
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_texts',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'rife' ). ' - ' .esc_html__( 'without hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'off',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'id'       => 'bricks_overlay_texts_hover',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'rife' ). ' - ' .esc_html__( 'on hover', 'rife' ),
				'options'  => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),

			array(
				'name'          => __( 'Stretch the slider to the window height', 'rife' ),
				'id'            => 'slider_window_high',
				'default'     => 'off',
				'options'       => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'          => 'radio',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Slider - width proportion', 'rife' ),
				'id'          => 'slider_width_proportion',
				'default'     => '16',
				'unit'        => '',
				'min'         => 1,
				'max'         => 20,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Slider - height proportion', 'rife' ),
				'id'          => 'slider_height_proportion',
				'default'     => '9',
				'unit'        => '',
				'min'         => 1,
				'max'         => 20,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Fit images', 'rife' ),
				'description' => __( 'How pictures will fit in the area of the slider. <strong>Fit when needed</strong> is best suited for small images that should not be stretched to larger sizes, only to smaller ones (so that they are always completely visible).', 'rife' ),
				'id'          => 'fit_variant',
				'default'     => '4',
				'options'     => array(
					'0' => __( 'Fit always', 'rife' ),
					'1' => __( 'Fit landscape', 'rife' ),
					'2' => __( 'Fit portrait', 'rife' ),
					'3' => __( 'Fit when needed', 'rife' ),
					'4' => __( 'Cover the whole screen', 'rife' ),
				),
				'type'        => 'select',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Autoplay', 'rife' ),
				'description'   => __( 'If autoplay is on, slider will run on page load.', 'rife' ),
				'id'            => 'autoplay',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_slider_autoplay',
				'options'       => array(
					'G'   => __( 'Global settings', 'rife' ),
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Transition', 'rife' ). ' : ' .esc_html__( 'Type', 'rife' ),
				'description'   => __( 'Animation between slides.', 'rife' ),
				'id'            => 'transition',
				'default'       => '-1',
				'global_value'  => '-1',
				'parent_option' => 'work_slider_transition_type',
				'options'       => array(
					'-1' => __( 'Global settings', 'rife' ),
					'0'  => __( 'None', 'rife' ),
					'1'  => __( 'Fade', 'rife' ),
					'2'  => __( 'Carousel', 'rife' ),
					'3'  => __( 'Zooming', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Zoom in %', 'rife' ),
				'description' => __( 'How big the zooming effect will be', 'rife' ),
				'id'          => 'ken_scale',
				'default'     => 120,
				'unit'        => '%',
				'min'         => 100,
				'max'         => 200,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '=', 'slider' ),
					array( 'transition', '=', '3' ),
				)
			),
			array(
				'name'        => __( 'Gradient above photos', 'rife' ),
				'description' => __( 'Good for better readability of slide titles.', 'rife' ),
				'id'          => 'gradient',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Title', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'description' => __( 'Leave empty to not set any background', 'rife' ),
				'id'          => 'slide_title_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'enable_desc', '=', 'on' ),
					array( 'theme', '=', 'slider' )
				)
			),
			array(
				'name'     => __( 'Pattern above photos', 'rife' ),
				'id'       => 'pattern',
				'default'  => '0',
				'options'  => array(
					'0' => __( 'None', 'rife' ),
					'1' => __( 'Type 1', 'rife' ),
					'2' => __( 'Type 2', 'rife' ),
					'3' => __( 'Type 3', 'rife' ),
					'4' => __( 'Type 4', 'rife' ),
					'5' => __( 'Type 5', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Thumbnails', 'rife' ),
				'id'            => 'thumbs',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_slider_thumbs',
				'options'       => array(
					'G'   => __( 'Global settings', 'rife' ),
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Thumbnails', 'rife' ). ' : ' .esc_html__( 'Open', 'rife' ),
				'description' => __( 'If thumbnails are enabled, should they be open by default?', 'rife' ),
				'id'          => 'thumbs_on_load',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'     => __( 'Slider', 'rife' ). ' : ' .esc_html__( 'Background color', 'rife' ),
				'id'       => 'slider_bg_color',
				'default'  => '',
				'type'     => 'color',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'     => __( 'Media top margin', 'rife' ),
				'id'       => 'media_margin_top',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '!=', 'off' ),
			),
			array(
				'name'     => __( 'Media bottom margin', 'rife' ),
				'id'       => 'media_margin_bottom',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Layout
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'rife' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'work_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'rife' ),
					'center'        => __( 'Center fixed width', 'rife' ),
					'left'          => __( 'Left fixed width', 'rife' ),
					'left_padding'  => __( 'Left fixed width + padding', 'rife' ),
					'right'         => __( 'Right fixed width', 'rife' ),
					'right_padding' => __( 'Right fixed width + padding', 'rife' ),
					'full_fixed'    => __( 'Full width + fixed content', 'rife' ),
					'full_padding'  => __( 'Full width + padding', 'rife' ),
					'full'          => __( 'Full width', 'rife' ),
				),
			),
			array(
				'name'        => esc_html__( 'Content', 'rife' ). ' : ' .esc_html__( 'Top/bottom padding', 'rife' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'rife' ),
					'top'    => __( 'Only top', 'rife' ),
					'bottom' => __( 'Only bottom', 'rife' ),
					'off'    => __( 'Both off', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Content', 'rife' ). ' : ' .esc_html__( 'Left/right padding', 'rife' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'rife' ),
					'off'    => __( 'Both off', 'rife' ),
				),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'work_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'rife' ),
					'content' => __( 'Yes, hide the content', 'rife' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'rife' ),
					'off'     => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'rife' ),
				'description'   => __( 'Works only with the horizontal header.', 'rife' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'work_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'rife' ),
					'normal' => __( 'Normal', 'rife' ),
					'light'  => __( 'Light', 'rife' ),
					'dark'   => __( 'Dark', 'rife' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'rife' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'rife' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'rife' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'rife' ),
				'description' => __( 'You can use global settings or override them here', 'rife' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'rife' ),
					'custom' => __( 'Use custom settings', 'rife' ),
					'off'    => __( 'Turn it off', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Position', 'rife' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'hidden',//no switching in options, but we leave it as option so it will be future ready, and to not make exceptions for Works
				'options'     => array(
					'outside' => __( 'Before the content', 'rife' ),
					'inside'  => __( 'Inside the content', 'rife' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'rife' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'rife' ),
					'centered' => __( 'Centered', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'rife' ),
					'boxed' => __( 'Boxed', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'rife' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'rife' ),
					'contain'  => __( 'Contain', 'rife' ),
					'fitV'     => __( 'Fit Vertically', 'rife' ),
					'fitH'     => __( 'Fit Horizontally', 'rife' ),
					'center'   => __( 'Just center', 'rife' ),
					'repeat'   => __( 'Repeat', 'rife' ),
					'repeat-x' => __( 'Repeat X', 'rife' ),
					'repeat-y' => __( 'Repeat Y', 'rife' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ). ' : ' . __( 'Type', 'rife' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'rife' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'rife' ),
					"bt"   => __( 'bottom to top', 'rife' ),
					"lr"   => __( 'left to right', 'rife' ),
					"rl"   => __( 'right to left', 'rife' ),
					"tlbr" => __( 'top-left to bottom-right', 'rife' ),
					"trbl" => __( 'top-right to bottom-left', 'rife' ),
					"bltr" => __( 'bottom-left to top-right', 'rife' ),
					"brtl" => __( 'bottom-right to top-left', 'rife' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'rife' ). ' : ' . __( 'Speed', 'rife' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'rife' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'rife' ),
				'description' => __( 'Will be placed above the image(if used)', 'rife' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'rife' ). ' : ' .esc_html__( 'Text color', 'rife' ),
				'description' => __( 'Used in breadcrumbs.', 'rife' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'rife' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'rife' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'rife' ),
					'off' => __( 'Disable', 'rife' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Content
		 *
		 */
		'content' => array(
			array(
				'name' => __('Content', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-align-left'
			),
			array(
				'name'          => __( 'Categories in content', 'rife' ),
				'id'            => 'content_categories',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_content_categories',
				'type'          => 'radio',
				'options'       => array(
					'G'   => __( 'Global settings', 'rife' ),
					'on'  => __( 'On', 'rife' ),
					'off' => __( 'Off', 'rife' ),
				),
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'rife'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o'
			),
			array(
				'name'        => __( 'Page background', 'rife' ),
				'description' => __( 'You can use global settings or override them here', 'rife' ),
				'id'          => 'page_bg_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'rife' ),
					'custom' => __( 'Use custom settings', 'rife' ),
				),
			),
			array(
				'name'        => __( 'Background image', 'rife' ),
				'id'          => 'page_image',
				'default'     => '',
				'button_text' => __( 'Upload Image', 'rife' ),
				'type'        => 'upload',
				'required'    => array( 'page_bg_settings', '=', 'custom' ),
			),
			array(
				'name'     => __( 'How to fit the background image', 'rife' ),
				'id'       => 'page_image_fit',
				'default'  => 'cover',
				'options'  => array(
					'cover'    => __( 'Cover', 'rife' ),
					'contain'  => __( 'Contain', 'rife' ),
					'fitV'     => __( 'Fit Vertically', 'rife' ),
					'fitH'     => __( 'Fit Horizontally', 'rife' ),
					'center'   => __( 'Just center', 'rife' ),
					'repeat'   => __( 'Repeat', 'rife' ),
					'repeat-x' => __( 'Repeat X', 'rife' ),
					'repeat-y' => __( 'Repeat Y', 'rife' ),
				),
				'type'     => 'select',
				'required' => array( 'page_bg_settings', '=', 'custom' ),
			),
			array(
				'name'     => __( 'Background color', 'rife' ),
				'id'       => 'page_bg_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array( 'page_bg_settings', '=', 'custom' ),
			),
		)
	);

	return apply_filters( 'apollo13framework_meta_boxes_work', $meta );
}
