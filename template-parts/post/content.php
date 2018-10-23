<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(" col s12 no-padding"); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo techmoon_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<header class="entry-header col s12 center-align z-depth-1">
		<?php
		
		if ( is_single() ) {
			the_title( '<h4 class="entry-title"><i class="material-icons ">dvr</i> ', '</h4>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		} else {
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		}
		?>
		<div class="breadcrumb col s12"><?php get_breadcrumb();?></div>
	</header><!-- .entry-header -->
	
	<div class="col s12 m12 l8 no-padding entry-content" data-aos="zoom-in-up"
     data-aos-anchor-placement="top" data-aos-duration="2000">
	<?php if ( '' !== get_the_post_thumbnail()) :?>
	<div class="col s12 m9 l8 no-padding entry-image" data-aos="zoom-in-up"
     data-aos-anchor-placement="top" data-aos-duration="2000">
		<div class="post-full card-image waves-effect waves-block waves-light">
			<a href="<?php the_permalink(); ?>" class="col s12 no-padding">
				<?php the_post_thumbnail( 'techmoon-featured-image' ); ?>
			</a>
		</div>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'techmoon' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'techmoon' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	
	</div>

	<?php
	if ( is_single() ) {
		 get_sidebar();
	}
	?>

</article><!-- #post-## -->
