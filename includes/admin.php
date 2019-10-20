<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Register admin fuctions
* @since 0.0.1
*/

if ( is_admin() ) {
	add_action( 'admin_menu', 'ecs_register_admin_menu', 60 );
	add_filter( 'wp_handle_upload_prefilter', 'ecs_handle_upload_prefilter' );
	add_filter( 'wp_handle_upload', 'ecs_handle_upload' );
    add_action( 'edit_form_after_title', 'ecs_edit_form_after_title', 20, 1 );
}

/**
 * Add CPT link to admin menu
 * @since 0.0.1
 */
function ecs_register_admin_menu() {
	$menu_title = _x( 'Custom Shapes', 'Elementor Custom Shapes', 'elementor-custom-shapes' );
	add_submenu_page(
		'elementor',
		$menu_title,
		$menu_title,
		'manage_options',
		'edit.php?post_type=ele_custom_shapes'
	);
}

/**
 * Customize upload folder
 * @since 0.0.1
 * inspired by https://stackoverflow.com/a/13391519
 */
function ecs_handle_upload_prefilter( $file ) {
    add_filter( 'upload_dir', 'ecs_custom_upload_dir' );
    return $file;
}

function ecs_handle_upload( $fileinfo )
{
    remove_filter( 'upload_dir', 'ecs_custom_upload_dir' );
    return $fileinfo;
}

function ecs_custom_upload_dir( $param ) {   
    // Check if uploading from inside a post/page/cpt - if not, default Upload folder is used
    $use_default_dir = ( isset($_REQUEST['post_id'] ) && $_REQUEST['post_id'] == 0 ) ? true : false; 
    if( !empty( $param['error'] ) || $use_default_dir )
        return $param; 

    // Check if correct post type
    if( 'ele_custom_shapes' != get_post_type( $_REQUEST['post_id'] ) ) 
        return $param; 

    $customdir = '/ele-custom-shapes';

    $param['path']    = $param['basedir'] . $customdir; 
    $param['url']     = $param['baseurl'] . $customdir; 

    return $param;
}

/**
 * Add message after posts title
 * @since 0.0.1
 */
function ecs_edit_form_after_title( $post ) {
    if ( 'ele_custom_shapes' !== $post->post_type ) {
        return;
    }
    echo '<div class="wrap postbox"><p class="inside">' . sprintf( '%s: <a href="%s">%s</a>', __( 'Custom Shape', 'elementor-custom-shapes' ), esc_url( 'https://github.com/MarieComet/elementor-custom-shapes#installation-instructions' ), __( 'Read instructions', 'elementor-custom-shapes' ) ) . '</p></div>';
}