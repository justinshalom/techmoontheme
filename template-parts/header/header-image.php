<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="parallax-container">
			<?php   $custom_header = get_custom_header_markup();
    if ( empty( $custom_header ) ) {
        return;
    }
 
    echo str_replace("wp-custom-header","parallax",$custom_header);
 
    if ( is_header_video_active() && ( has_header_video() || is_customize_preview() ) ) {
        wp_enqueue_script( 'wp-custom-header' );
        wp_localize_script( 'wp-custom-header', '_wpCustomHeaderSettings', get_header_video_settings() );
    } ?>


</div><!-- .custom-header -->
