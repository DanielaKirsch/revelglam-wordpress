<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    revelglam
 * @subpackage revelglam/admin
 * @author     @bigflannel
 */
class revelglam_Admin {

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
	 * @param      string    $revelglam       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $revelglam, $version ) {
		$this->revelglam = $revelglam;
		$this->version = $version;	
	}


	/**
	 * Init all the needed JavaScript-Libraries and Styles
	 *
	 * @since    0.11
	 */
	public function enqueue_media() {
		$screen = get_current_screen();		
		if ( $screen->post_type == 'post' && $screen->id == 'post' ) {
			wp_enqueue_media();
		}
	}

	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {
		$current_timestamp = time();

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
		$screen = get_current_screen();		
		if ( $screen->post_type == 'post' && $screen->id == 'post' ) { 
			wp_enqueue_style( $this->revelglam, plugin_dir_url( __FILE__ ) . 'css/revelglam-admin.css', array(), $current_timestamp, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1
	 */
	public function enqueue_scripts() {
		$current_timestamp = time();
		
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
		$screen = get_current_screen();		
		if ( $screen->post_type == 'post' && $screen->id == 'post' ) {
			wp_enqueue_script( $this->revelglam, plugin_dir_url( __FILE__ ) . 'js/revelglam-admin.js', array( 'jquery' ), $current_timestamp, false );
		}
	}
	
	/**
	 * Function to add options to admin menu
	 *
	 * @since    0.26
	 */
	public function revelglam_Register_Settings() {	
	}
	
	/**
	 * Check for plugin updates
	 *
	 * @since     0.15
	 *
	 */
	 
	public function revelglam_Updater() {
	}

	/**
	 * Function to add options to admin menu
	 *
	 * @since    0.14
	 */
	public function revelglam_Admin_Menu() {
		add_options_page( 'RevelGlam Options', 'RevelGlam', 'manage_options', 'revelglam', array( $this, 'revelglam_Admin_Menu_Options' ) );
	}
	
	/**
	 * Function to add admin menu options screen
	 *
	 * @since    0.14
	 */
	public function revelglam_Admin_Menu_Options() {		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/admin-display.php';
	}
	
	/**
	 * 'Add Revel Glam' button to post edit screen
	 *
	 * @since    0.11
	 */
	public function revelglam_Add_Media_Button( $editor_id = 'content' ) { 
		$screen = get_current_screen();		
		if ( $screen->post_type == 'post' && $screen->id == 'post' ) {
			echo '<a href="#" id="insert-revelglam-button" class="button revelglam-activate add-media" data-editor="' . esc_attr( $editor_id ) . '" title="' . esc_attr( 'Add RevelGlam', 'revelglam' ) . '"><span class="revelglam-buttons-icon"></span>' . esc_html( 'Add RevelGlam', 'revelglam' ) . '</a>';
		}
	}
	
	/**
	 * Function to add options to gallery admin screen
	 *
	 * @since    0.1
	 */
	public function revelglam_Add_Options() {
		$screen = get_current_screen();		
		if ( $screen->post_type == 'post' && $screen->id == 'post' ) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/gallery-options.php';	
		}	
	}
	
	/**
	 * Check the plugin is authorised and subscription is up to date
	 *
	 * @since     0.21
	 * @return    string    
	 */
	public function revelglam_Authorize() {	
	}
	
}
