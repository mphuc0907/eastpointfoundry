<?php

/**
 * Footer new - Homepage East Point Foundry
 * Design from Figma: node-id 2046:1907 (PC) & 2137:4784 (Mobile)
 */
$logo = get_field('global_company_logo_new', 'option');
?>
<footer class="footer-epf" id="footer-epf">
    <div class="footer-epf__container">
        <!-- Desktop Main Content -->
        <div class="footer-epf__main">
            <!-- Column 1: Brand Logo & Tagline -->
            <div class="footer-epf__brand">
                <a href="<?php echo home_url(); ?>" class="footer-epf__logo">
                    <?php if (!empty($logo)) : ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: get_bloginfo('name')); ?>">
                    <?php endif; ?>
                </a>
                <p class="footer-epf__tagline">Casting bronze, aluminum & brass since 1948.</p>
            </div>

            <!-- Column 2: Services -->
            <div class="footer-epf__nav-column">
                <h4 class="footer-epf__nav-title">Services</h4>
                <ul class="footer-epf__nav-list">
                    <li><a href="#" class="footer-epf__nav-link">Plaques</a></li>
                    <li><a href="#" class="footer-epf__nav-link">Castings</a></li>
                    <li><a href="#" class="footer-epf__nav-link">Lettering</a></li>
                    <li><a href="#" class="footer-epf__nav-link">Ornamentals</a></li>
                    <li><a href="#" class="footer-epf__nav-link">Sculptures</a></li>
                </ul>
            </div>

            <!-- Column 3: Quick Links -->
            <div class="footer-epf__nav-column footer-epf__nav-column--links">
                <a href="#" class="footer-epf__nav-link footer-epf__nav-link--title">Industries Served</a>
                <a href="#" class="footer-epf__nav-link footer-epf__nav-link--title">Image Gallery</a>
                <a href="#" class="footer-epf__nav-link footer-epf__nav-link--title">About Us</a>
            </div>

            <!-- Column 4: Contact Info -->
            <div class="footer-epf__contact">
                <p class="footer-epf__address">1312 Central Avenue, East Point, GA 30344</p>

                <div class="footer-epf__contact-list">
                    <a href="tel:+14047621737" class="footer-epf__contact-item">
                        <span class="footer-epf__contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="footer-epf__contact-text">(404) 762-1737</span>
                    </a>

                    <a href="mailto:sales@eastpointfoundry.com" class="footer-epf__contact-item">
                        <span class="footer-epf__contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <polyline points="22,6 12,13 2,6" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="footer-epf__contact-text">sales@eastpointfoundry.com</span>
                    </a>
                </div>

                <a href="#contact" class="footer-epf__cta">Contact Us</a>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-epf__bottom">
            <p class="footer-epf__copyright">&copy; <?php echo date('Y'); ?> East Point Foundry. All Rights Reserved.</p>
            <nav class="footer-epf__legal">
                <a href="#" class="footer-epf__legal-link">Privacy Policy</a>
                <a href="#" class="footer-epf__legal-link">Terms of Service</a>
                <a href="#" class="footer-epf__legal-link footer-epf__legal-link--social">Facebook</a>
            </nav>
        </div>

        <!-- Mobile Content (hidden on desktop) -->
        <div class="footer-epf__mobile">
            <div class="footer-epf__mobile-top">
                <!-- Logo & Tagline -->
                <a href="<?php echo home_url(); ?>" class="footer-epf__mobile-logo">
                    <?php if (!empty($logo)) : ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: get_bloginfo('name')); ?>">
                    <?php endif; ?>
                </a>
                <p class="footer-epf__mobile-tagline">Casting bronze, aluminum & brass since 1948.</p>
            </div>

            <div class="footer-epf__divider"></div>

            <!-- Contact Section -->
            <div class="footer-epf__mobile-contact">
                <p class="footer-epf__address">1312 Central Avenue, East Point, GA 30344</p>

                <div class="footer-epf__contact-list">
                    <a href="tel:+14047621737" class="footer-epf__contact-item">
                        <span class="footer-epf__contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="footer-epf__contact-text">(404) 762-1737</span>
                    </a>

                    <a href="mailto:sales@eastpointfoundry.com" class="footer-epf__contact-item">
                        <span class="footer-epf__contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <polyline points="22,6 12,13 2,6" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="footer-epf__contact-text">sales@eastpointfoundry.com</span>
                    </a>
                </div>

                <a href="#contact" class="footer-epf__cta">Contact Us</a>
            </div>

            <div class="footer-epf__divider"></div>

            <!-- Mobile Accordion -->
            <div class="footer-epf__mobile-accordion" data-footer-accordion>
                <div class="footer-epf__mobile-content" data-footer-accordion-content>
                    <button class="footer-epf__accordion-trigger" data-footer-accordion-trigger aria-expanded="false">
                        <span class="footer-epf__accordion-title">Services</span>
                        <span class="footer-epf__accordion-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path d="M13.3999 17.3996C13.7666 17.0329 14.2332 16.8496 14.7999 16.8496C15.3666 16.8496 15.8332 17.0329 16.1999 17.3996L23.9999 25.1996L31.7999 17.3996C32.1666 17.0329 32.6332 16.8496 33.1999 16.8496C33.7666 16.8496 34.2332 17.0329 34.5999 17.3996C34.9666 17.7663 35.1499 18.2329 35.1499 18.7996C35.1499 19.3663 34.9666 19.8329 34.5999 20.1996L25.3999 29.3996C25.1999 29.5996 24.9832 29.7416 24.7499 29.8256C24.5166 29.9083 24.2666 29.9496 23.9999 29.9496C23.7332 29.9496 23.4832 29.9083 23.2499 29.8256C23.0166 29.7416 22.7999 29.5996 22.5999 29.3996L13.3999 20.1996C13.0332 19.8329 12.8499 19.3663 12.8499 18.7996C12.8499 18.2329 13.0332 17.7663 13.3999 17.3996Z" fill="white" />
                            </svg>
                        </span>
                    </button>
                    <div class="footer-epf__accordion-content" data-footer-accordion-panel>
                        <ul class="footer-epf__mobile-nav-list">
                            <li><a href="#">Plaques</a></li>
                            <li><a href="#">Castings</a></li>
                            <li><a href="#">Lettering</a></li>
                            <li><a href="#">Ornamentals</a></li>
                            <li><a href="#">Sculptures</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-epf__mobile-content" data-footer-accordion-content>
                    <button class="footer-epf__accordion-trigger" data-footer-accordion-trigger aria-expanded="false">
                        <span class="footer-epf__accordion-title">Industries Served</span>
                    </button>
                </div>

                <div class="footer-epf__mobile-content" data-footer-accordion-content>
                    <button class="footer-epf__accordion-trigger" data-footer-accordion-trigger aria-expanded="false">
                        <span class="footer-epf__accordion-title">Image Gallery</span>
                    </button>
                </div>

                <div class="footer-epf__mobile-content" data-footer-accordion-content>
                    <button class="footer-epf__accordion-trigger" data-footer-accordion-trigger aria-expanded="false">
                        <span class="footer-epf__accordion-title">About Us</span>
                    </button>
                </div>
            </div>

            <div class="footer-epf__divider"></div>

            <!-- Mobile Bottom -->
            <div class="footer-epf__mobile-bottom">
                <p class="footer-epf__copyright">&copy; <?php echo date('Y'); ?> East Point Foundry. All Rights Reserved.</p>
                <nav class="footer-epf__legal">
                    <a href="#" class="footer-epf__legal-link">Privacy Policy</a>
                    <a href="#" class="footer-epf__legal-link">Terms of Service</a>
                    <a href="#" class="footer-epf__legal-link footer-epf__legal-link--social">Facebook</a>
                </nav>
            </div>
        </div>
    </div>
</footer>