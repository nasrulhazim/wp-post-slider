<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://nasrulhazim.com
 * @since      1.0.0
 *
 * @package    Content_Slider
 * @subpackage Content_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Slider
 * @subpackage Content_Slider/public
 * @author     Nasrul Hazim <nasrulhazim.m@gmail.com>
 */
class Content_Slider_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/content-slider-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'light-slider-css', plugin_dir_url( __FILE__ ) . 'css/lightslider.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'light-slider-js', plugin_dir_url( __FILE__ ) . 'js/lightslider.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/content-slider-public.js', array( 'jquery' ), $this->version, false );

	}

	public function view( $atts ) {
		ob_start();
		$a = shortcode_atts( array(
			'category_name' => false,
			'numberposts' => 5
		), $atts );

		if($a['category_name'] != false) {
			$posts = wp_get_recent_posts( [ 'numberposts' => $a['numberposts'],'category_name' => $a['category_name'] ], OBJECT );
		} else {
			$posts = wp_get_recent_posts( [ 'numberposts' => $a['numberposts'] ], OBJECT );
		}

		include 'partials/content-slider-public-display.php';
		return ob_get_clean();
	}

}
