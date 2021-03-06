<?php
    if( tempo_options::get( 'breadcrumbs' ) ){
?>
        <!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs">

            <?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'tag' ); ?>


            <!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'tag' ); ?>


                            <!-- navigation and headline -->
                            <div <?php echo tempo_large_class(); ?>>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'tag' ); ?>


                                <!-- navigation -->
                                <nav class="tempo-navigation">

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'tag' ); ?>

                                    <ul class="tempo-menu-list">
                                        
                                        <?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'tag' ); ?>

                                        <?php echo tempo_breadcrumbs::home(); ?>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'tag' ); ?>

                                        <li><?php echo single_tag_title(); ?></li>

                                        <?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'tag' ); ?>

                                    </ul>

                                    <?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'tag' ); ?>

                                </nav><!-- end navigation -->


                                <?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'tag' ); ?>


                                <!-- headline / end -->
                                <h1 id="tempo-headline-tag" class="tempo-headline"><?php _e( 'Tag Archives' , 'tempo' ); ?></h1>

                                <?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'tag' ); ?>

                            </div><!-- end navigation and headline -->


                            <!-- counter -->
                            <div <?php echo tempo_small_class( 'details' ); ?>>

                                <?php global $wp_query; ?>
                                <?php echo tempo_breadcrumbs::count( $wp_query ); ?>

                            </div><!-- end counter -->


                            <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'tag' ); ?>

                        </div>
                    </div><!-- end content -->

                </div>
            </div><!-- end main container -->


            <!-- delimiter container -->
            <div <?php echo tempo_container_class( 'delimiter' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

                            <div <?php echo tempo_full_class(); ?>>
                                <hr/>
                            </div>

                        </div>
                    </div><!-- end content -->

                </div>
            </div><!-- end delimiter container -->
            

            <?php tempo_get_template_part( 'templates/breadcrumbs/append', 'tag' ); ?>

        </div><!-- end breadcrumbs wrapper -->
<?php
    }
?>