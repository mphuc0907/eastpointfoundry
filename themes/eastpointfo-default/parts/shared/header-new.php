<?php
/**
 * Header mới - Homepage
 * Theo thiết kế Figma: Dropdown header navigation
 */

// Get menu by name
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
function is_menu_item_active($item, $current_path, $children, $all_child_urls, $all_child_term_ids, $current_post_categories) {
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
<!-- Google Fonts - IBM Plex Sans -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
<!-- ============================================
   HEADER NEW
   ============================================ -->
<header class="header-new" id="header-new">
    <div class="header-new__container">
        <div class="header-new__content">
            <!-- Logo -->
            <?php 
            $logo = get_field('global_company_logo_new','option');
            $logo_dark = get_field('global_company_logo','option');
            ?>
            <a href="<?php echo home_url(); ?>" class="header-new__logo">
                <?php if( !empty($logo) ): ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>" class="header-new__logo-img">
                <?php endif;?>
                <?php if( !empty($logo_dark) ): ?>
                    <img src="<?php echo $logo_dark['url']; ?>" alt="<?php echo $logo_dark['alt']; ?>" title="<?php echo $logo_dark['alt']; ?>" class="header-new__logo-img header-new__logo-img--dark">
                <?php endif;?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="header-new__nav" id="header-new-nav">
                <ul class="header-new__menu">
                    <?php foreach ($parents as $item): 
                        $has_children = isset($children[(int)$item->db_id]);
                        $is_active = is_menu_item_active($item, $current_path, $children, $all_child_urls, $all_child_term_ids, $current_post_categories);
                    ?>
                        <li class="header-new__menu-item <?php echo $has_children ? 'header-new__menu-item--dropdown' : ''; ?> <?php echo $is_active ? 'current-menu-item' : ''; ?>">
                            <a href="<?php echo esc_url($item->url); ?>" class="header-new__menu-link <?php echo $has_children ? 'header-new__menu-link--dropdown' : ''; ?>">
                                <span><?php echo esc_html($item->title); ?></span>
                                <?php if ($has_children): ?>
                                    <svg class="header-new__chevron" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <?php endif; ?>
                            </a>
                            <?php if ($has_children): ?>
                                <div class="header-new__dropdown">
                                    <div class="header-new__dropdown-content">
                                        <?php foreach ($children[(int)$item->db_id] as $child):
                                            // Get description from menu item, fallback to empty
                                            $child_description = !empty($child->description) ? $child->description : '';
                                            
                                            // Get custom icon from menu item
                                            $menu_icon = null;
                                            $icon_width = 24;
                                            $icon_height = 24;
                                            if (!empty($child->object_id)) {
                                                $menu_icon = get_field('icon_menu_svg', $child);
                                            }
                                        ?>
                                            <a href="<?php echo esc_url($child->url); ?>" class="header-new__dropdown-item">
                                            <?php if ($menu_icon && !empty($menu_icon['url'])): ?>
                                                <div class="header-new__dropdown-item-icon">
                                                    <img src="<?php echo esc_url($menu_icon['url']); ?>" alt="<?php echo esc_attr($child->title); ?>" width="<?php echo esc_attr($menu_icon['width'] ?? 24); ?>" height="<?php echo esc_attr($menu_icon['height'] ?? 24); ?>" />
                                                </div>
                                                <?php endif; ?>
                                                <div class="header-new__dropdown-item-content">
                                                    <span class="header-new__dropdown-item-title"><?php echo esc_html($child->title); ?></span>
                                                    <?php if ($child_description): ?>
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

            <!-- CTA Button -->
            <a href="#contact" class="header-new__mobile-cta overflow-hidden-cta">
                Get in touchs
            </a>
            

            <!-- Mobile CTA Button (visible on tablet) -->
            
            <div class="header-new__cta-container header-new__cta-container--desktop">
                <!-- Search & Language Group -->
                <div class="header-new__icons-group">
                    <!-- Search Button -->
                    <button class="header-new__icon-btn header-new__search-btn" id="header-new-search-btn" aria-label="Search" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7.39719 14.7944C5.32977 14.7944 3.58024 14.0782 2.1486 12.6458C0.716959 11.2134 0.000759288 9.46385 6.02132e-07 7.39719C-0.000758084 5.33053 0.715442 3.581 2.1486 2.1486C3.58176 0.7162 5.33129 0 7.39719 0C9.4631 0 11.213 0.7162 12.6469 2.1486C14.0808 3.581 14.7967 5.33053 14.7944 7.39719C14.7944 8.23175 14.6616 9.01888 14.3961 9.7586C14.1305 10.4983 13.7702 11.1527 13.3149 11.7217L19.6879 18.0947C19.8965 18.3033 20.0009 18.5688 20.0009 18.8913C20.0009 19.2137 19.8965 19.4793 19.6879 19.6879C19.4793 19.8965 19.2137 20.0009 18.8913 20.0009C18.5688 20.0009 18.3033 19.8965 18.0947 19.6879L11.7217 13.3149C11.1527 13.7702 10.4983 14.1305 9.7586 14.3961C9.01889 14.6616 8.23175 14.7944 7.39719 14.7944ZM7.39719 12.5183C8.81973 12.5183 10.0291 12.0206 11.0252 11.0252C12.0214 10.0298 12.5191 8.82049 12.5183 7.39719C12.5176 5.9739 12.0199 4.76493 11.0252 3.77029C10.0306 2.77565 8.82125 2.27758 7.39719 2.27606C5.97314 2.27454 4.76417 2.77262 3.77029 3.77029C2.77641 4.76796 2.27834 5.97693 2.27606 7.39719C2.27378 8.81745 2.77186 10.0268 3.77029 11.0252C4.76872 12.0237 5.97769 12.5214 7.39719 12.5183Z" fill="white"/>
                        </svg>
                    </button>

                    <!-- Language Button with Chevron -->
                    <!-- Language Selector -->
                    <div class="header-new__lang-wrapper">
                        <button class="header-new__icon-btn header-new__lang-btn" aria-label="Change language" id="header-new-lang-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M11.75 0.8C11.75 0.8 13.6195 3.26157 14.4069 7.25M14.4069 7.25C14.617 8.31393 14.75 9.48651 14.75 10.75C14.75 12.0135 14.617 13.1861 14.4069 14.25M14.4069 7.25H7.09307M14.4069 7.25H20.12M14.4069 14.25C13.6195 18.2384 11.75 20.7 11.75 20.7M14.4069 14.25H7.09307M14.4069 14.25H20.12M9.75 20.7C9.75 20.7 7.88045 18.2384 7.09307 14.25M7.09307 14.25C6.88303 13.1861 6.75 12.0135 6.75 10.75C6.75 9.48651 6.88303 8.31393 7.09307 7.25M7.09307 14.25H1.38M7.09307 7.25C7.88045 3.26157 9.75 0.8 9.75 0.8M7.09307 7.25H1.38M0.75 10.75C0.75 16.273 5.227 20.75 10.75 20.75C16.273 20.75 20.75 16.273 20.75 10.75C20.75 5.227 16.273 0.75 10.75 0.75C5.227 0.75 0.75 5.227 0.75 10.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <svg class="header-new__lang-chevron" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M5 7.5L10 12.5L15 7.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <!-- Language Dropdown -->
                        <div class="header-new__lang-dropdown" id="header-new-lang-dropdown">
                            <?php echo do_shortcode('[gt-link lang="en" label="English" widget_look="flags_name"]'); ?>
                            <?php echo do_shortcode('[gt-link lang="fr" label="Français" widget_look="flags_name"]'); ?>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="#contact" class="header-new__cta ">
                    Get in touch
                </a>
            </div>
            <!-- Mobile Menu Toggle -->
            <button class="header-new__mobile-toggle" id="header-new-mobile-toggle" aria-label="Toggle menu">
                <span class="header-new__hamburger"></span>
            </button>
        </div>
    </div>

            <!-- Mobile Menu -->
            <div class="header-new__mobile-menu" id="header-new-mobile-menu">
                <nav class="header-new__mobile-nav">
                    <ul class="header-new__mobile-menu-list">
                        <?php foreach ($parents as $item): 
                            $has_children = isset($children[(int)$item->db_id]);
                        ?>
                            <li class="header-new__mobile-menu-item <?php echo $has_children ? 'has-submenu' : ''; ?>">
                                <div class="header-new__mobile-menu-item-inner">
                                    <a href="<?php echo esc_url($item->url); ?>" class="header-new__mobile-menu-link">
                                        <?php echo esc_html($item->title); ?>
                                    </a>
                                    <?php if ($has_children): ?>
                                        <button class="header-new__mobile-submenu-toggle" aria-label="Toggle submenu">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <?php if ($has_children): ?>
                                    <ul class="header-new__mobile-submenu">
                                        <?php foreach ($children[(int)$item->db_id] as $child): ?>
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
                        <li class="header-new__mobile-menu-item header-new__mobile-menu-item--cta">
                            <a href="#contact" class="header-new__mobile-menu-link">Get in touch</a>
                        </li>
                    </ul>
                </nav>
            </div>
</header>

<!-- Search Popup -->
<div class="header-new__search-popup" id="header-new-search-popup">
    <div class="header-new__search-popup-overlay" id="header-new-search-overlay"></div>
    <div class="header-new__search-popup-content">
        <button class="header-new__search-popup-close" id="header-new-search-close" aria-label="Close search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <form class="header-new__search-popup-form" role="search" method="get" action="<?php echo home_url('/'); ?>">
            <div class="header-new__search-popup-input-wrapper">
                <svg class="header-new__search-popup-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="search" class="header-new__search-popup-input" name="s" placeholder="Search..." aria-label="Search">
            </div>
            <button type="submit" class="header-new__search-popup-submit">
                Search
            </button>
        </form>
    </div>
</div>