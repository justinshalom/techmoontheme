<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class("container-fluid"); ?>>









	<?php $navmenu= wp_nav_menu( array(
		'theme_location' => 'sidemenu',
		'menu_id'        => 'slide-out',
		'container'=>'ul',
		'menu_class'=>'sidenav',
		'echo'=>false
	) );
	$unique_id = esc_attr( uniqid( 'search-form-menu-' ) );

	$headmenu=' <li><div class="user-view">'.
      '<div class="background">'.
      '<div class="custom-header-media">'.
       get_custom_header_markup().
      '		</div>'.
      '      </div>'.
      
      get_custom_logo().
      '	  <a href="'.esc_url( home_url( '/' ) ).'" rel="home"><span class="white-text name">'. get_bloginfo( 'name' , 'display' ).'</span></a>'.
      '    </div></li><li>'.
      '<form role="search" method="get" class="search-form row " action="'. esc_url( home_url( '/' ) ).'">'.
      '<div class="col s8 "><div class="input-field"> <input type="search" id="'.$unique_id.'" class="search-field validate"  name="s" />'.
      '	<label for="'.$unique_id.'">Search</label></div></div><div class="col s4 ">'.
      '	<button type="submit" class="search-submit waves-effect waves-light btn   "><i class="material-icons ">search</i><span></span></button>'.
      '</div></form></li>';

	echo str_replace('class="sidenav">','class="sidenav">'.$headmenu,$navmenu);

	 ?>

  
   


<div class="verticalsidemenu animate slideOutLeft hidden">
<div class="col no-padding mobilemenuicon ">
	 <a href="#" data-target="slide-out" class="col s12 no-padding sidenav-trigger waves-effect waves-light"><i class="material-icons">menu</i></a>
	</div>
<div class="logobox">

<a href="" class="hidden"> 
<img class="logoimage hidden" src="<?php echo get_theme_file_uri()."/assets/images/icons8-ship-wheel-50.png";?>" />
<p class="LogoText">
<span>I</span>
<span>M</span>
<span>S</span>
</p>
</a>
</div>



  
 
</div>
<div class="row" id="topmenubar">
<div class="white col s12" role="navigation">
    <div class="nav-wrapper col s12">
	
	<div class="col sitenamebox">
	<div class="logoouterdiv">
	<div class="logoinnerdiv">
	<div class="logosquaretridiv">
	
	</div>
	<div class="logosalphaidiv">
	S
	</div>
	</div>
	</div>

     
	  
	  </div>
	  <div class="col fadeInLeft no-padding" id="headermainmenu">

	  <?php if ( has_nav_menu( 'top' ) ) : ?>
		
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				
		<?php endif; ?>


      
</div>
     
    </div>
  </div>  </div>

  
<div id="scroll-animate">
  <div id="scroll-animate-main">
    <div class="wrapper-parallax">
      <header>
        <h1> <a id="logo-container" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="brand-logo">
	  <img class="logoimage" src="<?php echo get_theme_file_uri()."/assets/images/logo.jpeg";?>" />
	  <?php bloginfo( 'name' ); ?></a></h1>
      </header>

      <section class="content">
       

<div class="verticalrightbox row site-content-contain ">

		<div id="content" class="site-content col s12">
		