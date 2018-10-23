<?php
/**
 * Template for displaying search forms in TechMoon
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form col s12 input-field " action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
	
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field col s8"  value="<?php echo get_search_query(); ?>" name="s" />
	<label for="<?php echo $unique_id; ?>">Search</label>
	<button type="submit" class="search-submit waves-effect waves-light btn  btn-small "><i class="material-icons ">search</i><span>Search</span></button>
</form>
