<?php
/**
 * Enable upload of svg files.
 *
 * @param  array $mimes Array of accepted file mimes.
 * @return array
 */
add_filter( 'upload_mimes', 'app_filter_add_svg_support' );
function app_filter_add_svg_support( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'app_check_filetype', 10, 4 );
function app_check_filetype( $data, $file, $filename, $mimes ) {
	$filetype = wp_check_filetype( $filename, $mimes );

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}

/**
 * Fix svg preview in media
 */
// add_filter( 'wp_prepare_attachment_for_js', 'app_fix_svg_preview_in_admin', 10, 3 );
function app_fix_svg_preview_in_admin($response, $attachment, $meta){
	if( $response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists( 'SimpleXMLElement' ) ) {
		try {
			$path = get_attached_file( $attachment->ID );
			if( @file_exists( $path ) ) {
				$svg = new SimpleXMLElement(@file_get_contents($path));
				$src = $response['url'];
				$width = (int) $svg['width'];
				$height = (int) $svg['height'];

				//media gallery
				$response['image'] = compact( 'src', 'width', 'height' );
				$response['thumb'] = compact( 'src', 'width', 'height' );

				//media single
				$response['sizes']['full'] = array(
					'height'        => $height,
					'width'         => $width,
					'url'           => $src,
					'orientation'   => $height > $width ? 'portrait' : 'landscape',
				);
			}
		}
		catch( Exception $e ){}
	}

	return $response;
}

/**
 * Fix svg insert in editor
 */
// add_filter( 'image_send_to_editor', 'app_before_insert_image', 10, 8 );
// function app_before_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
// 	if ( strpos($html, '.svg') !== false ) {
// 		$url  = wp_get_attachment_url( $id );
// 		$html = '<img src="' . $url . '" alt="' . $alt . '" width="312" class="align' . $align . ' size-full wp-image-' . $id . '"  />';
// 	}

// 	return $html;
// }

/**
 * Prevent svg images from crop
 */
add_filter( 'wp_get_attachment_image_src', function( $image, $id, $size ){
	if ( get_post_mime_type( $id ) === 'image/svg+xml' ) {
		return array( wp_get_attachment_url( $id ), 0, 0 );
	}

	return $image;
}, 3, 10 );

/**
 * Hide the WYSIWYG editor on templates.
 */
add_action( 'admin_init', 'app_hide_wysiwyg_editor' );
function app_hide_wysiwyg_editor() {
	if ( ! isset( $_GET['post'] ) ) {
		return;
	}

	$templates_with_hidden_wysiwyg_editor = array(
		'templates/page-builder.php',
	);

	$page_template = get_post_meta( $_GET['post'], '_wp_page_template', true );

	if ( in_array( $page_template, $templates_with_hidden_wysiwyg_editor ) ) {
		remove_post_type_support( 'page', 'editor' );
	}
}

// Add Featured Images help texts
add_filter( 'admin_post_thumbnail_html', 'app_add_featured_images_help_texts');
function app_add_featured_images_help_texts( $html ) {
	if( get_post_type() === 'post' ) {
		$html .= '<p>' . __( 'The recommended image size is 1200px x 628px.', 'app' ) . '</p>';
	}
	return $html;
}

// Display custom scripts in header
add_action( 'wp_head', 'app_display_custom_header_scripts', 99 );
function app_display_custom_header_scripts() {
	if ( $scripts = get_field( 'header_scripts', 'option' ) ) {
		echo $scripts;
	}
}

// Display custom scripts in footer
// add_action( 'wp_footer', 'app_display_custom_footer_scripts', 99 );
function app_display_custom_footer_scripts() {
	if ( $scripts = get_field( 'footer_scripts', 'option' ) ) {
		echo $scripts;
	}
}

add_filter( 'esc_html', 'app_replace_tm_symbol', 1, 2 );
function app_replace_tm_symbol( $safe_text, $text ) {
    return str_replace( '™', '<span class="tm">TM</span>', $safe_text );
}