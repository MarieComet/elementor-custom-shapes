<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Register Custom Shape CPT
* @since 0.0.1
*/

function ecs_register_cpt() {

	$labels = array(
		'name'                  => _x( 'Custom shapes', 'Post Type General Name', 'elementor-custom-shapes' ),
		'singular_name'         => _x( 'Custom shape', 'Post Type Singular Name', 'elementor-custom-shapes' ),
		'menu_name'             => __( 'Custom shapes', 'elementor-custom-shapes' ),
		'name_admin_bar'        => __( 'Custom shape', 'elementor-custom-shapes' ),
		'archives'              => __( 'Item Archives', 'elementor-custom-shapes' ),
		'attributes'            => __( 'Item Attributes', 'elementor-custom-shapes' ),
		'parent_item_colon'     => __( 'Parent Item:', 'elementor-custom-shapes' ),
		'all_items'             => __( 'All Items', 'elementor-custom-shapes' ),
		'add_new_item'          => __( 'Add New Item', 'elementor-custom-shapes' ),
		'add_new'               => __( 'Add New', 'elementor-custom-shapes' ),
		'new_item'              => __( 'New Item', 'elementor-custom-shapes' ),
		'edit_item'             => __( 'Edit Item', 'elementor-custom-shapes' ),
		'update_item'           => __( 'Update Item', 'elementor-custom-shapes' ),
		'view_item'             => __( 'View Item', 'elementor-custom-shapes' ),
		'view_items'            => __( 'View Items', 'elementor-custom-shapes' ),
		'search_items'          => __( 'Search Item', 'elementor-custom-shapes' ),
		'not_found'             => __( 'Not found', 'elementor-custom-shapes' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'elementor-custom-shapes' ),
		'featured_image'        => __( 'Featured Image', 'elementor-custom-shapes' ),
		'set_featured_image'    => __( 'Set featured image', 'elementor-custom-shapes' ),
		'remove_featured_image' => __( 'Remove featured image', 'elementor-custom-shapes' ),
		'use_featured_image'    => __( 'Use as featured image', 'elementor-custom-shapes' ),
		'insert_into_item'      => __( 'Insert into item', 'elementor-custom-shapes' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'elementor-custom-shapes' ),
		'items_list'            => __( 'Items list', 'elementor-custom-shapes' ),
		'items_list_navigation' => __( 'Items list navigation', 'elementor-custom-shapes' ),
		'filter_items_list'     => __( 'Filter items list', 'elementor-custom-shapes' ),
	);
	$args = array(
		'label'                 => __( 'Custom shape', 'elementor-custom-shapes' ),
		'description'           => __( 'Custom shapes', 'elementor-custom-shapes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => false,
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'ele_custom_shapes', $args );

}
add_action( 'init', 'ecs_register_cpt', 0 );