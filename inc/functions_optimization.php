<?php

/*
 * DISPLAY styles by name
 */
function ah_css_block( $css_name='' ){
    $path = ah_fs_path . '/assets/css/'.$css_name.'.css';
    if( file_exists( $path ) ){
        static $arr_css_names = array();
        if( !in_array( $css_name, $arr_css_names ) ){
            $arr_css_names[] = $css_name;
            $handle   = fopen( $path, 'r' );
            $contents = fread( $handle, filesize( $path ) );
            fclose( $handle );
            return chr( 10 ) . '<style id="' . $css_name . '">' . $contents . '</style>' . chr( 10 );
            return $path;
        } else {
            return '';
        }
    }
}



/*
 * print all css for site
 */
function the_css_blocks(){
//    echo ah_css_block('header');

    if( have_rows('ws') ){
        while( have_rows('ws') ){
            the_row();
            echo ah_css_block( get_row_layout() );
        }
    }
    
//    echo ah_css_block('footer');
}

