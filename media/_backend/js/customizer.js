function lg( params ){
	console.log( params );
}

function techmoon_hex2rgb( hex )
{
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
    var colors = result ? {
        r: parseInt( result[1], 16 ),
        g: parseInt( result[2], 16 ),
        b: parseInt( result[3], 16 )
    } : null;

    var rett = '';

    if( colors.hasOwnProperty( 'r' ) ){
    	rett += colors.r + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'g' ) ){
    	rett += colors.g + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'b' ) ){
    	rett += colors.b;
    }
    else{
    	rett += '255';
    }

    return rett;
}

function techmoon_brightness( hex, steps )
{
    var steps 	= Math.max( -255, Math.min( 255, steps ) );
    var hex 	= hex.toString().replace( /#/g, "" );

    if ( hex.length == 3 ) {
        hex =
        hex.substring( 0, 1 ) + hex.substring( 0, 1 ) +
        hex.substring( 1, 2 ) + hex.substring( 1, 2 ) +
        hex.substring( 2, 3 ) + hex.substring( 2, 3 );
    }

    var r = parseInt( hex.substring( 0, 2 ).toString() , 16 );
    var g = parseInt( hex.substring( 2, 4 ).toString() , 16 );
    var b = parseInt( hex.substring( 4, 6 ).toString() , 16 );

    r = Math.max( 0, Math.min( 255, r + steps ) ).toString(16).toUpperCase();
    g = Math.max( 0, Math.min( 255, g + steps ) ).toString(16).toUpperCase();
    b = Math.max( 0, Math.min( 255, b + steps ) ).toString(16).toUpperCase();

	var r_hex = Array( 3 - r.length ).join( '0' ) + r;
	var g_hex = Array( 3 - g.length ).join( '0' ) + g;
	var b_hex = Array( 3 - b.length ).join( '0' ) + b;

    return '#' + r_hex + g_hex + b_hex;
}

(function($){

    {   // site identity options

        // margin top
        wp.customize( 'techmoon-blog-logo-m-top' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    if( jQuery( 'div.techmoon-blog-identity .techmoon-blog-logo' ).length ){
                        jQuery( 'div.techmoon-blog-identity .techmoon-blog-logo' ).css({ 'margin-top' : newval + 'px' });
                    }

                }
            });
        });

        // margin bottom
        wp.customize( 'techmoon-blog-logo-m-bottom' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    if( jQuery( 'div.techmoon-blog-identity .techmoon-blog-logo' ).length ){
                        jQuery( 'div.techmoon-blog-identity .techmoon-blog-logo' ).css({ 'margin-bottom' : newval + 'px' });
                    }

                }
            });
        });
    }


    {   // header options

        {   // general options

            // header height
            wp.customize( 'techmoon-header-height' , function( value ){
                value.bind(function( newval ){
                    if( jQuery( 'div.techmoon-header.parallax-container' ).length ){
                        jQuery( 'div.techmoon-header.parallax-container' ).css( 'height' , parseInt( newval ).toString() + 'px' );
                    }
                });
            });

            /**
             *  Header background color.
             *  if the header image is transparent
             *  then will be visible the background color.
             */

            wp.customize( 'techmoon-header-background-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'body' ).css( 'background-color' , newval );
                    jQuery( 'body' ).css( 'backgroundColor' , newval );
                });
            });

            // mask color
            wp.customize( 'techmoon-header-mask-color' , function( value ){
                value.bind(function( newval ){
                    var opacity = parseFloat( wp.customize.instance( 'techmoon-header-mask-transp' ).get() / 100 ).toString();
                    jQuery( 'div.techmoon-header div.valign-cell-wrapper' ).css( 'background-color' , 'rgba(' + techmoon_hex2rgb( newval ) + ' , ' + opacity + ')' );
                });
            });

            // mask color
            wp.customize( 'techmoon-header-mask-transp' , function( value ){
                value.bind(function( newval ){
                    var opacity = parseFloat( newval / 100 ).toString();
                    var color   = wp.customize.instance( 'techmoon-header-mask-color' ).get().toString();
                    jQuery( 'div.techmoon-header div.valign-cell-wrapper' ).css( 'background-color' , 'rgba(' + techmoon_hex2rgb( color ) + ' , ' + opacity + ')' );
                });
            });
        }

        {   // content options

            {   // header headline options

                // header headline text
                wp.customize( 'techmoon-header-headline' , function( value ){
                    value.bind(function( newval ){
                        if( newval ){
                            jQuery( '.techmoon-header a.header-headline' ).html( newval );
                        }
                    });
                });

                // header headline color
                wp.customize( 'techmoon-header-headline-color', function( value ){
                    value.bind(function( newval ){
                        jQuery( 'style#techmoon-header-headline-color' ).html(
                            'div.techmoon-header a.header-headline{' +
                            'color: ' + newval + ';' +
                            '}'
                        );
                    });
                });
            }

            {   // header description options

                // header description text
                wp.customize( 'techmoon-header-description' , function( value ){
                    value.bind(function( newval ){
                        if( newval ){
                            jQuery( '.techmoon-header a.header-description' ).html( newval );
                        }
                    });
                });

                // header description color
                wp.customize( 'techmoon-header-description-color', function( value ){
                    value.bind(function( newval ){

                        var hex     = newval;
                        var rgba1   = 'rgba( ' + techmoon_hex2rgb( hex ) + ', 0.55 )';
                        var rgba2   = 'rgba( ' + techmoon_hex2rgb( hex ) + ', 1.0 )';

                        jQuery( 'style#techmoon-header-description-color' ).html(
                            'div.techmoon-header a.header-description{' +
                            'color: ' + rgba1 + ';' +
                            '}' +

                            'div.techmoon-header a.header-description:hover{' +
                            'color: ' + rgba2 + ';' +
                            '}'
                        );
                    });
                });
            }
        }


        {   // header first button options

            // first button text color
            wp.customize( 'techmoon-header-btn-1-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#techmoon-header-btn-1-color' ).html(
                        'div.techmoon-header.parallax-container div.techmoon-header-buttons a.btn-large.techmoon-first-button{' +
                        'color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button background color
            wp.customize( 'techmoon-header-btn-1-bkg-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#techmoon-header-btn-1-bkg-color' ).html(
                        'div.techmoon-header.parallax-container div.techmoon-header-buttons a.btn-large.techmoon-first-button{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button background color
            wp.customize( 'techmoon-header-btn-1-bkg-h-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#techmoon-header-btn-1-bkg-h-color' ).html(
                        'div.techmoon-header.parallax-container div.techmoon-header-buttons a.btn-large.techmoon-first-button:hover{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button url
            wp.customize( 'techmoon-header-btn-1-url' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.techmoon-header-buttons a.techmoon-first-button' ).attr( 'href' , newval );
                });
            });

            // first button text
            wp.customize( 'techmoon-header-btn-1-text' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.techmoon-header-buttons a.techmoon-first-button' ).html( newval );
                });
            });

            // first button description
            wp.customize( 'techmoon-header-btn-1-description' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.techmoon-header-buttons a.techmoon-first-button' ).attr( 'title' , newval );
                });
            });
        }

        {   // header second button options

            // second button text color
            wp.customize( 'techmoon-header-btn-2-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#techmoon-header-btn-2-color' ).html(
                        'div.techmoon-header.parallax-container div.techmoon-header-buttons a.btn-large.techmoon-second-button{' +
                        'color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button background color
            wp.customize( 'techmoon-header-btn-2-bkg-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#techmoon-header-btn-2-bkg-color' ).html(
                        'div.techmoon-header.parallax-container div.techmoon-header-buttons a.btn-large.techmoon-second-button{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button background color
            wp.customize( 'techmoon-header-btn-2-bkg-h-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#techmoon-header-btn-2-bkg-h-color' ).html(
                        'div.techmoon-header.parallax-container div.techmoon-header-buttons a.btn-large.techmoon-second-button:hover{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button url
            wp.customize( 'techmoon-header-btn-2-url' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.techmoon-header-buttons a.techmoon-second-button' ).attr( 'href' , newval );
                });
            });

            // second button text
            wp.customize( 'techmoon-header-btn-2-text' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.techmoon-header-buttons a.techmoon-second-button' ).html( newval );
                });
            });

            // second button description
            wp.customize( 'techmoon-header-btn-2-description' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.techmoon-header-buttons a.techmoon-second-button' ).attr( 'title' , newval );
                });
            });
        }
    }


    {   // breadcrumbs options

		// Blog Title
        wp.customize( 'techmoon-breadcrumbs-blog-title' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.techmoon-page-header h1#materialize-blog-title' ).length ){
                    jQuery( 'div.techmoon-page-header h1#materialize-blog-title' ).html( newval );
                }
            });
        });

        // home link text
        wp.customize( 'techmoon-breadcrumbs-home-link-text' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.techmoon-page-header li#home-label a span' ).length ){
                    jQuery( 'div.techmoon-page-header li#home-label a span' ).html( newval );
                }
            });
        });

        // home link description
        wp.customize( 'techmoon-breadcrumbs-home-link-description' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.techmoon-page-header li#home-label a' ).length ){
                    jQuery( 'div.techmoon-page-header li#home-label a' ).attr( 'title' , newval );
                }
            });
        });

        // space
        wp.customize( 'techmoon-breadcrumbs-space' , function( value ){
            value.bind(function( newval ){

				var

				style 		= '',
				space_991	= parseInt( newval * 991 / 1140 ),
				space_767 	= parseInt( newval * 767 / 1140 ),
				space_540 	= parseInt( newval * 540 / 1140 ),
				space_480 	= parseInt( newval * 480 / 1140 );

				if( space_991 > 23 ){
					style +=

					'@media (max-width: 991px ){' +
					'div.techmoon-page-header{' +
					'padding-top:' + parseInt( space_991 ) + 'px;' +
					'padding-bottom:' + parseInt( space_991 ) + 'px;' +
					'}' +
					'}';
				}

				if( space_767 > 23 ){
					style +=

					'@media (max-width: 767px ){' +
					'div.techmoon-page-header{' +
					'padding-top:' + parseInt( space_767 ) + 'px;' +
					'padding-bottom:' + parseInt( space_767 ) + 'px;' +
					'}' +
					'}';
				}

				if( space_540 > 23 ){
					style +=

					'@media (max-width: 540px ){' +
					'div.techmoon-page-header{' +
					'padding-top:' + parseInt( space_540 ) + 'px;' +
					'padding-bottom:' + parseInt( space_540 ) + 'px;' +
					'}' +
					'}';
				}

				if( space_480 > 23 ){
					style +=

					'@media (max-width: 480px ){' +
					'div.techmoon-page-header{' +
					'padding-top:' + parseInt( space_480 ) + 'px;' +
					'padding-bottom:' + parseInt( space_480 ) + 'px;' +
					'}' +
					'}';
				}

				jQuery( 'style#techmoon-breadcrumbs-space' ).html(
					'div.techmoon-page-header{' +
					'padding-top:' + parseInt( newval ) + 'px;' +
					'padding-bottom:' + parseInt( newval ) + 'px;' +
					'}' +

					style
				);
            });
        });
    }

    {   // additional options

        wp.customize( 'techmoon-blog-title' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.techmoon-page-header h1#blog-title' ).length ){
            	   jQuery( 'div.techmoon-page-header h1#blog-title' ).html( newval );
                }
            });
        });
    }


    {   // others options

        wp.customize( 'techmoon-copyright' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.techmoon-copyright span.copyright' ).length ){
                    jQuery( 'div.techmoon-copyright span.copyright' ).html( newval );
                }
            });
        });
    }


    {   // colors options

        wp.customize( 'background_color' , function( value ){
            value.bind(function( newval ){

                var bg_color        = newval;
                var bg_color_rgba   = 'rgba( ' + techmoon_hex2rgb( newval ) + ' , 0.91 )';
                jQuery( 'style#techmoon-background-color' ).html(

                    // background color
                    'body > div.content{' +
                    'background-color: ' + bg_color + ';' +
                    '}' +

                    // menu navigation
                    // background color
                    'body.scroll-nav .techmoon-poor{' +
                    'background-color: ' + bg_color_rgba + ';' +
                    '}' +

                    '.techmoon-poor{' +
                    'background-color: ' + bg_color + ';' +
                    '}'
                );
            });
        });
    }


    {   // background image options

        wp.customize( 'background_image' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-image' , 'url(' + newval + ')' );
            });
        });

        wp.customize( 'background_repeat' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-repeat' , newval );
            });
        });

        wp.customize( 'background_position_x' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-position' , newval );
            });
        });

        wp.customize( 'background_attachment' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-attachment' , newval );
            });
        });
    }

})(jQuery);
