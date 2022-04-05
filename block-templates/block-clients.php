<?php 

$layout = get_field('layout');


if(have_rows('partner_logos', 'option')): ?>

<div class="row align-items-center">
	<?php if($layout == 'carousel'): ?>
	<div class="clients">
		
		<?php while(have_rows('partner_logos', 'option')): the_row(); ?>
			<?php $logo = get_sub_field('logo'); ?>
			<div class="client">
				<?php echo wp_get_attachment_image($logo, 'clients'); ?>
			</div>

		<?php endwhile; ?>

	</div>

	<?php elseif($layout == 'grid'): ?>

		<?php while(have_rows('partner_logos', 'option')): the_row(); $logo = get_sub_field('logo'); ?>

			<div class="col-md-4 mb-5">
				<div class="client-grid text-center">
					<?php echo wp_get_attachment_image($logo, 'medium'); ?>
				</div>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>
	
</div>

<?php endif; ?>