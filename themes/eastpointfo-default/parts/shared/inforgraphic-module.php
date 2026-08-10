<section class="company-history">
	<div class="cm-wrap">
		<?php if( get_field('ch_header')): ?>
			<h2 class="ch-header"><?php echo get_field('ch_header'); ?></h2>
		<?php endif; ?>
		<?php if( get_field('ch_descr')): ?>
			<p class="ch-descr"><?php echo get_field('ch_descr'); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="history-module">
	<div class="container">
	<div class="hm-wrap">
			<?php if( have_rows('hm_row') ): $j = 1; while ( have_rows('hm_row') ) : the_row(); ?>
			<div class="hm-content hmc-row-<?php echo $j; ?>" data-aos="linedraw">
				<div class="hm-year" data-aos="fade-left"><span><?php echo get_sub_field('hm_year'); ?></span></div>
				<div class="hm-image" data-aos="fade-left"><?php $image = get_sub_field('hm_image');
                                if( !empty($image) ): ?><span><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" tilte="<?php echo $image['alt']; ?>"></span><?php endif; ?>
                </div>
                <div class="hmi-content" data-aos="fade-left"><span><?php echo get_sub_field('hm_content'); ?></span></div>
			</div>
		<?php $j++; endwhile;endif; ?>
	</div>
	</div>
</section>

