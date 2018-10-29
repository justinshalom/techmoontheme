<?php
/* INCLUDE CLASSES DEBUG, CONFIG AND CORE */
require_once( get_template_directory() . '/lib/techmoon.cfg.class.php' );
require_once( get_template_directory() . '/lib/techmoon.core.class.php' );


/* INCLUDE INPUT / OUTPUT */
require_once( get_template_directory() . '/lib/techmoon.tools.class.php' );

/* INCLUDE CONFIGS */
require_once( get_template_directory() . '/cfg/main.php' );

if( is_admin() ){

	/* INCLUDE RESOURCES */
	require_once( get_template_directory() . '/lib/techmoon.admin.class.php' );
}

require_once( get_template_directory() . '/lib/techmoon.setup.class.php' );
require_once( get_template_directory() . '/lib/techmoon.post.class.php' );
require_once( get_template_directory() . '/lib/techmoon.scripts.class.php' );

require_once( get_template_directory() . '/lib/techmoon.gallery.class.php' );

require_once( get_template_directory() . '/lib/techmoon.layouts.class.php' );
require_once( get_template_directory() . '/lib/techmoon.header.class.php' );
require_once( get_template_directory() . '/lib/techmoon.breadcrumbs.class.php' );
require_once( get_template_directory() . '/lib/techmoon.comments.class.php' );

?>
