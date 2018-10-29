<?php
if( !class_exists( 'techmoon_admin') ){

class techmoon_admin
{
    static function pageHeader( $pageSlug )
    {

        echo '<div class="techmoon-panel-header">';
        echo '<div class="techmoon-topper"></div>';
        echo '<div class="techmoon-middle techmoon-row">';

        echo '<div class="techmoon-col-3">';
        echo '<h1 class="techmoon-brand"><a href="' . techmoon_core::author( 'url' ) . '" title="' . techmoon_core::author( 'name' ) .' - ' . techmoon_core::author( 'description' ) . '">' . techmoon_core::author( 'name' ) . '</a></h1>';
        echo '</div>';

        echo '<div class="techmoon-col-9">';
        echo '<nav class="techmoon-nav">';

        echo '<ul class="techmoon-list techmoon-inline">';


        echo '<ul class="techmoon-list techmoon-inline special techmoon-free-theme">';

        /* WILL BE A TAB OR A PAGE WITH UPGRADE SYSTEM */
        if( techmoon_core::exists_premium() ){
            echo '<li>';
            echo '<a href="' . esc_url( techmoon_core::theme( 'premium' ) ) . '"><i class="materialize-icon-publish"></i> <span>Upgrade to Premium</span></a>';
            echo '</li>';
        }
        
        echo '</ul>';

        echo '</nav>';
        echo '</div>';

        echo '<div class="clear clearfix"></div>';
        echo '</div>';
        echo '<div class="techmoon-poor"></div>';
        echo '</div>';


        /* BLANK SPACE */
        echo '<div class="techmoon-blank">';
        echo '<span class="techmoon-author-description"><a href="' . techmoon_core::author( 'url' ) . '" title="' . techmoon_core::author( 'name' ) .' - ' . techmoon_core::author( 'description' ) . '">' . techmoon_core::author( 'description' ) . '</a></span>';
        echo '<a href="' . esc_url( techmoon_core::theme( 'ThemeURI' ) ) . '"><strong>' . techmoon_core::theme( 'Name' ) . '</strong> - ' . techmoon_core::version() . '</a>';
        echo '</div>';


        /* CONTENT */
        echo '<div class="techmoon-panel-wrapper">';
    }
    
    static function pageMenu()
    {
        $parent     = '';
        $pages      = techmoon_cfg::get_pages();
        $pageCB     = array( 'techmoon_admin', 'displayPage' );

        foreach( $pages as $slug => &$d ) {
            if( isset( $d[ 'menu' ] ) ) {
                $m = $d[ 'menu' ];
                if( strlen( $parent ) == 0 ) {
                    add_theme_page(
                        $m[ 'label' ]                                           /* page_title   */
                        , $m[ 'label' ]                                         /* menu_title   */
                        , 'administrator'                                       /* capability   */
                        , $slug                                                 /* menu_slug    */
                        , $pageCB                                               /* function     */
                    );
                    $parent = $slug;
                }
            }
        }
    }

    static function displayPage()
    {   
        if( !isset( $_GET ) || !isset( $_GET[ 'page' ] ) ){
            wp_die( 'Invalid page name', 'materialize' );
            return;
        }

        $pageSlug = $_GET[ 'page' ];

        echo '<div class="techmoon-admin-page">';

        echo self::pageHeader( $pageSlug );

        echo '</div>';

        $faqs = techmoon_cfg::get( 'faqs' );


        if( !empty( $faqs ) ){
            foreach( $faqs as $faq ){
                echo '<div class="techmoon-content">';
                echo '<div class="techmoon-box">';
                echo '<div class="techmoon-box-header">';
                echo '<h3>' . $faq[ 'title' ] . '</h3>';
                echo '</div>';
                echo '<div class="techmoon-box-content">';
                echo $faq[ 'content' ];
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
}

}	/* END IF CLASS EXISTS */
?>