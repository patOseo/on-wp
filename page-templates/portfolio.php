<?php
/**
 * Template Name: Portfolio
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

get_template_part( 'global-templates/hero-page' );

?>

<div class="tab-bar bg-primary pt-5">
	<div class="container">
		<ul class="nav nav-justified" id="portfolioTab" role="tablist">
		  <li class="nav-item" role="presentation">
		    <button class="nav-link text-light border-0 fw-bold active" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="projects" aria-selected="true"><span class="px-3"><?php if(lang_en()) { echo "Projects"; } elseif(lang_fr()) { echo "Projets"; } ?></span></button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="nav-link text-light border-0 fw-bold" id="networks-tab"  data-bs-toggle="tab" data-bs-target="#networks" type="button" role="tab" aria-controls="networks" aria-selected="true"><span class="px-3"><?php if(lang_en()) { echo "Networks"; } elseif(lang_fr()) { echo "Réseaux"; } ?></span></button>
		  </li>
		</ul>
	</div>
</div>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<div class="tab-content" id="portfolioContent">
				  <div class="tab-pane fade show active py-5" id="projects" role="tabpanel" aria-labelledby="projects-tab">
				  	<?php get_template_part('loop-templates/portfolio', 'projects'); ?>
				  </div>
				  <div class="tab-pane fade py-5" id="networks" role="tabpanel" aria-labelledby="networks-tab">
				  	<div class="network-intro mb-5"><?php the_field('network_intro', 'option'); ?></div>
				  	<?php get_template_part('loop-templates/portfolio', 'networks'); ?>
				  </div>
				</div>

			</div><!-- #primary -->



		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
