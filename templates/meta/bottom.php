<?php
/**
 *
 *  The template part for displaying bottom post meta
 *  The bottom post meta containing the post tags
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    if( (bool)get_theme_mod( 'techmoon-bottom-meta' , true ) ){

	    if( has_tag() ){
?>
	        <div class="post-meta-terms">
	            <div class="post-meta-tags">

	                <span class="techmoon-btn"><i class="materialize-icon-tags"></i></span>
	                <?php the_tags( '' , '' , '' ); ?>

	                <div class="clear clearfix"></div>
	            </div><!-- .post-meta-tags -->
	        </div><!-- .post-meta-terms -->
<?php
	    }
	}
?>