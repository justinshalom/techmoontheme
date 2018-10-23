<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<div class="carousel carousel-slider center col s12 z-depth-1 animated ">
  <div class="carousel-item  white-text" href="#one!">
    <img src="<?php echo get_theme_file_uri()."/assets/images/banner31.jpg";?>" />
      <h2>Training  </h2>
      <p class="white-text">Your need is our care</p>
    </div>

  <div class="carousel-item" href="#two!">
    <img src="<?php echo get_theme_file_uri()."/assets/images/slide4.jpg";?>"/>
      <h2>Auditing </h2>
      <p class="white-text">Strong and safe</p>
  </div>
 
  <div class="carousel-item" href="#four!">
    <img src="<?php echo get_theme_file_uri()."/assets/images/banner41.jpg";?>"/>
      <h2>Labs  </h2>
      <p class="white-text">Extensive inventories to serve all your needs</p>
  </div>
  <div class="carousel-item" href="#four!">
    <img src="<?php echo get_theme_file_uri()."/assets/images/banner1.jpg";?>"/>
      <h2>Consultancy  </h2>
      <p class="white-text">Strong and safe</p>
  </div>
</div>


<div class="section col s12" >

  <!--   Icon Section   -->
  <div class="row">
    <?php
		// Get each of our panels and show the post data.
		if ( 0 !== techmoon_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in TechMoon.
			 *
			 * @since TechMoon 1.0
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'techmoon_front_page_sections', 4 );
			global $techmooncounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$techmooncounter = $i;
				techmoon_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== techmoon_panel_count() ) ends here. ?>
   
  </div>

</div>

<p class="mytheory col s12 z-depth-4" data-aos="flip-up">
  AUTHORIZED AUDITS IN
  <span>
    ISO 9001, ISO 14001, ISO 25000, ISO 45001

  </span>
  WE ARE PROVIDING TRAINING FOR FOOD SAFETY
</p>



<!--<div class="col s12 l6  broucherbox z-depth-1 " data-aos="fade-down-right">

  <div class=" brouchertypecategory">
    <div class="top">
      <span class="search">
       Leading Products
      </span>
     
    </div>
    <ul class="middle">
      <?php
$args = [
    'taxonomy'     => 'category',
    'parent'        => 382,
    'hide_empty'    => true           
];
$categories = get_terms( $args );
foreach($categories as $category) { 
    echo ' <li tabindex="0"> <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li>';  
}
?>

     
    </ul>
    <div class="bottom"></div>
    <div class="menu-back"></div>
    <div class="glass-reflection"></div>
  </div>
</div>-->
<!--<div class="col s10 l4  offset-s1 offset-l1"  data-aos="fade-down-left">

  <h4 class="Brands ">
     Our Brands</h4>

  <div class="carousel ports">
    <a class="carousel-item" href="#one!">
      <img src="<?php echo get_theme_file_uri()."/assets/images/Danfoss1.png";?>"/>
    </a>
   
    <a class="carousel-item" href="#three!">
      <img src="<?php echo get_theme_file_uri()."/assets/images/1032401v2v.bmp";?>"/>
    </a>
    <a class="carousel-item" href="#four!">
      <img src="<?php echo get_theme_file_uri()."/assets/images/belzona_logo.png";?>"/>
    </a>
    <a class="carousel-item" href="#five!">
      <img src="<?php echo get_theme_file_uri()."/assets/images/Vintex-Fire-logo.jpg";?>"/>
    </a>
    <a class="carousel-item" href="#six!">
      <img src="<?php echo get_theme_file_uri()."/assets/images/Slider.jpg";?>"/>
    </a>
    
  </div>


</div>-->






<div id="primary" class="content-area col s12  no-padding ">
	<main id="main" class="site-main" role="main">
    
	</main>
</div>
<?php get_footer();
?>