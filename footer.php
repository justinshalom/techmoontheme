<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
</div><!-- #content -->
</div><!-- #content -->
</section>


		

		<footer id="colophon" class="site-footer page-footer z-depth-1" role="contentinfo">
			<div class="row">
        <div class="col l8 m12 s12 no-padding">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );
?>
        </div>
        <div class="col l4 m12 s12">
          <?php
				if ( has_nav_menu( 'social' ) ) : ?>
					<div class="social-navigation" role="navigation"  data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="300" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'techmoon' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . techmoon_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</div><!-- .social-navigation -->
        </div>
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->

</div>
</div>
</div>
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
</div>
</body>
</html>
