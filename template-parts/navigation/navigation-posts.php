<div class="col s12 postsnavigationpanel" >

<?php
		$navigation = '';
 
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        $args = wp_parse_args( [], array(
            'prev_text'          => __( 'Next' ),
            'next_text'          => __( 'Previos' ),
            'screen_reader_text' => __( 'Posts navigation' ),
        ) );
 
        $next_link = get_previous_posts_link( $args['next_text'] );
        $prev_link = get_next_posts_link( $args['prev_text'] );
 $next_link=str_replace("<a",'<a class="btn waves-effect waves-light btn-small navnextbutton light-blue accent-4" ',$next_link);
 $next_link=str_replace(" >",' ><i class="material-icons left">keyboard_arrow_left</i> ',$next_link);

 $prev_link=str_replace("<a",'<a class="btn waves-effect waves-light btn-small light-blue accent-4" ',$prev_link);
 $prev_link=str_replace(" >",' ><i class="material-icons right">keyboard_arrow_right</i> ',$prev_link);


        if ( $prev_link ) {
            $navigation .= '<div class="nav-previous right">' . $prev_link . '</div>';
        }
 
        if ( $next_link ) {
            $navigation .= '<div class="nav-next left">' . $next_link . '</div>';
        }
 
        /*$navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );*/
    }
 
    echo $navigation;
      
?>
</div>