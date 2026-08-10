<section class="page-intro-timeline" <?php if (get_sub_field('fwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('fwc_bg'); ?>);"<?php endif ?>>
    <div class="container">
    <?php if(get_field('pi_heading')):?>
					<h1 class="pi-heading"><?php echo get_field('pi_heading');?></h1>

				<?php else: ?>
				 	<h1 class="pi-heading"><?php the_title(); ?></h1>
				<?php endif;?>
                <div class="pit-wrap">
                <?php echo get_field('pi_content');?>
                </div>
    </div>
</section>
