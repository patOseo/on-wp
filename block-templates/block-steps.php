<?php if(have_rows('steps')): $i == 1; ?>
<div class="circle-steps">
	<?php while(have_rows('steps')): the_row(); ?>
	<?php  
	$count = get_sub_field('step_count');
	$step_title = get_sub_field('title');
	$step_content = get_sub_field('content');
	?>
	<div class="circle">
		<div class="circle__container circle__container--pos">
			<button name="tab" class="circle__number circle__number--active"><span><?= $count; ?></span></button>
		</div>
		<div name="circle-title" class="circle__text text-highlight fw-bold" data-position="0"><?= $step_title; ?></div>
		<div class="div-full">
			<div class="line"></div>
			<div class="tab" id="tab-<?= $i; ?>">
				<p class="default-text default-text--light tab__text"><?= $step_content; ?></p>
			</div>
		</div>
	</div>
	<?php $i++; endwhile; ?>
</div>
<?php endif;