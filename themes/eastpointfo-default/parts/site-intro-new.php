<section class="hero-homepage-new" id="hero_homepage_new<?php echo $i ?>">
    <?php
    $hhn_video = get_field('hhn_background_video');
    $hhn_image = get_field('hhn_background');
    ?>
    <?php if ($hhn_video): ?>
        <video class="hero-homepage-new__video" autoplay muted loop playsinline>
            <source src="<?php echo $hhn_video; ?>" type="video/mp4">
        </video>
    <?php elseif ($hhn_image): ?>
        <div class="hero-homepage-new__image" style="background-image: url(<?php echo $hhn_image; ?>);"></div>
    <?php endif; ?>
    <div class="hero-homepage-new__overlay"></div>
    <div class="hero-homepage-new__section">
        <div class="hero-homepage-new__inner">
            <div class="hero-homepage-new__content">
                <div class="hero-homepage-new__text">
                    <?php if (get_field('hhn_eyebrow')): ?>
                        <p class="hero-homepage-new__eyebrow"><?php echo get_field('hhn_eyebrow'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('hhn_heading_line1') && get_field('hhn_heading_line2')): ?>
                        <h1 class="hero-homepage-new__heading">
                            <span class="hero-homepage-new__heading-line1"><?php echo get_field('hhn_heading_line1'); ?></span>
                            <span class="hero-homepage-new__heading-line2"><?php echo get_field('hhn_heading_line2'); ?></span>
                        </h1>
                    <?php endif; ?>

                    <?php if (get_field('hhn_subtitle')): ?>
                        <p class="hero-homepage-new__subtitle"><?php echo get_field('hhn_subtitle'); ?></p>
                    <?php endif; ?>

                    <div class="hero-homepage-new__cta">
                        <?php
                        $hhn_cta_primary = get_field('hhn_cta_primary');
                        if ($hhn_cta_primary): ?>
                            <a href="<?php echo esc_url($hhn_cta_primary['url']); ?>" class="hero-homepage-new__cta-btn hero-homepage-new__cta-btn--secondary" target="<?php echo esc_attr($hhn_cta_primary['target']); ?>">
                                <?php echo esc_html($hhn_cta_primary['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php
                        $hhn_cta_secondary = get_field('hhn_cta_secondary');
                        if ($hhn_cta_secondary): ?>
                            <a href="<?php echo esc_url($hhn_cta_secondary['url']); ?>" class="hero-homepage-new__cta-btn hero-homepage-new__cta-btn--primary" target="<?php echo esc_attr($hhn_cta_secondary['target']); ?>">
                                <?php echo esc_html($hhn_cta_secondary['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>