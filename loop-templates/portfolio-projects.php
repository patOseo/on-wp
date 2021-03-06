<?php

if(have_rows('projects', 'option')): ?>

	<div class="networks-loop row">

	<?php while(have_rows('projects', 'option')): the_row(); ?>
		<?php 
			$title = get_sub_field('project_title');
			$client = get_sub_field('project_client');
			$date = get_sub_field('project_date');
			$desc = get_sub_field('project_description');
			$btntext = get_sub_field('project_button_text');
			$btnlink = get_sub_field('project_button_link');
		?>

		<div class="col-md-6 mb-4">
			<div class="shadowbox position-relative h-100">
				<div class="mb-4 project-title h4 fw-bold"><?= $title; ?></div>
				<?php if($date || $client): ?>
				<div class="mb-4">
				<?php if($client): ?><div class="project-client"><small><strong>Project Client/Partner: </strong><?= $client; ?></small></div><?php endif; ?>
				<?php if($date): ?><div class="project-date"><small><strong>Start/Finish Date: </strong><?= $date; ?></small></div><?php endif; ?>
				</div>
				<?php endif; ?>

				<div class="project-desc"><?= $desc; ?></div>
				<?php if($btntext && $btnlink): ?>
					<a href="<?= $btnlink; ?>" class="btn btn-primary py-2" target="_blank" rel="noopener,noreferrer"><?= $btntext; ?></a>
				<?php endif; ?>
			</div>
		</div>

	<?php endwhile; ?>

	</div>

<?php endif;