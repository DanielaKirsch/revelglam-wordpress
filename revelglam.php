<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://revelglam.com
 * @since             0.1
 * @package           revelglam
 *
 * @wordpress-plugin
 * Plugin Name:       Revel Glam
 * Plugin URI:        https://revelglam.com
 * Description:       
 * Version:           0.13
 * Author:            Revel Glam
 * Author URI:        http://revelglam.com/
 * Text Domain:       revelglam
 * Domain Path:       /languages
 */

class Revelglam_Images {
	
	private static $instance = false;
	public static function instance() {
		if( !self::$instance )
			self::$instance = new Revelglam_Images;

		return self::$instance;
	}

	private function __construct() {
		// Enqueue essential assets
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );

		// Add the revelglam Images media button
		add_action( 'media_buttons', array( $this, 'media_buttons' ), 20 );

		add_action( 'print_media_templates', array( $this, 'print_media_templates' ) );
	}

	/**
	 * Include all of the templates used by Backbone views
	 */
	function print_media_templates() {
		include( __DIR__ . '/revelglam-templates.php' );
	}

	function media_buttons( $editor_id = 'content' ) { ?>
		<a href="#" class="button revelglam-images-activate"
			data-editor="<?php echo esc_attr( $editor_id ); ?>"
			title="RevelGlam"><span ></span>RevelGlam</a>
	<?php
	}

	
	function admin_enqueue() {

		wp_enqueue_media();

		$current_timestamp = time();
		
		wp_enqueue_script( 'revelglam-images', plugins_url( '/admin/js/revelglam-admin.js', __FILE__ ), array( ), $current_timestamp, true );

	}



}

Revelglam_Images::instance();
