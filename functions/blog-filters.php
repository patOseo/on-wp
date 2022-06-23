<?php 

add_action('wp_ajax_opennorth_filter', 'opennorth_filter'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_opennorth_filter', 'opennorth_filter');

//Protect against arbitrary paged values
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

function opennorth_filter(){
	$args = array(
		'post_status' => 'publish',
		'posts_per_page' => 2,
		'paged' => $paged
	);
 
	// for taxonomies / categories
	if( isset( $_POST['blog_category'] ) && !empty($_POST['blog_category'])  ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['blog_category']
			)
		);
	}
 
 	
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['blog_type'] ) && !empty($_POST['blog_type']) ) {
		$args['meta_query'] = array(
			array(
				'key' => 'blog_type',
				'value' => $_POST['blog_type'],
				'compare' => '='
			)
		);
	}
	
 
	$query = new WP_Query( $args );

	$total = $query->max_num_pages;
	
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			get_template_part( 'loop-templates/content', get_post_format() );
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found. Try some different filters.';
	endif; ?>

	<div class="mt-4 text-center w-100">
		<?php 
			$big = 99999999;
			// Fallback if there is not base set.
			$fallback_base = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
			// Set the base.
			$base = isset( $_POST[ 'base' ] ) ? trailingslashit( $_POST[ 'base' ] ) . '%_%' : $fallback_base;
			
			understrap_pagination([
				'base' 			=> $base,
				'show_all'     	=> false,
				'format'	   	=> '?paged=%#%',
				'current' 		=> max( 1, get_query_var('paged') ),
				'total'        	=> $query->max_num_pages,
			], 'pagination justify-content-center');
    	?>
    </div>
	
	<?php die();
}