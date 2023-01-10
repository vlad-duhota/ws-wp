<?php

function the_scroll_to_block_js( $this_id, $scroll_to ){
	if( $scroll_to ){ ?>
		<script>
			/* OneBlockScroll */
			document.addEventListener('DOMContentLoaded', function () {
				var this_block = document.getElementById('<?php echo $this_id ?>');
				var new_block  = document.getElementById('<?php echo $scroll_to ?>');
				this_block.addEventListener( 'wheel', function (e){
					if( e.deltaY > 0 ){
						if( new_block != null ){
							window.scroll({
								top:      new_block.offsetTop,
								left:     0,
								behavior: 'smooth',
							});
						}
					}
				});
			});
			/* // OneBlockScroll */
		</script><?php
	}
}


/*
 * SCF-pro add API GOOGLE KEY
 */
function my_acf_init() {
    acf_update_setting('google_api_key', get_field('google_api_key', 'option') );
}
add_action('acf/init', 'my_acf_init');

function siteDefPaging( \WP_Query $wp_query=null, $echo=true, $params=[] ){
    if ( null === $wp_query ) {
        global $wp_query;
    }
    $add_args = [];
    $pages = paginate_links( array_merge( [
            'ws'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '<span class="arr">&larr;</span> <span>Prev</span>' , 'ws'),
            'next_text'    => __( '<span>Next</span> <span class="arr">&rarr;</span>' , 'ws'),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );

    if( is_array( $pages ) ) {
        $pagination = '<ul class="ah_pagination">';
        foreach ( $pages as $page ) {
            $pagination .= '<li class="ah_page' . ( strpos( $page, 'current') !== false ? ' ah_active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page ) . '</li>';
        }
        $pagination .= '</ul>';
        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}
