<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap col s12 no-padding">
 
    <?php if ( have_posts() ) : ?>
    <header class="page-header col s12 z-depth-1">
      <?php
				the_archive_title( '<h4 class="page-title "> <i class="material-icons left">explore</i>', '</h4>' );
				the_archive_description( '<blockquote class="taxonomy-description col s11">', '</blockquote>' );
			?>
    </header>
    <!-- .page-header -->
    <?php endif; ?>
 

		<?php
		if ( have_posts() ) : ?>
  <div id="primary" class="content-area col s12  ">
    <main id="main" class="site-main col s12  " role="main">

      <?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
        
         
				get_template_part( 'template-parts/post/content', "archive" );

			endwhile;
?>
<?php
get_template_part( 'template-parts/navigation/navigation', 'posts' );
      ?>
    </main>
    <!-- #main -->
  </div>
  <!-- #primary -->
        <?php
		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>
     
	
	
</div><!-- .wrap -->

<?php get_footer();
