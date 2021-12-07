<?php

/**
 * Post Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'SGCA-API-post-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'SGCA-API-post-container';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

//Get Block Value
$api = get_field('sgca_rest_api') ?: 'Enter WP REST API Endpoint...';
$api .= '?per_page=';
$api .= get_field('sgca_post_per_page') ?: 6;


$response = wp_remote_get( $api );

// Exit if error.
if ( is_wp_error( $response ) ) {
	return;
}

// Get the body.
$posts = json_decode( wp_remote_retrieve_body( $response ) );

// Exit if nothing is returned.
if ( empty( $posts ) ) {
	return;
}

//Link Style
echo '<link rel="stylesheet" type="text/css" href="'.plugin_dir_url( __FILE__ ).'style.css">';
echo '<div id="'.esc_attr($id).'" class="'.esc_attr($className).'">';
// If there are posts.
if ( ! empty( $posts ) ) {

	// For each post.
	foreach ( $posts as $post ) {

		// Use print_r($post); to get the details of the post and all available fields
		// Format the date.
		$fordate = date( 'n/j/Y', strtotime( $post->modified ) );

		// Show a linked title and post date.
		include(plugin_dir_path( __FILE__ ) . 'post-card.php');
	}
}
echo '</div>';


/*
//Render Post
echo $api;*/
