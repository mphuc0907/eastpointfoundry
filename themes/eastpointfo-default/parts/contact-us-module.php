<div class="col-md-4 col-lg-4 widget-area" id="form-sidebar" role="complementary">
	<div class="form-wrap">
		<div class="lm-form">

				<?php
$shortcode = get_field('lp_form');
if ($shortcode) {
    echo do_shortcode($shortcode);
}
?>


			</div>
	</div>
</div>