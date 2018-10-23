<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap col s12 no-padding">
  
	<header class="page-header col s12 z-depth-1 ">
		<?php if ( have_posts() ) : ?>
			<h4 class="page-title  col s12 z-depth-1">
        <div class="col s12 m6 l6  no-padding searchheading">
        <i class="material-icons left">search</i> <?php printf( __( 'Search Results for: %s', 'techmoon' ), '<span >' . get_search_query() . '</span>' ); ?>
        </div>
        <div class="col s12 m6 l6 right  no-padding">
        <?php get_search_form();?>
        </div>
      </h4>
		<?php else : ?>
			<h4 class="page-title">
        <i class="material-icons left">sentiment_dissatisfied</i> <?php _e( 'Nothing Found', 'techmoon' ); ?></h4>
		<?php endif; ?>
	</header><!-- .page-header -->
  <div id="primary" class="content-area col s12   ">
		<main id="main" class="site-main col s12" role="main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'archive' );

			endwhile; // End of the loop.
?>

      <?php
get_template_part( 'template-parts/navigation/navigation', 'posts' );
      ?>

      <?php
		else : ?>
      <div class="col s12  ">
        <div class="col s12  ">
			<p class="col s12"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'techmoon' ); ?></p>
			<?php
				get_search_form();
?>
        </div>
      </div>
          <?php
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
