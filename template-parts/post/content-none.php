<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<section class="no-results not-found  col s12 no-padding">
	<header class="page-header  col s12 center-align z-depth-1 " >
		<h1 class="page-title"><?php _e( 'Nothing Found', 'techmoon' ); ?></h1>
	</header>
	<div class="page-content col s12 m12 l8 " data-aos="zoom-in-up"
     data-aos-anchor-placement="top" data-aos-duration="2000">
    <div class="col s12  ">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'techmoon' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p class="col s12"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'techmoon' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
    </div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
