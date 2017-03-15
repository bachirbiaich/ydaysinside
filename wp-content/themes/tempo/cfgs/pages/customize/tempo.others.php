<?php

	/**
	 *	Appearance / Customize / Others - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-others' => array(
			'title'		=> __( 'Others' , 'tempo' ),
			'priority' 	=> 65,
			'sections'	=> array(
				'tempo-custom-css' => array(
					'title'		=> __( 'Custom CSS' , 'tempo' ),
					'priority' 	=> 5,
					'fields'	=> array(
						'custom-css'	=> array(
							'title'			=> __( 'Custom CSS', 'tempo' ),
							'description'	=> __( 'This is a general Custom CSS field.', 'tempo' ),
							'input'			=> array(
								'type' 			=> 'css'
							)
						),
						'custom-css-ie'	=> array(
							'title'			=> __( 'Custom CSS IE', 'tempo' ),
							'description'	=> __( 'This Custom CSS field is used just for Internet Explorer', 'tempo' ),
							'input'			=> array(
								'type' 			=> 'css'
							)
						),
						'custom-css-ie-11'	=> array(
							'title'			=> __( 'Custom CSS IE 11', 'tempo' ),
							'description'	=> __( 'This Custom CSS field is used just for Internet Explorer 11', 'tempo' ),
							'input'			=> array(
								'type' 			=> 'css'
							)
						),
						'custom-css-ie-10'	=> array(
							'title'			=> __( 'Custom CSS IE 10', 'tempo' ),
							'description'	=> __( 'This Custom CSS field is used just for Internet Explorer 10', 'tempo' ),
							'input'			=> array(
								'type' 			=> 'css'
							)
						),
						'custom-css-ie-9'	=> array(
							'title'			=> __( 'Custom CSS IE 9)', 'tempo' ),
							'description'	=> __( 'This Custom CSS field is used just for Internet Explorer 9', 'tempo' ),
							'input'			=> array(
								'type' 			=> 'css'
							)
						),
						'custom-css-ie-8'	=> array(
							'title'			=> __( 'Custom CSS IE 8', 'tempo' ),
							'description'	=> __( 'This Custom CSS field is used just for Internet Explorer 8', 'tempo' ),
							'input'			=> array(
								'type' 			=> 'css'
							)
						)
					)	
				),
				'tempo-copyright' => array(
					'title'		=> __( 'Copyright', 'tempo' ),
					'fields' 	=> array(
						'website-copyright' => array(
							'title'			=> __( 'Website Content Copyright', 'tempo' ),
							'description'   => __( 'From the theme options you can change only the website content copyright.' , 'tempo' ),
							'input'			=> array(
								'type' 			=> 'copyright',
								'default'		=> sprintf( __( 'Copyright &copy; %1s. Powered by %2s.' , 'tempo' ), date( 'Y' ), '<a href="http://wordpress.org/">WordPress</a>' )
							)
						)
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>