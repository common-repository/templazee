<?php
/**
 * Plugin Name: Templazee
 * Description: Templazee is a collection of Gutenberg Blocks that is compatible with WordPress Full Site Editing to help you create the website you always wanted. Templazee is a free WordPress plugin which allows you to add different block effortlessly in your site. With a collection of page building WordPress blocks for the new WordPress block editor you can build your site very quickly.
 * Author: Templazee
 * Author URI: 
 * Plugin URI:
 * Version: 1.0.0
 * Text Domain: templazee
 * Domain Path: /languages
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Tested up to: 6.5
 * Requires at least: 6.5
 * Requires PHP: 7.0
 *
 *
 * @package Templazee
 */

 // Exit if accessed Directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! class_exists( 'Templazee' )):

	/**
	 * 
	 * Main templazee_block_Class
	 * 
	 * @since 1.0.0
	 */

	 class Templazee {


		protected static $instance = null;


		public static function instance(){
			if( is_null( self::$instance ) ){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * 
		 * Templazee - constructor
		 * 
		 * @since 1.0.0
		 */
		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'templazee_frontend_scripts' ) );

			add_filter( 'block_categories_all' , function( $categories ) {
				// Adding a new category.
				$categories[] = array(
					'slug'  => 'templazee',
					'title' => esc_html__( 'Templazee Blocks', 'templazee' )
				);	
				return $categories;
			} );


			add_action( 'init', array( $this, 'block_init' ) );

			$this->templazee_includes();
			$this->templazee_block_render_include();
			

		}


		public function templazee_frontend_scripts(){

			wp_enqueue_style( 'splide-css', plugin_dir_url( __FILE__ ) . 'assets/splide/css/splide.min.css', array(), '4.1.4', 'all' );

			wp_enqueue_script( 'splide-js', plugin_dir_url( __FILE__ ) . 'assets/splide/js/splide.min.js' , array( 'jquery' ), '4.1.4', true );

			wp_enqueue_script( 'templazee-custom-js', plugin_dir_url( __FILE__ ) . 'assets/js/custom.js' , array( 'jquery' ), '1.0.0', true );

		}

		public function block_init() {
			
			register_block_type( __DIR__ . '/build/breadcrumb', array(
				'render_callback' => 'templazee_block_breadcrumb_render'
			) );

			register_block_type( __DIR__ . '/build/slider' );
			register_block_type( __DIR__ . '/build/slides' );

			register_block_type( __DIR__ . '/build/star-icon' );

			register_block_type( __DIR__ . '/build/testimonial' );
			register_block_type( __DIR__ . '/build/testimonials' );

			register_block_type( __DIR__ . '/build/team' );
			register_block_type( __DIR__ . '/build/teams' );

			register_block_type( __DIR__ . '/build/tab' );
			register_block_type( __DIR__ . '/build/tabs' );

		}

		public function templazee_includes(){
			require plugin_dir_path( __FILE__ ) . '/inc/breadcrumb-class.php';
		}

		public function templazee_block_render_include(){
		
			//render block 		
			require plugin_dir_path( __FILE__ ) . '/inc/block-render/breadcrumb.php';	
		}

	

	}

endif;

/**
 * 
 * Main instance of Templazee Block Extend
 * 
 * @since 1.0.0
 */
function templazee(){
	return Templazee::instance();
}

templazee();