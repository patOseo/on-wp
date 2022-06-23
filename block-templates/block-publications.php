<?php 

$number = get_field('number_of_pubs');

$pub_args = array(
	'post_status' => 'publish',
	'post_type' => 'publications',
	'posts_per_page' => $number,
	'orderby' => 'date',
	'order' => 'DESC'
);

$pubs = new WP_Query($pub_args);

if($pubs->have_posts()):

	echo '<div class="row">';

	while($pubs->have_posts()): $pubs->the_post();

		get_template_part( 'loop-templates/content', 'publications' );

	endwhile;

	echo '</div>';

endif;