<?php 

if(have_rows('partner_logos', 'option')): ?>

<div class="row align-items-center">

	<?php while(have_rows('partner_logos', 'option')): the_row(); $logo = get_sub_field('logo'); ?>

		<div class="col-md-3 mb-5">
			<div class="client-grid text-center">
				<?php echo wp_get_attachment_image($logo, 'medium'); ?>
			</div>
		</div>

	<?php endwhile; ?>

</div>

<?php endif;