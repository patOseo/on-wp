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
if(lang_en()) { $pid = 25; } elseif(lang_fr()) { $pid = 137; }
?>

<div class="page-header py-5">
	<div class="container py-5">
		<div class="row pb-5 align-items-center">
			<div class="col-md-6 px-5 text-end text-center text-lg-end order-2 order-lg-1">
				<h1 class="my-5"><?php echo single_term_title(); ?></h1>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

			</div>
			<div class="col-md-6 px-5 order-1 order-lg-2">
				<?php echo wp_get_attachment_image(get_field('header_image', $pid), 'full'); ?>
			</div>
		</div>

		<?php /* ?>
		<div class="blog-filters-block p-4">
			<form action="">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="blogtype">Show:</label>
							<select class="form-select" name="blog_type" id="blogtype">
								<option value="all" selected>All</option>
								<option value="blog">Blogs</option>
								<option value="announcement">Announcements</option>
								<option value="news">News</option>
								<option value="webinars">Webinars</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="blogcategory">In Category:</label>
							<select class="form-select" name="blog_category" id="blogcategory">
								<option value="" selected>All</option>
								<?php $blogcats = get_categories(); ?>
								<?php foreach($blogcats as $blogcat): ?>
									<option value="<?php echo $blogcat->term_id; ?>"><?php echo $blogcat->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php */ ?>
	</div>	
</div>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) {
					?>
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<?php
			// Display the pagination component.
			understrap_pagination();
			// Do the right sidebar check.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
