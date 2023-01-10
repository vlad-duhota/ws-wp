<?php

//===Menu Walker Top Menu===
class AH_HeaderMenu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '<div class="ah_main_menu_sub">
                        <ul class="ah_main_menu_sub_ul">';
	}
	
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .=      '</ul>
                    </div>';
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = [];
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if( in_array('current_page_item', $classes ) ){
            $class_names[] = 'active';
        }

        if(  $depth == 0 ){
            $classes[] = 'ah_main_menu_inner_li_0';
        }

        if(  $depth == 0 && in_array('menu-item-has-children', $classes ) ){
            $classes[] = 'ah_main_menu_inner_box';
        }

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="'.esc_attr( $class_names ).'"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' :'';

		$output .= $indent . '<li ' . $id . $class_names . '>';

		$attributes  = !empty( $item->attr_title ) ?' title  ="'.esc_attr( $item->attr_title ).'"' : '';
		$attributes .= !empty( $item->target )     ?' target ="'.esc_attr( $item->target     ).'"' : '';
		$attributes .= !empty( $item->xfn )        ?' rel    ="'.esc_attr( $item->xfn        ).'"' : '';
		$attributes .= !empty( $item->url )        ?' href   ="'.esc_attr( $item->url        ).'"' : '';
		
		$aclas = [];
		if( in_array('menu-item-has-children', $classes ) ){
			$aclas[] = 'ah_main_menu_has_sub';
		}

        $a_add_title = '';
        if( in_array('menu-item-has-children', $classes ) ){
            $a_add_title = '<svg class="jy_main_menu_inner_svg" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M1 1L5 5L9 1" stroke="#2B3968" stroke-opacity="0.6"></path>
                            </svg>';
        }
		//print_r($classes);
		$item_output  = @$args->before;
		$item_output .= '<a '.$attributes.' class="'.implode(' ', $aclas ).' ' . ( in_array(  'openAJAX', $classes ) ?'openAJAX' :'' ) . '" data-object_id="' . $item->object_id . '" data-object="' . $item->object . '">';
		$item_output .= @$args->link_before . apply_filters( 'the_title', @$item->title, $item->ID ) . $a_add_title . @$args->link_after;
		$item_output .= '</a>';
		$item_output .= @$args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= '</li>';
	}
}


//===Menu Walker Right Menu===
class AH_RightMenu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if( $depth == 0 ){
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $classes = empty( $item->classes ) ?array() :(array)$item->classes;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="'.esc_attr( $class_names ).'"';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' :'';

            $output .= $indent . '<li ' . $id . $class_names . '>';

            $attributes  = !empty( $item->attr_title ) ?' title  ="'.esc_attr( $item->attr_title ).'"' : '';
            $attributes .= !empty( $item->target )     ?' target ="'.esc_attr( $item->target     ).'"' : '';
            $attributes .= !empty( $item->xfn )        ?' rel    ="'.esc_attr( $item->xfn        ).'"' : '';
            $attributes .= !empty( $item->url )        ?' href   ="'.esc_attr( $item->url        ).'"' : '';

            $item_output  = @$args->before;
            $item_output .= '<a '.$attributes.' class="ah_right_menu_inner_a">';
            $item_output .= @$args->link_before . get_field( 'svg_content', @$item->ID ) . @$args->link_after;
            $item_output .= '</a>';
            $item_output .= @$args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if( $depth == 0 ) {
            $output .= '</li>';
        }
    }
}


