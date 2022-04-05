<?php 

$members = get_field('select_members_to_show');
$cols = get_field('columns');

if(have_rows($members, 'option')): ?>

<div class="container">
	<div class="members row">
		<?php while(have_rows($members, 'option')): the_row(); ?>
			<?php
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$linkedin = get_sub_field('linkedin');
				if($members == 'board_members') {
					$position = get_sub_field('organization');
				} else {
					$position = get_sub_field('position');
				}
			?>

			<div class="<?php if($cols) { echo 'col-md-' . $cols; } ?> col-6">
				<div class="member text-center mb-5 mt-3">
					<div class="mb-4 member-image rounded-circle position-relative">
						<div class="member-overlay">
							<?php if($linkedin): ?>
							<a href="<?= $linkedin; ?>" target="_blank" class="stretched-link"><img src="/wp-content/themes/opennorth/assets/img/linkedin-white.svg" alt="<?= $name; ?> on LinkedIn" class="member-link"></a>
							<?php endif; ?>
						</div>
						<?php echo wp_get_attachment_image($image, 'member', '', array('class' => 'rounded-circle')); ?>
					</div>
					<?php if($members == 'advisors'): ?><p class="mb-0 text-secondary fw-bold">Advisory Service</p><?php endif; ?>
					<p class="member-name h4 fw-bold text-primary"><?= $name; ?></p>
					<p class="member-position"><?= $position; ?></p>
				</div>
			</div>
			
	
		<?php endwhile; ?>
	</div>
</div>
<?php endif;