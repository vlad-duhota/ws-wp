<?php
function base_scripts_styles() {
    $version   = 1;
    $in_footer = true;

    // styles
    wp_enqueue_style('main style',             ah_assets_http_path.'css/style.css',              [] );
    wp_enqueue_style('theme',             get_stylesheet_uri(),                             [] );

    // scripts
    wp_deregister_script( 'jquery' );
    // wp_enqueue_script('jquery',           ah_assets_http_path.'js/jquery-3.6.0.min.js',     [], $version, $in_footer );
    wp_enqueue_script('main script',             ah_assets_http_path.'js/main.js',                 [], $version, $in_footer );

    // google api key
    wp_enqueue_script('google',           'https://maps.googleapis.com/maps/api/js?key='.get_field('google_api_key', 'option').'&libraries=places&language=en', [], '', $in_footer );
}
add_action( 'wp_enqueue_scripts', 'base_scripts_styles' );