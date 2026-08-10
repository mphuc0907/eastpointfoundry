<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<h1 class="page-title entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

    	<h4><?php echo get_post_time('F j, Y'); ?></h4>

	</header><!-- .entry-header -->

	<div class="fe-thumb-image"><?php echo get_the_post_thumbnail( $post->ID, 'large' array( 'title' => get_the_title( $post->ID )) ); ?></div>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer> --><!-- .entry-footer -->

</article><!-- #post-## -->
