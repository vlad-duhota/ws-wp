<?php
if ( have_rows( 'ah', $args['object_id'] ) ) {
    $wmns_flax_counter = 0;
    while( have_rows( 'ah', $args['object_id'] ) ){
        the_row();
        get_template_part('template_part/template_php/' . get_row_layout(), null, array('wmns_flax_counter' => $wmns_flax_counter++));
    }
} else {
    echo '<h1>' . __('This page does not contain flexible blocks!', 'joocy') . '</h1>';
}
?>