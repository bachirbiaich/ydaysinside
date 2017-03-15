<div class="tempo-child-wrapper">

	<?php
		$themes 	= tempo_cfgs::get( 'themes' );
		$current 	= tempo_core::theme( 'Name' );

		foreach( $themes as $name => $cfgs ){

			if( $name == 'Tempo' || $name == $current )
				continue;

			$thumbnail = tempo_core::theme( 'thumbnail', $name );

			if( empty( $thumbnail ) )
				continue;
	?>
			<div class="tempo-center tempo-child">

				<a href="<?php echo esc_url( tempo_core::theme( 'uri-image', $name ) ); ?>" class="child-thumbnail" target="_blank" title="<?php echo esc_attr( tempo_core::theme( 'description', $name ) ); ?>">
					<img src="<?php echo esc_url( tempo_core::theme( 'thumbnail', $name ) ); ?>" alt="<?php echo esc_attr( tempo_core::theme( 'description', $name ) ); ?>"/>
				</a>

				<p style="padding-top: 60px;">
					<a href="<?php echo esc_url( tempo_core::theme( 'uri', $name ) ); ?>" class="tempo-button large-button" target="_blank" title="<?php echo esc_attr( tempo_core::theme( 'description', $name ) ); ?>"><?php _e( 'Theme Details', 'tempo' ); ?></a>
					<a href="<?php echo esc_url( tempo_core::theme( 'support', $name ) ); ?>" class="tempo-button large-button" target="_blank"><?php _e( 'Support', 'tempo' ); ?></a>
					<a href="<?php echo esc_url( tempo_core::theme( 'bug-report', $name ) ); ?>" class="tempo-button large-button" target="_blank"><?php _e( 'Bug Report', 'tempo' ); ?></a>
				</p>

			</div>
	<?php
		}
	?>

</div>
