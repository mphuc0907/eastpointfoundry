<?php if (have_rows('flexible_content')): $i = 0;
	echo '<section class="additional-content">';
	while (have_rows('flexible_content')) : the_row();
		$i++; ?>

		<?php if (get_row_layout() == 'tab_content'): ?>
			<section class="accordian-tabs-module" id="accordian-tabs-module-<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('section_subtext')): ?>
						<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
					<?php endif; ?>

					<ul class="accordion-tabs">
						<?php if (have_rows('tab_content_row')): while (have_rows('tab_content_row')) : the_row(); ?>
								<li class="tab-header-and-content">
									<a href="javascript:void(0)" class="tab-link"><?php echo get_sub_field('tab_header'); ?></a>
									<div class="tab-content"><?php echo get_sub_field('tab_body'); ?></div>
								</li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<?php if (get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'timeline_module'): ?>
			<section id="section-timeline" class="section section-timeline">
				<div class="container">
					<?php if (get_sub_field('heading')): ?><h2 class="section-title"><?php echo get_sub_field('heading'); ?></h2><?php endif; ?>
					<?php if (get_sub_field('description')): ?><div class="tm-description"><?php echo get_sub_field('description'); ?></div><?php endif; ?>

					<div class="timeline">
						<div class="timeline-bar" style="top: 80px; height: 2000px;"></div>
						<div class="timeline-inner clearfix" style="height: 2200px;">
							<?php if (get_sub_field('content')): ?><?php echo get_sub_field('content'); ?><?php endif; ?>
						</div>
					</div>
				</div>
			</section>




		<?php elseif (get_row_layout() == 'full_width_cta'): ?>
			<section class="full-width-cta-test" id="full-width-cta-test<?php echo $i ?>">

				<?php if (get_sub_field('section_header')): ?>
					<div class="container pt-5">
						<h2 class="cta-banner-header"><?php echo get_sub_field('section_header'); ?></h2>
					</div>
				<?php endif; ?>

				<section class="full-width-cta">
					<div class="fwc-wrap">
						<div class="container">
							<?php if (get_sub_field('section_body')): ?>
								<h3 class="fwc-para"><?php echo get_sub_field('section_body'); ?></h3>
							<?php endif; ?>
							<?php $fwc_cta = get_sub_field('cta_button');
							if ($fwc_cta): ?>
								<a href="<?php echo $fwc_cta['url']; ?>" class="btn btn-on-color fwc-cta"><?php echo $fwc_cta['title']; ?></a>
							<?php endif; ?>
						</div>
					</div>
				</section>

				<?php if (get_sub_field('divider')): ?>
					<div class="container pt-5">
						<hr>
					</div>
				<?php endif ?>
			</section>

		<?php elseif (get_row_layout() == 'full_width_cta1'): ?>
			<section class="fullwidth-cta1" id="fullwidth-cta1<?php echo $i ?>" <?php if (get_sub_field('fwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('fwc_bg'); ?>);" <?php endif ?>>
				<div class="container">
					<?php if (get_sub_field('fwc_heading')): ?>
						<h2 class="fwc-heading"><?php echo get_sub_field('fwc_heading'); ?></h2>
					<?php endif ?>

					<?php if (get_sub_field('fwc_description')): ?>
						<p class="fwc-description"><?php echo get_sub_field('fwc_description'); ?></p>
					<?php endif ?>

					<?php
					$link = get_sub_field('fwc_cta1');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="button btn  btn-primary btn-lg fwc-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>

					<?php
					$link = get_sub_field('fwc_cta2');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="button btn btn-outline-light btn-lg fwc-cta2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'full_width_cta2'): ?>
			<section class="fullwidth-cta2" id="fullwidth-cta2<?php echo $i ?>" <?php if (get_sub_field('fwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('fwc_bg'); ?>);" <?php endif ?>>
				<div class="container">
					<div class="fwc2-wrap">
						<?php if (get_sub_field('fwc_heading')): ?>
							<h2 class="fwc2-heading"><?php echo get_sub_field('fwc_heading'); ?></h2>
						<?php endif ?>
						<?php
						$link = get_sub_field('fwc_cta1');
						if ($link):
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<span><a class="button btn  btn-primary btn-lg fwc-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></span>
						<?php endif; ?>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'multiple_columns'): ?>
			<div class="<?php echo get_sub_field('mcsec_class'); ?>" id="<?php if (get_sub_field('id')): ?><?php echo get_sub_field('id'); ?><?php else: ?>multiple_columns<?php echo $i ?><?php endif; ?>"></div>
			<section class="multiple-cols-module <?php echo get_sub_field('mcsec_containers_class'); ?>" <?php if (get_sub_field('mcm_bg')): ?>style="background-image: url(<?php echo get_sub_field('mcm_bg'); ?>);" <?php endif ?> style="background-color: <?php echo get_sub_field('background_color');  ?>">

				<div class="container <?php echo !empty(get_sub_field('container_padding')) ? get_sub_field('container_padding') : 'py-5' ?>">
					<div class="row">
						<?php if (get_sub_field('section_header')): ?>
							<h2 class="col-12"><?php echo get_sub_field('section_header'); ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('section_subtext')): ?>
							<p class="column-subtext col-12"><?php echo get_sub_field('section_subtext'); ?></p>
						<?php endif; ?>
					</div>
					<section class="row <?php if (get_sub_field('ccm_class')): ?><?php echo get_sub_field('ccm_class'); ?><?php endif; ?>">
						<?php if (get_sub_field('number_columns') == '2') {
							$gridClass = 'col-md-6';
						} else if (get_sub_field('number_columns') == '3') {
							$gridClass = 'col-md-4';
						} else if (get_sub_field('number_columns') == '4') {
							$gridClass = 'col-md-6 col-lg-3';
						} else {
							$gridClass = 'col-12';
						}
						?>

						<?php if (have_rows('content')): while (have_rows('content')) : the_row(); ?>
								<div class="<?php echo $gridClass; ?>"><?php echo get_sub_field('content_column'); ?></div>
							<?php endwhile; ?>
						<?php endif; ?>
					</section>
				</div>
				<?php if (get_sub_field('divider')): ?>
					<hr>
				<?php endif; ?>
			</section>

		<?php elseif (get_row_layout() == 'img_gallery_section'): ?>
			<?php if (get_sub_field('fullwidth') == false): ?>
				<section class="image-gallery-module" id="img_gallery_section<?php echo $i ?>">
					<div class="container">
						<div class="row">
							<?php if (get_sub_field('section_header')): ?>
								<h2 class="col-12"><?php echo get_sub_field('section_header'); ?></h2>
							<?php endif; ?>
						</div>
						<section class="row">
							<?php $images = get_sub_field('img_gallery');
							if ($images): ?>
								<?php foreach ($images as $image): ?>
									<div class="<?php if (get_sub_field('number_columns') == '2') {
													echo 'col-md-2';
												} else if (get_sub_field('number_columns') == '3') {
													echo 'col-md-3';
												} else if (get_sub_field('number_columns') == '4') {
													echo 'col-md-4';
												}
												?>">

										<a href="<?php echo $image['sizes']['large']; ?>" class="lightbox loop-item">
											<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>" />
											<h4 class="li-title"><?php echo $image['caption']; ?></h4>
										</a>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</section>
						<?php if (get_sub_field('divider')): ?>
							<hr>
						<?php endif; ?>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'image_carousel_module'): ?>
			<section class="image-carousel-module" id="image_carousel_module<?php echo $i ?>">
				<div class="container">

					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<?php if (have_rows('icm_carousel')): ?>
							<ol class="carousel-indicators">
								<?php while (have_rows('icm_carousel')) : the_row(); ?>
									<li tabindex="0" data-target="#carouselExampleIndicators" data-slide-to="<?php echo get_row_index() - 1 ?>" <?php if (get_row_index() == 1): ?>class="active" <?php endif ?>></li>
								<?php endwhile; ?>
							</ol>
						<?php endif; ?>

						<?php if (have_rows('icm_carousel')): ?>
							<div class="carousel-inner icm-carousel">
								<?php while (have_rows('icm_carousel')) : the_row(); ?>
									<div class="carousel-item <?php if (get_row_index() == 1): ?>active<?php endif ?>">
										<?php
										$icm_img = get_sub_field('icm_img');
										if ($icm_img): ?>
											<a href="<?php echo $image['url'] ?>" class="lightbox"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>"></a>
										<?php endif; ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'img_gallery_with_thumbnails'): ?>
			<section class="image-gallery-with-thumbs" id="img_gallery_with_thumbnails<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('imt_section_header')): ?>
						<h2><?php echo get_sub_field('imt_section_header'); ?></h2>
					<?php endif; ?>
					<div class="innerpage-carousel">
						<div id="slider" class="slides slider-for">
							<?php $images = get_sub_field('imgwt_gallery');
							if ($images): ?>
								<?php foreach ($images as $image): ?>
									<div><a href="<?php echo $image['sizes']['large']; ?>" class="lightbox"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"></a></div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<div id="carousel" class="slides slider-nav">
							<?php $images = get_sub_field('imgwt_gallery');
							if ($images): ?>
								<?php foreach ($images as $image): ?>
									<div> <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"></div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>

					<?php if (get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'click_expand'): ?>

			<section class="click-expand-module" id="<?php if (get_sub_field('ce_id')): ?><?php echo get_sub_field('ce_id'); ?><?php endif; ?>" <?php if (get_sub_field('background_color')): ?>style="background-color: <?php echo get_sub_field('background_color') ?>;" <?php endif ?>>
				<div class="container <?php echo !empty(get_sub_field('container_padding')) ? get_sub_field('container_padding') : 'py-5' ?>">
					<?php if (get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<div id="accordion">
						<?php if (have_rows('accordion')): ?>
							<?php while (have_rows('accordion')): the_row(); ?>

								<div class="card">
									<h3 class="mb-0" id="heading<?php echo get_row_index(); ?>">
										<button class="btn-link card-header <?php if (get_row_index() != 1): ?>collapsed<?php endif; ?>" data-toggle="collapse" data-target="#collapse<?php echo get_row_index(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_row_index(); ?>">
											<?php echo get_sub_field('section_header'); ?>

											<?php if (get_row_index() != 1): ?>
												<!-- <i class="fa fa-plus" aria-hidden="true"></i> -->
												<span class="material-icons">add</span>
											<?php else: ?>
												<!-- <i class="fa fa-minus" aria-hidden="true"></i> -->
												<span class="material-icons">remove</span>
											<?php endif; ?>
										</button>
									</h3>

									<div id="collapse<?php echo get_row_index(); ?>" class="collapse <?php if (get_row_index() == 1) : ?>show<?php endif; ?>" aria-labelledby="heading<?php echo get_row_index(); ?>" data-parent="#accordion">
										<div class="card-body">
											<?php echo get_sub_field('section_body'); ?>
										</div>
									</div>
								</div>
							<?php endwhile ?>
						<?php endif ?>

					</div>
				</div>
			</section>


		<?php elseif (get_row_layout() == 'table'): ?>
			<section class="tabular-data" id="tabular_data<?php echo $i ?>">
				<div class="container pb-5">
					<?php if (get_sub_field('section_header')): ?>
						<h2 class="headexpand"><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>

					<?php if (get_sub_field('section_header')): ?>
						<h3 class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></h3>
					<?php endif; ?>

					<?php if (get_sub_field('table_content')): ?>
						<div class="table-wrap">
							<?php echo get_sub_field('table_content'); ?>
						</div>
					<?php endif; ?>

				</div>
				<?php if (get_sub_field('divider')): ?>
					<div class="container">
						<hr>
					</div>
				<?php endif; ?>
			</section>

		<?php elseif (get_row_layout() == 'product_grid'): ?>
			<section class="product-grid-module <?php echo get_sub_field('pg_section_class'); ?>" id="product_grid<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('section_header')): ?>
						<h2><?php echo get_sub_field('section_header'); ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('section_subtext')): ?>
						<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
					<?php endif; ?>

					<div class="product-carousel <?php if (get_sub_field('carousel')): ?>slick-item-carousel<?php endif ?>">

						<ul class="slides row align-items-center justify-content-center">
							<?php if (have_rows('product_item')): while (have_rows('product_item')) : the_row(); ?>
									<li class="col-md-3 col-lg-3 col-12">
										<?php if (get_sub_field('product_picture')) : ?>
											<?php $product_picture2 = get_sub_field('product_picture'); ?>
										<?php endif; ?>
										<?php $link = get_sub_field('product_url');
										if ($link):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="product-item" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
											<?php else: ?>
												<!-- <span class="product-item"> -->
												<a class="product-item lightbox" href="<?php echo $product_picture2['url']; ?>">
												<?php endif; ?>
												<span class="product-img">
													<?php if (get_sub_field('product_picture')) : ?>
														<?php $product_picture = get_sub_field('product_picture'); ?>
														<figure><img class="pmi-img" src="<?php echo $product_picture['url']; ?>" alt="<?php echo $product_picture['title']; ?>" title="<?php echo $product_picture['title']; ?>"></figure>
													<?php endif; ?>
												</span>
												<?php if (get_sub_field('product_header')): ?>
													<h2 class="product-header"><?php echo get_sub_field('product_header'); ?></h2>
												<?php endif ?>
												<?php if ($link_title): ?>
													<span class="product-title"><?php echo esc_html($link_title); ?></span>
												<?php endif ?>
												<?php if ($link): ?>
												</a>
											<?php else: ?>
												<!-- </span> -->
											</a>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<?php if (get_sub_field('divider')): ?>
					<div class="container">
						<hr>
					</div>
				<?php endif; ?>
			</section>

		<?php elseif (get_row_layout() == 'text_media'): ?>
			<section class="text-media-module" id="text_media<?php echo $i ?>">
				<div class="container pt-5">
					<?php if (get_sub_field('section_subtext')): ?>
						<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
					<?php endif; ?>
					<article class="row">
						<div class="col-md-5">
							<?php echo get_sub_field('media'); ?>
						</div>
						<div class="col-md-7 col-last">
							<?php if (get_sub_field('section_header')): ?>
								<h2><?php echo get_sub_field('section_header'); ?></h2>
							<?php endif; ?>
							<?php echo get_sub_field('text'); ?>
						</div>
					</article>
					<?php if (get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
				</div>
			</section>


		<?php elseif (get_row_layout() == 'hero_canvas'): ?>
			<section class="hero-canvas" id="hero_canvas<?php echo $i ?>" <?php if (get_sub_field('hc_bg')): ?>style="background-image: url(<?php echo get_sub_field('hc_bg') ?>);" <?php endif ?>>
				<div class="container">
					<div class="row">
						<div class="col-12 text-center">
							<?php if (get_sub_field('hc_heading')): ?>
								<h2 class="hc-heading"><?php echo get_sub_field('hc_heading') ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('hc_description')): ?>
								<p class="hc-description"><?php echo get_sub_field('hc_description') ?></p>
							<?php endif ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'carousel_with_content'): ?>
			<section class="carousel-with-content" id="carousel_with_content<?php echo $i ?>">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<?php if (have_rows('cwc_carousel')): ?>
						<ol class="carousel-indicators">
							<?php while (have_rows('cwc_carousel')) : the_row(); ?>
								<li tabindex="0" data-target="#carouselExampleIndicators" data-slide-to="<?php echo get_row_index() - 1 ?>" <?php if (get_row_index() == 1): ?>class="active" <?php endif ?>></li>
							<?php endwhile; ?>
						</ol>
					<?php endif; ?>

					<?php if (have_rows('cwc_carousel')): ?>
						<div class="carousel-inner cwc-carousel">
							<?php while (have_rows('cwc_carousel')) : the_row(); ?>
								<div class="carousel-item <?php if (get_row_index() == 1): ?>active<?php endif ?>" <?php if (get_sub_field('cwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('cwc_bg') ?>);" <?php endif; ?>>
									<div class="container">
										<div class="row">
											<?php $animation = get_sub_field('animation_style') != 'none' ? get_sub_field('animation_style') . ' animated' : ''; ?>
											<div class="carousel-content col-md-8 <?php echo $animation; ?>">
												<?php if (get_sub_field('cwc_title')): ?>
													<h2 class="cwc-title"><?php echo get_sub_field('cwc_title'); ?></h2>
												<?php endif ?>

												<?php if (get_sub_field('cwc_description')): ?>
													<p class="cwc-description"><?php echo get_sub_field('cwc_description'); ?></p>
												<?php endif ?>

												<?php
												$link = get_sub_field('cwc_cta1');
												if ($link):
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="button btn  btn-primary btn-lg cwc-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
												<?php endif; ?>

												<?php
												$link = get_sub_field('cwc_cta2');
												if ($link):
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="button btn btn-outline-light btn-lg cwc-cta2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>-->
				</div>
			</section>




		<?php elseif (get_row_layout() == 'carousel_with_content_hero_1'): ?>
			<section class="carousel-with-content carousel-with-content-hero-one" id="carousel_with_content<?php echo $i ?>">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<?php if (have_rows('cwc_carousel')): ?>
						<ol class="carousel-indicators">
							<?php while (have_rows('cwc_carousel')) : the_row(); ?>
								<li tabindex="0" data-target="#carouselExampleIndicators" data-slide-to="<?php echo get_row_index() - 1 ?>" <?php if (get_row_index() == 1): ?>class="active" <?php endif ?>></li>
							<?php endwhile; ?>
						</ol>
					<?php endif; ?>

					<?php if (have_rows('cwc_carousel')): ?>
						<div class="carousel-inner cwc-carousel">
							<?php while (have_rows('cwc_carousel')) : the_row(); ?>
								<div class="carousel-item <?php if (get_row_index() == 1): ?>active<?php endif ?>" <?php if (get_sub_field('cwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('cwc_bg') ?>);" <?php endif; ?>>
									<div class="container">
										<div class="row">
											<?php $animation = get_sub_field('animation_style') != 'none' ? get_sub_field('animation_style') . ' animated' : ''; ?>
											<div class="carousel-content col-md-8 <?php echo $animation; ?>">
												<?php if (get_sub_field('cwc_title')): ?>
													<h2 class="cwc-title"><?php echo get_sub_field('cwc_title'); ?></h2>
												<?php endif ?>

												<?php if (get_sub_field('cwc_description')): ?>
													<p class="cwc-description"><?php echo get_sub_field('cwc_description'); ?></p>
												<?php endif ?>

												<?php
												$link = get_sub_field('cwc_cta1');
												if ($link):
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="button btn  btn-primary btn-lg cwc-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
												<?php endif; ?>

												<?php
												$link = get_sub_field('cwc_cta2');
												if ($link):
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="button btn btn-outline-light btn-lg cwc-cta2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
												<?php endif; ?>
											</div>
											<div class="carousel-content-image col-md-4"><?php if (get_sub_field('product_image')) : ?>
													<?php $product_picture = get_sub_field('product_image'); ?>
													<img src="<?php echo $product_picture['url']; ?>" alt="<?php echo $product_picture['title']; ?>" title="<?php echo $product_picture['title']; ?>">
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>-->
				</div>
			</section>




		<?php elseif (get_row_layout() == 'blocks_hovered_content_grid'): ?>
			<section class="blocks-hover-content-grid text-center" id="blocks_hovered_content_grid<?php echo $i ?>">
				<div class="container">
					<div class="row bhcg-content-wrap">
						<div class="col-12">
							<?php if (get_sub_field('bhcg_heading')): ?>
								<h2 class="bhcg-heading"><?php echo get_sub_field('bhcg_heading'); ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('bhcg_descritpion')): ?>
								<p class="bhcg-description"><?php echo get_sub_field('bhcg_descritpion'); ?></p>
							<?php endif ?>
						</div>
					</div>

					<?php if (have_rows('bhcg_blocks')): ?>
						<div class="row bhcg-listing" id="bhcg_blocks<?php echo $i ?>">
							<?php while (have_rows('bhcg_blocks')) : the_row(); ?>
								<div class="col-lg-4">
									<div class="bhcg-item" tabindex="0">

										<?php
										$image = get_sub_field('bhcg_image');
										if (!empty($image)): ?>
											<img class="bhcg-item-img" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>

										<div class="bhcg-hover-content">
											<?php if (get_sub_field('bhcg_item_title')): ?>
												<h3 class="bhcg-item-title"><?php echo get_sub_field('bhcg_item_title') ?></h3>
											<?php endif ?>

											<?php if (get_sub_field('bhcg_item_description')): ?>
												<p class="bhcg-item-description"><?php echo get_sub_field('bhcg_item_description'); ?></p>
											<?php endif ?>

											<?php
											$link = get_sub_field('bhcg_item_link');
											if ($link):
												$link_url = $link['url'];
												$link_title = $link['title'] ? $link['title'] : 'Subheader';
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="bhcg-item-btn btn btn-outline-light btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
											<?php endif; ?>
										</div>

									</div>

								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php
					$link = get_sub_field('bhcg_section_link');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="button btn btn-primary btn-lg bhcg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'four_blocks_hovered_content_grid'): ?>
			<section class="four_blocks-hover-content-grid text-center" id="four_blocks_hovered_content_grid<?php echo $i ?>">
				<div class="container">
					<div class="row fbhcg-content-wrap">
						<div class="col-12">
							<?php if (get_sub_field('fbhcg_heading')): ?>
								<h2 class="fbhcg-heading"><?php echo get_sub_field('fbhcg_heading'); ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('fbhcg_descritpion')): ?>
								<p class="fbhcg-description"><?php echo get_sub_field('fbhcg_descritpion'); ?></p>
							<?php endif ?>
						</div>
					</div>


					<div class="row fbhcg-listing" id="fbhcg_blocks<?php echo $i ?>" <?php if (get_sub_field('fbhcg_bg')): ?>style="background-image: url(<?php echo get_sub_field('fbhcg_bg') ?>);" <?php endif ?>>
						<?php if (have_rows('fbhcg_blocks')): ?><?php while (have_rows('fbhcg_blocks')) : the_row(); ?>
						<div class="col-lg-3">
							<div class="fbhcg-item" tabindex="0">
								<div class="fbhcg-hover-content">
									<?php if (get_sub_field('fbhcg_item_title')): ?>
										<h3 class="fbhcg-item-title"><?php echo get_sub_field('fbhcg_item_title') ?></h3>
									<?php endif ?>

									<?php if (get_sub_field('fbhcg_item_description')): ?>
										<p class="fbhcg-item-description"><?php echo get_sub_field('fbhcg_item_description'); ?></p>
									<?php endif ?>

									<?php
																	$link = get_sub_field('fbhcg_item_link');
																	if ($link):
																		$link_url = $link['url'];
																		$link_title = $link['title'] ? $link['title'] : 'Subheader';
																		$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="fbhcg-item-btn btn btn-outline-light btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
									<?php endif; ?>
								</div>

							</div>

						</div>
						<?php endwhile; ?><?php endif; ?>
					</div>

				</div>
			</section>

		<?php elseif (get_row_layout() == 'content_gallery_one_hovered_content_grid'): ?>
			<section class="content-gallery-one-hover-content-grid" id="content_one_hovered_content_grid<?php echo $i ?>">
				<div class="container">
					<div class="row cgohcg-content-wrap">
						<div class="col-lg-3">
							<?php if (get_sub_field('cgohcg_heading')): ?>
								<h2 class="cgohcg-heading"><?php echo get_sub_field('cgohcg_heading'); ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('cgohcg_descritpion')): ?>
								<p class="cgohcg-description"><?php echo get_sub_field('cgohcg_descritpion'); ?></p>
							<?php endif ?>
							<?php
							$link = get_sub_field('cgohcg_section_link');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="button btn btn-primary btn-lg cgohcg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
						</div>
						<div class="col-lg-9 col-md-12">
							<?php if (have_rows('cgohcg_blocks')): ?>
								<div class="row cgohcg-listing" id="cgohcg_blocks<?php echo $i ?>">
									<?php while (have_rows('cgohcg_blocks')) : the_row(); ?>
										<div class="col-lg-4 col-md-4">
											<div class="cgohcg-item" tabindex="0">

												<?php
												$image = get_sub_field('cgohcg_image');
												if (!empty($image)): ?>
													<img class="cgohcg-item-img" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
												<?php endif; ?>

												<div class="cgohcg-hover-content">
													<?php if (get_sub_field('cgohcg_item_title')): ?>
														<h3 class="cgohcg-item-title"><?php echo get_sub_field('cgohcg_item_title') ?></h3>
													<?php endif ?>

													<?php if (get_sub_field('cgohcg_item_description')): ?>
														<p class="cgohcg-item-description"><?php echo get_sub_field('cgohcg_item_description'); ?></p>
													<?php endif ?>

													<?php
													$link = get_sub_field('cgohcg_item_link');
													if ($link):
														$link_url = $link['url'];
														$link_title = $link['title'] ? $link['title'] : 'Subheader';
														$link_target = $link['target'] ? $link['target'] : '_self';
													?>
														<a class="cgohcg-item-btn btn btn-outline-light btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
													<?php endif; ?>
												</div>

											</div>

										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'content_gallery_two_hovered_content_grid'): ?>
			<section class="content-gallery-two-hover-content-grid" id="content_gallery_two_hovered_content_grid<?php echo $i ?>">
				<div class="container">
					<div class="row cgthcg-content-wrap">
						<div class="col-12">
							<?php if (get_sub_field('cgthcg_heading')): ?>
								<h2 class="cgthcg-heading"><?php echo get_sub_field('cgthcg_heading'); ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('cgthcg_descritpion')): ?>
								<p class="cgthcg-description"><?php echo get_sub_field('cgthcg_descritpion'); ?></p>
							<?php endif ?>
						</div>
					</div>

					<?php if (have_rows('cgthcg_blocks')): ?>
						<div class="row cgthcg-listing" id="cgthcg_blocks<?php echo $i ?>">
							<?php while (have_rows('cgthcg_blocks')) : the_row(); ?>
								<div class="col-lg-6">
									<div class="cgthcg-item <?php if (get_sub_field('cgthcg_small_box')): ?>cgthcg-item-small<?php endif ?>" tabindex="0">

										<?php
										$image = get_sub_field('cgthcg_image');
										if (!empty($image)): ?>
											<img class="cgthcg-item-img" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>

										<div class="cgthcg-hover-content">
											<?php if (get_sub_field('cgthcg_item_title')): ?>
												<h3 class="cgthcg-item-title"><?php echo get_sub_field('cgthcg_item_title') ?></h3>
											<?php endif ?>

											<?php if (get_sub_field('cgthcg_item_description')): ?>
												<p class="cgthcg-item-description"><?php echo get_sub_field('cgthcg_item_description'); ?></p>
											<?php endif ?>

											<?php
											$link = get_sub_field('cgthcg_item_link');
											if ($link):
												$link_url = $link['url'];
												$link_title = $link['title'] ? $link['title'] : 'Subheader';
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="cgthcg-item-btn btn btn-outline-light btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
											<?php endif; ?>
										</div>

									</div>

									<div class="cgthcg-item <?php if (get_sub_field('cgthcg_two_small_box')): ?>cgthcg-item-small<?php endif ?>" tabindex="0">

										<?php
										$image = get_sub_field('cgthcg_two_image');
										if (!empty($image)): ?>
											<img class="cgthcg-item-img" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>

										<div class="cgthcg-hover-content">
											<?php if (get_sub_field('cgthcg_two_item_title')): ?>
												<h3 class="cgthcg-item-title"><?php echo get_sub_field('cgthcg_two_item_title') ?></h3>
											<?php endif ?>

											<?php if (get_sub_field('cgthcg_two_item_description')): ?>
												<p class="cgthcg-item-description"><?php echo get_sub_field('cgthcg_two_item_description'); ?></p>
											<?php endif ?>

											<?php
											$link2 = get_sub_field('cgthcg_two_item_link');
											if ($link2):
												$link_url2 = $link2['url'];
												$link_title2 = $link2['title'] ? $link2['title'] : 'Subheader';
												$link_target2 = $link2['target'] ? $link2['target'] : '_self';
											?>
												<a class="cgthcg-item-btn btn btn-outline-light btn-lg" href="<?php echo esc_url($link_url2); ?>" target="<?php echo esc_attr($link_target2); ?>"><?php echo esc_html($link_title2); ?></a>
											<?php endif; ?>
										</div>

									</div>

								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php
					$link = get_sub_field('cgthcg_section_link');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="button btn btn-primary btn-lg bhcg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'blocks_grid'): ?>
			<section class="blocks-grid text-center" id="blocks_grid<?php echo $i ?>">
				<div class="container">
					<div class="row bg-content-wrap">
						<div class="col-12">
							<?php if (get_sub_field('bg_heading')): ?>
								<h2 class="bg-heading"><?php echo get_sub_field('bg_heading'); ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('bg_descritpion')): ?>
								<p class="bg-description"><?php echo get_sub_field('bg_descritpion'); ?></p>
							<?php endif ?>
						</div>
					</div>

					<?php if (have_rows('bg_blocks')): ?>
						<div class="row bg-listing">
							<?php while (have_rows('bg_blocks')) : the_row(); ?>
								<div class="col-lg-3">
									<?php
									$link = get_sub_field('bg_item_link');
									if ($link):
										$link_url = $link['url'];
										$link_title = $link['title'] ? $link['title'] : 'Subheader';
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="d-block bg-item-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

											<?php
											$image = get_sub_field('bg_image');
											if (!empty($image)): ?>
												<img class="bg-item-img" src="<?php echo esc_url($image['sizes']['block-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>

											<span class="bg-item-title"><?php echo esc_html($link_title); ?></span>

										</a>
									<?php endif; ?>

								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php
					$link = get_sub_field('bg_section_link');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="button btn btn-primary btn-lg bg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'bootstrap_tabs'): ?>
			<section class="bootstrap-tabs" id="bootstrap_tabs<?php echo $i ?>">
				<div class="container">
					<?php if (have_rows('bt_tab')): ?>
						<ul class="nav nav-tabs" role="tablist">
							<?php while (have_rows('bt_tab')) : the_row(); ?>
								<li class="bt-nav-item">
									<a href="#tab<?php echo get_row_index(); ?>" data-toggle="tab" class="<?php if (get_row_index() == 1): ?>active<?php endif; ?>" role="tab"><?php echo get_sub_field('bt_tab_title'); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>

					<?php if (have_rows('bt_tab')): ?>
						<div class="tab-content clearfix">
							<?php while (have_rows('bt_tab')) : the_row(); ?>

								<div class="tab-pane <?php if (get_row_index() == 1): ?>active<?php endif ?>" id="tab<?php echo get_row_index(); ?>" role="tabpanel">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent=".tab-pane" href="#collapse<?php echo get_row_index(); ?>">
													<?php echo get_sub_field('bt_tab_title'); ?>
												</a>
											</h4>
										</div>

										<div id="collapse<?php echo get_row_index(); ?>" class="panel-collapse collapse in">
											<?php if (get_sub_field('bt_tab_body')): ?>

												<div class="bt-tab-body panel-body row">
													<div class="col-md-5">
														<?php
														$image = get_sub_field('bt_image');
														if (!empty($image)): ?>
															<img class="bt-tab-img" src="<?php echo esc_url($image['sizes']['block-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</div>

													<div class="col-md-5">
														<?php if (get_sub_field('bt_subheading')): ?>
															<h4 class="bt-subheading"><?php echo get_sub_field('bt_subheading'); ?></h4>
														<?php endif ?>
														<?php if (get_sub_field('bt_heading')): ?>
															<h2 class="bt-heading"><?php echo get_sub_field('bt_heading'); ?></h2>
														<?php endif ?>

														<?php if (get_sub_field('bt_tab_body')): ?>
															<p class="bt-description"><?php echo get_sub_field('bt_tab_body'); ?></p>
														<?php endif ?>

														<?php
														$link = get_sub_field('bt_cta');
														if ($link):
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<a class="button btn btn-primary btn-lg bg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
														<?php endif; ?>
													</div>
												</div>
											<?php endif ?>
										</div>
									</div>

								</div>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'content_value_prop_tabs'): ?>
			<section class="bootstrap-tabs content-value-prop-tabs" id="content_value_prop_tabs<?php echo $i ?>">
				<div class="container">
					<?php if (have_rows('cvpt_tab')): ?>
						<ul class="nav nav-tabs" role="tablist">
							<?php while (have_rows('cvpt_tab')) : the_row(); ?>
								<li class="bt-nav-item">
									<a href="#cvptab<?php echo get_row_index(); ?>" data-toggle="tab" class="<?php if (get_row_index() == 1): ?>active<?php endif; ?>" role="tab"><?php echo get_sub_field('cvpt_tab_title'); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>

					<?php if (have_rows('cvpt_tab')): ?>
						<div class="tab-content clearfix">
							<?php while (have_rows('cvpt_tab')) : the_row(); ?>

								<div class="tab-pane <?php if (get_row_index() == 1): ?>active<?php endif ?>" id="cvptab<?php echo get_row_index(); ?>" role="tabpanel">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent=".tab-pane" href="#collapse<?php echo get_row_index(); ?>">
													<?php echo get_sub_field('cvpt_tab_title'); ?>
												</a>
											</h4>
										</div>

										<div id="collapse<?php echo get_row_index(); ?>" class="panel-collapse collapse in">
											<?php if (get_sub_field('cvpt_tab_body')): ?>

												<div class="bt-tab-body panel-body row">
													<div class="col-md-6">
														<?php
														$image = get_sub_field('cvpt_image');
														if (!empty($image)): ?>
															<img class="bt-tab-img" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</div>

													<div class="col-md-6">
														<?php if (get_sub_field('cvpt_subheading')): ?>
															<h4 class="cvpt-subheading"><?php echo get_sub_field('cvpt_subheading'); ?></h4>
														<?php endif ?>
														<?php if (get_sub_field('cvpt_heading')): ?>
															<h2 class="cvpt-heading"><?php echo get_sub_field('cvpt_heading'); ?></h2>
														<?php endif ?>

														<?php if (get_sub_field('cvpt_tab_body')): ?>
															<p class="cvpt-description"><?php echo get_sub_field('cvpt_tab_body'); ?></p>
														<?php endif ?>

														<?php
														$link = get_sub_field('cvpt_cta');
														if ($link):
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<a class="button btn btn-primary btn-lg bg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
														<?php endif; ?>
													</div>
												</div>
											<?php endif ?>
										</div>
									</div>

								</div>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'hero_tabs_selector'): ?>
			<section class="hero-tabs-selector" id="hero_tabs_selector<?php echo $i ?>">
				<div class="hts-slider">
					<?php if (have_rows('hts__tab')): ?><?php while (have_rows('hts__tab')) : the_row(); ?>
					<div class="hts-item-wrap">
						<div class="row hts-item" <?php if (get_sub_field('hts_bg')): ?>style="background-image: url(<?php echo get_sub_field('hts_bg'); ?>);" <?php endif ?>>
							<div class="container">
								<?php if (get_sub_field('hts_heading')): ?>
									<h2 class="hts-heading"><?php echo get_sub_field('hts_heading'); ?></h2>
								<?php endif ?>
								<div class="hts-cta-wrap">
									<?php
															$link = get_sub_field('hts_cta');
															if ($link):
																$link_url = $link['url'];
																$link_title = $link['title'] ? $link['title'] : 'Learn More';
																$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary hts-one"><?php echo esc_html($link_title); ?></a>
									<?php endif ?>
									<?php
															$link2 = get_sub_field('hts_two_cta');
															if ($link2):
																$link_url = $link2['url'];
																$link_title = $link2['title'] ? $link2['title'] : 'Learn More';
																$link_target = $link2['target'] ? $link2['target'] : '_self';
									?>
										<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary hts-one"><?php echo esc_html($link_title); ?></a>
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="slider-nav">
							<span><?php echo get_sub_field('hts__tab_title'); ?></span>
							<?php
															$link3 = get_sub_field('hts_more_cta');
															if ($link3):
																$link_url = $link3['url'];
																$link_title = $link3['title'] ? $link3['title'] : 'MORE INFORMATION';
																$link_target = $link3['target'] ? $link3['target'] : '_self';
							?>
								<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="hts-more-cta"><?php echo esc_html($link_title); ?></a>
							<?php endif ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'left_img_right_content_module'): ?>
			<section class="left-img-right-content-module" id="left_img_right_content_module<?php echo $i ?>">
				<div class="container py-5">
					<div class="lircm-wrap">
						<div class="lircm-img-wrap">
							<?php
							$image = get_sub_field('lircm_image');
							if (!empty($image)): ?>
								<img class="lircm-tab-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</div>

						<div class="lircm-content-wrap">
							<?php if (get_sub_field('lircm_subheading')): ?>
								<h4 class="lircm-subheading"><?php echo get_sub_field('lircm_subheading'); ?></h4>
							<?php endif ?>
							<?php if (get_sub_field('lircm_heading')): ?>
								<h2 class="lircm-heading"><?php echo get_sub_field('lircm_heading'); ?></h2>
							<?php endif ?>

							<?php if (get_sub_field('lircm_content')): ?>
								<p class="lircm-description"><?php echo get_sub_field('lircm_content'); ?></p>
							<?php endif ?>

							<?php
							$link = get_sub_field('lircm_cta');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="button btn btn-primary btn-lg lircm-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'call_to_action_buttons_module'): ?>
			<section class="call-to-action-buttons-module" id="call_to_action_buttons_module<?php echo $i ?>">
				<?php if (have_rows('ctabm_btns')):  while (have_rows('ctabm_btns')) : the_row(); ?>
						<div class="ctabm-wrap ctabm-btn-<?php echo get_row_index() ?>">
							<?php
							$link = get_sub_field('ctabm_btn');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="ctabm-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<span><?php echo $link_title; ?></span><?php echo get_sub_field('ctabm_cta_icon'); ?>
								</a>
							<?php endif; ?>
						</div>
				<?php endwhile;
				endif; ?>

			</section>

		<?php elseif (get_row_layout() == 'blog_module1'): ?>
			<section class="blog-module1" id="blog_module1<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('blog_heading')): ?>
						<h2 class="blog-heading text-center"><?php echo get_sub_field('blog_heading') ?></h2>
					<?php endif ?>

					<?php
					$post_type = get_sub_field('post_type') ? get_sub_field('post_type') : 'post';
					$posts_per_page = get_sub_field('posts_per_page') ? get_sub_field('posts_per_page') : 2;
					?>
					<?php
					$args = array(
						'post_type'   => $post_type,
						'post_status' => 'publish',
						'posts_per_page' => (int)$posts_per_page
					);
					$the_query = new WP_Query($args);

					if ($the_query->have_posts()) :
					?>
						<div class="row blog-listing">
							<?php while ($the_query->have_posts()) : $the_query->the_post() ?>
								<div class="col-12 col-lg-6">
									<a class="blog-item" href="<?php the_permalink() ?>" title="<?php the_title() ?>">
										<div class="blog-item-bg" <?php if (has_post_thumbnail()): ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php endif ?>></div>
										<h3 class="post-title"><?php the_title(); ?></h3>
										<div class="post-meta">
											<time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('F j, Y'); ?></time>
											<span class="post-readmore"><i class="fa fa-plus-circle" aria-hidden="true"></i> Read More</span>
										</div>
									</a>
								</div>
							<?php endwhile ?>
							<?php wp_reset_postdata(); ?>
						</div>

					<?php else : ?>
						<h3 class="no-posts">No post to display.</h3>
					<?php endif ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'blog_module2'): ?>
			<section class="blog-module2" id="blog_module2<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('blog_heading')): ?>
						<h2 class="blog-heading text-center"><?php echo get_sub_field('blog_heading') ?></h2>
					<?php endif ?>

					<?php
					$post_type = get_sub_field('post_type');
					$posts_per_page = get_sub_field('posts_per_page'); ?>
					<?php
					$args = array(
						'post_type'   => $post_type,
						'post_status' => 'publish',
						'post_per_page' => (int)$posts_per_page
					);
					$the_query = new WP_Query($args);

					if ($the_query->have_posts()) :
					?>
						<div class="row blog2-listing">
							<?php while ($the_query->have_posts()) : $the_query->the_post() ?>
								<div class=" col-12 col-md-6 col-lg-4 blog2-item">
									<?php if (has_post_thumbnail()): ?>
										<div class="blog2-img"><a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('post-thumb'); ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>"></a></div>
									<?php endif ?>

									<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
									<div class="post-meta">
										<time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('F j, Y'); ?></time>
										<a href="<?php the_permalink() ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Read More</a>
									</div>
								</div>
							<?php endwhile ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php else : ?>
						<h3 class="no-posts">No post to display.</h3>
					<?php endif ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'bg_img_content_module1'): ?>
			<section class="bg-img-content-module1" id="bg_img_content_module1<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('bicm_section_heading')): ?>
						<h2 class="bicm-section-heading"><?php echo get_sub_field('bicm_section_heading'); ?></h2>
					<?php endif ?>

					<?php if (get_sub_field('bicm_description')): ?>
						<p class="bicm-description"><?php echo get_sub_field('bicm_description') ?></p>
					<?php endif ?>
				</div>

				<div class="bicm-listing container-fluid <?php echo get_sub_field('bicm_text_alignment') ?>">
					<?php if (have_rows('bicm_items')): ?>
						<?php while (have_rows('bicm_items')): the_row();
							$animation = get_sub_field('bicm_animation_style') != 'none' ? get_sub_field('bicm_animation_style') . ' wow' : '';
						?>
							<div class="bicm-items row" <?php if (get_sub_field('bicm_item_bg')): ?>style="background-image: url(<?php echo get_sub_field('bicm_item_bg') ?>)" <?php endif ?>>

								<div class="col-md-6 bicm-content-wrap">
									<div class="bicm-content <?php echo $animation;  ?>">
										<?php
										$bicm_icon = get_sub_field('bicm_icon');
										if (get_sub_field('bicm_icon')): ?>
											<img class="bicm-right-icon" src="<?php echo $bicm_icon['url']; ?>" alt="<?php echo $bicm_icon['alt']; ?>" title="<?php echo $bicm_icon['title']; ?>">
										<?php endif ?>
										<?php if (get_sub_field('bicm_title')): ?>
											<h3 class="bicm-title"><?php echo get_sub_field('bicm_title'); ?></h3>
										<?php endif ?>
										<?php if (get_sub_field('bicm_description')): ?>
											<div class="bicm-description"><?php echo get_sub_field('bicm_description'); ?></div>
										<?php endif ?>

										<?php
										$link = get_sub_field('bicm_item_link');
										if ($link):
											$link_url = $link['url'];
											$link_title = $link['title'] ? $link['title'] : 'Subheader';
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="icm-item-btn button btn btn-outline-light btn-lg " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 bicm-img-wrap">
									<img class="bicm-left-img" src="<?php echo get_sub_field('bicm_item_bg') ?>" alt="<?php echo get_sub_field('bicm_title'); ?>" title="<?php echo get_sub_field('bicm_title'); ?>">
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif ?>
				</div>
			</section>



		<?php elseif (get_row_layout() == 'bg_img_content_module2'): ?>
			<section class="bg-img-content-module2" id="bg_img_content_module2<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('bicm_section_heading')): ?>
						<h2 class="bicm-section-heading"><?php echo get_sub_field('bicm_section_heading'); ?></h2>
					<?php endif ?>

					<?php if (get_sub_field('bicm_description')): ?>
						<p class="bicm-description"><?php echo get_sub_field('bicm_description') ?></p>
					<?php endif ?>
				</div>

				<div class="bicm-listing container-fluid <?php echo get_sub_field('bicm_text_alignment') ?>">
					<?php if (have_rows('bicm_items')): ?>
						<?php while (have_rows('bicm_items')): the_row();
							$animation = get_sub_field('bicm_animation_style') != 'none' ? get_sub_field('bicm_animation_style') . ' wow' : '';
						?>
							<div class="bicm-items row" <?php if (get_sub_field('bicm_item_bg')): ?>style="background-image: url(<?php echo get_sub_field('bicm_item_bg') ?>)" <?php endif ?>>

								<div class="col-md-6 bicm-content-wrap">
									<div class="bicm-content <?php echo $animation;  ?>">
										<?php
										$bicm_icon = get_sub_field('bicm_icon');
										if (get_sub_field('bicm_icon')): ?>
											<img class="bicm-right-icon" src="<?php echo $bicm_icon['url']; ?>" alt="<?php echo $bicm_icon['alt']; ?>" title="<?php echo $bicm_icon['title']; ?>">
										<?php endif ?>
										<?php if (get_sub_field('bicm_title')): ?>
											<h3 class="bicm-title"><?php echo get_sub_field('bicm_title'); ?></h3>
										<?php endif ?>
										<?php if (get_sub_field('bicm_description')): ?>
											<div class="bicm-description"><?php echo get_sub_field('bicm_description'); ?></div>
										<?php endif ?>

										<?php
										$link = get_sub_field('bicm_item_link');
										if ($link):
											$link_url = $link['url'];
											$link_title = $link['title'] ? $link['title'] : 'Subheader';
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="bicm-item-btn btn btn-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 bicm-img-wrap">
									<img class="bicm-left-img" src="<?php echo get_sub_field('bicm_item_bg') ?>" alt="<?php echo get_sub_field('bicm_title'); ?>" title="<?php echo get_sub_field('bicm_title'); ?>">
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'item_listing_on_bg_module'): ?>
			<section class="item-listing-on-bg-module text-center" id="item_listing_on_bg_module<?php echo $i ?>" <?php if (get_sub_field('ilb_bg')): ?>style="background-image: url(<?php echo get_sub_field('ilb_bg'); ?>)" <?php endif ?>>
				<div class="container">
					<?php if (get_sub_field('ilb_heading')): ?>
						<h2 class="ilb-heading"><?php echo get_sub_field('ilb_heading'); ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('ilb_description')): ?>
						<p class="ilb-description"><?php echo get_sub_field('ilb_description'); ?></p>
					<?php endif ?>

					<?php if (have_rows('lib_items')): ?>
						<div class="row ilb-listing">
							<?php while (have_rows('lib_items')): the_row(); ?>
								<div class="col-lg-2 col-md-4 col-6 ilb-item">
									<?php
									$ilb_image = get_sub_field('ilb_image');
									if ($ilb_image): ?>
										<img class="ilb-image" src="<?php echo $ilb_image['url'] ?>" alt="<?php echo $ilb_image['alt'] ?>" title="<?php echo $ilb_image['title'] ?>">
									<?php endif ?>

									<?php if (get_sub_field('ilb_title')): ?>
										<h3 class="ilb-title"><?php echo get_sub_field('ilb_title'); ?></h3>
									<?php endif ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif ?>

					<?php
					$link = get_sub_field('ilb_section_link');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'] ? $link['title'] : 'Subheader';
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="ilb-item-btn btn btn-primary btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</section>


		<?php elseif (get_row_layout() == 'left_content_right_icon_title_listing_module'): ?>
			<section class="left-content-right-icon-title-listing-module" id="left_content_right_icon_title_listing_module<?php echo $i ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-6">

							<div class="lcrilm-content-wrap">
								<?php if (get_sub_field('lcrilm_heading')): ?>
									<h3 class="lcrilm-heading"><?php echo get_sub_field('lcrilm_heading'); ?></h3>
								<?php endif ?>
								<?php if (get_sub_field('lcrilm_description')): ?>
									<p class="lcrilm-description"><?php echo get_sub_field('lcrilm_description'); ?></p>
								<?php endif ?>

								<?php
								$link = get_sub_field('lcrilm_link');
								if ($link):
									$link_url = $link['url'];
									$link_title = $link['title'] ? $link['title'] : 'Subheader';
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="lcrilm-item-btn btn btn-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
								<?php endif; ?>
							</div>

						</div>

						<div class="lcrilm-icon-title-list col-md-6">

							<?php if (have_rows('icon_title_listing')): ?>
								<div class="row lcrilm-icon-title-listing">
									<?php while (have_rows('icon_title_listing')): the_row(); ?>
										<div class="col-md-6 lcrilm-icon-title-item">
											<?php
											$link = get_sub_field('lcrilm_link');
											if ($link):
												$link_url = $link['url'];
												$link_title = $link['title'] ? $link['title'] : 'Subheader';
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="lcrilm-item-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php endif; ?>


												<?php
												$ilb_image = get_sub_field('lcrilm_icon');
												if ($ilb_image): ?>
													<img class="lcrilm-image" src="<?php echo $ilb_image['url'] ?>" alt="<?php echo $ilb_image['alt'] ?>" title="<?php echo $ilb_image['title'] ?>">
												<?php endif ?>

												<!--<?php //if (get_sub_field('lcrilm_title')): 
													?>
										<h3 class="lcrilm-title"><?php //echo get_sub_field('lcrilm_title'); 
																	?></h3>
									<?php //endif 
									?> -->
												<?php if ($link):  ?>
												</a>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'buckets_hover_focus'): ?>
			<section class="hero-interactive-1-module" id="buckets_hover_focus<?php echo $i ?>">
				<?php if (get_sub_field('bhf_heading')): ?>
					<h2 class="hi1m-heading"><?php echo get_sub_field('bhf_heading') ?></h2>
				<?php endif ?>

				<?php if (have_rows('bhf_items')): ?>
					<div class="hi1m-item-listing">
						<?php while (have_rows('bhf_items')): the_row(); ?>
							<?php
							$link = get_sub_field('bhf_button1');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'] ? $link['title'] : 'Learn More';
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="hi1m-item him-item <?php if (get_row_index() == 1): ?>hi1m-item-hovered<?php endif ?>" <?php if (get_sub_field('bhf_bg')): ?>style="background-image: url(<?php echo get_sub_field('bhf_bg') ?>);" <?php endif ?>>
								<?php endif; ?>

								<div class="hi1m-content">
									<?php if (get_sub_field('bhf_title')): ?>
										<h3 class="hi1m-hover-title"><?php echo get_sub_field('bhf_title') ?></h3>
									<?php endif ?>

									<?php if (get_sub_field('bhf_description')): ?>
										<div class="hi1m-description"><?php echo get_sub_field('bhf_description') ?></div>
									<?php endif ?>

									<?php if ($link_title): ?>
										<span class="btn hi1m-link"><?php echo esc_html($link_title); ?></span>
									<?php endif ?>
								</div>

								<?php if (get_sub_field('bhf_title')): ?>
									<h3 class="hi1m-title"><?php echo get_sub_field('bhf_title') ?></h3>
								<?php endif ?>

								<?php if ($link): ?>
								</a>
							<?php endif ?>

						<?php endwhile ?>
					</div>
				<?php endif ?>
			</section>

			<section class="hero-interactive-1-mobile-carousel" id="buckets_hover_focus<?php echo $i ?>">
				<?php if (have_rows('bhf_items')): ?>
					<?php while (have_rows('bhf_items')): the_row(); ?>

						<div class="hi1m-slide" <?php if (get_sub_field('bhf_bg')): ?>style="background-image: url(<?php echo get_sub_field('bhf_bg') ?>);" <?php endif ?>>
							<div class="container">

								<div class="hi1m-content">
									<?php if (get_sub_field('bhf_title')): ?>
										<h3 class="hi1m-hover-title"><?php echo get_sub_field('bhf_title') ?></h3>
									<?php endif ?>

									<?php if (get_sub_field('bhf_description')): ?>
										<div class="hi1m-description"><?php echo get_sub_field('bhf_description') ?></div>
									<?php endif ?>

									<?php
									$link = get_sub_field('bhf_button1');
									if ($link):
										$link_url = $link['url'];
										$link_title = $link['title'] ? $link['title'] : 'Learn More';
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary hi2m-link"><?php echo esc_html($link_title); ?></a>
									<?php endif ?>
									<?php
									$link2 = get_sub_field('bhf_button2');
									if ($link2):
										$link_url = $link2['url'];
										$link_title = $link2['title'] ? $link2['title'] : 'Learn More';
										$link_target = $link2['target'] ? $link2['target'] : '_self';
									?>
										<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn hi1m-link"><?php echo esc_html($link_title); ?></a>
									<?php endif ?>
								</div>
							</div>

						</div>

					<?php endwhile ?>
				<?php endif ?>
			</section>

		<?php elseif (get_row_layout() == 'hero-interactive-2-module'): ?>
			<section class="hero-interactive-2-module" id="hero-interactive-2-module<?php echo $i ?>">
				<div class="hi2m-wrapper">
					<div class="container">
						<?php if (get_sub_field('hi2m_heading')): ?><h1 class="hi2m-header"><?php echo get_sub_field('hi2m_heading'); ?></h1><?php endif; ?>
						<?php if (get_sub_field('hi2m_description')): ?><p class="hi2m-description"><?php echo get_sub_field('hi2m_description'); ?></p><?php endif; ?>
					</div>
				</div>

				<div class="hi2m-carousel" <?php if (get_sub_field('hi2m_hero_image')): ?> style="background-image: url(<?php echo get_sub_field('hi2m_hero_image'); ?>);" <?php endif; ?>>
					<?php if (have_rows('hi2m_items')): ?>
						<?php while (have_rows('hi2m_items')) : the_row(); ?>
							<div class="hi2m-slide" data-imgsrc="<?php echo get_sub_field('hi2m_image'); ?>" style="background-image: url(<?php echo get_sub_field('hi2m_image'); ?>);">

								<?php if (get_sub_field('hi2m_title')): ?>
									<h2 class="hi2m-slide-title" tabindex="0"><span><?php echo get_sub_field('hi2m_title'); ?></span></h2>
								<?php endif; ?>

								<div class="hi2m-slider-hover-content">
									<?php if (get_sub_field('hi2m_title')): ?>
										<h2 class="hi2m-hover-title"><?php echo get_sub_field('hi2m_title'); ?></h2>
									<?php endif ?>

									<?php if (get_sub_field('hi2m_text')): ?>
										<p class="hi2m-slide-description"><?php echo get_sub_field('hi2m_text'); ?></p>
									<?php endif; ?>

									<?php $hi2m_cta = get_sub_field('hi2m_cta');
									if ($hi2m_cta): ?>
										<a href="<?php echo $hi2m_cta['url']; ?>" class="hi2m-slide-btn btn btn-primary"><?php echo $hi2m_cta['title']; ?></a>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'testimonial_module'): ?>
			<section class="testimonial-module" id="testimonial_module<?php echo $i ?>">
				<div class="container">
					<?php if (have_rows('tm_items')): ?>
						<div class="tm-carousel">

							<?php while (have_rows('tm_items')) : the_row(); ?>
								<div class="tm-slide">
									<div class="tm-content-wrap">
										<?php
										$image = get_sub_field('tm_left_image');
										if (!empty($image)): ?>
											<figure class="tm-img-wrap"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></figure>
										<?php endif; ?>

										<div class="tm-right-content">
											<?php if (get_sub_field('tm_title')): ?>
												<h2 class="tm-title"><?php echo get_sub_field('tm_title'); ?></h2>
											<?php endif ?>

											<?php if (get_sub_field('tm_text')): ?>
												<p class="tm-text"><?php echo get_sub_field('tm_text'); ?></p>
											<?php endif; ?>

											<?php if (get_sub_field('tm_client_name')): ?>
												<strong class="tm-client-name"><?php echo get_sub_field('tm_client_name') ?></strong>
											<?php endif ?>

										</div>
									</div>
								</div>
							<?php endwhile; ?>

						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'testimonial_card_module'): ?>
			<section class="testimonial-card-module" id="testimonial_card_module<?php echo $i ?>">
				<div class="container">
					<?php if (have_rows('tcm_items')): ?>
						<div class="tcm-carousel center">

							<?php while (have_rows('tcm_items')) : the_row(); ?>
								<div class="tcm-slide">
									<div class="tcm-content-wrap">
										<?php
										$image = get_sub_field('tcm_left_image');
										if (!empty($image)): ?>
											<figure class="tcm-img-wrap"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></figure>
										<?php endif; ?>

										<div class="tcm-right-content">
											<?php if (get_sub_field('tcm_title')): ?>
												<h2 class="tcm-title"><?php echo get_sub_field('tcm_title'); ?></h2>
											<?php endif ?>

											<?php if (get_sub_field('tcm_text')): ?>
												<p class="tcm-text"><?php echo get_sub_field('tcm_text'); ?></p>
											<?php endif; ?>

											<?php if (get_sub_field('tcm_client_name')): ?>
												<span class="tcm-sub-header"><?php echo get_sub_field('tcm_client_name') ?></span>
											<?php endif ?>
											<div>
												<?php
												$link = get_sub_field('tcm_button1');
												if ($link):
													$link_url = $link['url'];
													$link_title = $link['title'] ? $link['title'] : 'Learn More';
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btn btn-primary hi2m-link"><?php echo esc_html($link_title); ?></a>
												<?php endif ?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>

						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'industries_we_serve_module'): ?>
			<section class="py-5 industries-we-serve-module" id="industries_we_serve_module<?php echo $i ?>">
				<div class="container py-4">
					<?php if (get_sub_field('iwsm_section_heading')): ?>
						<h2 class="iwsm-heading "><?php echo get_sub_field('iwsm_section_heading'); ?></h2>
					<?php endif ?>

					<div class="row">
						<div class="col-md-4 col-lg-6 d-none d-md-block">
							<!-- Tabs nav -->
							<?php if (have_rows('iwsm_tabs_items')): ?>
								<div class="nav row nav-pills nav-pills-custom" id="v-pills-<?php echo get_row_index() ?>-tab" role="tablist" aria-orientation="vertical">
									<?php while (have_rows('iwsm_tabs_items')): the_row(); ?>
										<a class="col-12 col-lg-6 nav-link p-2  <?php if (get_row_index() == 1): ?>active<?php endif ?>" id="v-pills-<?php echo get_row_index(); ?>-tab" data-toggle="pill" href="#v-pills-<?php echo get_row_index(); ?>" role="tab" aria-controls="v-pills-<?php echo get_row_index(); ?>" aria-selected="<?php if (get_row_index() == 1): ?>true<?php else: ?>false<?php endif ?>">
											<div class="iwsm-wrap">
												<?php
												$image = get_sub_field('title_thumbnail_image');
												if ($image): ?>
													<img src="<?php echo $image['url'] ?>" class="on" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>">
												<?php endif ?>
												<?php
												$image2 = get_sub_field('title_thumbnail_image_hover');
												if ($image2): ?>
													<img src="<?php echo $image2['url'] ?>" class="off" alt="<?php echo $image2['alt'] ?>" title="<?php echo $image2['title'] ?>">
												<?php endif ?>
												<?php if (get_sub_field('iwsm_title')): ?>
													<span class="font-weight-bold small text-uppercase"><?php echo get_sub_field('iwsm_title') ?></span>
												<?php endif ?>
											</div>
										</a>

									<?php endwhile ?>
								</div>
							<?php endif ?>
						</div>


						<div class="col-md-8 col-lg-6">
							<!-- Tabs content -->
							<?php if (have_rows('iwsm_tabs_items')): ?>
								<div class="tab-content" id="v-pills-tabContent" role="tablist">
									<?php while (have_rows('iwsm_tabs_items')): the_row(); ?>

										<div class="tab-pane fade <?php if (get_row_index() == 1): ?>show active<?php endif ?>" id="v-pills-<?php echo get_row_index(); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo get_row_index(); ?>-tab">
											<div class="d-md-none" role="tab" id="heading-<?php echo get_row_index() ?>">
												<a class="col-12 nav-link mb-3 p-2" data-toggle="collapse" href="#collapse-<?php echo get_row_index() ?>" aria-selected="<?php if (get_row_index() == 1): ?>true<?php else: ?>false<?php endif ?>" aria-expanded="<?php if (get_row_index() == 1): ?>true<?php else: ?>false<?php endif ?>" aria-controls="collapse-<?php echo get_row_index() ?>">
													<?php
													$image = get_sub_field('title_thumbnail_image');
													if ($image): ?>
														<img src="<?php echo $image['url'] ?>" class="on" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>">
													<?php endif ?>
													<?php
													$image2 = get_sub_field('title_thumbnail_image_hover');
													if ($image2): ?>
														<img src="<?php echo $image2['url'] ?>" class="off" alt="<?php echo $image2['alt'] ?>" title="<?php echo $image2['title'] ?>">
													<?php endif ?>
													<?php if (get_sub_field('iwsm_title')): ?>
														<span class="font-weight-bold small text-uppercase"><?php echo get_sub_field('iwsm_title') ?></span>
													<?php endif ?>
												</a>
											</div>

											<div id="collapse-<?php echo get_row_index() ?>" class="collapse p-4 mb-3 <?php if (get_row_index() == 1): ?>show<?php endif ?>" data-parent="#content" role="tabpanel" aria-labelledby="heading-<?php echo get_row_index() ?>">
												<?php
												$iwsm_image = get_sub_field('iwsm_image');
												if ($iwsm_image): ?>
													<img class="mb-4 iwsm-img" src="<?php echo $iwsm_image['url'] ?>" alt="<?php echo $iwsm_image['alt'] ?>" title="<?php echo $iwsm_image['title'] ?>">
												<?php endif ?>
												<?php if (get_sub_field('iwsm_title')): ?>
													<h3 class="iwsm-title"><?php echo get_sub_field('iwsm_title') ?></h3>
												<?php endif ?>

												<?php if (get_sub_field('iwsm_description')): ?>
													<div class="text-muted mb-2 iwsm-description"><?php echo get_sub_field('iwsm_description') ?></div>
												<?php endif ?>

												<?php
												$iwsm_link = get_sub_field('iwsm_link');
												if ($iwsm_link):
													$iwsm_link_url = $iwsm_link['url'];
													$iwsm_link_title = $iwsm_link['title'];
													$iwsm_link_target = $iwsm_link['target'] ? $iwsm_link['target'] : '_self';
												?>
													<a class="btn btn-primary iwsm-link" href="<?php echo esc_url($iwsm_link_url); ?>" target="<?php echo esc_attr($iwsm_link_target); ?>"><?php echo esc_html($iwsm_link_title); ?></a>
												<?php endif; ?>
											</div>
										</div>
									<?php endwhile ?>
								</div>
							<?php endif ?>
						</div>

					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'robotic_system_types_module'): ?>
			<section class="robotic-system-types-module" id="robotic-system-types-module">
				<div class="container">
					<?php if (get_sub_field('rstm_section_heading')): ?>
						<h2 class="rstm-section-heading"><?php echo get_sub_field('rstm_section_heading'); ?></h2>
					<?php endif ?>

					<?php if (get_sub_field('rstm_section_description')): ?>
						<div class="rstm-section-description"><?php echo get_sub_field('rstm_section_description'); ?></div>
					<?php endif ?>


					<?php if (have_rows('rstm_tab')): ?>
						<ul class="nav nav-tabs rstm-nav-tabs" role="tablist">
							<?php while (have_rows('rstm_tab')) : the_row(); ?>
								<li class="rstm-nav-item">
									<a href="#tab<?php echo get_row_index(); ?>" data-toggle="tab" class="<?php if (get_row_index() == 1): ?>active<?php endif; ?>" role="tab">

										<?php
										$image = get_sub_field('rstm_title_image');
										if (!empty($image)): ?>
											<figure><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></figure>
										<?php endif; ?>

										<span><?php echo get_sub_field('rstm_tab_title'); ?></span>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>

					<?php if (have_rows('rstm_tab')): ?>
						<div class="tab-content rstm-tab-content clearfix">
							<?php while (have_rows('rstm_tab')) : the_row(); ?>

								<div class="tab-pane rstm-tab-pane <?php if (get_row_index() == 1): ?>active<?php endif ?>" id="tab<?php echo get_row_index(); ?>" role="tabpanel">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent=".tab-pane" href="#collapse<?php echo get_row_index(); ?>">
													<?php if (!empty($image)): ?>
														<figure><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></figure>
													<?php endif; ?>
													<span><?php echo get_sub_field('rstm_tab_title'); ?></span>
												</a>
											</h4>
										</div>

										<div id="collapse<?php echo get_row_index(); ?>" class="panel-collapse collapse in">
											<?php //if (get_sub_field('rstm_tab_body')): 
											?>

											<div class="rstm-tab-body panel-body">
												<div class="rstm-tab-innercontent">
													<?php
													$content_image = get_sub_field('rstm_right_content_image');
													if (!empty($content_image)): ?>
														<figure class="rstm-tab-img"><img src="<?php echo esc_url($content_image['url']); ?>" alt="<?php echo esc_attr($content_image['alt']); ?>" title="<?php echo esc_attr($content_image['alt']); ?>" /></figure>
													<?php endif; ?>
												</div>

												<div class="rstm-tab-innercontent">
													<div class="rstm-content-wrap">
														<?php if (get_sub_field('rstm_body_heading')): ?>
															<h2 class="rstm-heading"><?php echo get_sub_field('rstm_body_heading'); ?></h2>
														<?php endif ?>

														<?php if (get_sub_field('rstm_body_description')): ?>
															<div class="rstm-description"><?php echo get_sub_field('rstm_body_description'); ?></div>
														<?php endif ?>

														<?php
														$link = get_sub_field('rstm_cta');
														if ($link):
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<a class="button btn btn-primary btn-lg bg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<?php //endif 
											?>
										</div>
									</div>

								</div>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'video_with_description_module'): ?>
			<section class="video-with-description-module" id="video_with_description_module<?php echo $i ?>">
				<div class="container">
					<div class="row vwdm-content-wrap">
						<div class="vwdm-media-wrap col-md-5">
							<?php
							$image = get_sub_field('vwdm_cover_image');
							if (!empty($image)): ?>
								<img class="vwdm-tab-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>

							<a href="https://www.youtube.com/watch?v=<?php echo get_sub_field('vwdm_youtube_id') ?>" class="btn btn-primary play-video-btn popup-youtube">Play Video <span class="vwdm-play-icon"><i class="fa fa-play" aria-hidden="true"></i></span></a>
						</div>

						<div class="vwdm-content col-md-7">
							<?php if (get_sub_field('vwdm_content')): ?>
								<div class="vwdm-content-text"><?php echo get_sub_field('vwdm_content'); ?></div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'value_prop_module'): ?>
			<section class="value-prop-module" id="value_prop_module<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('vpm_section_content')): ?>
						<div class="vpm-section-content"><?php echo get_sub_field('vpm_section_content'); ?></div>
					<?php endif ?>

					<?php if (have_rows('vpm_items')): ?>
						<div class="row vpm-row">
							<?php while (have_rows('vpm_items')) : the_row(); ?>
								<div class="col-md-6 col-lg-3 vpm-col">
									<div class="vpm-item">
										<?php
										$image = get_sub_field('vpm_cover_image');
										if (!empty($image)): ?>
											<figure class="vpm-image-wrap"><img class="vwdm-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" /></figure>
										<?php endif; ?>

										<?php if (get_sub_field('vpm_heading')): ?>
											<h2 class="vpm-heading"><?php echo get_sub_field('vpm_heading'); ?></h2>
										<?php endif ?>

										<?php if (get_sub_field('vpm_description')): ?>
											<div class="vpm-description"><?php echo get_sub_field('vpm_description'); ?></div>
										<?php endif ?>

									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'featured_listing_module'): ?>
			<?php $listingType = get_sub_field('flm_listing_type') ?>
			<section class="featured-listing-module" id="<?php if (get_sub_field('flm_section_id')): ?><?php echo get_sub_field('flm_section_id'); ?><?php endif ?>">
				<div class="container">
					<?php if (get_sub_field('flm_section_title')): ?>
						<h2 class="flm-section-title"><?php echo get_sub_field('flm_section_title'); ?></h2>
					<?php endif ?>

					<?php if (get_sub_field('flm_section_content')): ?>
						<div class="flm-section-content mb-5"><?php echo get_sub_field('flm_section_content'); ?></div>
					<?php endif ?>

					<?php if (have_rows('flm_items')): ?>
						<div class="flm-featured-listing">
							<ul class="<?php echo $listingType; ?>">
								<?php while (have_rows('flm_items')) : the_row(); ?>
									<li class="flm-text"><?php echo get_sub_field('flm_text') ?></li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif ?>

				</div>
			</section>

		<?php elseif (get_row_layout() == 'content_on_bg_module'): ?>
			<section class="content-on-bg-module" id="content_on_bg_module<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('cobm_section_title')): ?>
						<h2 class="cobm-section-title mb-5"><?php echo get_sub_field('cobm_section_title'); ?></h2>
					<?php endif ?>

					<?php if (get_sub_field('cobm_section_content')): ?>
						<div class="cobm-section-content"><?php echo get_sub_field('cobm_section_content'); ?></div>
					<?php endif ?>
				</div>

				<?php if (have_rows('cobm_items')): ?>
					<div class="cobm-listing">

						<?php while (have_rows('cobm_items')) : the_row(); ?>

							<div class="cobm-item" <?php if (get_sub_field('cobm_bg')): ?>style="background-image: url(<?php echo get_sub_field('cobm_bg') ?>)" <?php endif ?>>
								<?php
								$link = get_sub_field('cobm_link');
								if ($link):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="cobm-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php endif ?>

									<div class="cobm-content-wrap">
										<?php if (get_sub_field('cobm_title')): ?>
											<h2 class="cobm-title"><?php echo get_sub_field('cobm_title') ?></h2>
										<?php endif ?>

										<?php if (get_sub_field('cobm_text')): ?>
											<div class="cobm-text"><?php echo get_sub_field('cobm_text') ?></div>
										<?php endif ?>

									</div>

									<?php if ($link):  ?>
									</a>
								<?php endif ?>
							</div>
						<?php endwhile; ?>

					</div>
				<?php endif ?>

			</section>

		<?php elseif (get_row_layout() == 'numbered_list_module'): ?>
			<section class="numbered-list-module" id="numbered_list_module<?php echo $i ?>">
				<div class="container">
					<?php if (have_rows('nlistm_items')): ?>
						<div class="row nlm-listing">

							<?php while (have_rows('nlistm_items')) : the_row(); ?>
								<div class="col-md-4 nlistm-item">
									<div class="nlistm-item-wrap">
										<?php echo get_sub_field('nlistm_title') ?>
									</div>
								</div>
							<?php endwhile; ?>

						</div>
					<?php endif ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'pillarpage_linklist_module'): ?>
			<section class="pillarpage-linklist-module" id="pillarpage_linklist_module<?php echo $i ?>">
				<div class="container">
					<?php $pplm_menu_name = get_sub_field('pplm_menu_name') ? get_sub_field('pplm_menu_name') : "Pillar Page Navigation"; ?>
					<?php
					wp_nav_menu(array(
						'menu' => $pplm_menu_name,
						'menu_class' => "pillar-nav",
					));
					?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'categories_module'): ?>
			<section class="categories-module" id="categories_module<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('cat_description')): ?>
						<p class="cat-description"><?php echo get_sub_field('cat_description') ?></p>
					<?php endif ?>

					<?php if (have_rows('cat_items')): ?>
						<div class="row cat-listing">

							<?php while (have_rows('cat_items')) : the_row(); ?>
								<div class="col-md-6 cat-item">
									<?php
									$link = get_sub_field('cat_link');
									if ($link):
										$link_url = $link['url'];
										$link_title = get_sub_field('cat_title') ? get_sub_field('cat_title') : $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="cat-item-wrap" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="cat-item-title"><?php echo esc_html($link_title); ?><span class="material-icons">arrow_forward</span></span></a>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>

						</div>
					<?php endif ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'hero_video_banner_module'): ?>
			<section class="hero-video-banner hero-5-module" <?php if (get_sub_field('hm5_bg')): ?>style="background-image: url(<?php echo get_sub_field('hm5_bg') ?>);" <?php endif; ?>>
				<?php
				$file = get_sub_field('hm5_video_bg');
				if ($file): ?>
					<video autoplay="" loop="" class="video-background" id="video-background" muted="" plays-inline="">
						<source src="<?php echo $file['url']; ?>" type="video/<?php echo $file['subtype']; ?>">
						Your browser does not support HTML5 video.
					</video>
				<?php endif; ?>

				<div class="container">
					<?php $animation = get_sub_field('animation_style') != 'none' ? get_sub_field('animation_style') . ' animated' : ''; ?>
					<div class="hm5-content <?php echo $animation; ?>">

						<div class="hm5-text">
							<?php if (get_sub_field('hm5_heading')): ?>
								<h1 class="hm5-heading"><?php echo get_sub_field('hm5_heading'); ?></h1>
							<?php endif ?>

							<?php if (get_sub_field('hm5_description')): ?>
								<p class="hm5-description"><?php echo get_sub_field('hm5_description'); ?></p>
							<?php endif ?>
						</div>

						<div class="hm5-btn-wrap">
							<?php
							$link = get_sub_field('hm5_cta');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="btn btn-alt hm5-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'hero_seven_video_banner_module'): ?>
			<section class="hero-seven-banner-module hero-7-module">
				<div class="container">
					<?php $animation = get_sub_field('animation7_style') != 'none' ? get_sub_field('animation7_style') . ' animated' : ''; ?>
					<div class="hm7-content <?php echo $animation; ?>">

						<div class="hm7-text">
							<?php if (get_sub_field('hm7_heading')): ?>
								<h1 class="hm7-heading"><?php echo get_sub_field('hm7_heading'); ?></h1>
							<?php endif ?>

							<?php if (get_sub_field('hm7_description')): ?>
								<p class="hm7-description"><?php echo get_sub_field('hm7_description'); ?></p>
							<?php endif ?>
						</div>

						<div class="hm7-btn-wrap">
							<?php
							$link = get_sub_field('hm7_cta');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="btn btn-alt hm7-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
							<?php
							$link2 = get_sub_field('hm7_two_cta');
							if ($link2):
								$link_url = $link2['url'];
								$link_title = $link2['title'];
								$link_target = $link2['target'] ? $link2['target'] : '_self';
							?>
								<a class="btn btn-alt-on-color hm7-cta2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
						</div>
						<div class="hm7-video-wrap" <?php if (get_sub_field('hm7_bg')): ?>style="background-image: url(<?php echo get_sub_field('hm7_bg') ?>);" <?php endif; ?>>
							<?php
							$file = get_sub_field('hm7_video_bg');
							if ($file): ?>
								<video autoplay="" loop="" class="video-background" id="video-background" muted="" plays-inline="">
									<source src="<?php echo $file['url']; ?>" type="video/<?php echo $file['subtype']; ?>">
									Your browser does not support HTML5 video.
								</video>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'hero6_module_module'): ?>
			<section class="hero6-module clearfix">
				<div class="hm6-content-wrap">
					<div class="hm6-content">
						<?php if (get_sub_field('hm6_heading')): ?>
							<h1 class="hm6-heading"><?php echo get_sub_field('hm6_heading'); ?></h1>
						<?php endif ?>

						<div class="hm6-btn-wrap">
							<?php
							$link = get_sub_field('hm6_cta1');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="btn btn-alt hm6-cta1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>

							<?php
							$link = get_sub_field('hm6_cta2');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="btn btn-alt-on-color hm6-cta2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="hm6-subcategory-wrap" <?php if (get_sub_field('hm6_bg')): ?>style="background-image: url(<?php echo get_sub_field('hm6_bg') ?>);" <?php endif; ?>>
					<div class="hm6-subcategory-content">
						<?php if (get_sub_field('hm6_title')): ?>
							<h2 class="hm6-title"><?php echo get_sub_field('hm6_title'); ?></h2>
						<?php endif ?>

						<?php if (get_sub_field('hm6_description')): ?>
							<p class="hm6-description"><?php echo get_sub_field('hm6_description'); ?></p>
						<?php endif ?>

						<?php
						$link = get_sub_field('hm6_link');
						if ($link):
							$link_url = $link['url'];
							$link_title = $link['title'] ? $link['title'] : 'Learn More';
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a class="hm6-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'content_associations_module'): ?>
			<section class="content-associations-module py-5">
				<div class="container">
					<div class="row cam-listing">
						<?php if (get_sub_field('cam_section_header')): ?>
							<div class="col-lg-3 col-md-12 col-12 cam-item">
								<h2 class="cam-title"><?php echo get_sub_field('cam_section_header'); ?></h2>
							</div>
						<?php endif ?>
						<?php if (have_rows('cam_add_logos1')): ?>
							<?php while (have_rows('cam_add_logos1')): the_row(); ?>
								<div class="col-lg-2 col-md-3 col-6 cam-item">
									<?php
									$image = get_sub_field('cam_add_logo');
									if (!empty($image)): ?>
										<img class="cami-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
								</div>

							<?php endwhile; ?>
						<?php endif ?>
					</div>

				</div>
			</section>


		<?php elseif (get_row_layout() == 'content-associations_module_two'): ?>
			<section class="content-associations-module-two py-5">
				<div class="container ">
					<?php if (get_sub_field('cam_section_header')): ?>
						<h2 class="cam-title"><?php echo get_sub_field('cam_section_header'); ?></h2>
					<?php endif ?>
					<?php if (have_rows('cam_add_logos')): ?>
						<div class="row cam-listing">
							<?php while (have_rows('cam_add_logos')): the_row(); ?>
								<div class="col-lg-2 col-md-4 col-6 cam-item">
									<?php
									$image1 = get_sub_field('cam_add_logo');
									if (!empty($image1)): ?>
										<img class="cami-img" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" title="<?php echo esc_attr($image1['alt']); ?>" />
									<?php endif; ?>
								</div>

							<?php endwhile; ?>
						</div>
					<?php endif ?>
					<?php
					$link = get_sub_field('cam_cta');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'] ? $link['title'] : 'Subheader';
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="cami-item-btn btn btn-primary btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'download_ebook_module'): ?>
			<section class="download-ebook-module py-5">
				<div class="container">
					<div class="row dem-listing">
						<div class="col-md-6 dem-content-wrap">
							<?php if (get_sub_field('dem_header')): ?>
								<h2 class="dem-title"><?php echo get_sub_field('dem_header'); ?></h2>
							<?php endif ?>
							<?php echo get_sub_field('dem_content'); ?>
							<?php
							$link = get_sub_field('dem_cta');
							if ($link):
								$link_url = $link['url'];
								$link_title = $link['title'] ? $link['title'] : 'Subheader';
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="dem-item-btn btn btn-primary btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
							<?php endif; ?>
						</div>
						<div class="col-md-6 dem-image-wrap">
							<?php
							$image1 = get_sub_field('dem_image');
							if (!empty($image1)): ?>
								<img class="dem-img" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" title="<?php echo esc_attr($image1['alt']); ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'areas_we_serve'): ?>
			<section class="areas-we-serve-module py-5">
				<div class="container">
					<?php if (get_sub_field('aws_header')): ?>
						<h2 class="awsm-title"><?php echo get_sub_field('aws_header'); ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('aws_sub_header')): ?>
						<p class="awsm-text"><?php echo get_sub_field('aws_sub_header'); ?></p>
					<?php endif ?>
					<?php if (get_sub_field('map_code')): ?>
						<div class="awsm-map"><?php echo get_sub_field('map_code'); ?></div>
					<?php endif ?>
				</div>
			</section>


		<?php elseif (get_row_layout() == 'content_buckets_small_slider'): ?>
			<section class="content-buckets-small-slider-module py-5">
				<div class="container">
					<?php if (get_sub_field('cbss_section_header')): ?>
						<h2 class="cbssm-title"><?php echo get_sub_field('cbss_section_header'); ?></h2>
					<?php endif ?>
					<div class="cbs-slider">
						<?php if (have_rows('cbss_add_buckets')): ?>
							<?php while (have_rows('cbss_add_buckets')): the_row(); ?>
								<div> <?php
										$link = get_sub_field('cbss_bucket_link');
										if ($link):
											$link_url = $link['url'];
											$link_title = $link['title'] ? $link['title'] : 'Subheader';
											$link_target = $link['target'] ? $link['target'] : '_self';
										?><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"> <?php
																																		$image1 = get_sub_field('cbss_bucket_image');
																																		if (!empty($image1)): ?>
												<img class="dem-img" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" title="<?php echo esc_attr($image1['alt']); ?>" />
											<?php endif; ?> <?php if (get_sub_field('cbss_bucket_title')): ?><h3><?php echo get_sub_field('cbss_bucket_title'); ?></h3><?php endif ?></a><?php endif ?>
								</div>
							<?php endwhile; ?>
						<?php endif ?>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'products_module'): ?>
			<section class="product-module" id="product-module<?php echo $i ?>">
				<div class="container">
					<?php if (get_sub_field('pm_heading')): ?>
						<h2 class="pm-heading"><?php echo get_sub_field('pm_heading'); ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('pm_content')): ?>
						<p class="pm-content"><?php echo get_sub_field('pm_content'); ?></p>
					<?php endif; ?>

					<div class="pm-items-wrap d-flex flex-wrap justify-content-center">
						<?php if (have_rows('pm_items')): while (have_rows('pm_items')) : the_row(); ?>
								<?php

								$link = get_sub_field('pmi_link');
								if ($link):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<div class="pm_item col-md-4 col-lg-3 col-12">
										<a class="pmi-link" href="<?php echo esc_url($link_url); ?>">
											<span class="pmi-image-wrap">
												<?php if (get_sub_field('pmi_image')) : ?>
													<?php $pmi_image = get_sub_field('pmi_image'); ?>
													<figure><img class="pmi-image" src="<?php echo $pmi_image['url']; ?>" alt="<?php echo $pmi_image['title']; ?>" title="<?php echo $pmi_image['title']; ?>"></figure>
												<?php endif; ?>
											</span>
											<?php if (get_sub_field('pmi_title')): ?>
												<h2 class="pmi-title"><?php echo get_sub_field('pmi_title'); ?></h2>
											<?php endif ?>
										</a>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'services_module'): ?>
			<section class="services-module" id="services-module<?php echo $i ?>" <?php if (get_sub_field('sm_bg_image')): ?> style="background-image:url('<?php echo get_sub_field('sm_bg_image'); ?>')" <?php endif; ?>>
				<div class="container">
					<div class="sm-img-wrap text-center text-md-left">
						<?php if (get_sub_field('sm_right_image')) : ?>
							<?php $sm_right_image = get_sub_field('sm_right_image'); ?>
							<div class="sm-right-img-bg d-none d-md-block" style="background-image: url('<?php echo $sm_right_image['url']; ?>'); "></div>
							<figure class="d-md-none"><img class="sm-right-img" src="<?php echo $sm_right_image['url']; ?>" alt="<?php echo $sm_right_image['title']; ?>" title="<?php echo $sm_right_image['title']; ?>">
							</figure>
						<?php endif; ?>
					</div>
					<div class="sm-content-wrap text-center text-md-left col-12 col-md-7">
						<?php if (get_sub_field('sm_heading')): ?>
							<h2 class="sm-heading"><?php echo get_sub_field('sm_heading'); ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('sm_content')): ?>
							<p class="sm-content"><?php echo get_sub_field('sm_content'); ?></p>
						<?php endif; ?>
						<?php $link = get_sub_field('sm_link');
						if ($link):
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a class="btn btn-secondary sm-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'about_module'): ?>
			<section class="about-module" id="about-module<?php echo $i ?>">
				<div class="container">
					<div class="col-12">
						<div class="about-bg-module" <?php if (get_sub_field('am_bg_image')): ?> style="background-image:url('<?php echo get_sub_field('am_bg_image'); ?>')" <?php endif; ?>>
							<div class="am-content-wrap col-md-7 col-lg-6 ml-md-auto">
								<?php if (get_sub_field('am_heading')): ?>
									<h2 class="am-heading"><?php if (get_sub_field('am_heading_icon')) : ?>
											<?php $am_heading_icon = get_sub_field('am_heading_icon'); ?><img class="am-heading-icon" src="<?php echo $am_heading_icon['url']; ?>" alt="<?php echo $am_heading_icon['title']; ?>" title="<?php echo $am_heading_icon['title']; ?>"><?php endif; ?><span><?php echo get_sub_field('am_heading'); ?></span></h2>
								<?php endif; ?>
								<?php if (get_sub_field('am_content')): ?>
									<p class="am-content"><?php echo get_sub_field('am_content'); ?></p>
								<?php endif; ?>
								<div class="am-items-wrap">
									<ul>
										<?php if (have_rows('am_list_items')): while (have_rows('am_list_items')) : the_row(); ?>
												<li><?php echo get_sub_field('amli_list'); ?></li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'inner_page_products_module'): ?>
			<section class="inner-page-products-module">
				<div class="container">
					<div class="pm-items-wrap">
						<?php if (have_rows('ipproduct_item')): ?>
							<?php while (have_rows('ipproduct_item')): the_row(); ?>
								<?php $pi_link = get_sub_field('pi_link');
								if ($pi_link):
									$link_url = $pi_link['url'];
									$link_title = $pi_link['title'];
									$link_target = $pi_link['target'] ? $pi_link['target'] : '_self';
								?><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="pm-item">
										<?php if (get_sub_field('pi_img')) : ?>
											<?php $pi_img = get_sub_field('pi_img'); ?>
											<img class="pmi-img" src="<?php echo $pi_img['url']; ?>" alt="<?php echo get_sub_field('pi_title'); ?>" title="<?php echo get_sub_field('pi_title'); ?>">
										<?php endif; ?>

										<h3 class="pmi-title"><?php echo get_sub_field('pi_title'); ?></h3>
										<div class="pmi-hidden-content">
											<span class="pmih-content">
												<span class="btn-alt-on-color pmih-btn">Learn More</span>
											</span>
										</div>
									</a><?php endif; ?>
								<?php endwhile; ?><?php endif ?>
					</div>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'form_text'): ?>
			<section class="landing-form-text-module" id="text_media<?php echo $i ?>">
				<div class="container pt-5">
					<?php if (get_sub_field('section_subtext')): ?>
						<p class="column-subtext"><?php echo get_sub_field('section_subtext'); ?></p>
					<?php endif; ?>
					<article class="row">
						<div class="col-md-5">
							<?php echo get_sub_field('form'); ?>
						</div>
						<div class="col-md-7 col-last">
							<?php if (get_sub_field('section_header')): ?>
								<h2><?php echo get_sub_field('section_header'); ?></h2>
							<?php endif; ?>
							<?php echo get_sub_field('text'); ?>
						</div>
					</article>
					<?php if (get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'work_gallery'): ?>
			<section class="work-gallery gdd-003-b">
				<div class="inner-wrap">
					<?php if (get_sub_field('wg_title')): ?>
						<h2><?php echo get_sub_field('wg_title'); ?></h2>
					<?php endif; ?>
					<div class="wg-slider-item">
						<?php if (have_rows('wg_slider_item')): while (have_rows('wg_slider_item')) : the_row(); ?>
								<div class="inner-wg_slider_item">

									<?php
									$link = get_sub_field('wg_item_link');
									if ($link):
										$link_url = $link['url'];
										$link_title = $link['title'];
									?>
										<a class="lightbox2" href="<?php echo esc_url($link_url); ?>">
											<?php if (get_sub_field('wg_item_image')) : ?>
												<?php $wg_item_image = get_sub_field('wg_item_image'); ?>
												<div class="wg-item-image">
													<img class="" src="<?php echo $wg_item_image['url']; ?>" alt="<?php echo $wg_item_image['title']; ?>" title="<?php echo $wg_item_image['title']; ?>">
												</div>
											<?php endif; ?>
											<?php if (get_sub_field('wg_image_title')): ?>
												<div class="wg-image-title"><?php echo get_sub_field('wg_image_title'); ?></div>
											<?php endif; ?>
											<span class="wg-plus-icon"><img src="/wp-content/uploads/plusicon.png" alt="Plus" titl="Plus"></span>
										</a>
									<?php endif; ?>

								</div>
						<?php endwhile;
						endif; ?>
					</div>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'page_intro_timeline'): ?>
			<section class="page-intro-timeline" <?php if (get_sub_field('fwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('fwc_bg'); ?>);" <?php endif ?>>
				<div class="container">
					<?php if (get_sub_field('pit_heading')): ?>
						<h2 class="pit-heading"><?php echo get_sub_field('pit_heading'); ?></h1>
						<?php endif; ?>
						<div class="pit-wrap">
							<?php echo get_sub_field('pit_content'); ?>
						</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'history_timeline_module'): ?>
			<section class="history-timline-module">
				<div class="htm-nav-link">
					<div class="container">
						<ul class="htm-list">
							<?php if (have_rows('htm_slider_item')): $i = 1;
								while (have_rows('htm_slider_item')) : the_row(); ?>
									<li><a href="javascript:void(0);" data-d="htm-item-<?php echo $i ?>"><span><?php echo get_sub_field('htmsi_title'); ?></span></a></li>
							<?php $i++;
								endwhile;
							endif; ?>
						</ul>
					</div>
				</div>
				<div class="container-fluid">
					<?php if (have_rows('htm_slider_item')): $i = 1;
						while (have_rows('htm_slider_item')) : the_row(); ?>
							<div class="htm-slide-wrap" id="htm-item-<?php echo $i ?>">

								<div class="htm-bg-wrap">
									<?php if (get_sub_field('htm_button')): ?>

										<div class="htm-bg-col">
											<?php if (have_rows('htm_bg_item')): $j = 1;
												while (have_rows('htm_bg_item')) : the_row(); ?>
													<div class="htme-bg htm-bg-<?php echo $j ?>" <?php if (get_sub_field('htmn_bg')): ?>style="background-image: url(<?php echo get_sub_field('htmn_bg'); ?>);" <?php endif ?>></div>
											<?php $j++;
												endwhile;
											endif; ?>
										</div>

									<?php else: ?>
										<div class="htm-bg" <?php if (get_sub_field('htm_bg')): ?>style="background-image: url(<?php echo get_sub_field('htm_bg'); ?>);" <?php endif ?>>

										</div>
									<?php endif; ?>
									<h2 class="htm-headering"><?php echo get_sub_field('htmsi_title'); ?></h2>
								</div>
								<div class="htm-content-wrap">
									<div class="container">
										<h3 class="htmc-heading"><?php echo get_sub_field('htmsi_sub'); ?></h3>
										<div class="htmc-text">
											<?php echo get_sub_field('htmsi_body'); ?>
										</div>
									</div>
								</div>


							</div>
					<?php $i++;
						endwhile;
					endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'anchor_links_nav_module'): ?>
			<section class="anchor-links-nav_new" id="anchor_links_nav_module<?php echo $i ?>">
				<div class="container">
					<ul class="anchor-links-wrap_new">
						<?php if (have_rows('isn_link_wrap')): while (have_rows('isn_link_wrap')) : the_row(); ?>
								<li>
									<?php $link = get_sub_field('isn_add_link');
									if ($link):
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="smooth-scroll-pillar"><?php echo get_sub_field('ppm_title'); ?></a>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>

						<?php endif; ?>
					</ul>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'pp_overview_module'): ?>
			<div id="<?php if (get_sub_field('id')): ?><?php echo get_sub_field('id'); ?><?php else: ?>overview_module<?php echo $i ?><?php endif; ?>"></div>
			<section class="pp-overview-module <?php echo get_sub_field('mcsec_class'); ?>">
				<div class="container <?php echo !empty(get_sub_field('container_padding')) ? get_sub_field('container_padding') : 'py-5' ?>">
					<div class="ppom-wrap">
						<div class="ppom-item-1">

							<?php
							$image = get_sub_field('ppom_img');
							if (!empty($image)): ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" class="ppom-img" />
							<?php endif; ?>
						</div>
						<div class="ppom-item-2">
							<?php echo get_sub_field('ppom_body'); ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'home_products_module'): ?>
			<section class="home-products-module" style="background-color: <?php echo get_sub_field('background_color');  ?>" <?php if (get_sub_field('hpm_id')): ?> id="<?php echo get_sub_field('hpm_id');  ?>" <?php endif; ?>>
				<div class="container">
					<div class="hpm-desktop-view">
						<div class="row">
							<div class="col-md-3 hpm-middle-content">
								<div class="hpm-link-wrap">
									<ul class="hpm-links">
										<?php if (have_rows('hpm_items')): $i = 1;
											while (have_rows('hpm_items')) : the_row(); ?>
												<li class="hpm-link"><a href="javascript:void(0)" id="hpm<?php echo $i; ?>" class="hpm-anch-link"><?php echo get_sub_field('hpm_link_item'); ?></a></li>
										<?php $i++;
											endwhile;
										endif; ?>
									</ul>
								</div>
							</div>
							<div class="col-md-5">
								<div class="hpm-img-wrap">
									<?php if (have_rows('hpm_items')): $i = 1;
										while (have_rows('hpm_items')) : the_row(); ?>
											<div class="hpm-img hpm<?php echo $i; ?>">
												<figure><?php if (get_sub_field('hpm_image')) : ?><?php $hpm_image = get_sub_field('hpm_image'); ?>
													<img src="<?php echo $hpm_image['url']; ?>" alt="<?php echo $hpm_image['title']; ?>" title="<?php echo $hpm_image['title']; ?>">
												<?php endif; ?>
												</figure>
											</div>
									<?php $i++;
										endwhile;
									endif; ?>
								</div>
							</div>
							<div class="col-md-4 hpm-left-content">
								<div class="hpm-content">
									<?php if (have_rows('hpm_items')): $i = 1;
										while (have_rows('hpm_items')) : the_row(); ?>
											<div class="hpm-item hpm<?php echo $i; ?>">
												<?php if (get_sub_field('hpm_sub_heading')): ?><span class="hpm-subheading"><?php echo get_sub_field('hpm_sub_heading'); ?></span><?php endif; ?>
												<?php if (get_sub_field('hpm_heading')): ?><p class="hpm-heading"><?php echo get_sub_field('hpm_heading'); ?></p><?php endif; ?>
												<?php if (get_sub_field('hpm_description')): ?><p class="hpm-description"><?php echo get_sub_field('hpm_description'); ?></p><?php endif; ?>
												<?php $hpm_link = get_sub_field('hpm_cta');
												if ($hpm_link):
													$link_url = $hpm_link['url'];
													$link_title = $hpm_link['title'];
													$link_target = $hpm_link['target'] ? $hpm_link['target'] : '_self';
												?>
													<a href="<?php echo esc_url($link_url); ?>" class="btn btn-primary"><?php echo esc_html($link_title); ?></a><?php endif; ?>
											</div>
									<?php $i++;
										endwhile;
									endif; ?>
								</div>
							</div>
						</div>
					</div>

					<div class="hpm-mobile-view">

						<div class="click-expand-module">
							<div id="accordion">
								<?php if (have_rows('hpm_items')): $i = 1;
									while (have_rows('hpm_items')) : the_row(); ?>
										<div class="card">

											<h3 class="mb-0" id="heading-new<?php echo get_row_index(); ?>">
												<button class="btn-link card-header <?php if (get_row_index() != 1): ?>collapsed<?php endif; ?>" data-toggle="collapse" data-target="#collapse<?php echo get_row_index(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_row_index(); ?>">
													<?php echo get_sub_field('hpm_heading'); ?>

													<?php if (get_row_index() != 1): ?>
														<!-- <i class="fa fa-plus" aria-hidden="true"></i> -->
														<span class="material-icons">add</span>
													<?php else: ?>
														<!-- <i class="fa fa-minus" aria-hidden="true"></i> -->
														<span class="material-icons">remove</span>
													<?php endif; ?>
												</button>
											</h3>

											<div id="collapse<?php echo get_row_index(); ?>" class="collapse <?php if (get_row_index() == 1) : ?>show<?php endif; ?>" aria-labelledby="heading<?php echo get_row_index(); ?>" data-parent="#accordion">
												<div class="card-body">
													<figure><?php if (get_sub_field('hpm_image')) : ?><?php $hpm_image = get_sub_field('hpm_image'); ?>
														<img src="<?php echo $hpm_image['url']; ?>" alt="<?php echo $hpm_image['title']; ?>" title="<?php echo $hpm_image['title']; ?>">
													<?php endif; ?>
													</figure>
													<?php if (get_sub_field('hpm_description')): ?><p class="hsm-description"><?php echo get_sub_field('hpm_description'); ?></p><?php endif; ?>
													<?php $hpm_link = get_sub_field('hpm_cta');
													if ($hpm_link):
														$link_url = $hpm_link['url'];
														$link_title = $hpm_link['title'];
														$link_target = $hpm_link['target'] ? $hpm_link['target'] : '_self';
													?>
														<a href="<?php echo esc_url($link_url); ?>" class="btn btn-primary"><?php echo esc_html($link_title); ?></a><?php endif; ?>
												</div>
											</div>
										</div><?php endwhile;
										endif; ?>
							</div>
						</div>

					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'homepage_solution_module'): ?>
			<section class="homepage-solution-module gdd-006">
				<div class="container">
					<?php if (get_sub_field('hsm_heading')): ?>
						<h2 class="hsm-heading"><?php echo get_sub_field('hsm_heading'); ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('hsm_desc')): ?>
						<div class="hsm-desc"><?php echo get_sub_field('hsm_desc'); ?></div>
					<?php endif; ?>
					<div class="hsm-wapp">
						<?php if (have_rows('hsm_buckets')): while (have_rows('hsm_buckets')) : the_row(); ?>
								<div class="hsm-item">
									<?php if (get_sub_field('hsm_title')): ?>
										<div class="hsm-title"><?php echo get_sub_field('hsm_title'); ?></div>
									<?php endif; ?>

									<?php
									$image = get_sub_field('hsm_image');
									if (!empty($image)): ?>
										<div class="hsm-img">
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo get_sub_field('hsm_title'); ?>" title="<?php echo get_sub_field('hsm_title'); ?>" />
										</div>
									<?php endif; ?>

									<?php if (get_sub_field('hsm_content')): ?>
										<div class="hsm-cont">
											<?php echo get_sub_field('hsm_content'); ?>
											<?php
											$link = get_sub_field('hsm_link');
											if ($link):
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="hsm-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
											<?php endif; ?>

										</div>
									<?php endif; ?>



								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<?php
					$link = get_sub_field('hsm_cta');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<div class="hsm-cta-wrap">
							<a class="btn btn-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'pp_grade_module'): ?>
			<section class="pp-grade-module bootstrap-tabs" id="pp-grade">
				<div class="container">
					<h2 class="ppgm-title"><?php echo get_sub_field('ppgm_title'); ?></h2>
					<p class="ppgm-sub-title"><?php echo get_sub_field('ppom_sub-title'); ?></p>
					<div class="ppgm-wrap">

						<?php if (have_rows('grade_row')): ?>
							<?php while (have_rows('grade_row')): the_row(); ?>
								<div class="ppgm-item bt-nav-item">
									<?php echo get_sub_field('ppgm_item'); ?>
								</div>
							<?php endwhile; ?>
						<?php endif ?>
					</div>
					<?php if (have_rows('tab_content')): ?>
						<?php while (have_rows('tab_content')): the_row(); ?>
							<div class="tab-content">
								<div class="row tab-pane">
									<div class="col-md-6">
										<?php echo get_sub_field('ppgm_content'); ?>
									</div>
									<div class="col-md-6">

										<?php
										$image = get_sub_field('ppgm_image');
										if (!empty($image)): ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="ppgm-img" />
										<?php endif; ?>
									</div>

								</div>
							</div>
						<?php endwhile; ?>
					<?php endif ?>
			</section>

		<?php elseif (get_row_layout() == 'grade_tabs'): ?>
			<div class="<?php echo get_sub_field('mcsec_class'); ?>" id="<?php if (get_sub_field('id')): ?><?php echo get_sub_field('id'); ?><?php else: ?>grade_tabs<?php echo $i ?><?php endif; ?>"></div>
			<section class="bootstrap-tabs grade-tabs ">
				<div class="container">
					<h2 class="ppgm-title"><?php echo get_sub_field('ppgm_title'); ?></h2>
					<p class="ppgm-sub-title"><?php echo get_sub_field('ppom_sub-title'); ?></p>
					<?php if (have_rows('bt_tab')): ?>
						<ul class="nav nav-tabs" role="tablist">
							<?php while (have_rows('bt_tab')) : the_row(); ?>
								<li class="bt-nav-item">
									<a href="#tab<?php echo get_row_index(); ?>" data-toggle="tab" class="<?php if (get_row_index() == 1): ?>active<?php endif; ?>" role="tab"><?php echo get_sub_field('bt_tab_title'); ?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>

					<?php if (have_rows('bt_tab')): ?>
						<div class="tab-content clearfix">
							<?php while (have_rows('bt_tab')) : the_row(); ?>

								<div class="tab-pane <?php if (get_row_index() == 1): ?>active<?php endif ?>" id="tab<?php echo get_row_index(); ?>" role="tabpanel">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent=".tab-pane" href="#collapse<?php echo get_row_index(); ?>">
													<?php echo get_sub_field('bt_tab_title'); ?>
												</a>
											</h4>
										</div>

										<div id="collapse<?php echo get_row_index(); ?>" class="panel-collapse collapse in">
											<?php if (get_sub_field('bt_tab_body')): ?>

												<div class="bt-tab-body panel-body row">

													<div class="col-md-6">
														<?php if (get_sub_field('bt_subheading')): ?>
															<p class="bt-subheading"><?php echo get_sub_field('bt_subheading'); ?></p>
														<?php endif ?>
														<?php if (get_sub_field('bt_heading')): ?>
															<h2 class="bt-heading"><?php echo get_sub_field('bt_heading'); ?></h2>
														<?php endif ?>

														<?php if (get_sub_field('bt_tab_body')): ?>
															<p class="bt-description"><?php echo get_sub_field('bt_tab_body'); ?></p>
														<?php endif ?>

														<?php
														$link = get_sub_field('bt_cta');
														if ($link):
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<a class="button btn btn-primary btn-lg bg-section-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
														<?php endif; ?>
													</div>
													<div class="col-md-6">
														<?php
														$image = get_sub_field('bt_image');
														if (!empty($image)): ?>
															<img class="bt-tab-img" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</div>
												</div>
											<?php endif ?>
										</div>
									</div>

								</div>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'content_with_contact_form_sidebar'): ?>
			<div class="<?php echo get_sub_field('ccfs_class'); ?>" id="<?php if (get_sub_field('ccfs_id')): ?><?php echo get_sub_field('ccfs_id'); ?><?php else: ?>content_with_contact_form_sidebar<?php echo $i ?><?php endif; ?>"></div>
			<section class="content-with-contact-form-sidebar gdd-005-b" style="background-color: <?php echo get_sub_field('background_color');  ?>; display:none;">
				<div class="container <?php echo !empty(get_sub_field('container_padding')) ? get_sub_field('container_padding') : 'py-5' ?>">
					<div class="row">
						<div class="col-md-8">
							<?php if (get_sub_field('ccfs_section_header')): ?>
								<h2 class="col-12"><?php echo get_sub_field('ccfs_section_header'); ?></h2>
							<?php endif; ?>
							<?php if (get_sub_field('ccfs_section_subtext')): ?>
								<p class="column-subtext col-12"><?php echo get_sub_field('ccfs_section_subtext'); ?></p>
							<?php endif; ?>
							<div class="row">
								<?php if (get_sub_field('number_columns') == '2') {
									$gridClass = 'col-md-6';
								} else if (get_sub_field('number_columns') == '3') {
									$gridClass = 'col-md-4';
								} else if (get_sub_field('number_columns') == '4') {
									$gridClass = 'col-md-6 col-lg-3';
								} else {
									$gridClass = 'col-12';
								}
								?>

								<?php if (have_rows('ccfs_content')): while (have_rows('ccfs_content')) : the_row(); ?>
										<div class="<?php echo $gridClass; ?> <?php echo get_sub_field('container_padding_inner'); ?>">
											<?php if (get_sub_field('ccfsc_heading')): ?>
												<h2 class=""><?php echo get_sub_field('ccfsc_heading'); ?></h2>
											<?php endif; ?>
											<?php echo get_sub_field('ccfs_content_column'); ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php if (get_sub_field('divider')): ?>
									<hr>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-4">
							<?php if (get_sub_field('ccfs_form')): ?>
								<div class="cfs-form"><?php echo get_sub_field('ccfs_form'); ?></div>
							<?php endif; ?>
						</div>
					</div>


				</div>
			</section>


		<?php elseif (get_row_layout() == 'our_products'): ?>
			<section class="our-products" id="our_products<?php echo $i ?>">
				<div class="container">
					<div class="our-products__header">
						<div class="our-products__header-text">
							<?php if (get_sub_field('op_eyebrow')): ?>
								<p class="our-products__eyebrow"><?php echo get_sub_field('op_eyebrow'); ?></p>
							<?php endif; ?>

							<?php if (get_sub_field('op_heading')): ?>
								<h2 class="our-products__heading"><?php echo get_sub_field('op_heading'); ?></h2>
							<?php endif; ?>

							<?php if (get_sub_field('op_description')): ?>
								<p class="our-products__description"><?php echo get_sub_field('op_description'); ?></p>
							<?php endif; ?>
						</div>

						<?php
						$op_cta = get_sub_field('op_cta');
						if ($op_cta): ?>
							<a href="<?php echo esc_url($op_cta['url']); ?>" class="our-products__cta home-pc" target="<?php echo esc_attr($op_cta['target']); ?>">
								<span><?php echo esc_html($op_cta['title']); ?></span>
							</a>
						<?php endif; ?>
					</div>

					<?php if (have_rows('op_products')): ?>
						<div class="our-products__grid">
							<?php while (have_rows('op_products')): the_row(); ?>
								<div class="our-products__card">
									<?php
									$card_image = get_sub_field('opc_image');
									$card_title = get_sub_field('opc_title');
									$card_link = get_sub_field('opc_link');
									$card_description = get_sub_field('opc_description');
									?>
									<div class="our-products__card-image-wrapper">
										<?php if ($card_image): ?>
											<img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" />
										<?php endif; ?>
										<?php if ($card_description): ?>
											<div class="our-products__card-overlay">
												<p><?php echo esc_html($card_description); ?></p>
											</div>
										<?php endif; ?>
									</div>
									<div class="our-products__card-info">
										<div class="our-products__card-title-row">
											<?php if ($card_link): ?>
												<a href="<?php echo esc_url($card_link['url']); ?>" class="our-products__card-title" target="<?php echo esc_attr($card_link['target']); ?>">
													<?php echo esc_html($card_title); ?>
												</a>
											<?php else: ?>
												<span class="our-products__card-title"><?php echo esc_html($card_title); ?></span>
											<?php endif; ?>
											<span class="our-products__card-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none">
													<path d="M14.32 5.25961L9.06005 10.5196L7.94005 9.39961L11.8 5.53961L12.06 6.17961H4.88758e-05V4.35961H12.06L11.8 4.99961L7.94005 1.11961L9.06005 -0.000391006L14.32 5.25961Z" fill="#181818" />
												</svg></span>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<?php
					$op_cta = get_sub_field('op_cta');
					if ($op_cta): ?>
						<a href="<?php echo esc_url($op_cta['url']); ?>" class="our-products__cta home-mobile" target="<?php echo esc_attr($op_cta['target']); ?>">
							<span><?php echo esc_html($op_cta['title']); ?></span>
						</a>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'trust_banner'): ?>
			<section class="trust-banner">
				<div class="trust-banner__container">
					<div class="trust-banner__scroll">
						<div class="trust-banner__track">
							<div class="trust-banner__items desktop">
								<?php
								$trust_items = get_sub_field('tb_items');
								if ($trust_items): ?>
									<?php foreach ($trust_items as $index => $item): ?>
										<span class="trust-banner__item"><?php echo esc_html($item['tb_text']); ?></span>
										<span class="trust-banner__separator desktop">·</span>
									<?php endforeach; ?>
									<?php foreach ($trust_items as $index => $item): ?>
										<span class="trust-banner__item"><?php echo esc_html($item['tb_text']); ?></span>
										<span class="trust-banner__separator desktop">·</span>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div class="trust-banner__items mobile" aria-hidden="true">
								<?php
								$trust_items = get_sub_field('tb_items');
								if ($trust_items): ?>
									<?php foreach ($trust_items as $index => $item): ?>
										<span class="trust-banner__item"><?php echo esc_html($item['tb_text']); ?></span>
										<div class="trust-banner__separator-line"></div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'how_we_supply'): ?>
			<section class="how-we-supply" id="how_we_supply<?php echo $i ?>">
				<div class="container">
					<div class="how-we-supply__header">
						<h2 class="how-we-supply__title"><?php echo esc_html(get_sub_field('hw_title')); ?></h2>
						<p class="how-we-supply__subtitle"><?php echo esc_html(get_sub_field('hw_subtitle')); ?></p>
					</div>
					<div class="how-we-supply__cards">
						<?php
						$cards = get_sub_field('hw_cards');
						if ($cards): ?>
							<?php foreach ($cards as $card): ?>
								<div class="how-we-supply__card">
									<div class="how-we-supply__card-header">
										<?php if ($card['hw_icon']): ?>
											<div class="how-we-supply__icon">
												<img src="<?php echo esc_url($card['hw_icon']['url']); ?>" alt="<?php echo esc_attr($card['hw_icon']['alt']); ?>" />
											</div>
										<?php endif; ?>
										<h3 class="how-we-supply__card-title"><?php echo esc_html($card['hw_card_title']); ?></h3>
									</div>
									<p class="how-we-supply__card-desc"><?php echo esc_html($card['hw_card_desc']); ?></p>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'industries_we_serve'): ?>
			<section class="industries-we-serve section-dashed-border" id="industries_we_serve<?php echo $i ?>">
				<div class="container">
					<div class="industries-we-serve__header">
						<div class="industries-we-serve__header-content">
							<span class="industries-we-serve__eyebrow"><?php echo esc_html(get_sub_field('iws_eyebrow')); ?></span>
							<h2 class="industries-we-serve__title"><?php echo esc_html(get_sub_field('iws_title')); ?></h2>
						</div>
						<?php if (get_sub_field('iws_cta_text') && get_sub_field('iws_cta_link')): ?>
							<a href="<?php echo esc_url(get_sub_field('iws_cta_link')); ?>" class="industries-we-serve__cta">
								<?php echo esc_html(get_sub_field('iws_cta_text')); ?>
							</a>
						<?php endif; ?>
					</div>

					<div class="industries-we-serve__content">
						<div class="industries-we-serve__featured-media home-pc">
							<?php
							$video_url = get_sub_field('iws_featured_video');
							$image_url = get_sub_field('iws_featured_image');

							if ($video_url):
							?>
								<video class="industries-we-serve__video" autoplay muted loop playsinline>
									<source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
								</video>
							<?php elseif ($image_url): ?>
								<img src="<?php echo esc_url($image_url['url']); ?>" alt="<?php echo esc_attr($image_url['alt']); ?>" />
							<?php endif; ?>
						</div>

						<div class="industries-we-serve__accordion" data-accordion>
							<?php
							$industries = get_sub_field('iws_industries');
							if ($industries): $first = true; ?>
								<?php foreach ($industries as $industry): ?>
									<div class="industries-we-serve__accordion-item" <?php echo $first ? 'data-open' : ''; ?>>
										<button class="industries-we-serve__accordion-header" data-accordion-trigger>
											<span class="industries-we-serve__accordion-title"><?php echo esc_html($industry['iws_industry_title']); ?></span>
											<span class="industries-we-serve__accordion-icon">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
												</svg>
											</span>
										</button>
										<div class="industries-we-serve__accordion-content" data-accordion-content <?php echo $first ? 'data-open' : ''; ?>>
											<p><?php echo esc_html($industry['iws_industry_desc']); ?></p>
										</div>
									</div>
								<?php $first = false;
								endforeach; ?>
							<?php endif; ?>
						</div>
						<!-- <?php if (get_sub_field('iws_cta_text') && get_sub_field('iws_cta_link')): ?>
							<a href="<?php echo esc_url(get_sub_field('iws_cta_link')); ?>" class="industries-we-serve__cta mobile">
								<?php echo esc_html(get_sub_field('iws_cta_text')); ?>
							</a>
						<?php endif; ?> -->
					</div>
				</div>
				<div class="industries-we-serve__featured-media home-mobile">
					<?php
					$video_url = get_sub_field('iws_featured_video');
					$image_url = get_sub_field('iws_featured_image');

					if ($video_url):
					?>
						<video class="industries-we-serve__video" autoplay muted loop playsinline>
							<source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
						</video>
					<?php elseif ($image_url): ?>
						<img src="<?php echo esc_url($image_url['url']); ?>" alt="<?php echo esc_attr($image_url['alt']); ?>" />
					<?php endif; ?>
				</div>
				<div class="container">
					<div class="industries-we-serve__cta-box">
						<?php if (get_sub_field('iws_cta_image')): ?>
							<div class="industries-we-serve__cta-image">
								<?php $cta_image = get_sub_field('iws_cta_image'); ?>
								<?php if ($cta_image): ?>
									<img src="<?php echo esc_url($cta_image['url']); ?>" alt="<?php echo esc_attr($cta_image['alt']); ?>" />
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<div class="industries-we-serve__cta-content">
							<h3 class="industries-we-serve__cta-title"><?php echo esc_html(get_sub_field('iws_cta_box_title')); ?></h3>
							<p class="industries-we-serve__cta-desc"><?php echo esc_html(get_sub_field('iws_cta_box_desc')); ?></p>
						</div>
						<a href="<?php echo esc_url(get_sub_field('iws_cta_box_link') ?: '#'); ?>" class="industries-we-serve__cta-box-btn">
							<?php echo esc_html(get_sub_field('iws_cta_box_btn_text') ?: 'Contact Us'); ?>
						</a>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'gallery_section'): ?>
			<section class="gallery-section" id="gallery-section-<?php echo $i ?>">
				<div class="container">
					<div class="gallery-section__header">
						<div class="gallery-section__header-content">
							<?php if (get_sub_field('gs_eyebrow')): ?>
								<p class="gallery-section__eyebrow"><?php echo esc_html(get_sub_field('gs_eyebrow')); ?></p>
							<?php endif; ?>
							<?php if (get_sub_field('gs_heading')): ?>
								<h2 class="gallery-section__heading"><?php echo get_sub_field('gs_heading'); ?></h2>
							<?php endif; ?>
						</div>
						<?php $gs_cta = get_sub_field('gs_cta_button');
						if ($gs_cta): ?>
							<a href="<?php echo esc_url($gs_cta['url']); ?>" class="gallery-section__cta" target="<?php echo esc_attr($gs_cta['target'] ?: '_self'); ?>">
								<?php echo esc_html($gs_cta['title']); ?>
							</a>
						<?php endif; ?>
					</div>

					<?php $gallery_items = get_sub_field('gs_gallery_items');
					if ($gallery_items): ?>
						<div class="gallery-section__slider" data-gallery-slider>
							<?php foreach ($gallery_items as $item): ?>
								<?php
								$item_size = !empty($item['gs_item_size']) ? $item['gs_item_size'] : 'medium';
								$size_class = 'gallery-section__item--' . $item_size;
								?>
								<div class="gallery-section__item <?php echo esc_attr($size_class); ?>">
									<div class="gallery-section__image">
										<?php if (!empty($item['gs_images'])): ?>
											<?php $images = $item['gs_images']; ?>
											<?php if (count($images) > 1): ?>
												<div class="gallery-section__images-grid" data-count="<?php echo count($images); ?>">
													<?php foreach ($images as $index => $image): ?>
														<img src="<?php echo esc_url($image['gs_image']['url']); ?>" alt="<?php echo esc_attr($image['gs_image']['alt']); ?>" loading="lazy" />
													<?php endforeach; ?>
												</div>
											<?php else: ?>
												<img src="<?php echo esc_url($images[0]['gs_image']['url']); ?>" alt="<?php echo esc_attr($images[0]['gs_image']['alt']); ?>" loading="lazy" />
											<?php endif; ?>
										<?php endif; ?>
										<?php if (!empty($item['gs_description'])): ?>
											<div class="gallery-section__overlay">
												<p><?php echo esc_html($item['gs_description']); ?></p>
											</div>
										<?php endif; ?>
									</div>
									<?php if (!empty($item['gs_item_title'])): ?>
										<div class="gallery-section__item-content">
											<div class="gallery-section__item-title-row">
												<h3 class="gallery-section__item-title"><?php echo esc_html($item['gs_item_title']); ?></h3>
											</div>
											<div class="gallery-section__item-line">
												<img src="<?php echo get_template_directory_uri(); ?>/img/line-separator.svg" alt="" />
											</div>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</div>
				<div class="container-mobile">
					<a href="<?php echo esc_url($gs_cta['url']); ?>" class="gallery-section__cta-mobile home-mobile" target="<?php echo esc_attr($gs_cta['target'] ?: '_self'); ?>">
						<?php echo esc_html($gs_cta['title']); ?>
					</a>
				</div>

			</section>

		<?php elseif (get_row_layout() == 'about_us_section'): ?>
			<section class="about-us-section section-dashed-border" id="about_us_section<?php echo $i ?>">
				<div class="container">
					<div class="about-us-section__header">
						<div class="about-us-section__header-content">
							<?php if (get_sub_field('aus_eyebrow')): ?>
								<span class="about-us-section__eyebrow"><?php echo esc_html(get_sub_field('aus_eyebrow')); ?></span>
							<?php endif; ?>
							<?php if (get_sub_field('aus_heading')): ?>
								<h2 class="about-us-section__heading"><?php echo esc_html(get_sub_field('aus_heading')); ?></h2>
							<?php endif; ?>
						</div>
						<?php
						$aus_cta = get_sub_field('aus_cta');
						if ($aus_cta): ?>
							<a href="<?php echo esc_url($aus_cta['url']); ?>" class="about-us-section__cta home-pc" target="<?php echo esc_attr($aus_cta['target']); ?>">
								<span><?php echo esc_html($aus_cta['title']); ?></span>
							</a>
						<?php endif; ?>
					</div>

					<div class="about-us-section__content">
						<div class="about-us-section__text">
							<?php if (get_sub_field('aus_body')): ?>
								<?php echo wp_kses_post(get_sub_field('aus_body')); ?>
							<?php endif; ?>
						</div>
						<?php
						$aus_cta = get_sub_field('aus_cta');
						if ($aus_cta): ?>
							<a href="<?php echo esc_url($aus_cta['url']); ?>" class="about-us-section__cta home-mobile" target="<?php echo esc_attr($aus_cta['target']); ?>">
								<span><?php echo esc_html($aus_cta['title']); ?></span>
							</a>
						<?php endif; ?>
						<?php if (get_sub_field('aus_image')): ?>
							<div class="about-us-section__image home-pc">
								<img src="<?php echo esc_url(get_sub_field('aus_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('aus_image')['alt']); ?>" />
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if (get_sub_field('aus_image')): ?>
					<div class="about-us-section__image home-mobile">
						<img src="<?php echo esc_url(get_sub_field('aus_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('aus_image')['alt']); ?>" />
					</div>
				<?php endif; ?>
			</section>

		<?php elseif (get_row_layout() == 'faq_section'): ?>
			<section class="faq-section section-dashed-border" id="faq_section<?php echo $i ?>">
				<div class="faq-section__section">
					<div class="faq-section__inner">
						<div class="faq-section__header">
							<h2 class="faq-section__heading"><?php echo esc_html(get_sub_field('faq_heading')); ?></h2>
							<?php if (get_sub_field('faq_subheading')): ?>
								<p class="faq-section__subheading"><?php echo esc_html(get_sub_field('faq_subheading')); ?></p>
							<?php endif; ?>
						</div>

						<div class="faq-section__accordion" data-accordion>
							<?php if (have_rows('faq_items')):
								$faq_index = 0;
								while (have_rows('faq_items')) : the_row();
									$faq_index++;
									$is_first = ($faq_index === 1);
							?>
									<div class="faq-section__accordion-item" <?php echo $is_first ? 'data-opens' : ''; ?>>
										<button class="faq-section__accordion-header" data-accordion-trigges>
											<span class="faq-section__accordion-title"><?php echo esc_html(get_sub_field('faq_question')); ?></span>
											<span class="faq-section__accordion-icon">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" <?php echo $is_first ? 'style="transform: rotate(45deg);"' : ''; ?>>
													<path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
												</svg>
											</span>
										</button>
										<div class="faq-section__accordion-content" data-accordion-content <?php echo $is_first ? 'data-opens' : ''; ?>>
											<p><?php echo wp_kses_post(get_sub_field('faq_answer')); ?></p>
										</div>
									</div>
							<?php endwhile;
							endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'contact_inquiry_section'): ?>
			<section class="contact-inquiry-section" id="contact_inquiry_section<?php echo $i ?>">
				<div class="container">
					<div class="contact-inquiry-section__inner">
						<div class="contact-inquiry-section__info">
							<div class="contact-inquiry-section__info-content">
								<div class="contact-inquiry-section__intro">
									<p class="contact-inquiry-section__eyebrow"><?php echo esc_html(get_sub_field('ci_eyebrow') ?: 'CONTACT'); ?></p>
									<h2 class="contact-inquiry-section__heading"><?php echo esc_html(get_sub_field('ci_heading') ?: 'Get in touch'); ?></h2>
									<p class="contact-inquiry-section__desc"><?php echo (get_sub_field('ci_description') ?: 'Whether you need a quote on a specific product, have a technical question about your application, or want to explore a long-term supply partnership — our team is here. We typically respond within one business day.'); ?></p>
								</div>
								<div class="contact-inquiry-section__contact-details">
									<div class="line-separator"></div>
									<div class="contact-inquiry-section__detail-item">
										<p class="contact-inquiry-section__detail-label">Call Us</p>
										<a href="tel:<?php echo esc_html(get_sub_field('ci_phone') ?: '+1 905 623-9888'); ?>" class="contact-inquiry-section__detail-value"><?php echo esc_html(get_sub_field('ci_phone') ?: '+1 905 623-9888'); ?></a>
									</div>
									<div class="line-separator"></div>
									<div class="contact-inquiry-section__detail-item">
										<p class="contact-inquiry-section__detail-label">Email Us</p>
										<a href="mailto:<?php echo esc_html(get_sub_field('ci_email') ?: 'info@thomesnorthamerica.com'); ?>" class="contact-inquiry-section__detail-value"><?php echo esc_html(get_sub_field('ci_email') ?: 'info@thomesnorthamerica.com'); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="contact-inquiry-section__form">
							<div class="contact-inquiry-section__form-content">
								<?php
								$gravity_form_id = get_sub_field('ci_gravity_form_id');
								if ($gravity_form_id):
									echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');
								else:
								?>
									<p class="contact-inquiry-section__form-placeholder"><?php esc_html_e('Please select a Gravity Form in the page editor.', 'thomescanada'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'our_services_section'): ?>
			<section class="our-services-section" id="our_services_section<?php echo $i ?>">
				<div class="container">
					<div class="our-services-section__header">
						<div class="our-services-section__header-content">
							<?php if (get_sub_field('oss_eyebrow')): ?>
								<p class="our-services-section__eyebrow"><?php echo esc_html(get_sub_field('oss_eyebrow')); ?></p>
							<?php endif; ?>
							<?php if (get_sub_field('oss_heading')): ?>
								<h2 class="our-services-section__heading"><?php echo esc_html(get_sub_field('oss_heading')); ?></h2>
							<?php endif; ?>
							<?php if (get_sub_field('oss_description')): ?>
								<p class="our-services-section__description"><?php echo esc_html(get_sub_field('oss_description')); ?></p>
							<?php endif; ?>
						</div>
						<?php $oss_cta = get_sub_field('oss_cta_button');
						if ($oss_cta): ?>
							<a href="<?php echo esc_url($oss_cta['url']); ?>" class="our-services-section__cta home-pc" target="<?php echo esc_attr($oss_cta['target'] ?: '_self'); ?>">
								<span><?php echo esc_html($oss_cta['title']); ?></span>
							</a>
						<?php endif; ?>
					</div>

					<?php $oss_items = get_sub_field('oss_service_items');
					if ($oss_items): ?>
						<div class="our-services-section__grid">
							<?php
							$item_count = 0;
							foreach ($oss_items as $item):
								$item_count++;
								$item_image = !empty($item['oss_item_image']) ? $item['oss_item_image'] : '';
								$item_title = !empty($item['oss_item_title']) ? $item['oss_item_title'] : '';
								$item_description = !empty($item['oss_item_description']) ? $item['oss_item_description'] : '';
								$item_link = !empty($item['oss_item_link']) ? $item['oss_item_link'] : array('url' => '#', 'target' => '_self');
								$item_link_target = !empty($item['oss_item_link']['target']) ? $item['oss_item_link']['target'] : '_self';

								// Row 1: first 2 items (50% each), Row 2: remaining items (33.33% each)
								$item_row_class = ($item_count <= 2) ? 'our-services-section__item--row1' : 'our-services-section__item--row2';
							?>
								<div class="our-services-section__item <?php echo esc_attr($item_row_class); ?>">
									<a href="<?php echo esc_url($item_link['url'] ?: '#'); ?>" class="our-services-section__item-link" target="<?php echo esc_attr($item_link_target); ?>">
										<div class="our-services-section__item-image">
											<?php if ($item_image): ?>
												<img src="<?php echo esc_url($item_image['url']); ?>" alt="<?php echo esc_attr($item_image['alt'] ?: $item_title); ?>" loading="lazy" />
											<?php endif; ?>
											<?php if ($item_description): ?>
												<div class="our-services-section__item-overlay">
													<p class="our-services-section__item-overlay-text"><?php echo wp_kses_post($item_description); ?></p>
												</div>
											<?php endif; ?>
										</div>
										<div class="our-services-section__item-content">
											<div class="our-services-section__item-title-row">
												<span class="our-services-section__item-title"><?php echo esc_html($item_title); ?></span>
												<span class="our-services-section__item-arrow">
													<svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none">
														<path d="M14.32 5.25998L9.06005 10.52L7.94005 9.39998L11.8 5.53998L12.06 6.17998H4.88758e-05V4.35998H12.06L11.8 4.99998L7.94005 1.11998L9.06005 -2.47955e-05L14.32 5.25998Z" fill="#1A1613" />
													</svg>
												</span>
											</div>
											<div class="our-services-section__item-line">
												<div class="line-separator"></div>
											</div>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ($oss_cta): ?>
						<div class="container-mobile">
							<a href="<?php echo esc_url($oss_cta['url']); ?>" class="our-services-section__cta home-mobile" target="<?php echo esc_attr($oss_cta['target'] ?: '_self'); ?>">
								<span><?php echo esc_html($oss_cta['title']); ?></span>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'industries_accordion'): ?>
			<section class="industries-section" id="industries-section-<?php echo $i; ?>">
				<div class="industries-section__container">
					<div class="industries-section__header">
						<div class="industries-section__titles">
							<?php
							$industry_eyebrow = get_sub_field('industry_eyebrow');
							$industry_heading = get_sub_field('industry_heading');
							$industry_heading_italic = get_sub_field('industry_heading_italic');
							?>
							<?php if ($industry_eyebrow): ?>
								<p class="industries-section__eyebrow"><?php echo esc_html($industry_eyebrow); ?></p>
							<?php endif; ?>
							<?php if ($industry_heading || $industry_heading_italic): ?>
								<h2 class="industries-section__heading">
									<?php if ($industry_heading): ?>
										<span class="industries-section__heading-normal"><?php echo esc_html($industry_heading); ?></span>
									<?php endif; ?>
									<?php if ($industry_heading_italic): ?>
										<span class="industries-section__heading-italic"><?php echo esc_html($industry_heading_italic); ?></span>
									<?php endif; ?>
								</h2>
							<?php endif; ?>
						</div>
						<?php
						$industry_cta = get_sub_field('industry_cta');
						if ($industry_cta): ?>
							<a href="<?php echo esc_url($industry_cta['url']); ?>" class="industries-section__cta" target="<?php echo esc_attr($industry_cta['target'] ?: '_self'); ?>">
								<span><?php echo esc_html($industry_cta['title']); ?></span>
							</a>
						<?php endif; ?>
					</div>

					<?php $industry_items = get_sub_field('industry_items'); ?>
					<?php if ($industry_items): ?>
						<div class="industries-section__content">
							<div class="industries-section__images">
								<?php foreach ($industry_items as $index => $item): ?>
									<?php $item_image = !empty($item['industry_image']) ? $item['industry_image'] : ''; ?>
									<div class="industries-section__image-wrapper" data-index="<?php echo $index; ?>">
										<?php if ($item_image): ?>
											<img src="<?php echo esc_url($item_image['url']); ?>" alt="<?php echo esc_attr($item_image['alt'] ?: 'Industry image'); ?>" loading="lazy" />
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="industries-section__accordion" data-accordion-group="industries-accordion">
								<?php foreach ($industry_items as $index => $item): ?>
									<?php
									$item_title = !empty($item['industry_title']) ? $item['industry_title'] : '';
									$item_content = !empty($item['industry_content']) ? $item['industry_content'] : '';
									$is_first = ($index === 0);
									?>
									<div class="industries-section__accordion-item <?php echo $is_first ? 'is-active' : ''; ?>" data-accordion-item data-index="<?php echo $index; ?>" <?php echo $is_first ? 'data-open' : ''; ?>>
										<button class="industries-section__accordion-trigger" data-accordion-trigger aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>">
											<span class="industries-section__accordion-title"><?php echo esc_html($item_title); ?></span>
											<span class="industries-section__accordion-icon">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" <?php echo $is_first ? 'style="transform: rotate(45deg);"' : ''; ?>>
													<path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
												</svg>
											</span>
										</button>
										<div class="industries-section__accordion-content" data-accordion-content>
											<div class="industries-section__accordion-body">
												<p><?php echo wp_kses_post($item_content); ?></p>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php
					$industry_mobile_cta = get_sub_field('industry_mobile_cta');
					if ($industry_mobile_cta): ?>
						<div class="industries-section__mobile-cta">
							<a href="<?php echo esc_url($industry_mobile_cta['url']); ?>" class="industries-section__cta industries-section__cta--mobile" target="<?php echo esc_attr($industry_mobile_cta['target'] ?: '_self'); ?>">
								<span><?php echo esc_html($industry_mobile_cta['title']); ?></span>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'about_section'): ?>
			<section class="about-section" id="about-section-<?php echo $i; ?>">
				<div class="about-section__container">
					<div class="about-section__content">
						<div class="about-section__header">
							<?php
							$about_eyebrow = get_sub_field('about_eyebrow');
							$about_heading = get_sub_field('about_heading');
							?>
							<?php if ($about_eyebrow): ?>
								<p class="about-section__eyebrow"><?php echo esc_html($about_eyebrow); ?></p>
							<?php endif; ?>
							<?php if ($about_heading): ?>
								<h2 class="about-section__heading"><?php echo esc_html($about_heading); ?></h2>
							<?php endif; ?>
						</div>

						<?php
						$about_text = get_sub_field('about_paragraphs');
						if ($about_text): ?>
							<div class="about-section__text">
								<?php echo wp_kses_post($about_text); ?>
							</div>
						<?php endif; ?>

						<?php
						$about_cta = get_sub_field('about_cta');
						if ($about_cta): ?>
							<a href="<?php echo esc_url($about_cta['url']); ?>" class="about-section__cta home-pc" target="<?php echo esc_attr($about_cta['target'] ?: '_self'); ?>">
								<span><?php echo esc_html($about_cta['title']); ?></span>
							</a>
						<?php endif; ?>

						<div class="about-section__divider">
							<div class="line-separator"></div>
						</div>

						<?php
						$about_stats = get_sub_field('about_stats');
						if ($about_stats): ?>
							<div class="about-section__stats">
								<?php foreach ($about_stats as $stat): ?>
									<?php
									$stat_value = !empty($stat['stat_value']) ? $stat['stat_value'] : '';
									$stat_label = !empty($stat['stat_label']) ? $stat['stat_label'] : '';
									?>
									<div class="about-section__stat">
										<span class="about-section__stat-value"><?php echo esc_html($stat_value); ?></span>
										<span class="about-section__stat-label"><?php echo esc_html($stat_label); ?></span>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="about-section__divider home-mobile">
							<div class="line-separator"></div>
						</div>
						<?php
						$about_cta = get_sub_field('about_cta');
						if ($about_cta): ?>
							<a href="<?php echo esc_url($about_cta['url']); ?>" class="about-section__cta home-mobile" target="<?php echo esc_attr($about_cta['target'] ?: '_self'); ?>">
								<span><?php echo esc_html($about_cta['title']); ?></span>
							</a>
						<?php endif; ?>
					</div>

					<?php
					$about_image = get_sub_field('about_images');
					if ($about_image): ?>
						<div class="about-section__images">
							<img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt'] ?: 'About image'); ?>" loading="lazy" />
						</div>
					<?php endif; ?>
				</div>
				<?php if ($about_image): ?>
					<div class="about-section__images--mobile">
						<img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt'] ?: 'About image'); ?>" loading="lazy" />
					</div>
				<?php endif; ?>
			</section>

		<?php elseif (get_row_layout() == 'testimonial_video_section'): ?>
			<section class="testimonial-video-section" id="testimonial-video-<?php echo $i; ?>">
				<div class="testimonial-video-section__container">
					<?php
					$video_heading = get_sub_field('video_heading');
					$video_heading_italic = get_sub_field('video_heading_italic');
					?>
					<?php if ($video_heading || $video_heading_italic): ?>
						<h2 class="testimonial-video-section__heading">
							<span><?php echo esc_html($video_heading); ?></span>
							<?php if ($video_heading_italic): ?>
								<span class="testimonial-video-section__heading-italic"><?php echo esc_html($video_heading_italic); ?></span>
							<?php endif; ?>
						</h2>
					<?php endif; ?>

					<div class="testimonial-video-section__video-wrapper">
						<?php
						$video_url = get_sub_field('video_url');
						$video_file = get_sub_field('video_file');
						$video_poster = get_sub_field('video_poster');
						$video_source = $video_file ?: $video_url;
						?>
						<?php if ($video_source): ?>
							<video
								class="testimonial-video-section__video"
								src="<?php echo esc_url($video_source['url'] ?? $video_source); ?>"
								poster="<?php echo esc_url($video_poster['url'] ?? ''); ?>"
								preload="metadata"
								playsinline></video>
						<?php endif; ?>
						<button class="testimonial-video-section__play-btn" data-play-video aria-label="Play video">
							<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
								<path d="M28.6643 12.523C29.3074 12.865 29.8453 13.3755 30.2204 13.9998C30.5955 14.6241 30.7936 15.3387 30.7936 16.067C30.7936 16.7954 30.5955 17.51 30.2204 18.1343C29.8453 18.7586 29.3074 19.2691 28.6643 19.6111L11.5105 28.9391C8.74834 30.4413 5.35559 28.4866 5.35559 25.3964V6.739C5.35559 3.64616 8.74834 1.69272 11.5105 3.19362L28.6643 12.523Z" fill="white" />
							</svg>
						</button>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'client_testimonials_section'): ?>
			<?php
			$testimonials = get_sub_field('testimonials_repeater');
			$total_testimonials = is_array($testimonials) ? count($testimonials) : 0;
			?>
			<section class="client-testimonials-section" id="client-testimonials-<?php echo $i; ?>">
				<div class="client-testimonials-section__bg">
					<?php $bg_image = get_sub_field('background_image'); ?>
					<?php if ($bg_image): ?>
						<img src="<?php echo esc_url($bg_image['url']); ?>" alt="" loading="lazy" />
					<?php endif; ?>
				</div>
				<div class="client-testimonials-section__container">
					<div class="client-testimonials-section__header">
						<?php
						$eyebrow = get_sub_field('eyebrow_text');
						$heading = get_sub_field('section_heading');
						?>
						<?php if ($eyebrow): ?>
							<p class="client-testimonials-section__eyebrow"><?php echo esc_html($eyebrow); ?></p>
						<?php endif; ?>
						<?php if ($heading): ?>
							<h2 class="client-testimonials-section__heading"><?php echo esc_html($heading); ?></h2>
						<?php endif; ?>
					</div>

					<div class="client-testimonials-section__slider-wrapper" role="region" aria-label="Testimonials carousel">
						<div class="client-testimonials-section__slider mySwiper swiper" aria-live="polite">
							<div class="client-testimonials-section__slider-track swiper-wrapper" role="list">
								<?php if (have_rows('testimonials_repeater')): ?>
									<?php while (have_rows('testimonials_repeater')): the_row(); ?>
										<div class="client-testimonials-section__slide swiper-slide" role="listitem">
											<div class="client-testimonials-section__card">
												<p class="client-testimonials-section__quote">
													"<?php echo esc_html(get_sub_field('quote_text')); ?>"
												</p>
												<p class="client-testimonials-section__author">
													-<?php echo esc_html(get_sub_field('author_name')); ?>
												</p>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
							<div class="swiper-button-next client-testimonials-section__nav client-testimonials-section__nav--next" aria-label="Next testimonial">
								<div class="client-testimonials-section__nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
										<path d="M15 30L25 20L15 10" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
							</div>
							<div class="swiper-button-prev client-testimonials-section__nav client-testimonials-section__nav--prev" aria-label="Previous testimonial">
								<div class="client-testimonials-section__nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
										<path d="M25 30L15 20L25 10" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
							</div>
							<div class="swiper-pagination client-testimonials-section__dots" role="tablist" aria-label="Testimonial navigation"></div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'faq_section_new'): ?>
			<section class="faq-section-new" id="faq-section-new-<?php echo $i; ?>">
				<div class="faq-section-new__container">
					<div class="faq-section-new__left">
						<div class="faq-section-new__header">
							<h2 class="faq-section-new__heading"><?php echo esc_html(get_sub_field('faq_heading')); ?></h2>
							<?php if (get_sub_field('faq_subheading')): ?>
								<p class="faq-section-new__subheading"><?php echo esc_html(get_sub_field('faq_subheading')); ?></p>
							<?php endif; ?>
						</div>
						<?php
						$cta_link = get_sub_field('faq_cta_link');
						?>
						<?php if ($cta_link && !empty($cta_link['url'])): ?>
							<a href="<?php echo esc_url($cta_link['url']); ?>" class="faq-section-new__cta home-pc" target="<?php echo esc_attr($cta_link['target'] ?? '_self'); ?>">
								<?php echo esc_html($cta_link['title'] ?: 'Contact Us'); ?>
							</a>
						<?php endif; ?>
					</div>

					<div class="faq-section-new__accordion" data-faq-accordion>
						<?php if (have_rows('faq_items')):
							$faq_index = 0;
							while (have_rows('faq_items')) : the_row();
								$faq_index++;
								$is_open = false; // All closed on load
						?>
								<div class="faq-section-new__accordion-item" <?php echo $is_open ? 'data-opens' : ''; ?>>
									<button class="faq-section-new__accordion-header" data-faq-accordion-trigger aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
										<span class="faq-section-new__accordion-title"><?php echo esc_html(get_sub_field('faq_question')); ?></span>
										<span class="faq-section-new__accordion-icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
												<path class="faq-icon-horizontal" d="M18 9C18 9.41394 17.6639 9.75 17.25 9.75H9.75V17.25C9.75 17.6639 9.41394 18 9 18C8.58606 18 8.25 17.6639 8.25 17.25V9.75H0.75C0.336064 9.75 0 9.41394 0 9C0 8.58606 0.336064 8.25 0.75 8.25H8.25V0.75C8.25 0.336064 8.58606 0 9 0C9.41394 0 9.75 0.336064 9.75 0.75V8.25H17.25C17.6639 8.25 18 8.58606 18 9Z" fill="currentColor" />
											</svg>
										</span>
									</button>
									<div class="faq-section-new__accordion-content" data-faq-accordion-content <?php echo $is_open ? 'data-opens' : ''; ?>>
										<div class="faq-section-new__accordion-inner">
											<p><?php echo wp_kses_post(get_sub_field('faq_answer')); ?></p>
										</div>
									</div>
								</div>
						<?php endwhile;
						endif; ?>
					</div>
					<?php if ($cta_link && !empty($cta_link['url'])): ?>
							<a href="<?php echo esc_url($cta_link['url']); ?>" class="faq-section-new__cta home-mobile" target="<?php echo esc_attr($cta_link['target'] ?? '_self'); ?>">
								<?php echo esc_html($cta_link['title'] ?: 'Contact Us'); ?>
							</a>
					<?php endif; ?>
				</div>
			</section>

		<?php endif; ?>
	<?php endwhile;
	echo '</section>'; ?>
<?php endif; ?>