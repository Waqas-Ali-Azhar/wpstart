<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}


function wporg_custom_post_type() {
	register_post_type('series',
		array(
			'labels'      => array(
				'name'          => __('Series', 'textdomain'),
				'singular_name' => __('Series', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail'
				),
				'taxonomies' => array(
					'category',
					'post_tag'
				)
		)
	);
}
//add_action('init', 'wporg_custom_post_type');


function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyBqZba8OgHRO25gCiDd15ebwIe2aE9ezCA';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
