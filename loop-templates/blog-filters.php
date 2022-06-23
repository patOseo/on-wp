<?php 

add_action('wp_ajax_opennorth_filter', 'opennorth_filter'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_opennorth_filter', 'opennorth_filter');

function opennorth_filter(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> 'DESC' // ASC or DESC
	);
 
	// for taxonomies / categories
	if( isset( $_POST['blog_category'] ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $_POST['blog_category']
			)
		);
	}
 
 	/*
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' ) {
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
	}
	*/
 
	$query = new WP_Query( $args );
	
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			echo '<h2>' . $query->post->post_title . '</h2>';
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found. Try some different filters.';
	endif;
	
	die();
}