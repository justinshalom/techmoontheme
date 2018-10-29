<?php
if( !class_exists( 'techmoon_header' ) ){

class techmoon_header
{
	static function head()
	{
        get_template_part( 'templates/head' );
		get_template_part( 'templates/style' );
	}
}

}	/* END IF CLASS EXISTS */
?>