<?php
/**
 * The file that defines the Department post type
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/src/class-department-posttype.php
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
 * @package tamus-order-plugin-wp
 * @since   1.0.0
 */
class Department_PostType
{

    /**
     * Initialize the class
     *
     * @since  1.0.0
     * @return void
     */
    public function __construct()
    {

        // Register_post_types.
        add_action('init', array( $this, 'register_post_type' ));
        add_action('acf/init', array( $this, 'register_custom_fields' ));

    }

    /**
     * Register the post type.
     *
     * @return void
     */
    public function register_post_type()
    {

        include_once TAMUS_ORDER_DIR_PATH . 'src/class-posttype.php';

        new \TAMUS\Order\PostType(
            array(
            'singular' => 'Department',
            'plural'   => 'Departments',
            ),
            'department',
            array(),
            'dashicons-welcome-learn-more',
            array( 'title' ),
            array(
            'capability_type'    => array( 'department', 'departments' ),
            'publicly_queryable' => false,
            'has_archive'        => false,
            'rewrite'            => false,
            'public'             => false,
            )
        );

    }

    /**
     * Register custom fields
     *
     * @since  1.0.0
     * @return void
     */
    public function register_custom_fields()
    {
        include_once TAMUS_ORDER_DIR_PATH . 'fields/department-fields.php';
    }
}
