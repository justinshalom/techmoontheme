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
<div class="col s12 m6 l4  xl3 " data-aos="zoom-in-up"
     data-aos-anchor-placement="top" data-aos-duration="2000">
<article id="post-<?php the_ID(); ?>" <?php post_class("card medium"); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo techmoon_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail card-image waves-effect waves-block waves-light ">
			<a href="<?php the_permalink(); ?>" class="col s12 no-padding">
        <?php the_post_thumbnail( 'techmoon-featured-image activator' ); ?>
			</a>
     
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="card-content">
		<?php
		
			the_title( '<span class="entry-title card-title activator grey-text text-darken-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a><i class="material-icons right">more_vert</i></span>' );
		
		?>
    <p>
      <a href="<?php the_permalink(); ?>">Read More <i class="material-icons">arrow_forward</i>
      </a>
    </p>
	</header><!-- .entry-header -->

	

	<div class=" card-reveal">
		<?php
		
			the_title( '<span class="card-title grey-text text-darken-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="material-icons">bookmark</i> ', '</a><i class="material-icons right cardclose">close</i></span>' );
		
		?>
    <p class="entry-summary">
      <?php the_excerpt(); ?>
    </p>
		
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
</div>