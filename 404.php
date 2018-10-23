<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap col s12 no-padding">
  <header class="page-header  col s12 z-depth-1">
    <h4 class="page-title">
      <i class="material-icons left">sentiment_dissatisfied</i> 
      <?php _e( 'Oops! That page can&rsquo;t be found.', 'techmoon' ); ?>
    </h4>
  </header>
  <!-- .page-header -->

  <div id="primary" class="content-area col s12 ">
		<main id="main" class="site-main col s12 " role="main">

			<section class="error-404 not-found col s12 ">
				<div class="page-content col s12 ">
					<p class="col s12"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'techmoon' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
