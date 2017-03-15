<?php

	/**
	 *	Appearance / Customize / Additional - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-additional' => array(
			'title'		=> __( 'Additional' , 'tempo' ),
			'priority' 	=> 40,
			'fields'	=> array(
				'gallery-style' => array(
					'title'			=> __( 'Gallery Style [ Tempo ]', 'tempo' ),
	                'description'	=> __( 'enable / disable Tempo Gallery Style.', 'tempo' ),
	                'priority' 		=> 10,
					'input'		=> array(
						'type'		=> 'checkbox',
						'default'	=> true
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>