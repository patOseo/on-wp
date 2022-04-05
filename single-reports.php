<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part('global-templates/hero'); ?>

<div class="wrapper py-5" id="single-wrapper">

	<div class="container-fluid px-xl-5" id="content" tabindex="-1">

		<div class="row px-xl-5">

			<main class="site-main px-xl-5" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'reports' );
				}
				?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
