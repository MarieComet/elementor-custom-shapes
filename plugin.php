<?php
namespace ElementorCustomShapes;
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 0.0.1
 */
class Plugin {
	/**
	 * Instance
	 *
	 * @since 0.0.1
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 0.0.1
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Get custom shapes
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function get_custom_shapes() {
		$shapes_cpt = new \WP_Query( [
			'post_type' => 'ele_custom_shapes',
			'posts_per_page' => 50, //safe
			'post_status' => 'publish',
		] );
		$additional_shapes = [];
		if ( $shapes_cpt->have_posts() ) {
			while ( $shapes_cpt->have_posts() ) {
			    $shapes_cpt->the_post();
			    global $post;
			    $shape_thumbnail_id = get_post_thumbnail_id( $post->ID );
			    if ( !empty( $shape_thumbnail_id ) ) {
			    	$shape_thumbnail_path = get_attached_file( $shape_thumbnail_id );
			    	$shape_thumbnail_url = wp_get_attachment_url( $shape_thumbnail_id );
			    	if ( $shape_thumbnail_path && $shape_thumbnail_url && $post->post_name && $post->post_title ) {
			    		$additional_shapes[ $post->post_name ] = [
			    			'title' => $post->post_title,
			    			'path' => $shape_thumbnail_path, // used in front
			    			'url' => $shape_thumbnail_url, // used in editor
			    			'has_flip' => true,
			    			'has_negative' => false
			    		];

			    	}
			    }
			}
			wp_reset_postdata();
		}
		return $additional_shapes;
	}

	/**
	 * Register custom Shapes
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function register_custom_shapes( $additional_shapes ) {
		$additional_shapes = $this->get_custom_shapes();
		return $additional_shapes;
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function __construct() {
		require_once( __DIR__ . '/includes/register-cpt.php' );
		if ( is_admin() ) {
			require_once( __DIR__ . '/includes/admin.php' );
		}		
		add_action( 'elementor/shapes/additional_shapes', [ $this, 'register_custom_shapes' ] );
	}
}
// Instantiate Plugin Class
Plugin::instance();