<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
if(lang_en()) { $pid = 125; } elseif(lang_fr()) { $pid = 131; }

$args = array(
	'post_status' => 'publish',
	'post_type' => 'publications',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => 10,
	'paged' => get_query_var('paged')
);

if(isset($_GET['pub_type']) && $_GET['pub_type']) {
	$pubtype = $_GET['pub_type'];

	$args['meta_query'][] = array(
		'key' => 'pub_type',
		'value' => $pubtype,
		'compare' => '=',
	);
}

if(isset($_GET['pub_category']) && $_GET['pub_category']) {
	$get_cat = $_GET['pub_category'];

	$args['tax_query'][] = array(
		'taxonomy' => 'pub_categories',
		'field' => 'slug',
		'terms' => $get_cat,
		'paged' => $paged,
	);
}

$query = new WP_Query($args);
?>

<div class="page-header py-5">
	<div class="container">
		<div class="row pb-5 align-items-center">
			<div class="col-md-6 px-5 text-end text-center text-lg-end order-2 order-lg-1">
				<h1 class="my-5">Research Publications</h1>
				<p><?php the_field('header_text', $pid); ?></p>
			</div>
			<div class="col-md-6 px-5 order-1 order-lg-2">
				<?php echo wp_get_attachment_image(get_field('header_image', $pid), 'full'); ?>
			</div>
		</div>

		<div class="blog-filters-block p-4" id="pubfilter">
			<form action="<?php echo get_post_type_archive_link( 'publications' ); ?>/#pubfilter" method="GET" id="pubfilter">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="pubtype">Show:</label>
							<select class="form-select filterfield" name="pub_type" id="pubtype" onchange="this.form.submit()">
								<option value="" selected>All</option>
								<option <?php if(isset($pubtype) && $pubtype == "reports") { echo "selected"; } ?> value="reports">Reports</option>
								<option <?php if(isset($pubtype) && $pubtype == "whitepapers") { echo "selected"; } ?> value="whitepapers">White Papers</option>
								<option <?php if(isset($pubtype) && $pubtype == "researchbriefs") { echo "selected"; } ?> value="researchbriefs">Research Briefs</option>
								<option <?php if(isset($pubtype) && $pubtype == "casestudies") { echo "selected"; } ?> value="casestudies">Case Studies</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="blogcategory">In Category:</label>
							<select class="form-select filterfield" name="pub_category" id="pubcategory" onchange="this.form.submit()">
								<option value="">All</option>
								<?php $pubcats = get_categories(array('taxonomy' => 'pub_categories')); ?>
								<?php foreach($pubcats as $pubcat): ?>
									<option <?php if(isset($get_cat) && $get_cat == $pubcat->slug) { echo "selected"; } ?> value="<?php echo $pubcat->slug; ?>"><?php echo $pubcat->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>	
</div>


<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

				<?php
				if ( $query->have_posts() ) {
					?>
					<?php
					// Start the loop.
					while ( $query->have_posts() ) {
						$query->the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'publications' );
					}
				} else { ?>
					<div class="col-12">
						<div class="shadowbox position-relative blog-box bg-light">
							<p><?php printf('<p>%s<p>', esc_html__( 'There are no publications that match your search criteria. Please try again with different filters.', 'understrap' )); ?></p>
						</div>
					</div>
				<?php } ?>

			<?php
			// Display the pagination component.
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

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
