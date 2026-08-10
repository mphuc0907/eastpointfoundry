<!--Site Footer Start-->
<footer class="site-footer footer-style3" role="contentinfo">
    <div class="container">
        
        <?php $logo = get_field('global_company_logo','option');
        if( !empty($logo) ): ?>
            <div class="logo-wrap"><a href="<?php bloginfo('url'); ?>" class="sf-logo">
                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>"  width="114" height="103">
            </a></div>
        <?php endif;?>
        
        <div class="row sf-top-wrap">
        <div class="col-md-4 col-lg-2 col-12">
                <?php wp_nav_menu(array(
                    'menu'            => 'Footer Left Menu',
                    'container'       => 'ul',
                    'menu_class' => 'sf-links',
                )); ?>
            </div>
            <div class="col-md-4 col-lg-2 col-12">
                <?php wp_nav_menu(array(
                    'menu'            => 'Quick Links',
                    'container'       => 'ul',
                    'menu_class' => 'sf-links',
                )); ?>
            </div>

            <div class="col-md-4 col-lg-2 col-12">
                <?php wp_nav_menu(array(
                    'menu'            => 'Footer Right Menu',
                    'container'       => 'ul',
                    'menu_class' => 'sf-links',
                )); ?>
            </div>
            <div class="col-md-4 col-lg-3 col-12">
                <div class="sf-contact-info">
                    <?php if(get_field('global_address','option')):?>
                        <span class="sf-address"><?php echo get_field('global_address','option');?></span>
                    <?php endif;?>
                </div>
                <div class="thomas-badge text-center d-none d-md-inline-block">
                    <!-- Thomas Supplier Badge -->
<a href="https://www.thomasnet.com/company/thomes-north-america-30687501/profile?src=tnbadge" target="_blank" class="tn-badge__link">
<img 
src="https://img.thomascdn.com/badges/shield-tier-v-md.png?cid=30687501"
srcset="https://img.thomascdn.com/badges/shield-tier-v-md-2x.png?cid=30687501 2x" 
alt="Thomas Supplier" title="Thomas Supplier" 
class="tn-badge__img" width="100" />
</a>
<!-- End Thomas Supplier Badge -->
                </div>
            </div>
            <div class="col-md-4 col-lg-auto ml-auto col-12">
                <ul class="sf-contact-info">
                    <?php $string = get_field('global_phone_number','option');$string = preg_replace("/[^0-9]/", '', $string);?>
                    <?php if ($string): ?>
                        <li class="sf-ph"><strong>Tel:</strong> <a href="tel:<?php echo $string;?>"><?php echo get_field('global_phone_number','option');?></a></li>
                    <?php endif ?>                 

                    <?php if (get_field('global_fax','option')): ?>
                        <li class="sf-fax"><strong>Fax:</strong> <a href="javascript:void(0)" class="nonlink fax" tabindex="-1"><?php echo get_field('global_fax','option');?></a></li>
                    <?php endif;?>

                    <?php if(get_field('global_email','option')):?>
                        <li><strong>Em:</strong> <a href="mailto:<?php echo get_field('global_email','option');?>" class="sf-mail"><?php echo get_field('global_email','option');?></a></li>
                    <?php endif;?>

                        <?php if(get_field('global_sales_email','option')):?>
                        <li>Em: <a href="mailto:<?php echo get_field('global_sales_email','option');?>" class="sf-mail"><?php echo get_field('global_sales_email','option');?></a></li>
                    <?php endif;?>
                </ul>
                
            </div>
            <div class="col-12 thomas-badge text-center d-md-none">
                    <!-- Thomas Supplier Badge -->
<a href="https://www.thomasnet.com/company/thomes-north-america-30687501/profile?src=tnbadge" target="_blank" class="tn-badge__link">
<img 
src="https://img.thomascdn.com/badges/shield-tier-v-md.png?cid=30687501"
srcset="https://img.thomascdn.com/badges/shield-tier-v-md-2x.png?cid=30687501 2x" 
alt="Thomas Supplier" title="Thomas Supplier"  
class="tn-badge__img" width="100" />
</a>
<!-- End Thomas Supplier Badge -->
                </div>
        </div>
    </div>

    <div class="footer-bootom sf-small">
        <div class="container">
            <p class="copyright">&copy; <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>, All Rights Reserved&nbsp; | &nbsp;Site created by <a href="https://business.thomasnet.com/marketing-services" target="_blank" rel="noreferrer noopener">Thomas Marketing Services</a></p>

            <div class="social-icons">
                <?php
                if( have_rows('social_profiles', 'option') ): ?>
                    <?php
                    while ( have_rows('social_profiles', 'option') ) : the_row(); ?>
                        <?php
                        $sf_social_icon = get_sub_field('sp_social_icon');
                        $socialclass = str_replace(' ', '-', get_sub_field('sp_social_profile')); // Replaces all spaces with hyphens.
                        $socialclass = preg_replace('/[^A-Za-z0-9\-]/', '', $socialclass); // Removes special chars.
                        $socialclass = strtolower($socialclass); // Convert to lowercase
                        if (get_sub_field('sp_social_link')) :
                        ?>
                            <a class="<?php echo $socialclass; ?>" href="<?php echo esc_url(get_sub_field('sp_social_link')); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php echo get_sub_field('sp_social_profile'); ?>" title="<?php echo get_sub_field('sp_social_profile'); ?>">
                        <?php endif ?>
                                <?php if ($sf_social_icon): ?>
                                    <?php echo $sf_social_icon; ?>
                                <?php endif ?>
                        <?php if (get_sub_field('sp_social_link')) : ?>
                            </a>
                        <?php endif ?>
                    <?php
                    endwhile; ?>
                <?php
                endif;  ?>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->