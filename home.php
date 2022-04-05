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
	</div>	
</div>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="content-loop mb-5">
			<div class="row">
	
					<?php
					if ( have_posts() ) {
						// Start the Loop.
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
	
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
	
			</div><!-- .row -->
		</div>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
