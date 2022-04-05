<?php
/**
 * Template Name: Publications
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

$args = array(
	'post_type' => 'publications',
	'status' 	=> 'publish',
	'posts_per_page' => 10,
);

$pubs = new WP_Query($args);

$container = get_theme_mod( 'understrap_container_type' );

if(lang_en()) { $pid = 125; } elseif(lang_fr()) { $pid = 131; }
?>

<div class="page-header py-5">
	<div class="container py-5">
		<div class="row pb-5 align-items-center">
			<div class="col-md-6 px-5 text-end">
				<h1 class="my-5"><?php the_title(); ?></h1>
				<p><?php the_field('header_text', $pid); ?></p>
			</div>
			<div class="col-md-6 px-5">
				<?php echo wp_get_attachment_image(get_field('header_image', $pid), 'full'); ?>
			</div>
		</div>
	</div>	
</div>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="content-loop mb-5">
			<div class="row">
	
					<?php
					if ( $pubs->have_posts() ) {
						// Start the Loop.
						while ( $pubs->have_posts() ) {
							$pubs->the_post();
	
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'publications' );

						}

						
					} else {
						get_template_part( 'loop-templates/content', 'none' );
					}
					?>

					<?php understrap_pagination([ 'total' => $pubs->max_num_pages, ]); ?>
	
			</div><!-- .row -->
		</div>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
