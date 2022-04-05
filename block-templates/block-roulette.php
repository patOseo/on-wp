<?php

if(have_rows('roulette')): ?>

<div class="roulette-container">
	<div class="roulette <?php if(lang_fr()) { echo "fr"; } ?>">
		<?php while(have_rows('roulette')): the_row(); ?>
			<p class="roulette-text h2"><?php the_sub_field('roulette_item'); ?></p>
		<?php endwhile; ?>
	</div>
</div>

<?php endif;