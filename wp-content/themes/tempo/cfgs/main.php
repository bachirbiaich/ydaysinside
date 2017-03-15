<?php

	/**
	 *	General config settings
	 */

	/**
	 *	Theme Config
	 */

	$theme_name = strtolower( str_replace( ' ', '-', tempo_core::theme( 'Name' ) ) );

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'themes' ), array(
		'Tempo'		=> array(
			'thumbnail'			=> get_template_directory_uri() . '/media/admin/img/tempo.png',
			'description' 		=>  __( 'Tempo is a clean beautiful WordPress theme for Blogging', 'tempo' ),

			'uri'				=> tempo_core::bitly( 'Tempo', 'uri' ),
			'uri-version'		=> tempo_core::bitly( 'Tempo', 'uri-version' ),
			'uri-image'			=> tempo_core::bitly( 'Tempo', 'uri-image' ),

			'premium'			=> tempo_core::bitly( 'Tempo', 'premium' ),
			'premium-faq'		=> tempo_core::bitly( 'Tempo', 'premium-faq' ),
			'premium-features'	=> tempo_core::bitly( 'Tempo', 'premium-features' ),
			'premium-button'	=> tempo_core::bitly( 'Tempo', 'premium-button' ),

			'support'			=> tempo_core::bitly( 'Tempo', 'support' ),
			'contact'			=> tempo_core::bitly( 'Tempo', 'contact' ),
			'bug-report'		=> tempo_core::bitly( 'Tempo', 'bug-report' ),

			'wordpress'			=> tempo_core::bitly( 'Tempo', 'wordpress' ),
		),
		'Cronus'	=> array(
			'thumbnail'		=> get_template_directory_uri() . '/media/admin/img/cronus.jpg',
			'description'	=> __( 'Cronus is a high quality corporate free WordPress Tempo child theme.', 'tempo' ),

			'uri'				=> tempo_core::bitly( 'Cronus', 'uri' ),
			'uri-version'		=> tempo_core::bitly( 'Cronus', 'uri-version' ),
			'uri-image'			=> tempo_core::bitly( 'Cronus', 'uri-image' ),

			'premium'			=> tempo_core::bitly( 'Cronus', 'premium' ),
			'premium-faq'		=> tempo_core::bitly( 'Cronus', 'premium-faq' ),
			'premium-features'	=> tempo_core::bitly( 'Cronus', 'premium-features' ),
			'premium-button'	=> tempo_core::bitly( 'Cronus', 'premium-button' ),

			'support'			=> tempo_core::bitly( 'Cronus', 'support' ),
			'contact'			=> tempo_core::bitly( 'Cronus', 'contact' ),
			'bug-report'		=> tempo_core::bitly( 'Cronus', 'bug-report' ),

			'wordpress'			=> tempo_core::bitly( 'Cronus', 'wordpress' ),
		),
		'Sarmys'	=> array(
			'thumbnail'		=> get_template_directory_uri() . '/media/admin/img/sarmys.jpg',
			'description'	=> __( 'Sarmys is a simple, clean and creative free WordPress Tempo child theme.', 'tempo' ),

			'uri'				=> tempo_core::bitly( 'Sarmys', 'uri' ),
			'uri-version'		=> tempo_core::bitly( 'Sarmys', 'uri-version' ),
			'uri-image'			=> tempo_core::bitly( 'Sarmys', 'uri-image' ),

			'premium'			=> tempo_core::bitly( 'Sarmys', 'premium' ),
			'premium-faq'		=> tempo_core::bitly( 'Sarmys', 'premium-faq' ),
			'premium-features'	=> tempo_core::bitly( 'Sarmys', 'premium-features' ),
			'premium-button'	=> tempo_core::bitly( 'Sarmys', 'premium-button' ),

			'support'			=> tempo_core::bitly( 'Sarmys', 'support' ),
			'contact'			=> tempo_core::bitly( 'Sarmys', 'contact' ),
			'bug-report'		=> tempo_core::bitly( 'Sarmys', 'bug-report' ),

			'wordpress'			=> tempo_core::bitly( 'Sarmys', 'wordpress' ),
		)
	));

	tempo_cfgs::set( 'themes', $cfgs );

	/**
	 *	Zeon
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'zeon' ), array(
		'description'		=> __( 'Zeon is a premium WordPress Plugin that extends the core functionality of the Tempo free WordPress theme and Tempo child themes.', 'tempo' ),
		'uri-childs'        => tempo_core::bitly( 'Zeon', 'uri-childs' ),
		'uri-description'   => tempo_core::bitly( 'Zeon', 'uri-description' ),
		'uri-image'         => tempo_core::bitly( 'Zeon', 'uri-image' ),
	));

	tempo_cfgs::set( 'zeon', $cfgs );


	/**
	 *	Author Config
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'author' ), array(
		'name'				=> 'myThem.es',
		'description'		=> __( 'myThem.es Marketplace provides WordPress themes with the best quality and the smallest prices.', 'tempo' ),
		'uri-title'			=> tempo_core::bitly( 'myThem.es', 'uri-title' ),
		'uri-description'	=> tempo_core::bitly( 'myThem.es', 'uri-description' ),
		'contact'			=> tempo_core::bitly( 'myThem.es', 'contact' ),
	));

	tempo_cfgs::set( 'author', $cfgs );


	/**
	 *	Custom Logo
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-logo' ), array(
        'height'      	=> 70,
        'width'       	=> 235,
        'flex-height' 	=> true,
		'flex-width'  	=> true,
		'header-text'	=> array( 'tempo-site-title', 'tempo-site-description' )
    ));

    tempo_cfgs::set( 'custom-logo', $cfgs );


    /**
     *	Custom Background
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-background' ), array(
        'default-color'         => '',
        'default-image'         => null,
        'default-attachment'    => 'fixed'
	));

	tempo_cfgs::set( 'custom-background', $cfgs );


	/**
     *	Custom Header
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-header' ), array(
        'default-image'          => get_template_directory_uri() . '/media/img/header.jpg',
        'random-default'         => true,
        'width'                  => 2560,
        'height'                 => 1440,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => false,
        'uploads'                => true
    ));

    tempo_cfgs::set( 'custom-header', $cfgs );


	/**
	 *	Images Size
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'images-size' ), array(
		'tempo-classic' => array(
			'width' 	=> 945,
			'height'	=> 531,
			'crop' 		=> true
		)
	));

	tempo_cfgs::set( 'images-size', $cfgs );


	/**
	 *	Sidebars Classes Header / Footer
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'sidebars-classes' ), array(
		1 => 'col-lg-12',
        2 => 'col-xs-6 col-sm-6 col-md-6 col-lg-6',
        3 => 'col-xs-6 col-sm-6 col-md-4 col-lg-4',
        4 => 'col-xs-6 col-sm-6 col-md-3 col-lg-3'
	));

	tempo_cfgs::set( 'sidebars-classes', $cfgs );


	/**
	 *	Author Copyright
	 */

	 $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'options' ), array(
		 'author-copyright' => array(
			 'input' => array(
				 'type' 		=> 'copyright',
				 'default'		=> sprintf( __( 'Designed by %s.' , 'tempo' ) , '<a href="' . esc_url( tempo_core::author( 'uri' ) ) . '" target="_blank" title="' . esc_attr( tempo_core::author( 'name' ) ) . '">' . tempo_core::author( 'name' ) . '</a>' )
			 )
		 )
	 ));

	 tempo_cfgs::set( 'options', $cfgs );
?>
