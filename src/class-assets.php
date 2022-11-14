<?php
/**
 * The file that defines css and js files loaded for the plugin
 *
 * A class definition that includes css and js files used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/src/class-assets.php
 * @author     Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/src
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

namespace TAMUS\Order;

/**
 * Add assets
 *
 * @since 1.0.0
 */
class Assets
{

    /**
     * Initialize the class
     *
     * @since  1.0.0
     * @return void
     */
    public function __construct()
    {

        // Register global styles used in the theme.
        add_action('admin_enqueue_scripts', array( $this, 'register_admin_styles' ));
        add_action('admin_enqueue_scripts', array( $this, 'register_admin_scripts' ));

        // Enqueue admin styles.
        add_action('admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ));

        // Enqueue styles.
        add_action('wp_enqueue_scripts', array( $this, 'register_styles' ));
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_styles' ));

        // Load Dashicons.
        add_action('wp_enqueue_scripts', array( $this, 'load_dashicons_front_end' ));

    }

    /**
     * Registers all styles used within the plugin
     *
     * @since  1.0.0
     * @return void
     */
    public static function register_styles()
    {

        wp_register_style(
            'tamus-order-plugin-wp-styles',
            TAMUS_ORDER_DIR_URL . 'css/styles.css',
            false,
            filemtime(TAMUS_ORDER_DIR_PATH . 'css/styles.css'),
            'screen'
        );

    }

    /**
     * Registers all styles used within the plugin
     *
     * @since  1.0.0
     * @return void
     */
    public static function register_admin_styles()
    {

        wp_register_style(
            'tamus-order-plugin-wp-admin-styles',
            TAMUS_ORDER_DIR_URL . 'css/admin.css',
            false,
            filemtime(TAMUS_ORDER_DIR_PATH . 'css/admin.css'),
            'screen'
        );

    }

    /**
     * Registers all scripts used within the plugin
     *
     * @since  1.0.0
     * @return void
     */
    public static function register_admin_scripts()
    {

        wp_register_script(
            'tamus-order-plugin-wp-admin-script',
            TAMUS_ORDER_DIR_URL . 'js/admin-tamus-order.js',
            array('select2'),
            filemtime(TAMUS_ORDER_DIR_PATH . 'js/admin-tamus-order.js'),
            true
        );

    }

    /**
     * Enqueues extension styles
     *
     * @since  1.0.0
     * @return void
     */
    public static function enqueue_styles()
    {

        wp_enqueue_style('tamus-order-plugin-wp-styles');

    }

    /**
     * Enqueues extension styles
     *
     * @since  1.0.0
     * @return void
     */
    public static function enqueue_admin_styles()
    {

        wp_enqueue_style('tamus-order-plugin-wp-admin-styles');
        wp_enqueue_script('tamus-order-plugin-wp-admin-script');

    }

    /**
     * Loads WordPress Dashicons library.
     */
    public function load_dashicons_front_end()
    {
        wp_enqueue_style('dashicons');
    }

}
