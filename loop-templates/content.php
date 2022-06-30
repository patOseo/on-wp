<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-6 mb-4">
	<article class="h-100 position-relative blog-box bg-light" id="post-<?php the_ID(); ?>">
		<div class="overflow-hidden blog-img-container">
			<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'blog', '', array('class' => 'w-100 h-auto')); ?>
		</div>
		<div class="shadowbox">
			<div class="blog-meta">
				<div class="mb-2"><small><?php the_date('M d, Y'); ?></small></div>
				<?php if(get_field('blog_type')): ?><span class="text-secondary fw-bold"><?php echo ucfirst(get_field('blog_type')); ?></span><?php endif; ?>
			</div>
			<h2 class="entry-title h3 mb-5"><a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a></h2>
	
			<button class="btn btn-secondary btn-md py-2">Read More</button>	
		</div>
	
	</article><!-- #post-## -->
</div>