//===Menu Walker Mobyle Menu===
class AH_MobyleMenu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<ul class="ah_header_mobmenu_sub">';
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</ul>';
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="'.esc_attr( $class_names ).'"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' :'';

        $output .= $indent . '<li ' . $id . $class_names . '>';

        $a_add_title = '';
        $a_add_class = '';
        if( in_array('menu-item-has-children', $classes ) ){
            $a_add_title = '+';
            $a_add_class = 'ah_header_mobmenu_sub_opener';
        }

        $attributes  = !empty( $item->attr_title ) ?' title  ="'.esc_attr( $item->attr_title ).'"' : '';
        $attributes .= !empty( $item->target )     ?' target ="'.esc_attr( $item->target     ).'"' : '';
        $attributes .= !empty( $item->xfn )        ?' rel    ="'.esc_attr( $item->xfn        ).'"' : '';
        $attributes .= !empty( $item->url )        ?' href   ="'.esc_attr( $item->url        ).'"' : '';
        $attributes .= $depth == 0 && in_array('menu-item-has-children', $classes ) ?' onclick="return false;"'  : '';

        $item_output  = @$args->before;
        $item_output .= '<a '.$attributes.' class="' . ( in_array(  'openAJAX', $classes ) ?'openAJAX' :'' ) . $a_add_class . '" data-object_id="' . $item->object_id . '" data-object="' . $item->object . '">';
        $item_output .= @$args->link_before;
        $item_output .= '<div class="ah_header_mobmenu_ico">' . get_field( 'svg_content', @$item->ID ) . '</div>';
        $item_output .= apply_filters( 'the_title', @$item->title, $item->ID ) . $a_add_title;
        $item_output .= @$args->link_after;
        $item_output .= '</a>';
        $item_output .= @$args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}



//===Menu Walker Mobyle Menu===
class AH_FooterContactMenu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = [];
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="'.esc_attr( $class_names ).'"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' :'';

        $output .= $indent . '<li ' . $id . $class_names . '>';

        $attributes  = !empty( $item->attr_title ) ?' title  ="'.esc_attr( $item->attr_title ).'"' : '';
        $attributes .= !empty( $item->target )     ?' target ="'.esc_attr( $item->target     ).'"' : '';
        $attributes .= !empty( $item->xfn )        ?' rel    ="'.esc_attr( $item->xfn        ).'"' : '';
        $attributes .= !empty( $item->url )        ?' href   ="'.esc_attr( $item->url        ).'"' : '';

        $item_output  = @$args->before;
        $item_output .= '<a '.$attributes.'>';
        $item_output .= @$args->link_before;
        $item_output .= get_field( 'svg_content', @$item->ID );
        $item_output .= apply_filters( 'the_title', @$item->title, $item->ID );
        $item_output .= @$args->link_after;
        $item_output .= '</a>';
        $item_output .= @$args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}

/*
 * Menu Walker SOCIAL Menu
 */
class AH_FooterSocialMenu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = [];
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="'.esc_attr( $class_names ).'"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' :'';

        $output .= $indent . '<li ' . $id . $class_names . '>';

        $attributes  = !empty( $item->attr_title ) ?' title  ="'.esc_attr( $item->attr_title ).'"' : '';
        $attributes .= !empty( $item->target )     ?' target ="'.esc_attr( $item->target     ).'"' : '';
        $attributes .= !empty( $item->xfn )        ?' rel    ="'.esc_attr( $item->xfn        ).'"' : '';
        $attributes .= !empty( $item->url )        ?' href   ="'.esc_attr( $item->url        ).'"' : '';

        $item_output  = @$args->before;
        $item_output .= '<a '.$attributes.'>';
        $item_output .= @$args->link_before;
        $item_output .= get_field( 'svg_content', @$item->ID );
        $item_output .= @$args->link_after;
        $item_output .= '</a>';
        $item_output .= @$args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}

/*
 * Menu Walker SOCIAL Menu
 */
class AH_FooterDrips extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {

    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = [];
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="'.esc_attr( $class_names ).'"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' :'';

        $output .= $indent . '<li ' . $id . $class_names . '>';

        $attributes  = !empty( $item->attr_title ) ?' title  ="'.esc_attr( $item->attr_title ).'"' : '';
        $attributes .= !empty( $item->target )     ?' target ="'.esc_attr( $item->target     ).'"' : '';
        $attributes .= !empty( $item->xfn )        ?' rel    ="'.esc_attr( $item->xfn        ).'"' : '';
        $attributes .= !empty( $item->url )        ?' href   ="'.esc_attr( $item->url        ).'"' : '';

        $item_output  = @$args->before;
        $item_output .= '<a '.$attributes.'>';
        $item_output .= @$args->link_before;
        $item_output .= get_field( 'svg_content', @$item->ID );
        $item_output .= @$args->link_after;
        $item_output .= '</a>';
        $item_output .= @$args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}