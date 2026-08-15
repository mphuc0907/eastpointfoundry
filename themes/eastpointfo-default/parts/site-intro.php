<?php
/**
 * Hero Homepage New - East Point Foundry
 */

// ACF Field Names
$hhn_background_type = get_field('hhn_background_type'); // 'image' or 'video'
$hhn_background_image = get_field('hhn_background_image');
$hhn_background_video = get_field('hhn_background_video');
$hhn_eyebrow = get_field('hhn_eyebrow');
$hhn_heading_line1 = get_field('hhn_heading_line1');
$hhn_heading_line2 = get_field('hhn_heading_line2');
$hhn_italic_words = get_field('hhn_italic_words');
$hhn_subtitle = get_field('hhn_subtitle');
$hhn_cta_primary = get_field('hhn_cta_primary');
$hhn_cta_secondary = get_field('hhn_cta_secondary');

// Trust bar items
$hhn_trust_icon1 = get_field('hhn_trust_icon1');
$hhn_trust_text1 = get_field('hhn_trust_text1');
$hhn_trust_text1_mobile = get_field('hhn_trust_text1_mobile');
$hhn_trust_icon2 = get_field('hhn_trust_icon2');
$hhn_trust_text2 = get_field('hhn_trust_text2');
$hhn_trust_text2_mobile = get_field('hhn_trust_text2_mobile');
$hhn_trust_icon3 = get_field('hhn_trust_icon3');
$hhn_trust_text3 = get_field('hhn_trust_text3');
$hhn_trust_text3_mobile = get_field('hhn_trust_text3_mobile');
$hhn_trust_icon4 = get_field('hhn_trust_icon4');
$hhn_trust_text4 = get_field('hhn_trust_text4');
$hhn_trust_text4_mobile = get_field('hhn_trust_text4_mobile');

// Parse italic words into array
$italic_words_array = !empty($hhn_italic_words) ? array_map('trim', explode(',', $hhn_italic_words)) : array();

