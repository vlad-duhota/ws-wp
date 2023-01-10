<?php

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 );          //remove dns-prefetch
remove_action('wp_head', 'wp_generator');                   //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link');               //remove wlwmanifest
remove_action('wp_head', 'rsd_link');                       //remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');       //remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical');                  //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10);       //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links');  //remove alternate

//===Disable embeds on init===
add_action('init', function(){
    remove_action('wp_head',             'wp_oembed_add_discovery_links');
    remove_action('wp_head',             'wp_oembed_add_host_js');
    remove_action('wp_head',             'wp_generator');
}, PHP_INT_MAX - 1);


//=== DISABLE GUTENBERG STYLE IN HEADER ===
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );

//===disable color sheme==
remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');

/*
 * Disable gutenberg for front page
 */
function disable_content_editor()
{
    if (isset($_GET['post'])) {
        $post_ID = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
    }
    if (!isset($post_ID) || empty($post_ID)) {
        return;
    }
    $page_template = get_post_meta($post_ID, '_wp_page_template', true);
    if ( $page_template == 'template_page/page_flexible_simple.php' ) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'disable_content_editor');
?>