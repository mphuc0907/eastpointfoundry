<div class="site-intro" <?php if(get_field('si_background_image')):?> style="background-image:url('<?php echo get_field('si_background_image');?>')" <?php endif;?> fetchpriority="high">
	<div class="container">
		<div class="si-content-wrap">
		  <?php if(get_field('si_heading')):?>
		   <h1 class="si-header"><?php echo get_field('si_heading');?></h1>
		 <?php else: ?>
		  <h1 class="si-header"><?php the_title(); ?></h1>
		<?php endif;?>
		<?php if(get_field('si_content')):?>
			<p class="si-content"><?php echo get_field('si_content');?></p>
		<?php endif;?>
		<?php $link = get_field('si_cta');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="btn btn-primary si-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
		</div>
	</div>

	<div class="si-slider">
        	<?php if( get_field('si_slider')): ?><?php 
				$img = get_field('si_slider');
				if( $img ): ?> <?php foreach( $img as $image ): ?>		
          <div class="si-item" style="background-image: url(<?php echo $image['url']; ?>);"></div><?php endforeach; ?>
            <?php endif; ?>
<?php endif; ?>
        </div> 
</div>
