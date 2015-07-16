<?php

// Register Custom Post Type
function painting() {

	$labels = array(
		'name'                => 'Paintings',
		'singular_name'       => 'Painting',
		'menu_name'           => 'Painting',
		'name_admin_bar'      => 'Painting',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Paintings',
		'add_new_item'        => 'Add New Painting',
		'add_new'             => 'Add New',
		'new_item'            => 'New Painting',
		'edit_item'           => 'Edit Painting',
		'update_item'         => 'Update Painting',
		'view_item'           => 'View Painting',
		'search_items'        => 'Search Painting',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'painting',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'painting',
		'description'         => 'Painting Portfolio Item',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'painting_keywords', ' painting_locations' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-art',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'painting',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'painting', $args );

}

// Hook into the 'init' action
add_action( 'init', 'painting', 0 );

// Register Custom Taxonomy
function painting_keywords() {

	$labels = array(
		'name'                       => 'Painting Keywords',
		'singular_name'              => 'Painting Keyword',
		'menu_name'                  => 'Painting Keywords',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'keywords',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'painting_keywords', array( 'painting' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'painting_keywords', 0 );

function painting_locations() {

	$labels = array(
		'name'                       => 'Painting Locations',
		'singular_name'              => 'Painting Location',
		'menu_name'                  => 'Painting Locations',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
	);
	$rewrite = array(
		'slug'                       => 'locations',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'painting_locations', array( 'painting' ), $args );

}

	// Hook into the 'init' action
	add_action( 'init', 'painting_locations', 0 );

	add_filter( 'cmb_meta_boxes', 'cmb_painting_boxes' );
    

if(!function_exists(cmb_painting_boxes)){
function cmb_painting_boxes( array $meta_boxes ) {
	$prefix = '_tbn_';
	$meta_boxes['painting_details_metabox'] = array(
	
		'id'         => 'painting_details_metabox',
		'title'      => __( 'Painting Details', 'cmb' ),
		'pages'      => array( 'painting', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
			    'name' => 'Sizes',
			    'desc' => '',
			    'id' => $prefix . 'test_multicheckbox',
			    'type' => 'multicheck',
			    'options' => array(
			        '4x6' => '4x6',
			        '5x8' => '5x8',
			        '8x10' => '8x10',
			        '13x20' => '13x20',
				    )
			),
			array(
			    'name' => 'Type Available',
			    'desc' => '',
			    'id' => $prefix . 'type',
			    'type' => 'multicheck',
			    'options' => array(
			        'original' => 'Original',
			        'print' => 'Print'
			    )
			),
			array(
			    'name' => 'Number of Copies',
			    'desc' => '',
			    'default' => '',
			    'id' => $prefix . 'copies',
			    'type' => 'text_small'
			),
			array(
			    'id'          => $prefix . 'prices',
			    'type'        => 'group',
			    'description' => __( 'Prices for different options', 'cmb2' ),
			    'options'     => array(
			        'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			        'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			        'remove_button' => __( 'Remove Entry', 'cmb2' ),
			        'sortable'      => true, // beta
			    ),
				    // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
			    'fields'      => array(
			        array(
			            'name' => 'Price',
			            'id'   => 'price',
			            'type' => 'text',
			            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
			        ),
			        array(
			            'name' => 'Description',
			            'description' => 'Write a short description for this price point',
			            'id'   => 'description',
			            'type' => 'textarea_small',
			        ),       
				),
			),
	)
		);
			return $meta_boxes;
	}
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

//download CMB from here: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress and make sure the following function has the correct path.
 
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';
}
?>