<?php


//===Theme main front menus===
register_nav_menus( array(
    'HeadMenu'           => __( 'Header Menu',             	'ws' ),
    'FootContMenu'       => __( 'Footer Contact Menu',   	'ws' ),
) );


//===ACF options admin menu===
if( function_exists( 'acf_add_options_sub_page' ) ) {
	acf_add_options_page( array(
		'title'  => __('Site options', 'ws'),
		'parent' => 'themes.php',
	) );
}