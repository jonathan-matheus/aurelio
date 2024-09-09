<?php
/**
 * Plugin Name: Aurelio 
 * Description: Meditations
 * Version: 0.0.0
 * Domain Path: /wp-content/plugins/aurelio/languages
 * Text Domain: aurelio
 */

/**
 * Define plugin constants
 */
// Theme directory
define("AURELIO_PATH", plugin_dir_path(__FILE__));
// Theme URL
define("AURELIO_URL", plugin_dir_url(__FILE__));

// Register post types
require_once(AURELIO_PATH . 'post-typs/meditations.php');

// Register shortcodes
require_once(AURELIO_PATH . 'shorcodes/meditations.php');

// Register API
require_once(AURELIO_PATH . 'api/post-rand.php');

/**
 * This function is triggered when the plugin is activated
 * 
 * It resets the WordPress links 
 *
 * @since 0.0.0
 * @return void
 */
function activate()
{
    update_option('rewrite_rules', '');
}
register_activation_hook(__FILE__, 'activate');

/**
 * This function is triggered when the plugin is deactivated
 *
 * it deletes the meditation post type and resets the wordpress links
 * 
 * @since 0.0.0
 * @return void
 */
function deactivate()
{
    unregister_post_type('meditations');
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'deactivate');