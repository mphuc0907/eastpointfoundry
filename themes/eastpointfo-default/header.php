<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<?php if (get_field('ga_on_off', 'options') == true): ?>
		<?php if (get_field('ga_gtm_code', 'options')): ?>
			<!-- Google Tag Manager -->
			<script>
				(function(w, d, s, l, i) {
					w[l] = w[l] || [];
					w[l].push({
						'gtm.start': new Date().getTime(),
						event: 'gtm.js'
					});
					var f = d.getElementsByTagName(s)[0],
						j = d.createElement(s),
						dl = l != 'dataLayer' ? '&l=' + l : '';
					j.async = true;
					j.src =
						'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
					f.parentNode.insertBefore(j, f);
				})(window, document, 'script', 'dataLayer', '<?php echo get_field('ga_gtm_code', 'options'); ?>');
			</script>
			<!-- End Google Tag Manager -->
		<?php endif; ?>
	<?php endif; ?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Stack+Sans+Text:wght@200..700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
	<link rel="preload" as="image" href="https://thomesnorthamerica.com/wp-content/uploads/Hero-2-1.webp">
	<link rel="preload" as="image" href="https://thomesnorthamerica.com/wp-content/uploads/Melamine-Birch-Kitchen-Cabinets-min.webp">
	<link rel="preload" as="image" href="https://thomesnorthamerica.com/wp-content/uploads/hero-bg-img-1.webp">


	<?php wp_head(); ?>

	<?php $blog_id = get_option('page_for_posts'); ?>
	<?php if (get_field('before_the_head', 'options')): ?>
		<?php echo get_field('before_the_head', 'options'); ?>
	<?php endif; ?>
	<?php if (is_home() && get_field('before_the_head', $blog_id)): ?>
		<?php echo get_field('before_the_head', $blog_id); ?>
	<?php endif ?>
	<?php if (get_field('before_the_head')): ?>
		<?php echo get_field('before_the_head'); ?>
	<?php endif ?>
</head>

<body <?php body_class(); ?>>
	<?php if (get_field('ga_on_off', 'options') == true): ?>
		<?php if (get_field('ga_gtm_code', 'options')): ?>
			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_field('ga_gtm_code', 'options'); ?>"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
		<?php endif; ?>
	<?php endif; ?>
	<?php if (get_field('after_the_body', 'options')): ?>
		<?php echo get_field('after_the_body', 'options'); ?>
	<?php endif; ?>
	<?php if (is_home() && get_field('after_the_body', $blog_id)): ?>
		<?php echo get_field('after_the_body', $blog_id); ?>
	<?php endif ?>
	<?php if (get_field('after_the_body')): ?>
		<?php echo get_field('after_the_body'); ?>
	<?php endif; ?>

	<?php do_action('wp_body_open'); ?>
	<?php get_template_part('parts/shared/search-module'); ?>
	<div class="site" id="page">
		<a href="#" id="skipToContent" class="btn btn-secondary">Skip To Content</a>
		<!-- Header Style Variable -->
		<?php $global_header_styles = get_field('global_header_styles', 'option');
		?>

		<?php if (is_page_template('homepage-new.php')) : ?>
			<?php get_template_part('parts/shared/header-new'); ?>
		<?php elseif ($global_header_styles == "header_style1"): ?>
			<?php get_template_part('parts/shared/header-style1'); ?>

		<?php elseif ($global_header_styles == "header_style2") : ?>
			<?php get_template_part('parts/shared/header-style2'); ?>

		<?php elseif ($global_header_styles == "header_style3") : ?>
			<?php get_template_part('parts/shared/header-style3'); ?>

		<?php elseif ($global_header_styles == "header_style4") : ?>
			<?php get_template_part('parts/shared/header-style4'); ?>

		<?php elseif ($global_header_styles == "header_style5") : ?>
			<?php get_template_part('parts/shared/header-style5'); ?>
		<?php endif; ?>
		<?php if (is_front_page()) : ?>
			<!--Site intro container start-->
			<?php get_template_part('parts/site-intro'); ?>
			<!--Site intro container end-->	
		<?php elseif (is_page_template('homepage-new.php')) : ?>
			<?php get_template_part('parts/site-intro-new'); ?>
		<?php else : ?>
			<!--page intro start-->
			<?php get_template_part('parts/page-intro'); ?>
			<!--page intro end-->
		<?php endif; ?>