<?php
if( !class_exists( 'techmoon_scripts' ) ){

class techmoon_scripts
{
    static function frontend()
    {
        $ver        = techmoon_core::theme( 'Version' );

        $font_1     = 'Poiret+One';
        $font_2     = 'Raleway:400,100,200,300,500,600,700,800,900';
        $font_3     = 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';

        wp_register_style( 'materialize-google-font-1',         '//fonts.googleapis.com/css?family=' . esc_attr( $font_1 ), null, $ver );
        wp_register_style( 'materialize-google-font-2',         '//fonts.googleapis.com/css?family=' . esc_attr( $font_2 ), null, $ver );
        wp_register_style( 'materialize-google-font-3',         '//fonts.googleapis.com/css?family=' . esc_attr( $font_3 ), null, $ver );

        /* COMMON */
        wp_register_style( 'fontello',                          get_template_directory_uri() . '/media/css/fontello.css', null, $ver );

        /* FRONTEND */
        wp_register_style( 'techmoon-effects',                  get_template_directory_uri() . '/media/_frontend/css/effects.css', null, $ver );
        wp_register_style( 'techmoon-header',                   get_template_directory_uri() . '/media/_frontend/css/header.css', null, $ver );
        wp_register_style( 'techmoon-materialize',              get_template_directory_uri() . '/media/_frontend/css/materialize.min.css', null, $ver );
        wp_register_style( 'techmoon-typography',               get_template_directory_uri() . '/media/_frontend/css/typography.css', null, $ver);
        wp_register_style( 'techmoon-navigation',               get_template_directory_uri() . '/media/_frontend/css/navigation.css', null, $ver );
        wp_register_style( 'techmoon-nav',                      get_template_directory_uri() . '/media/_frontend/css/nav.css', null, $ver );
        wp_register_style( 'techmoon-blog',                     get_template_directory_uri() . '/media/_frontend/css/blog.css', null, $ver );
        wp_register_style( 'techmoon-forms',                    get_template_directory_uri() . '/media/_frontend/css/forms.css', null, $ver );
        wp_register_style( 'techmoon-elements',                 get_template_directory_uri() . '/media/_frontend/css/elements.css', null, $ver );
        wp_register_style( 'techmoon-widgets',                  get_template_directory_uri() . '/media/_frontend/css/widgets.css', null, $ver );
        wp_register_style( 'techmoon-comments',                 get_template_directory_uri() . '/media/_frontend/css/comments.css', null, $ver );
        wp_register_style( 'techmoon-comments-typography',      get_template_directory_uri() . '/media/_frontend/css/comments-typography.css', null, $ver );
        wp_register_style( 'techmoon-footer',                   get_template_directory_uri() . '/media/_frontend/css/footer.css', null, $ver );
        wp_register_style( 'techmoon-pretty-photo',             get_template_directory_uri() . '/media/_frontend/css/prettyPhoto.css', null, $ver );
        wp_register_style( 'techmoon-plugins',                  get_template_directory_uri() . '/media/_frontend/css/plugins.css', null, $ver );

        $dependency = array(
            'materialize-google-font-1',
            'materialize-google-font-2',
            'materialize-google-font-3',

            'fontello',
            'techmoon-effects',
            'techmoon-header',
            'techmoon-materialize',
            'techmoon-typography',
            'techmoon-navigation',
            'techmoon-nav',
            'techmoon-blog',
            'techmoon-forms',
            'techmoon-elements',
            'techmoon-widgets',
            'techmoon-comments',
            'techmoon-comments-typography',
            'techmoon-footer',
            'techmoon-pretty-photo',
            'techmoon-plugins',
        );

        /**
         *
         */

        $css_files = (array)apply_filters( 'materialize_css_files', array() ); //(array)materialize_cfgs::get( 'css-files' )

        foreach( $css_files as $css_file_index => $css_file_uri ){
            $dependency[] = $css_file_index;
            wp_register_style( $css_file_index, $css_file_uri, null, $ver );
        }

        /* MAIN STYLE */
        wp_enqueue_style( 'techmoon-style',                     get_template_directory_uri() . '/style.css', $dependency );

        // Load the Internet Explorer specific stylesheet.
        wp_enqueue_style( 'materialize-ie',                     get_template_directory_uri() . '/media/_frontend/css/ie.css', null, $ver );
        wp_style_add_data( 'materialize-ie', 'conditional', 'IE' );


        // Load the Internet Explorer 9 specific scripts.
        wp_enqueue_script( 'respond',                           get_template_directory_uri() . '/media/_frontend/js/respond.min.js', null, $ver );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'html5shiv',                         get_template_directory_uri() . '/media/_frontend/js/html5shiv.min.js', null, $ver );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

        /* REGISTER SCRIPTS */
        wp_register_script( 'techmoon-materialize',             get_template_directory_uri() . '/media/_frontend/js/materialize.min.js', array( 'jquery' ), $ver, true );
        wp_register_script( 'techmoon-functions',               get_template_directory_uri() . '/media/_frontend/js/functions.js', array( 'masonry' ) , $ver, true );

        wp_register_script( 'techmoon-pretty-photo',            get_template_directory_uri() . '/media/_frontend/js/jquery.prettyPhoto.js', null, $ver, true );
        wp_register_script( 'techmoon-pretty-photo-settings',   get_template_directory_uri() . '/media/_frontend/js/jquery.prettyPhoto.settings.js', null, $ver, true );

        wp_enqueue_script( 'techmoon-functions' );
        wp_enqueue_script( 'techmoon-materialize' );
        wp_enqueue_script( 'techmoon-pretty-photo' );
        wp_enqueue_script( 'techmoon-pretty-photo-settings' );

        /* INCLUDE FOR REPLY COMMENTS */
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );
    }

    static function backend()
    {
        $ver = techmoon_core::theme( 'Version' );

        wp_register_style( 'fontello',                            get_template_directory_uri() . '/media/css/fontello.css', null, $ver );
        wp_enqueue_style( 'fontello' );

        wp_register_style( 'techmoon-_backend-customizer',              get_template_directory_uri() . '/media/_backend/css/customizer.css', null, $ver );
        wp_register_style( 'techmoon-_backend-options',                 get_template_directory_uri() . '/media/_backend/css/options.css', null, $ver );
        wp_register_style( 'techmoon-_backend-boxes',                   get_template_directory_uri() . '/media/_backend/css/boxes.css', null, $ver );
        wp_register_style( 'techmoon-_backend-ahtml',                   get_template_directory_uri() . '/media/_backend/css/ahtml.css', null, $ver );
        wp_register_style( 'techmoon-_backend-adds',                    get_template_directory_uri() . '/media/_backend/css/adds.css', null, $ver );

        wp_enqueue_style( 'techmoon-_backend-customizer' );
        wp_enqueue_style( 'techmoon-_backend-options' );
        wp_enqueue_style( 'techmoon-_backend-boxes' );
        wp_enqueue_style( 'techmoon-_backend-ahtml' );
        wp_enqueue_style( 'techmoon-_backend-adds' );
        wp_enqueue_style( 'fontello' );
    }
}

}   /* END IF CLASS EXISTS */
?>
