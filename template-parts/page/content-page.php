<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("col s12 no-padding"); ?>>
	<header class="entry-header  col s12 center-align ">
		<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
	</header><!-- .entry-header -->
	<div class="col s12  no-padding entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
