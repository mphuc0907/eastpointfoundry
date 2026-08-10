<?php
/**
 * Contact Form Sidebar.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>
<div class="col-md-4">
	<?php if( get_field('cfs_form')): ?>
	<div class="cfs-form"><?php echo get_field('cfs_form'); ?></div>
	<?php endif; ?>
</div>

