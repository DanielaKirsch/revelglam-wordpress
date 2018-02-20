<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    revelglam
 * @subpackage revelglam/public
 * @author     @bigflannel
 */
class revelglam_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $revelglam    The ID of this plugin.
	 */
	private $revelglam;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1
	 * @param      string    $revelglam       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $revelglam, $version ) {

		$this->revelglam = $revelglam;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in revelglam_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The revelglam_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->revelglam, plugin_dir_url( __FILE__ ) . 'css/revelglam-public.min.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'icons', plugin_dir_url( __FILE__ ) . 'css/revelglam.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in revelglam_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The revelglam_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script( 'hammer', plugin_dir_url( __FILE__ ) . 'js/hammer.min.js' );
		
		wp_enqueue_script( 'hammer', '', array( 'revelglam-public' ), $this->version, true );
		
		wp_enqueue_script( $this->revelglam, plugin_dir_url( __FILE__ ) . 'js/revelglam-public.min.js', array( 'jquery' ), $this->version, true );
		
	}
	
	/**
	 * Add shortcodes
	 *
	 * @since    0.1
	 */
	public function register_shortcodes() {
	}
	
	/**
	 * Render Revel Glam
	 *
	 * @since    0.1
	 */
	public static function revelglam_Public_Shortcode( $attr ) {
	}

}
