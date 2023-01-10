<?php

// Locations
// add_action( 'init', 'register_post_types' );
// function register_post_types() {
//     register_post_type('location', [
//         'labels' => [
//         'name'               => 'Locations',
//         'singular_name'      => 'Location',
//         'add_new'            => 'Add location',
//         'add_new_item'       => 'Adding a new location',
//         'edit_item'          => 'Editing location',
//         'new_item'           => 'New location',
//         'view_item'          => 'View location',
//         'search_items'       => 'Find location',
//         'not_found'          => 'Not find',
//         'not_found_in_trash' => 'Not find in the cart',
//         'menu_name'          => 'Locations',
//         ],
//         'menu_icon'          => 'dashicons-location',
//         'public'             => true,
//         'menu_position'      => 5,
//         'supports'           => ['title', 'thumbnail', 'page-attributes'],
//         'has_archive'        => true,
//         'rewrite'            => ['slug' => 'locations'],
//         'numberposts'        => -1
//     ] );

//     // Offers category
//     register_taxonomy('location-categories', 'location', [
//         'labels'        => [
//             'name'                        => 'Location сategories',
//             'singular_name'               => 'Location category',
//             'search_items'                => 'Search category',
//             'popular_items'               => 'Famous categories',
//             'all_items'                   => 'All categories',
//             'edit_item'                   => 'Change category',
//             'update_item'                 => 'Update category',
//             'add_new_item'                => 'Add new category',
//             'new_item_name'               => 'New category name',
//             'separate_items_with_commas'  => 'Separate categories with commas',
//             'add_or_remove_items'         => 'Add or remove category',
//             'choose_from_most_used'       => 'Choose from most used',
//             'menu_name'                   => 'Categories',
//         ],
//         'hierarchical'  => true,
//     ]);
// }