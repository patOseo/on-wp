<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-lg p-0" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="<?php echo esc_attr( $container ); ?> position-relative">

		<a href="/<?php if(lang_fr()) { echo "fr/"; } ?>" rel="home"><img src="/wp-content/themes/opennorth/images/logo-small.svg" alt="OpenNorth"></a>

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
		</button>

		<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-center flex-grow-1 pe-3',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
			<div class="mx-4 mt-4 d-lg-none"><?php get_search_form(); ?></div>
		</div><!-- .offcanvas -->

		<div class="language-switcher text-secondary h6 mb-0 fw-normal d-none d-lg-block">
			<?php echo do_shortcode('[wpml_language_switcher]'); ?>
		</div>
		<div class="search-button d-none d-lg-block ms-3">
			<i class="fa fa-search text-primary"></i>
		</div>

		<div id="searchbox" class="position-absolute"><?php get_search_form(); ?></div>
	</div><!-- .container(-fluid) -->
</nav><!-- .site-navigation -->
