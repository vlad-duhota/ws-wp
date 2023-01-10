<?php


//===OPEN SIMPLE PAGE AJAX===
add_action('wp_ajax_openAJAX',        'openAJAX');
add_action('wp_ajax_nopriv_openAJAX', 'openAJAX');
function openAJAX(){
	$_POST['object_id']   = (int)( $_POST['object_id']   ?? 0 );
	$_POST['data_object'] = $_POST['data_object'] ?? '';

    if( get_page_template_slug( $_POST['object_id'] ) == 'template_page/page_flexible_simple.php' ){
        get_template_part('template_part/template_php/ajax_acf_list', '', array( 'object_id'=>$_POST['object_id'], 'data_object'=>$_POST['data_object'] ) );
    } else {
        if( in_array( $_POST['data_object'], array( 'test', 'service', 'location' ) ) ){
            get_template_part('template_part/template_php/ajax_acf_list', '', array( 'object_id'=>$_POST['object_id'], 'data_object'=>$_POST['data_object'] ) );
        } else {
            ?>
            <section class="container jy_page">
                <?php
                echo '<h1>' . get_the_title( $_POST['object_id'] ) . '</h1>';
                echo get_the_content( '', '', $_POST['object_id'] );
                ?>
            </section>
            <?php
        }
    }

	/*$post = get_post($_POST['pageid']);
	echo apply_filters( 'the_content', $post->post_content );*/

	die();
}
