<?php

// Disable direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('acf/init', 'SGCA_API_post_query_block');
function SGCA_API_post_query_block() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'sgca-api-post-query',
            'title'             => __('SGCA Posts by REST API'),
            'description'       => __('Display posts from another WP website using REST API'),
            'render_template'   => plugin_dir_path( __DIR__ ) . '/template-parts/blocks/post/post-query-block.php',
            'category'          => 'formatting',
            //'icon'              => 'admin-comments',
            'keywords'          => array( 'post', 'post', 'api' ),
            // 'render_callback'	=> 'gb_post_query_block_render_callback',
			//'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/css/gb-post-query.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/js/gb-post-query.js',
			// 'enqueue_assets' 	=> 'gb_post_query_block_enqueue_assets',
        ));
    }
}