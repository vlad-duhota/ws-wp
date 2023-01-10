<?php

//===LOCALIZATION THEME===
function theme_localization(){
	load_theme_textdomain('ws', get_template_directory() . '/language');
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'theme_localization' );


//===acf theme functions placeholders===
if( !class_exists( 'acf' ) && !is_admin() ) {
	function get_field_reference( $field_name, $post_id ) { return ''; }
	function get_field_objects( $post_id = false, $options = array() ) { return false; }
	function get_fields( $post_id = false ) { return false; }
	function get_field( $field_key, $post_id = false, $format_value = true )  { return false; }
	function get_field_object( $field_key, $post_id = false, $options = array() ) { return false; }
	function the_field( $field_name, $post_id = false ) {}
	function have_rows( $field_name, $post_id = false ) { return false; }
	function the_row() {}
	function reset_rows( $hard_reset = false ) {}
	function has_sub_field( $field_name, $post_id = false ) { return false; }
	function get_sub_field( $field_name ) { return false; }
	function the_sub_field( $field_name ) {}
	function get_sub_field_object( $child_name ) { return false;}
	function acf_get_child_field_from_parent_field( $child_name, $parent ) { return false; }
	function register_field_group( $array ) {}
	function get_row_layout() { return false; }
	function acf_form_head() {}
	function acf_form( $options = array() ) {}
	function update_field( $field_key, $value, $post_id = false ) { return false; }
	function delete_field( $field_name, $post_id ) {}
	function create_field( $field ) {}
	function reset_the_repeater_field() {}
	function the_repeater_field( $field_name, $post_id = false ) { return false; }
	function the_flexible_field( $field_name, $post_id = false ) { return false; }
	function acf_filter_post_id( $post_id ) { return $post_id; }
}


//===small margin admin tables forms===
add_action('admin_head', 'insert_header_wpse_51023');
function insert_header_wpse_51023(){
	echo'<style>
			.form-table td, .form-table th{/*admin user*/
				padding: 3px 10px 3px 0;
			}
			.qtranxs-lang-switch{
				cursor: pointer;
			}
			.qtranxs-lang-switch-wrap li.qtranxs-lang-switch.active, .qtranxs-lang-switch-wrap li.qtranxs-lang-switch.active:focus, .qtranxs-lang-switch-wrap li.qtranxs-lang-switch.active:hover {
				background-color: #ffffff;
			}
			.column-ft_img svg{
				max-width: 100px;
				max-height: 100px;
			}
			.multi-language-field{/*QTRANSLATE*/
				margin-top: -20px;
			}
		</style>';
}


// include the menu etc
add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-logo' );
}


// include woocommerce
// if ( class_exists( 'WooCommerce' ) ) {
//     require_once( get_template_directory() . '/wooc.php' );
// }