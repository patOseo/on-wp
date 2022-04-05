<?php
/**
 * 
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-6 mb-4">
	<article class="h-100 shadowbox p-0 position-relative blog-box bg-light d-flex flex-column" id="post-<?php the_ID(); ?>">
		<?php if(get_the_post_thumbnail()): the_post_thumbnail('publication'); else: ?>
			<img src="/wp-content/themes/opennorth/images/report-default.svg" alt="OpenNorth Publication" width="488" height="390">
		<?php endif; ?>
		<div class="h-100 py-5 px-4 d-flex flex-column">
			<h2 class="entry-title h3"><a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a></h2>
			<p><?php if(have_rows('authors')): ?><?php while(have_rows('authors')): the_row(); $authors[] = get_sub_field('author_name'); endwhile; echo implode(', ', $authors); ?><?php endif; ?></p>
			<button class="btn btn-secondary btn-md w-auto mt-auto me-auto py-2">Read More</button>
		</div>
	
	</article><!-- #post-## -->
</div>