// Helper function to wrap words in italic spans
function epf_wrap_italic_words($text, $italic_words) {
    if (empty($italic_words) || empty($text)) {
        return esc_html($text);
    }

    $words = preg_split('/(\s+)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    $result = '';

    foreach ($words as $word) {
        $clean_word = trim($word);
        if (in_array($clean_word, $italic_words)) {
            $result .= '<em>' . $word . '</em>';
        } else {
            $result .= $word;
        }
    }

    return $result;
}

// Trust bar items array
$trust_items = array(
    array('icon' => $hhn_trust_icon1, 'text' => $hhn_trust_text1, 'text_mobile' => $hhn_trust_text1_mobile),
    array('icon' => $hhn_trust_icon2, 'text' => $hhn_trust_text2, 'text_mobile' => $hhn_trust_text2_mobile),
    array('icon' => $hhn_trust_icon3, 'text' => $hhn_trust_text3, 'text_mobile' => $hhn_trust_text3_mobile),
    array('icon' => $hhn_trust_icon4, 'text' => $hhn_trust_text4, 'text_mobile' => $hhn_trust_text4_mobile),
);

// Background style
$bg_style = '';
if ($hhn_background_type === 'video' && !empty($hhn_background_video)) {
    // Video background - handled via data attribute for JS
    $bg_video_url = is_array($hhn_background_video) ? $hhn_background_video['url'] : $hhn_background_video;
} elseif ($hhn_background_type === 'image' && !empty($hhn_background_image)) {
    $bg_image_url = is_array($hhn_background_image) ? $hhn_background_image['url'] : $hhn_background_image;
    $bg_style = 'background-image: url(' . esc_url($bg_image_url) . ');';
}
?>

<section class="hero-banner" id="hero_banner" <?php echo ($hhn_background_type === 'video' && !empty($hhn_background_video)) ? 'data-hero-video="' . esc_url($bg_video_url) . '"' : ''; ?> style="<?php echo $bg_style; ?>">
    <?php if ($hhn_background_type === 'video' && !empty($hhn_background_video)) : ?>
        <video class="hero-banner__video" autoplay muted loop playsinline>
            <source src="<?php echo esc_url($bg_video_url); ?>" type="video/mp4">
        </video>
    <?php endif; ?>

    <div class="hero-banner__overlay"></div>
    <!-- Hero Content -->
    <div class="hero-banner__content">
        <div class="hero-banner__text-wrapper">
            <?php if (!empty($hhn_eyebrow)) : ?>
                <p class="hero-banner__eyebrow">
                    <?php echo esc_html($hhn_eyebrow); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($hhn_heading_line1) || !empty($hhn_heading_line2)) : ?>
                <div class="hero-banner__heading">
                    <?php if (!empty($hhn_heading_line1)) : ?>
                        <span class="hero-banner__heading-line1">
                            <?php echo esc_html($hhn_heading_line1); ?>
                        </span>
                    <?php endif; ?>

                    <?php if (!empty($hhn_heading_line2)) : ?>
                        <span class="hero-banner__heading-line2">
                            <?php echo $hhn_heading_line2; ?>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($hhn_subtitle)) : ?>
                <p class="hero-banner__subtitle">
                    <?php echo esc_html($hhn_subtitle); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($hhn_cta_primary) || !empty($hhn_cta_secondary)) : ?>
                <div class="hero-banner__cta-wrapper">
                    <?php if (!empty($hhn_cta_primary)) : ?>
                        <a href="<?php echo esc_url($hhn_cta_primary['url']); ?>"
                           class="hero-banner__cta hero-banner__cta--primary"
                           target="<?php echo esc_attr($hhn_cta_primary['target'] ?? '_self'); ?>">
                            <?php echo esc_html($hhn_cta_primary['title']); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($hhn_cta_secondary)) : ?>
                        <a href="<?php echo esc_url($hhn_cta_secondary['url']); ?>"
                           class="hero-banner__cta hero-banner__cta--secondary"
                           target="<?php echo esc_attr($hhn_cta_secondary['target'] ?? '_self'); ?>">
                            <?php echo esc_html($hhn_cta_secondary['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Trust Bar -->
    <div class="hero-banner__trust-bar">
        <div class="hero-banner__trust-bar-inner">
            <?php
            $trust_count = 0;
            foreach ($trust_items as $item) :
                $trust_count++;
                if (empty($item['text'])) continue;
            ?>
                <?php if ($trust_count > 1) : ?>
                    <div class="hero-banner__trust-divider">
                        <div class="hero-banner__trust-divider-line"></div>
                    </div>
                <?php endif; ?>

                <div class="hero-banner__trust-item">
                    <?php if (!empty($item['icon']) && !empty($item['icon']['url'])) : ?>
                        <div class="hero-banner__trust-icon">
                            <img src="<?php echo esc_url($item['icon']['url']); ?>"
                                 alt="<?php echo esc_attr($item['icon']['alt'] ?? ''); ?>"
                                 width="24"
                                 height="24" />
                        </div>
                    <?php endif; ?>

                    <p class="hero-banner__trust-text hero-banner__trust-text--desktop">
                        <?php
                        $text_lines = explode("\n", $item['text']);
                        foreach ($text_lines as $index => $line) :
                            echo trim($line);
                            if ($index < count($text_lines) - 1) echo '<br>';
                        endforeach;
                        ?>
                    </p>
                    <?php if (!empty($item['text_mobile'])) : ?>
                        <p class="hero-banner__trust-text hero-banner__trust-text--mobile">
                            <?php
                            $text_mobile_lines = explode("\n", $item['text_mobile']);
                            foreach ($text_mobile_lines as $index => $line) :
                                echo trim($line);
                                if ($index < count($text_mobile_lines) - 1) echo '<br>';
                            endforeach;
                            ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
