<?php

$show_posts = get_field('show_posts');
$limit = get_field('limit');

$args = array(
	'post_type' => 'jobs',
	'status' => 'published',
);

// if($show_posts != 1) {
// 	$args[] = array(
// 		'posts_per_page' => $limit;
// 	);
// }

$jobs = new WP_Query($args);

if($jobs->have_posts()): ?>

<div class="all-jobs">

<?php while($jobs->have_posts()): $jobs->the_post(); ?>

	<div class="job mt-5 border-bottom">
		<p class="job-title pb-5 mb-0"><a class="link-primary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
	</div>

<?php endwhile; ?>

</div>

<?php endif;