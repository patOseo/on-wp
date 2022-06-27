<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
if(lang_en()) { $pid = 25; } elseif(lang_fr()) { $pid = 137; }

$args = array(
	'post_status' => 'publish',
	'post_type' => 'post',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => 10,
	'paged' => get_query_var('paged')
);

if(isset($_GET['blog_type']) && $_GET['blog_type']) {
	$blogtype = $_GET['blog_type'];

	$args['meta_query'][] = array(
		'key' => 'blog_type',
		'value' => $blogtype,
		'compare' => '=',
	);
}

if(isset($_GET['blog_category']) && $_GET['blog_category']) {
	$get_cat = $_GET['blog_category'];

	$args['tax_query'][] = array(
		'taxonomy' => 'category',
		'field' => 'slug',
		'terms' => $get_cat,
		'paged' => $paged,
	);
}

$query = new WP_Query($args);

?>

<div class="page-header py-5">
	<div class="container py-5">
		<div class="row pb-5 align-items-center">
			<div class="col-md-6 px-5 text-end text-center text-lg-end order-2 order-lg-1">
				<h1 class="my-5"><?php if(lang_en()) { echo "Blog"; } elseif(lang_fr()) { echo "Blogue"; } ?></h1>
				<p><?php the_field('header_text', $pid); ?></p>
			</div>
			<div class="col-md-6 px-5 order-1 order-lg-2">
				<?php echo wp_get_attachment_image(get_field('header_image', $pid), 'full'); ?>
			</div>
		</div>

		
		<div class="blog-filters-block p-4" id="blogfilter">
			<form action="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>/#blogfilter" method="GET" id="blogfilter">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="blogtype">Show:</label>
							<select class="form-select filterfield" name="blog_type" id="blogtype" onchange="this.form.submit()">
								<option value="" selected>All</option>
								<option <?php if(isset($blogtype) && $blogtype == "blog") { echo "selected"; } ?> value="blog">Blogs</option>
								<option <?php if(isset($blogtype) && $blogtype == "announcement") { echo "selected"; } ?> value="announcement">Announcements</option>
								<option <?php if(isset($blogtype) && $blogtype == "news") { echo "selected"; } ?> value="news">News</option>
								<option <?php if(isset($blogtype) && $blogtype == "webinar") { echo "selected"; } ?> value="webinar">Webinars</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="blogcategory">In Category:</label>
							<select class="form-select filterfield" name="blog_category" id="blogcategory" onchange="this.form.submit()">
								<option value="">All</option>
								<?php $blogcats = get_categories(); ?>
								<?php foreach($blogcats as $blogcat): ?>
									<option <?php if(isset($get_cat) && $get_cat == $blogcat->slug) { echo "selected"; } ?> value="<?php echo $blogcat->slug; ?>"><?php echo $blogcat->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<!-- <input type="hidden" name="action" value="opennorth_filter">
				<input type="hidden" name="base" value="<?php echo $base; ?>"/> -->
			</form>
		</div>
		

	</div>	
</div>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="content-loop mb-5">
			<div class="row" id="response">
	
					<?php
					if ( $query->have_posts() ) {
						// Start the Loop.
						while ( $query->have_posts() ) {
							$query->the_post();
	
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', get_post_format() );
						} wp_reset_postdata();
					} else { ?>

						<div class="col-12">
							<div class="shadowbox position-relative blog-box bg-light">
								<p><?php printf('<p>%s<p>', esc_html__( 'There are no blog posts that match your search criteria. Please try again with different filters.', 'understrap' )); ?></p>
							</div>
						</div>
						
					<?php } ?>
	
				<!-- The pagination component -->
				<?php 

				// understrap_pagination();
				
					$big = 99999999;
					understrap_pagination([
						'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'show_all'     	=> false,
						'format'	   	=> '?paged=%#%',
						'current' 		=> max( 1, get_query_var('paged') ),
						'total'        	=> $query->max_num_pages,
					], 'pagination');
    			?>
	
			</div><!-- .row -->
		</div>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
