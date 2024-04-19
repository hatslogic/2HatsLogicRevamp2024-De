<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode( 'year', 'app_shortcode_year' );
function app_shortcode_year() {
	return current_time( 'Y' );
}

/**
 * Example Shortcode
 */
/*add_shortcode( 'example', 'app_shortcode_example' );
function app_shortcode_example( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'example_attribute' => 'example_value',
		),
		$atts, 'example'
	);

	ob_start();
	?>
	<div class="shortcode-">
		<!-- -->
	</div>
	<?php
	$html = ob_get_clean();

	return $html;
}*/
