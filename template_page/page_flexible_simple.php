<?php
/*
Template Name: Page-Flexible simple
*/
get_header(); ?>

<?php if( have_rows('ws') ){
	$wmns_flax_counter = 0;
	while( have_rows('ws') ){
		the_row();
		get_template_part('template_part/template_php/'.get_row_layout(), null, array( 'wmns_flax_counter'=>$wmns_flax_counter++ ) );
	}
}else{
	echo '<section class="ah_page">
			<div class="container">
				<h1 style="text-align:center;">'.__('This page does not contain flexible blocks!', 'ws').'</h1>
			</div>
		  </section>';
} ?>

<?php get_footer() ?>
