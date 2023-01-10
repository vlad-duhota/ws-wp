<?php
/**
 * Main theme functions file
 *
 * @package base
 */

define( 'ah_assets_http_path', esc_url( get_template_directory_uri() . '/assets/' ) );
define( 'ah_fs_path',         __DIR__ );

// OPTIMIZATION
include( ah_fs_path . '/inc/functions_optimization.php' );
// Disable actions in core
include( ah_fs_path . '/inc/functions_disables.php' );
// Default settings
include( ah_fs_path . '/inc/default.php' );
// Custom Post Types
include( ah_fs_path . '/inc/cpt.php' );
// Theme functions
include( ah_fs_path . '/inc/functions_theme.php' );
// Custom Menu Walker
include( ah_fs_path . '/inc/classes.php' );
// Theme thumbnails
include( ah_fs_path . '/inc/thumbnails.php' );
// Theme menus
include( ah_fs_path . '/inc/menus.php' );
// Theme css & js
include( ah_fs_path . '/inc/scripts.php' );
// Theme JAX
include( ah_fs_path . '/inc/ajax.php' );
// WIDGET functions
//include( ah_fs_path . '/widget/widget_function.php' );


// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

	if ( $item->current ) {
		$class = 'menu-link--active';
		$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
	}

	return $atts;
}