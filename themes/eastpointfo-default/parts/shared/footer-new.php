<?php
/**
 * Footer new - Homepage
 */
?>
<!-- ============================================
   FOOTER NEW - HOMEPAGE
   ============================================ -->
<footer class="footer-new" id="footer-new">
    <div class="footer-new__container">
        <!-- Mobile Logo & Contact Info -->
        <?php $logo = get_field('global_company_logo_new','option');?>
        <div class="footer-new__mobile-header">
            <a href="<?php echo home_url(); ?>" class="footer-new__logo">
                <?php if( !empty($logo) ): ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
                <?php endif; ?>
            </a>
            <div class="footer-new__mobile-contact">
                <h3 class="footer-new__tagline">North America's Baltic Birch Plywood Partner</h3>
                <a href="tel:+19056239888" class="footer-new__contact-link">+1 905 623-9888</a>
                <a href="mailto:info@thomesnorthamerica.com" class="footer-new__contact-link">info@thomesnorthamerica.com</a>
            </div>
        </div>

        <!-- Mobile Divider -->
        <div class="footer-new__divider-full home-mobile"></div>

        <!-- Mobile Accordion Navigation -->
        <div class="footer-new__mobile-nav">
            <!-- Products Accordion -->
            <div class="footer-new__accordion" data-accordion-group>
                <button class="footer-new__accordion-header" data-accordion-trigger aria-expanded="false">
                    <span class="footer-new__accordion-title">Products</span>
                    <span class="footer-new__accordion-icon">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="#f5f2ed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <div class="footer-new__accordion-content" data-accordion-content>
                    <ul class="footer-new__nav-list">
                        <li><a href="#">Anti-Slip Plywood</a></li>
                        <li><a href="#">Film-Faced Plywood</a></li>
                        <li><a href="#">Wholesale Baltic Birch</a></li>
                        <li><a href="#">Melamine Coated Plywood</a></li>
                    </ul>
                </div>
            </div>

            <!-- Industries Accordion -->
            <div class="footer-new__accordion" data-accordion-group>
                <button class="footer-new__accordion-header" data-accordion-trigger aria-expanded="false">
                    <span class="footer-new__accordion-title">Industries</span>
                    <span class="footer-new__accordion-icon">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="#f5f2ed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <div class="footer-new__accordion-content" data-accordion-content>
                    <ul class="footer-new__nav-list">
                        <li><a href="#">Construction</a></li>
                        <li><a href="#">Truck Flooring & Commercial Vehicles</a></li>
                        <li><a href="#">Fabrication & Prototyping</a></li>
                        <li><a href="#">Furniture & Interior Design</a></li>
                        <li><a href="#">Aircraft</a></li>
                        <li><a href="#">Marine</a></li>
                    </ul>
                </div>
            </div>

            <!-- Company Accordion -->
            <div class="footer-new__accordion" data-accordion-group>
                <button class="footer-new__accordion-header" data-accordion-trigger aria-expanded="false">
                    <span class="footer-new__accordion-title">Company</span>
                    <span class="footer-new__accordion-icon">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="#f5f2ed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <div class="footer-new__accordion-content" data-accordion-content>
                    <ul class="footer-new__nav-list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Mobile Divider -->
        <div class="footer-new__divider-full home-mobile"></div>

        <!-- Desktop Navigation (hidden on mobile) -->
        <div class="footer-new__desktop-nav">
            <div class="footer-new__main">
                <!-- Left: Brand & Contact Info -->
                <div class="footer-new__brand">
                    <div class="footer-new__brand-inner">
                        <a href="<?php echo home_url(); ?>" class="footer-new__logo">
                            <?php if( !empty($logo) ): ?>
                                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
                            <?php endif; ?>
                        </a>
                        <h3 class="footer-new__tagline">North America's Baltic Birch Plywood Partner</h3>
                    </div>
                    <div class="footer-new__divider home-pc-new"></div>
                    <div class="footer-new__contact">
                        <a href="tel:+19056239888" class="footer-new__contact-link">+1 905 623-9888</a>
                        <a href="mailto:info@thomesnorthamerica.com" class="footer-new__contact-link">info@thomesnorthamerica.com</a>
                    </div>
                </div>

                <!-- Right: Navigation Columns -->
                <div class="footer-new__nav">
                    <!-- Products -->
                    <div class="footer-new__nav-column">
                        <h4 class="footer-new__nav-title">Products</h4>
                        <ul class="footer-new__nav-list">
                            <li><a href="#">Anti-Slip Plywood</a></li>
                            <li><a href="#">Film-Faced Plywood</a></li>
                            <li><a href="#">Wholesale Baltic Birch</a></li>
                            <li><a href="#">Melamine Coated Plywood</a></li>
                        </ul>
                    </div>

                    <!-- Industries -->
                    <div class="footer-new__nav-column">
                        <h4 class="footer-new__nav-title">Industries</h4>
                        <ul class="footer-new__nav-list">
                            <li><a href="#">Construction</a></li>
                            <li><a href="#">Truck Flooring & Commercial Vehicles</a></li>
                            <li><a href="#">Fabrication & Prototyping</a></li>
                            <li><a href="#">Furniture & Interior Design</a></li>
                            <li><a href="#">Aircraft</a></li>
                            <li><a href="#">Marine</a></li>
                        </ul>
                    </div>

                    <!-- Company -->
                    <div class="footer-new__nav-column">
                        <h4 class="footer-new__nav-title">Company</h4>
                        <ul class="footer-new__nav-list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Resources</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-new__divider-full home-pc"></div>
        <!-- Bottom Bar -->
        <div class="footer-new__bottom">
            <div class="footer-new__disclaimer">
                <p>Thomes is not a retail partner, please contact us to put you in contact with one of our distribution partners.</p>
            </div>
            <div class="footer-new__copyright">
                <p>&copy; <?php echo date('Y'); ?> Thomes North America. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
