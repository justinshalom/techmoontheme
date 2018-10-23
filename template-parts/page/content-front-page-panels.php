<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $techmooncounter;

?>

<div id="panel<?php echo $techmooncounter; ?>" <?php post_class( 'techmoon-panel col s12 l4 ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'techmoon-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content icon-block card-panel hoverable " data-aos="zoom-in-up">
	<?php if($post->ID=="32"){ ?>
	 <h2 class="center brown-text">
          <i class="material-icons">flash_on</i>
        </h2>
		<?php } ?>
		<?php if($post->ID=="33"){ ?>
	 <h2 class="center brown-text">
          <i class="material-icons">group</i>
        </h2>
		<?php } ?>
		<?php if($post->ID=="34"){ ?>
	 <h2 class="center brown-text">
          <i class="material-icons">settings</i>
        </h2>
		<?php } ?>
		<div class="wrap">
			<header class=" center">
				<?php the_title( '<h5 class=" center">', '</h5>' ); ?>

			</header><!-- .entry-header -->

			<div class=" light">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'techmoon' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<?php // Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>

					<div class="recent-posts">

						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</div><!-- #post-## -->
