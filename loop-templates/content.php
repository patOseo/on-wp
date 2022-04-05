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
	<article class="h-100 shadowbox position-relative blog-box bg-light" id="post-<?php the_ID(); ?>">

		<h2 class="entry-title h3 mb-5"><a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a></h2>

		<button class="btn btn-secondary btn-md py-2">Read More</button>
	
	</article><!-- #post-## -->
</div>
