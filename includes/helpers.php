<?php
function app_have_anchor_data( $anchor_data ) {
	if ( empty( $anchor_data ) ) {
		return false;
	}

	if ( empty( $anchor_data['title'] ) || empty( $anchor_data['url'] ) ) {
		return false;
	}

	return true;
}

function app_the_anchor_target( $anchor_data ) {
	$target = empty( $anchor_data['target'] ) ? '_self' : '_blank';

	echo ' target="' . $target . '"';
}

function app_render_page_sections() {
	if ( ! $sections = get_field( 'sections' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_page_case_studies() {
	if ( ! $sections = get_field( 'case_studies' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'case_studies' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_page_about() {
	if ( ! $sections = get_field( 'about' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'about' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_page_services() {
	if ( ! $sections = get_field( 'services' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'services/listing' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_page_service_hire_developer() {
	if ( ! $sections = get_field( 'hire_developer' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'services/detail/hire-developer/laravel' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_page_service_shopware_development() {
	if ( ! $sections = get_field( 'service_shopware' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'services/detail/shopware-development' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}
function app_render_page_service_shopware_migration() {
	if ( ! $sections = get_field( 'shopware_migration' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'services/detail/shopware-migration' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_page_single_blog() {
	if ( ! $sections = get_field( 'single_blog' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'single_blog' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_resource_page_sections() {
	if ( ! $sections = get_field( 'resource_sections' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_news_press_page_sections() {
	if ( ! $sections = get_field( 'news_and_press_sections' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}
function app_render_thankyou_page_sections() {
	if ( ! $sections = get_field( 'thankyou_sections' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}
function app_render_event_page_sections() {
	if ( ! $sections = get_field( 'event_sections' ) ) {
		return;
	}

	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}
function app_get_video_provider( $video_url ) {
	 if ( strpos( $video_url, 'youtube' ) > 0 ) {
		  return 'youtube';
	 }

	 if ( strpos( $video_url, 'vimeo' ) > 0 ) {
		  return 'vimeo';
	 }

	 return false;
}

function app_filter_number( $number ) {
	return preg_replace( '~[^0-9]~', '', $number );
}

/*
 * @param string $direction: Can be either 'prev' or 'next'
 * @param multi $post_types: Can be a string or an array of strings
 */
function app_get_adjacent_post( $direction, $post_type, $in_same_cat = false, $taxonomy = '', $term_id = 'all' ) {
	global $post, $wpdb;

	if ( empty( $post ) ) {
		return NULL;
	}

	if ( ! $post_type ) {
		return NULL;
	}

	if ( ! is_array( $post_type ) ) {
	  	$post_type = array( $post_type );
	}

	$txt = '';
	for ( $i = 0; $i <= count( $post_type ) - 1; $i++ ) {

		$txt .= "'" . $post_type[$i] . "'";
		if ( $i != count( $post_type ) - 1 ) {
			$txt .= ', ';
		}
	}
	$post_type = $txt;

	$join                = '';
	$current_post_date   = $post->post_date;
	$adjacent            = $direction == 'prev' ? 'previous' : 'next';
	$op                  = $direction == 'prev' ? '<' : '>';
	$order               = $direction == 'prev' ? 'DESC' : 'ASC';

	$where_part = "WHERE p.post_date $op %s AND p.post_type IN({$post_type}) AND p.post_status = 'publish'";

	if ( $in_same_cat ) {
		$term_array = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
		$term_array = array_map( 'intval', $term_array );

		if ( $term_array && ! is_wp_error( $term_array ) ) {
			$join  = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

			if ( $term_id === 'all' ) {
				$where_part .= " AND tt.term_id IN (" . implode( ',', $term_array ) . ")";
			} else {
				$where_part .= " AND tt.term_id = {$term_id}";
			}
		}
	}

	$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare( $where_part, $current_post_date ), false, [] );
	$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

	$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";

	$query_key = 'adjacent_post_' . md5( $query );
	$result = wp_cache_get( $query_key, 'counts' );

	if ( $result !== false ) {
		return $result;
	}

	$result = $wpdb->get_row( "SELECT p.* FROM $wpdb->posts AS p $join $where $sort" );

	if ( is_null( $result ) ) {
		$where = preg_replace( '/\sp.post_date(.*?)AND/', '', $where);
		$where = preg_replace( '/\sp.menu_order(.*?)AND/', '', $where);

		$result = $wpdb->get_row( "SELECT p.* FROM $wpdb->posts AS p $join $where $sort" );
	}

	wp_cache_set( $query_key, $result, 'counts' );
	return $result;
}

function app_get_section_data_id_attr( $section ) {
	if ( ! $section['section_id'] ) {
		return '';
	}

	$section_id = sanitize_title_with_dashes( strtolower( $section['section_id'] ) );

	return 'data-id="' . $section_id . '"';
}

function app_get_related_posts( $post_id, $posts_num, $is_posts_num_required = false, $in_post_categories = false, $random_results = false ) {
	$related_args = array(
		'post_type'      => 'post',
		'posts_per_page' => $posts_num,
		'post__not_in'   => [ $post_id ],
	);

	$posts_cats_ids = wp_get_post_categories( $post_id );

	if ( $posts_cats_ids && $in_post_categories ) {
		$related_args['category__in'] = $posts_cats_ids;
	}

	if ( $random_results ) {
		$related_args['orderby'] = 'rand';
	}

	$related_posts     = get_posts( $related_args );
	$related_posts_num = count( $related_posts );

	if ( $is_posts_num_required && $related_posts_num < $posts_num ) {
		$other_related_args = array(
			'post_type'      => 'post',
			'posts_per_page' => $posts_num - $related_posts_num,
			'post__not_in'   => array_merge( [ $post_id ], array_column( $related_posts, 'ID' ) ),
		);

		if ( $random_results ) {
			$other_related_args['orderby'] = 'rand';
		}

		$other_related_posts = get_posts( $other_related_args );
		$related_posts       = array_merge( $related_posts, $other_related_posts );
	}

	if ( $random_results && $related_posts ) {
		shuffle( $related_posts );
	}

	return $related_posts;
}


function app_render_service_page_sections() {
	
	if ( ! $sections = get_field( 'services_sections' ) ) {
		return;
	}
	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}


function app_render_about_page_sections() {
	
	if ( ! $sections = get_field( 'about_sections' ) ) {
		return;
	}
	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_method_page_sections() {
	
	if ( ! $sections = get_field( 'method_sections' ) ) {
		return;
	}
	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'sections' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}

function app_render_belief_foundation_page_sections() {
	
	if ( ! $sections = get_field( 'belief_foundation_sections' ) ) {
		return;
	}
	foreach ( $sections as $section_index => $section ) {
		$section_slug = str_replace( '_', '-', $section['acf_fc_layout'] );

		app_render_fragment( 'belief-foundation' . DIRECTORY_SEPARATOR . $section_slug, compact( 'section_index', 'section_slug', 'section' ) );
	}
}