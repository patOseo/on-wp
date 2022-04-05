<?php
/**
 * Single report partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<?php if(have_rows('sections')): ?>

	<div class="row">
		<div class="col-md-3">
			<nav id="tableContents" class="navbar table-of-contents rounded align-items-stretch mb-4 mb-md-0 p-3">
				<a href="#" class="fs-4 fw-bold mb-2 pb-2 text-center table-header">Table of Contents</a>
				<nav class="nav nav-pills flex-column">
					<?php $sec = 1; while(have_rows('sections')): the_row(); ?>
						<a href="#section-<?= $sec; ?>" class="nav-link fw-bold"><?php the_sub_field('section_title'); ?></a>

						<?php if(have_rows('sub_section')): ?>
							<nav class="nav nav-pills flex-column">
							<?php $subsec = 1; while(have_rows('sub_section')): the_row(); ?>
								<a href="#section-<?= $sec; ?>-<?= $subsec; ?>" class="nav-link text-capitalize ms-3 my-1"><?php the_sub_field('sub_section_title'); ?></a>
							<?php $subsec++; endwhile; ?>
							</nav>
						<?php endif; ?>
					<?php $sec++; endwhile; ?>
				</nav>
			</nav>
		</div>

		<div class="col-md-9">
			<div class="entry-content h-100 position-relative fs-5 fw-light" data-bs-spy="scroll" data-bs-target="#tableContents" data-bs-offset="50" tabindex="0">
				<?php $i = 1; while(have_rows('sections')): the_row(); ?>
					<div class="report-section mb-4" id="section-<?= $i; ?>">
						<h2><?php the_sub_field('section_title'); ?></h2>
						<div class="section-content"><?php the_sub_field('content'); ?></div>

						<?php if(have_rows('sub_section')): ?>
	
							<?php $ii = 1; while(have_rows('sub_section')): the_row(); ?>
	
								<div class="sub-section mb-4" id="section-<?= $i; ?>-<?= $ii; ?>">
									<h3><?php the_sub_field('sub_section_title'); ?></h3>
									<div class="sub-section-content"><?php the_sub_field('sub_section_content'); ?></div>
								</div>
	
							<?php $ii++; endwhile; ?>
	
						<?php endif; ?>
					</div>

				<?php $i++; endwhile; ?>
			</div>
		</div>
	</div>

	<?php endif; ?>

</article><!-- #post-## -->
