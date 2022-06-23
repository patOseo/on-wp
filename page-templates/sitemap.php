<?php
/**
 * Template Name: Sitemap
 *
 * Template to display a sitemap of all pages on the website, by content type.
 *
 * @package Understrap
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$args_posts = array(
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'post_type' => 'post',
);
$args_pages = array(
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'post_type' => 'page',
);
$args_pubs = array(
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'post_type' => 'publications',
);
$args_reports = array(
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'post_type' => 'reports',
);
$args_jobs = array(
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'post_type' => 'jobs',
);

$query_posts = new WP_Query($args_posts);
$query_pages = new WP_Query($args_pages);
$query_pubs = new WP_Query($args_pubs);
$query_reports = new WP_Query($args_reports);
$query_jobs = new WP_Query($args_jobs);

?>

<?php if(!is_front_page()): get_template_part( 'global-templates/hero-page' ); endif; ?>

<div class="wrapper py-0" id="full-width-page-wrapper">

	<div class="container px-0" id="content">



			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<div class="row py-5">
						<div class="col-md-6">
							<h2 class="mb-3"><?php if(lang_en()): ?>Blog Posts<?php elseif(lang_fr()): ?>Blogue<?php endif; ?></h2>
							<?php if($query_posts->have_posts()): ?>
								<ul class="mb-5">
								<?php while($query_posts->have_posts()): $query_posts->the_post(); ?>
									<li class="mb-2"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="col-md-6">
							<h2 class="mb-3">Pages</h2>
							<?php if($query_pages->have_posts()): ?>
								<ul class="mb-5">
								<?php while($query_pages->have_posts()): $query_pages->the_post(); ?>
									<li class="mb-2"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<h2 class="mb-3">Publications</h2>
							<?php if($query_pubs->have_posts()): ?>
								<ul class="mb-5">
								<?php while($query_pubs->have_posts()): $query_pubs->the_post(); ?>
									<li class="mb-2"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<h2 class="mb-3"><?php if(lang_en()): ?>Full Reports<?php elseif(lang_fr()): ?>Rapports<?php endif; ?></h2>
							<?php if($query_reports->have_posts()): ?>
								<ul class="mb-5">
								<?php while($query_reports->have_posts()): $query_reports->the_post(); ?>
									<li class="mb-2"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<h2 class="mb-3"><?php if(lang_en()): ?>Jobs<?php elseif(lang_fr()): ?>Carrières<?php endif; ?></h2>
							<?php if($query_jobs->have_posts()): ?>
								<ul class="mb-5">
								<?php while($query_jobs->have_posts()): $query_jobs->the_post(); ?>
									<li class="mb-2"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="col-md-4">
							
						</div>
						<div class="col-md-3">
							
						</div>
					</div>

				</main><!-- #main -->

			</div><!-- #primary -->



	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
