<?php

/**
 * Header - East Point Foundry Homepage
 */

// Get menu by name - "Menu home page new" (WordPress menu)
$menu_name = 'Menu home page new';
$elMenu   = wp_get_nav_menu_items($menu_name) ?: [];

// Group items into parents and children
$parents  = [];
$children = [];
foreach ($elMenu as $item) {
    if (empty($item->menu_item_parent) || $item->menu_item_parent == 0) {
        $parents[] = $item;
    } else {
        $children[(int) $item->menu_item_parent][] = $item;
    }
}

// Check current URL for active state
$current_url = (is_ssl() ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$current_path = rtrim(str_replace(home_url(), '', $current_url), '/');

// Collect child URLs and term IDs for parent active check
$all_child_urls = [];
$all_child_term_ids = [];
foreach ($children as $parent_id => $child_items) {
    foreach ($child_items as $child) {
        $child_path = rtrim(str_replace(home_url(), '', $child->url), '/');
        $all_child_urls[$parent_id][] = $child_path;

        if ($child->object === 'category' && !empty($child->object_id)) {
            $all_child_term_ids[$parent_id][] = (int) $child->object_id;
        }
    }
}

// Check if viewing single post and its categories
$is_single_post = is_single() && !empty(get_queried_object_id());
$current_post_categories = [];
if ($is_single_post) {
    $current_post_id = get_queried_object_id();
    $current_post_categories = wp_get_post_categories($current_post_id, ['fields' => 'ids']);
}

// Helper function to check if item is active
function epf_is_menu_item_active($item, $current_path, $children, $all_child_urls, $all_child_term_ids, $current_post_categories)
{
    $item_path = rtrim(str_replace(home_url(), '', $item->url), '/');

    // Direct match
    if ($item_path === $current_path) {
        return true;
    }

    // Check if any child is active
    $item_id = (int) $item->db_id;
    if (isset($children[$item_id])) {
        // Child URL match
        if (isset($all_child_urls[$item_id]) && in_array($current_path, $all_child_urls[$item_id])) {
            return true;
        }
        // Category/term match
        if (isset($all_child_term_ids[$item_id]) && !empty($current_post_categories)) {
            foreach ($current_post_categories as $cat_id) {
                if (in_array($cat_id, $all_child_term_ids[$item_id])) {
                    return true;
                }
            }
        }
    }

    return false;
}
?>
<!-- ============================================
   HEADER NEW - EAST POINT FOUNDRY
   ============================================ -->
<header class="header-new" id="header-new">
    <div class="header-new__container">
        <div class="header-new__content">
            <!-- Logo -->
            <?php
            $logo = get_field('global_company_logo', 'option');
            $logo_scroll = get_field('global_company_logo_new', 'option');
            ?>
            <a href="<?php echo home_url(); ?>" class="header-new__logo">
                <?php if (!empty($logo)) : ?>
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" title="<?php echo esc_attr($logo['alt']); ?>" class="header-new__logo-img">
                    <?php if (!empty($logo_scroll)) : ?>
                        <img src="<?php echo esc_url($logo_scroll['url']); ?>" alt="<?php echo esc_attr($logo_scroll['alt']); ?>" title="<?php echo esc_attr($logo_scroll['alt']); ?>" class="header-new__logo-img-scroll">
                    <?php endif; ?>
                <?php endif; ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="header-new__nav" id="header-new-nav">
                <ul class="header-new__menu">
                    <?php foreach ($parents as $item) :
                        $has_children = isset($children[(int)$item->db_id]);
                        $is_active = epf_is_menu_item_active($item, $current_path, $children, $all_child_urls, $all_child_term_ids, $current_post_categories);
                    ?>
                        <li class="header-new__menu-item <?php echo $has_children ? 'header-new__menu-item--dropdown' : ''; ?> <?php echo $is_active ? 'current-menu-item' : ''; ?>">
                            <a href="<?php echo esc_url($item->url); ?>" class="header-new__menu-link <?php echo $has_children ? 'header-new__menu-link--dropdown' : ''; ?>">
                                <span><?php echo esc_html($item->title); ?></span>
                                <?php if ($has_children) : ?>
                                    <svg class="header-new__chevron" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                <?php endif; ?>
                            </a>
                            <?php if ($has_children) : ?>
                                <div class="header-new__dropdown">
                                    <div class="header-new__dropdown-content">
                                        <?php foreach ($children[(int)$item->db_id] as $child) :
                                            $child_description = !empty($child->description) ? $child->description : '';
                                            $menu_icon = null;
                                            if (!empty($child->object_id)) {
                                                $menu_icon = get_field('icon_menu_svg', $child);
                                            }
                                        ?>
                                            <a href="<?php echo esc_url($child->url); ?>" class="header-new__dropdown-item">
                                                <?php if ($menu_icon && !empty($menu_icon['url'])) : ?>
                                                    <div class="header-new__dropdown-item-icon">
                                                        <img src="<?php echo esc_url($menu_icon['url']); ?>" alt="<?php echo esc_attr($child->title); ?>" width="<?php echo esc_attr($menu_icon['width'] ?? 24); ?>" height="<?php echo esc_attr($menu_icon['height'] ?? 24); ?>" />
                                                    </div>
                                                <?php endif; ?>
                                                <div class="header-new__dropdown-item-content">
                                                    <span class="header-new__dropdown-item-title"><?php echo esc_html($child->title); ?></span>
                                                    <?php if ($child_description) : ?>
                                                        <span class="header-new__dropdown-item-desc"><?php echo esc_html($child_description); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Right Side: CTA (Desktop) + Mobile CTA + Mobile Hamburger -->
            <div class="header-new__right">
                <!-- CTA Button - Desktop: "Contact Us" -->
                <a href="#contact" class="header-new__cta header-new__cta--desktop">
                    Contact Us
                </a>

                <!-- CTA Button - Mobile/Tablet: "R. Quote" -->


                <!-- Mobile Menu Toggle -->

            </div>
            <div class="menu-mobile-nav_cta">
                <a href="#contact" class="header-new__cta header-new__cta--mobile">
                    R. Quote
                </a>
                <button class="header-new__mobile-toggle" id="header-new-mobile-toggle" aria-label="Toggle menu">
                    <span class="header-new__hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="header-new__mobile-menu" id="header-new-mobile-menu">
        <nav class="header-new__mobile-nav">
            <ul class="header-new__mobile-menu-list">
                <?php foreach ($parents as $item) :
                    $has_children = isset($children[(int)$item->db_id]);
                ?>
                    <li class="header-new__mobile-menu-item <?php echo $has_children ? 'has-submenu' : ''; ?>">
                        <div class="header-new__mobile-menu-item-inner">
                            <a href="<?php echo esc_url($item->url); ?>" class="header-new__mobile-menu-link">
                                <?php echo esc_html($item->title); ?>
                            </a>
                            <?php if ($has_children) : ?>
                                <button class="header-new__mobile-submenu-toggle" aria-label="Toggle submenu">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if ($has_children) : ?>
                            <ul class="header-new__mobile-submenu">
                                <?php foreach ($children[(int)$item->db_id] as $child) : ?>
                                    <li class="header-new__mobile-submenu-item">
                                        <a href="<?php echo esc_url($child->url); ?>" class="header-new__mobile-submenu-link">
                                            <?php echo esc_html($child->title); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>