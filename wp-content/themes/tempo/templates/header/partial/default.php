<?php
    if( !tempo_has_header() )
        return;

    // text
    $headline           = tempo_options::get( 'header-headline' );
    $headline_label     = tempo_options::get( 'header-headline-text' );

    $description        = tempo_options::get( 'header-description' );
    $desc_label         = tempo_options::get( 'header-description-text' );

    // settings
    $height             = apply_filters( 'tempo_header_height', tempo_options::get( 'header-height' ) );
    $image              = esc_url( get_header_image() );

    // mask color and transparency
    $mask_rgba          = null;

    if( tempo_options::is_set( 'header-mask-color' ) || tempo_options::is_set( 'header-mask-transp' ) ){
        $mask_rgb       = tempo_hex2rgb( tempo_options::get( 'header-mask-color' ) );
        $mask_transp    = number_format( floatval( tempo_options::get( 'header-mask-transp' ) / 100 ), 2 );
        $mask_rgba      = "background: rgba( {$mask_rgb}, {$mask_transp} );";
    }
?>

<div class="tempo-header-partial overflow-wrapper" style="height: <?php echo absint( $height ); ?>px; background-image: url(<?php echo esc_url( $image ); ?>);">

    <?php tempo_get_template_part( 'templates/header/partial/prepend' ); ?>

    <!-- mask - a transparent foil over the header image -->
    <div class="tempo-header-mask" style="<?php echo esc_attr( apply_filters( 'tempo_default_mask_background', $mask_rgba ) ); ?>"></div>



        <!-- flex container -->
        <div <?php echo tempo_flex_container_class( 'tempo-header-text-wrapper' ); ?> style="<?php echo esc_attr( apply_filters( 'tempo_header_text_wrapper_style', null ) ); ?>">
            <div <?php echo tempo_flex_item_class(); ?>>

                <?php tempo_get_template_part( 'templates/header/partial/flex-item/prepend' ); ?>

                <?php
                    // headline
                    if( $headline ){
                        echo '<a class="tempo-header-headline" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $headline_label ) . '">';
                        echo $headline_label;
                        echo '</a>';
                    }

                    tempo_get_template_part( 'templates/header/image/between-text' );

                    // description
                    if( $description ){
                        echo '<a class="tempo-header-description" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $desc_label ) . '">';
                        echo $desc_label;
                        echo '</a>';
                    }
                ?>

                <?php tempo_get_template_part( 'templates/header/partial/flex-item/append' ); ?>

            </div>
        </div><!-- end flex container -->


    <?php tempo_get_template_part( 'templates/header/partial/append' ); ?>

</div>
