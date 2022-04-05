<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content fs-5 fw-light">

		<?php
		the_content();
		understrap_link_pages();
		?>

		<?php if(current_user_can('administrator') && get_post_meta(get_the_ID(), 'contentful_id')): ?>
			<p>(Admins only) Original URL: <a href="https://opennorth.ca/<?php if(is_singular('post')) { echo "blogposts"; } elseif(is_singular('publications')) { echo "publications"; } ?>/<?php echo get_post_meta(get_the_ID(), 'contentful_id', TRUE); ?>_en" target="_blank"><?php echo get_post_meta(get_the_ID(), 'contentful_id', TRUE); ?></a></p>
		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
