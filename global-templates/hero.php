<div class="page-header py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-12">
				<img class="my-3" src="/wp-content/themes/opennorth/images/logo.svg" alt="OpenNorth" width="280" height="95">
				<div class="brow">
					<?php if(is_singular('reports')): ?>
						<p class="mb-0 fs-4 text-secondary"><strong>Full Report</strong></p>
					<?php elseif(get_field('brow')): ?>
						<p class="mb-0 fs-4 text-secondary"><strong><?php the_field('brow'); ?></strong></p>
					<?php endif; ?>
				</div>
				<h1 class="mt-0 mb-3"><?php the_title(); ?></h1>
				<?php if(!is_singular('jobs')): ?>
				<p class="fs-4"><?php if(is_singular('reports')) { the_date('M Y'); } else { the_date('d M Y'); } ?> <?php if(have_rows('authors')): ?><strong><i><?php if(lang_en()) { echo "by"; } elseif(lang_fr()) { echo "par"; } ?> <?php while(have_rows('authors')): the_row(); $authors[] = get_sub_field('author_name'); endwhile; echo implode(', ', $authors); ?></i></strong><?php endif; ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>	
</div>