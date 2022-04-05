<?php
$header_img = get_field('header_image');
$btn_link = get_field('button_link');
$btn_text = get_field('button_text');
?>

<div class="page-header py-5">
	<div class="container py-5">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5 text-center text-lg-end order-2 order-lg-1">
				<h1 class="my-5"><?php the_title(); ?></h1>
				<?php if(get_field('header_text')): ?>
					<div class="header-text"><?php the_field('header_text'); ?></div>
				<?php endif; ?>
				<?php if($btn_link && $btn_text): ?><a href="<?= $btn_link; ?>" class="mt-4 btn btn-md btn-primary"><?= $btn_text; ?></a><?php endif; ?>
			</div>
			<div class="col-md-6 px-5 order-1 order-md-2">
				<?php echo wp_get_attachment_image($header_img, 'full'); ?>
			</div>
		</div>
	</div>	
</div>