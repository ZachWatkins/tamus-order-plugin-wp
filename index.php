<?php
/**
 * TAMUS Ordering Application Plugin
 *
 * @package TAMUS Ordering Application Plugin
 * @since   0.1.0
 * @author  Zachary Watkins <zwatkins2@tamu.edu>
 * @link    https://github.com/zachwatkins/tamus-order-plugin-wp
 * @license https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 *
 * @tamus-order-plugin-wp
 * Plugin Name:  TAMUS Ordering Application Plugin
 * Plugin URI:   https://github.com/zachwatkins/tamus-order-plugin-wp
 * Description:  A GNU GPL 2.0 (or later) WordPress Plugin to facilitate product ordering within a robust, multi-role return / approve workflow using team-based settings.
 * Version:      1.1.0
 * Author:       Zachary Watkins
 * Author Email: zwatkins2@tamu.edu
 * Author URI:   https://github.com/zachwatkins
 * Text Domain:  tamus-wso-textdomain
 * License:      GPL-2.0+
 * License URI:  https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if (! defined('ABSPATH') ) {
    die('We\'re sorry, but you can not directly access this file.');
}

/* Define some useful constants */
define('TAMUS_ORDER_DIRNAME', 'tamus-order-plugin-wp');
define('TAMUS_ORDER_TEXTDOMAIN', 'tamus-wso-textdomain');
define('TAMUS_ORDER_DIR_PATH', plugin_dir_path(__FILE__));
define('TAMUS_ORDER_DIR_FILE', __FILE__);
define('TAMUS_ORDER_DIR_URL', plugin_dir_url(__FILE__));
define('TAMUS_ORDER_TEMPLATE_PATH', TAMUS_ORDER_DIR_PATH . 'templates');

/**
 * The core plugin class that is used to initialize the plugin.
 */
require TAMUS_ORDER_DIR_PATH . 'src/class-tamus-order-plugin-wp.php';
new \TAMUS\Order();

/* Activation hooks */
register_deactivation_hook(TAMUS_ORDER_DIR_FILE, 'tamus_workstation_deactivation');
register_activation_hook(TAMUS_ORDER_DIR_FILE, 'tamus_workstation_activation');

/**
 * Helper option flag to indicate rewrite rules need flushing
 *
 * @since  1.0.0
 * @return void
 */
function tamus_workstation_activation()
{

    // Check for missing dependencies.
    $acf_pro = is_plugin_active('advanced-custom-fields-pro/acf.php');

    if (false === $acf_pro ) {

        $error = sprintf(
        /* translators: %s: URL for plugins dashboard page */
            __(
                'Plugin NOT activated: The <strong>WordPress Plugin</strong> plugin needs the <strong>Advanced Custom Fields Pro</strong> and <strong>Gravity Forms</strong> plugins to be activated first. <a href="%s">Back to plugins page</a>',
                'tamus-order-plugin-wp'
            ),
            get_admin_url(null, '/plugins.php')
        );
        wp_die(wp_kses_post($error));

    } else {

        flush_rewrite_rules();

        // Add user roles.
        include_once TAMUS_ORDER_DIR_PATH . 'src/class-user-roles.php';
        $new_roles = new \TAMUS\Order\User_Roles();
        $new_roles->register();

    }

}

/**
 * Unregister user roles and flush rewrite rules.
 *
 * @since  0.1.0
 * @return void
 */
function tamus_workstation_deactivation()
{
    flush_rewrite_rules();

    // Add user roles.
    include_once TAMUS_ORDER_DIR_PATH . 'src/class-user-roles.php';
    $new_roles = new \TAMUS\Order\User_Roles();
    $new_roles->unregister();
}
