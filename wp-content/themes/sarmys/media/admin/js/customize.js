 (function($){

    {   //- BACKGROUND IMAGE -//

        wp.customize( 'background_image' , function( value ){
            value.bind(function( newval ){
                if( newval ){

                    var image       = newval;
                    var repeat      = wp.customize.instance( 'background_repeat' ).get();
                    var position    = wp.customize.instance( 'background_position_x' ).get();
                    var attchment   = wp.customize.instance( 'background_attachment' ).get();

                    jQuery( 'style#background-image').html(
                        'body div.tempo-website-wrapper{' +
                        'background-image: url(' + image + ');' +
                        'background-repeat: ' + repeat + ';' +
                        'background-position: ' + position + ';' +
                        'background-attachment: ' + attchment + ';' +
                        '}'
                    );
                }
            });
        });

        wp.customize( 'background_repeat' , function( value ){
            value.bind(function( newval ){
                if( newval ){

                    var image       = wp.customize.instance( 'background_image' ).get();
                    var repeat      = newval;
                    var position    = wp.customize.instance( 'background_position_x' ).get();
                    var attchment   = wp.customize.instance( 'background_attachment' ).get();

                    jQuery( 'style#background-image').html(
                        'body div.tempo-website-wrapper{' +
                        'background-image: url(' + image + ');' +
                        'background-repeat: ' + repeat + ';' +
                        'background-position: ' + position + ';' +
                        'background-attachment: ' + attchment + ';' +
                        '}'
                    );
                }
            });
        });

        wp.customize( 'background_position_x' , function( value ){
            value.bind(function( newval ){
                if( newval ){

                    var image       = wp.customize.instance( 'background_image' ).get();
                    var repeat      = wp.customize.instance( 'background_repeat' ).get();
                    var position    = newval;
                    var attchment   = wp.customize.instance( 'background_attachment' ).get();

                    jQuery( 'style#background-image').html(
                        'body div.tempo-website-wrapper{' +
                        'background-image: url(' + image + ');' +
                        'background-repeat: ' + repeat + ';' +
                        'background-position: ' + position + ';' +
                        'background-attachment: ' + attchment + ';' +
                        '}'
                    );
                }
            });
        });

        wp.customize( 'background_attachment' , function( value ){
            value.bind(function( newval ){
                if( newval ){

                    var image       = wp.customize.instance( 'background_image' ).get();
                    var repeat      = wp.customize.instance( 'background_repeat' ).get();
                    var position    = wp.customize.instance( 'background_position_x' ).get();
                    var attchment   = newval;

                    jQuery( 'style#background-image').html(
                        'body div.tempo-website-wrapper{' +
                        'background-image: url(' + image + ');' +
                        'background-repeat: ' + repeat + ';' +
                        'background-position: ' + position + ';' +
                        'background-attachment: ' + attchment + ';' +
                        '}'
                    );
                }
            });
        });
    }


    {   //- COLORS -//

        // background color

        wp.customize( 'background_color' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    jQuery( 'style#background-color').html(
                        'body div.tempo-website-wrapper{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                }
            });
        });

    }


    {   //- HEADER -//

        {   ////    APPEARANCE

            wp.customize( 'header-text-space', function( value ){
                value.bind(function( newval ){
                    var text = jQuery( 'div.tempo-header-partial div.tempo-header-text-wrapper' );
                    var btns = jQuery( 'div.tempo-header-partial div.tempo-header-btns-wrapper' );

                    if( newval && text.length && btns.length ){
                        var height = parseInt( newval ) + parseInt( wp.customize.instance( 'header-btns-space' ).get() );

                        jQuery( 'div.tempo-header-partial' ).css( 'height' , parseInt( height ).toString() + 'px' );
                        jQuery( 'div.tempo-header-partial div.tempo-header-text-wrapper' ).css( 'height' , parseInt( newval ).toString() + 'px' );
                    }
                });
            });

            wp.customize( 'header-btns-space', function( value ){
                value.bind(function( newval ){
                    var text = jQuery( 'div.tempo-header-partial div.tempo-header-text-wrapper' );
                    var btns = jQuery( 'div.tempo-header-partial div.tempo-header-btns-wrapper' );

                    if( newval && text.length && btns.length ){
                        var height = parseInt( wp.customize.instance( 'header-text-space' ).get() ) + parseInt( newval );

                        jQuery( 'div.tempo-header-partial' ).css( 'height' , parseInt( height ).toString() + 'px' );
                        jQuery( 'div.tempo-header-partial div.tempo-header-btns-wrapper' ).css( 'height' , parseInt( newval ).toString() + 'px' );
                    }
                });
            });

        }

        {   ////    BUTTON 1

            // Text
            wp.customize( 'header-btn-1-text', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-1' );

                    if( button.length )
                        button.html( newval );
                });
            });

            // Description
            wp.customize( 'header-btn-1-description', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-1' );

                    if( button.length )
                        button.attr( 'title', newval );
                });
            });

            // Url
            wp.customize( 'header-btn-1-url', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-1' );

                    if( button.length )
                        button.attr( 'href', newval );
                });
            });

            // Target
            wp.customize( 'header-btn-1-target', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-1' );

                    if( !button.length )
                        return;

                    if( newval ){
                        button.attr( 'target', "_blank" );
                    }

                    else{
                        button.removeAttr( 'target' );
                    }
                });
            });
        }

        {   ////    BUTTON 2

            // Text
            wp.customize( 'header-btn-2-text', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-2' );

                    if( button.length )
                        button.html( newval );
                });
            });

            // Description
            wp.customize( 'header-btn-2-description', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-2' );

                    if( button.length )
                        button.attr( 'title', newval );
                });
            });

            // Url
            wp.customize( 'header-btn-2-url', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-2' );

                    if( button.length )
                        button.attr( 'href', newval );
                });
            });

            // Target
            wp.customize( 'header-btn-2-target', function( value ){
                value.bind(function( newval ){
                    var button = jQuery( 'header.tempo-header div.tempo-header-partial .tempo-header-btns-wrapper .tempo-btn.btn-2' );

                    if( !button.length )
                        return;

                    if( newval ){
                        button.attr( 'target', "_blank" );
                    }

                    else{
                        button.removeAttr( 'target' );
                    }
                });
            });
        }
    }

})(jQuery);
