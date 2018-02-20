<?php

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      0.1
 * @package    revelglam
 * @subpackage revelglam/includes
 * @author     @bigflannel
 */
class revelglam_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.1
	 */
	public static function deactivate() {
	
		// wp_clear_scheduled_hook( 'authorise_plugin' );

	}

}
