<?php
if( !class_exists( 'techmoon_gallery' ) ){

class techmoon_gallery
{
	static function shortcode( $rett, $_attr )
	{
		global $post;

        $attr = shortcode_atts( array(
            'order'                 => 'ASC',
            'orderby'               => 'menu_order ID',
            'id'                    => $post -> ID,
            'ids'                   => '',
            'itemtag'               => 'dl',
            'icontag'               => 'dt',
            'captiontag'            => 'dd',
            'columns'               => 3,
            'size'                  => 'thumbnail',
            'include'               => '',
            'exclude'               => '',
            'techmoon_style'    	=> 'none'
        ) , $_attr );

        /* NO MYTHEM.ES SHORTCODE EMBED */
        if( isset( $attr[ 'techmoon_style' ] ) && $attr[ 'techmoon_style' ] == 'none' ){
            return $rett;
        }


        $cols = $attr[ 'columns' ];
        $ids = array();

        if( empty( $attr[ 'ids' ] ) ){

            $id         = intval( $attr[ 'id' ] );
            $orderby    = $attr[ 'order' ];
            $order      = $attr[ 'order' ];
            $includes   = $attr[ 'include' ];
            $exclude    = $attr[ 'exclude' ];

            if ( 'RAND' == $attr[ 'order' ] ) {
                $orderby = 'none';
            }

            if ( !empty( $includes ) ) {
                $attachments = get_posts( array('include' => $includes, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } elseif ( !empty( $exclude ) ) {
                $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } else {
                $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
            }

            foreach ( $attachments as $key => $val ) {
                $ids[ ] = $val -> ID ;
            }
        }else{
            $ids = explode( ',' , $attr[ 'ids' ] );
        }

        $rett  = '<div class="techmoon-gallery colls-' . $cols . '">';

        foreach( $ids as $id ){

            $p = get_post( $id );

            if( !isset( $p -> ID ) ){
            	continue;
            }

            $media = wp_get_attachment_image_src( $id , 'large' );
            $full = wp_get_attachment_image_src( $id , 'full' );

            $rett .= '<figure class="techmoon-item ' . $attr[ 'techmoon_style' ] . '">';
            $rett .= '<div>';
            $rett .= '<div class="techmoon-thumbnail">';
            $rett .= '<img src="' . $media[ 0 ] . '" alt="' . techmoon_post::title( $p -> ID, true ) . '"/>';
            $rett .= '<figcaption>';
            $rett .= '<div class="techmoon-text">';

            if( !empty( $p -> post_title ) ){
                $rett .= '<div class="techmoon-title">';
                $rett .= '<h2>' . techmoon_post::title( $p -> ID ) . '</h2>';
                $rett .= '</div>';
            }

            $excerpt = strip_tags( $p -> post_excerpt );

            if( !empty( $excerpt ) ){
                $rett .= '<div class="techmoon-caption">';
                $rett .= '<p>' . esc_html( strip_tags( $p -> post_excerpt ) ) . '</p>';
                $rett .= '</div>';
            }

            $rett .= '</div>';
            $rett .= '<a href="' . $full[ 0 ] . '" data-gal="prettyPhoto[pp_gal]" title="' . $excerpt . '" class="waves-effect waves-dark"></a>';
            $rett .= '</figcaption>';
            $rett .= '</div>';
            $rett .= '</div>';
            $rett .= '</figure>';
        }

        $rett .= '<div class="clearfix clear"></div>';
        $rett .= '</div>';

        return $rett;
	}

	static function admin_init()
	{
		add_action( 'wp_enqueue_media', array( 'techmoon_gallery' , 'admin_media' ));
		add_action( 'print_media_templates', array( 'techmoon_gallery' , 'admin_settings' ));
	}

	static function admin_media()
	{
		if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
                return;

		wp_enqueue_script( 'techmoon-gallery-settings',  get_template_directory_uri() . '/media/_backend/js/gallery.js', array( 'media-views' ) );
	}

	static function admin_settings()
	{
        if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
            return;
        ?>
        <script type="text/html" id="tmpl-techmoon-gallery-settings">
            <label class="techmoon-gallery-settings">
                <span>myThem.es Style</span>
                <select class="techmoon_style" name="techmoon_style" data-setting="techmoon_style">
                <?php
                    $techmoon_style = array(
                        'none'              => __( 'None', 'materialize' ),
                        'effect-bubba'    	=> __( 'Effect Bubba', 'materialize' )
                    );

                    foreach ( $techmoon_style as $value => $name ) { ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, 'none' ); ?>>
                            <?php echo esc_html( $name ); ?>
                        </option>
                <?php } ?>
                </select>
            </label>
        </script>
        <?php
	}
}

}   /* END IF CLASS EXISTS */
?>
