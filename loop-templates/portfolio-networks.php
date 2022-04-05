<?php

if(have_rows('networks', 'option')): ?>

	<div class="networks-loop row">

	<?php while(have_rows('networks', 'option')): the_row(); ?>
		<?php 
			$image = get_sub_field('network_logo');
			$title = get_sub_field('network_title');
			$subheading = get_sub_field('network_subheading');
			$link = get_sub_field('network_link');
		?>

		<div class="col-md-6 mb-4">
			<div class="shadowbox position-relative h-100">
				<div class="network-logo text-center"><?php echo wp_get_attachment_image($image, 'full'); ?></div>
				<a href="<?= $link; ?>" class="network-title text-primary stretched-link h4 fw-bold"><?= $title; ?></a>
				<div class="network-subheading"><?= $subheading; ?></div>
			</div>
		</div>

	<?php endwhile; ?>

	</div>

<?php endif;