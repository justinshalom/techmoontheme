<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap col s12 no-padding">
	<div id="primary" class="content-area col s12 no-padding">
    
		<main id="main" class="site-main col s12 no-padding" role="main">
      
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
?>

        
      <?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
</div><!-- .wrap -->

<?php get_footer();
