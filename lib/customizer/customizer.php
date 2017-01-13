<?php

include_once( dirname( __FILE__ ) . '/kirki/kirki.php' );

function rt_kirki() {
	return array( 'url_path' => get_stylesheet_directory_uri() . '/lib/customizer/kirki/' );
}

add_filter( 'kirki/config', 'rt_kirki' );

function rt_customizer( $wp_customize ) {
	/**
	 * Add Panel
	 */
	$wp_customize->add_panel( 'main_panel', array(
		'priority'	 => 10,
		'title'		 => __( 'rt Panel Options', 'superminimal' ),
	) );

	//More code to come
	/**
	 * Add a Section for Site Text Colors
	 */
	$wp_customize->add_section( 'slider', array(
		'title'		 => __( 'Slider Images ', 'superminimal' ),
		'priority'	 => 10,
		'panel'		 => 'main_panel',
//		'description'	 => __( 'Add Images For Slider', 'superminimal' ),
	) );

	$wp_customize->add_section( 'about', array(
		'title'		 => __( 'About ', 'superminimal' ),
		'priority'	 => 10,
		'panel'		 => 'main_panel',
//		'description'	 => __( 'Add Images For Slider', 'superminimal' ),
	) );
}

add_action( 'customize_register', 'rt_customizer' );

function superminimal_demo_fields( $fields ) {
	//Add code here
	$fields[] = array(
		'type'			 => 'repeater',
		'settings'		 => 'slider_slides',
		'label'			 => __( 'Add Image Slides', 'my_textdomain' ),
		'section'		 => 'slider',
		'button_label'	 => __( 'Add New Slides', 'my_textdomain' ),
		'default'		 => '',
		'fields'		 => array(
			'thumbnail' => array(
				'type'	 => 'image',
				'label'	 => __( 'Add Image', 'my_textdomain' ),
			),
		),
		'row_label'		 => array(
			'type'	 => 'text',
			'value'	 => 'Slide'
		),
//		'choices'		 => array(
//			'limit' => 5,
//		),
		$fields[]		 = array(
			'type'			 => 'dropdown-pages',
			'settings'		 => 'my_setting',
			'label'			 => __( 'This is the label', 'my_textdomain' ),
			'section'		 => 'about',
			'default'		 => 42,
			'priority'		 => 10,
			'allow_addition' => true,
		)
	);


	return $fields;
}

add_filter( 'kirki/fields', 'superminimal_demo_fields' );
