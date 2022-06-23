<?php

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page('Global Options');

	acf_add_options_page(array(
		'page_title' 	=> 'Team',
		'icon_url'		=> 'dashicons-admin-users',
		'position'		=> 40
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Board Members',
		'icon_url'		=> 'dashicons-businessperson',
		'position'		=> 45
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Advisors',
		'icon_url'		=> 'dashicons-businessman',
		'position'		=> 50
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Clients',
		'icon_url'		=> 'dashicons-groups',
		'position'		=> 35
	));

    acf_add_options_page(array(
        'page_title'    => 'Portfolio',
        'icon_url'      => 'dashicons-networking',
        'position'      => 55
    ));
	
}

// Create custom Gutenberg block category for ACF Blocks
function opennorth_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'opennorth',
				'title' => __( 'OpenNorth', 'opennorth' ),
			),
		)
	);
}
add_filter( 'block_categories', 'opennorth_block_category', 1, 2);


// ACF Blocks

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'roulette',
            'title'             => __('Roulette'),
            'description'       => __('A custom block to display a spinning roulette of words.'),
            'render_template'   => 'block-templates/block-roulette.php',
            'category'          => 'opennorth',
            'icon'              => 'image-flip-vertical',
            'mode'				=> 'edit',
            'keywords'          => array( 'roulette', 'spinner', 'wheel' ),
        ));

        acf_register_block_type(array(
            'name'              => 'members',
            'title'             => __('Members'),
            'description'       => __('A custom block to display Open North members.'),
            'render_template'   => 'block-templates/block-members.php',
            'category'          => 'opennorth',
            'icon'              => 'admin-users',
            'mode'				=> 'edit',
            'keywords'          => array( 'people', 'members', 'board', 'team', 'advisors' ),
        ));

        acf_register_block_type(array(
            'name'              => 'clients',
            'title'             => __('Clients Carousel'),
            'description'       => __('A custom block to display Open North clients carousel.'),
            'render_template'   => 'block-templates/block-clients.php',
            'category'          => 'opennorth',
            'icon'              => 'groups',
            'mode'				=> 'edit',
            'keywords'          => array( 'clients', 'carousel' ),
        ));

        acf_register_block_type(array(
            'name'              => 'steps',
            'title'             => __('Steps'),
            'description'       => __('A custom block to display a timeline.'),
            'render_template'   => 'block-templates/block-steps.php',
            'category'          => 'opennorth',
            'icon'              => 'editor-ol',
            'mode'              => 'edit',
            'keywords'          => array( 'timeline', 'steps' ),
        ));

        acf_register_block_type(array(
            'name'              => 'jobs',
            'title'             => __('Jobs Feed'),
            'description'       => __('A custom block to display available jobs.'),
            'render_template'   => 'block-templates/block-jobs.php',
            'category'          => 'opennorth',
            'icon'              => 'megaphone',
            'mode'              => 'edit',
            'keywords'          => array( 'jobs', 'careers' ),
        ));

        acf_register_block_type(array(
            'name'              => 'courses',
            'title'             => __('Courses'),
            'description'       => __('A custom block to display courses blocks.'),
            'render_template'   => 'block-templates/block-courses.php',
            'category'          => 'opennorth',
            'icon'              => 'awards',
            'mode'              => 'edit',
            'keywords'          => array( 'courses' ),
        ));

        acf_register_block_type(array(
            'name'              => 'publications',
            'title'             => __('Publications'),
            'description'       => __('A custom block to display publications.'),
            'render_template'   => 'block-templates/block-publications.php',
            'category'          => 'opennorth',
            'icon'              => 'media-text',
            'mode'              => 'edit',
            'keywords'          => array( 'publications' ),
        ));
    }
}