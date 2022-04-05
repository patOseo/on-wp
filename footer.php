<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="newsletter-section py-5 px-3 px-md-0 text-light">
	<div class="container">
		<div class="row align-items-center">
			<div class="py-3 py-lg-0 col-lg-4 order-1 order-lg-first">
				<p class="mb-0">
					<?php if(lang_en()): ?>
						Subscribe to our newsletter to access our latest resources!
					<?php elseif(lang_fr()): ?>
						Inscrivez-vous à notre infolettre pour accéder à nos dernières ressources!
					<?php endif; ?>
				</p>
			</div>
			<div class="py-3 py-lg-0 col-lg-4 text-center order-last order-lg-2">
				<a class="d-inline px-4" href="<?php the_field('facebook', 'option'); ?>" target="_blank" rel="noreferrer,noopener"><img src="/wp-content/themes/opennorth/images/facebook.svg" alt="OpenNorth on Facebook"></a>
				<a class="d-inline px-4" href="<?php the_field('linkedin', 'option'); ?>" target="_blank" rel="noreferrer,noopener"><img src="/wp-content/themes/opennorth/images/linkedin.svg" alt="OpenNorth on LinkedIn"></a>
				<a class="d-inline px-4" href="<?php the_field('twitter', 'option'); ?>" target="_blank" rel="noreferrer,noopener"><img src="/wp-content/themes/opennorth/images/twitter.svg" alt="OpenNorth on Twitter"></a>
				<a class="d-inline px-4" href="<?php the_field('medium', 'option'); ?>" target="_blank" rel="noreferrer,noopener"><img src="/wp-content/themes/opennorth/images/medium.svg" alt="OpenNorth on Medium" width="28"></a>
			</div>
			<div class="py-3 py-lg-0 col-lg-4 order-2 order-lg-last">
				<form class="subscription" action="https://opennorth.us2.list-manage.com/subscribe/post?u=a602fac79ef3dc584bf1a2743&amp;id=1e0c02fa29" method="post" target="_blank" novalidate="" _lpchecked="1">
				    <div class="row">
				    	<div class="col-8 col-md-6 px-0 mx-0">
				    		<label for="email" class="sr-only">Email</label>
				    		<input type="text" class="subscription__input px-3 w-100 h-100" id="email" placeholder="<?php if(lang_en()) { echo "E-mail"; } elseif(lang_fr()) { echo "Courriel"; } ?>" name="EMAIL">
				    		<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a602fac79ef3dc584bf1a2743_1e0c02fa29" tabindex="-1" value=""></div>
				    	</div>
				    	<div class="col-4 col-md-6 px-0 mx-0">
				    		<input type="submit" class="btn btn-md btn-primary w-100" value="<?php if(lang_en()) { echo "Subscribe"; } elseif(lang_fr()) { echo "Inscrivez-vous"; } ?>">
				    	</div>
				    </div>
				</form>
			</div>
		</div>
	</div>
</section>

<footer class="site-footer" id="wrapper-footer">

	<div class="container pb-5 footer-area text-light">
		<div class="row gx-lg-5">
			<div class="col-12 text-center my-5">
				<img src="/wp-content/themes/opennorth/images/logo-small.svg" alt="Open North" width="80" height="80">
			</div>
			<div class="col-md-4 pr-md-5 pl-md-0">
				<h3 class="mt-lg-0 mt-4 mb-4"><?php if(lang_en()) { ?>About Us<?php } elseif(lang_fr()) { ?>À propos de nous<?php } ?></h3>
				<?php the_field('about_us', 'option'); ?>
			</div>
			<div class="col-md-4 px-md-5">
				<h3 class="mt-lg-0 mt-4 mb-4"><?php if(lang_en()) { ?>Quick Links<?php } elseif(lang_fr()) { ?>Liens rapides<?php } ?></h3>
				<?php
				wp_nav_menu(
					array(
						'menu'  => 'Quick Links',
						'menu_class'      => 'navbar-nav justify-content-center flex-grow-1 pe-3',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</div>
			<div class="col-md-4 px-md-5">
				<h3 class="mt-lg-0 mt-4 mb-4"><?php if(lang_en()) { ?>Contact Us<?php } elseif(lang_fr()) { ?>Pour nous joindre<?php } ?></h3>
				<?php the_field('contact_us', 'option'); ?>
			</div>
		</div>
	</div>

	<div class="container-fluid copyright p-3">

		<div class="row">

			<div class="col-md-12">

					<div class="site-info fw-light">

						<small>Copyright Open North <?php echo date('Y'); ?></small>

					</div><!-- .site-info -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

