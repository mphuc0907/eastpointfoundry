<!-- #GDD 004 Header nav -->
<header class="site-header header2  gdd-004-b" role="banner" >
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<div class="top-line navbar navbar-expand-lg">
			<div class="container">
				<?php
			          $email_address = get_field('global_email', 'option');
			          if ($email_address): ?>
			            <span class="sh-email"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us"><span class="material-icons notranslate" translate="no">mail_outline</span> <span><?php echo get_field('global_email', 'option'); ?></span></a><br>


		<?php
			          $email_address = get_field('global_sales_email', 'option');
			          if ($email_address): ?>
			            <a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us"><span class="material-icons notranslate" translate="no">mail_outline</span> <span>
			            	<?php echo get_field('global_sales_email', 'option'); ?></span></a>
			          <?php endif ?>
			          <span class="sh-search"><a href="#search" class="search-form-tigger"  data-toggle="search-form"><span class="material-icons notranslate" translate="no">search</span></a></span>
			        </span>
			          <?php endif ?>	
			</div>

			<div class="mob-header-phone"><a href="tel:19056239888"><span class="material-icons">call</span><span class="mob-num">+1 905 623-9888</span></a></div>
		</div>

		<div class="header-inner sh-sticky-wrap">
			<nav class="navbar navbar-expand-lg navbar-dark" width="auto" height="73">

			<div class="container">

				<!-- Your site title as branding in the menu -->
				<?php $logo = get_field('global_company_logo','option'); ?>
				<?php if ( !$logo && ! has_custom_logo() ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

					<?php endif; ?>


				<?php } else {
					if( !empty($logo) ): ?>
	                    <a href="<?php bloginfo('url'); ?>" class="site-logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>" width="78" height="70"></a>
	                <?php else: 
	                	the_custom_logo();
	                 endif;
				} ?><!-- end custom logo -->				

				<!-- The WordPress Menu goes here -->
				<a href="javascript:void(0)" class="site-nav-container-screen" id="navbarNavDropdown1"><span>Overlay</span></a>
				<div class="site-nav-container" id="navbarNavDropdown" class="collapse navbar-collapse">
					<div class="snc-header">
						<button class="navbar-toggler navbar-close-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Close', 'understrap' ); ?>">
							<span class="material-icons">highlight_off</span>
						</button>
					</div>
					<?php wp_nav_menu(
						array(
							'menu'            => 'Primary Nav Gdd 004',
							'theme_location'  => 'primary',
							'container_class' => 'main-menu',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 3,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
				<?php //wp_nav_menu(
					// array(
					// 	'theme_location'  => 'primary',
					// 	'container_class' => 'collapse navbar-collapse',
					// 	'container_id'    => 'navbarNavDropdown',
					// 	'menu_class'      => 'navbar-nav ml-auto main-menu',
					// 	'fallback_cb'     => '',
					// 	'menu_id'         => 'main-menu',
					// 	'depth'           => 2,
					// 	'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					// )
				//); ?>

				<div class="utility-nav navbar-right">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<img class="hamburger-css" src="/wp-content/uploads/menu.png" width="31" height="16" alt="Menus" title="Menus">	
					<span class="">Menu</span>
					</button>	
					<div class="mobile-logo-sec">
						<!-- Your site title as branding in the menu -->
						<?php $logo = get_field('global_company_logo','option'); ?>
							<?php if ( !$logo && ! has_custom_logo() ) { ?>

								<?php if ( is_front_page() && is_home() ) : ?>

									<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

								<?php else : ?>

									<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

								<?php endif; ?>


							<?php } else {
								if( !empty($logo) ): ?>
				                    <a href="<?php bloginfo('url'); ?>" class="site-logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>" width="57" height="51"></a>
				                <?php else: 
				                	the_custom_logo();
				                 endif;
							} ?><!-- end custom logo -->	
					</div>	

					<?php
			          $tel_number = get_field('global_phone_number','option');
			          $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			          <?php if ($tel_number): ?>
			              <span class="sh-ph"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>"><span class="material-icons notranslate" translate="no">call

			              </span> <span><?php echo $tel_number;?></span></a></span>
			          <?php endif ?>			          

				       	
				        
			          <?php 
						$link = get_field('request_quote_link', 'option');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a class="button btn btn-secondary d-none d-md-inline-block m-0 ml-5 contact-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						    <a class="button btn btn-secondary d-md-none px-4 m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
				</div>
				
			</div><!-- .container -->

		</nav><!-- .site-navigation -->
		</div>

	</div><!-- #wrapper-navbar end -->
</header>

<script type="text/javascript">
</script>






<script type="text/javascript">
</script>