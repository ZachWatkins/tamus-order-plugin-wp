<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/src/class-tamus-order-plugin-wp.php
 * @author     Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/src
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

namespace TAMUS;

/**
 * The core plugin class
 *
 * @since 1.0.0
 * @return void
 */
class Order {

	/**
	 * File name
	 *
	 * @var file
	 */
	private static $file = __FILE__;

	/**
	 * Instance
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 * Initialize the class
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {

		// Load user management hooks.
		if ( ! class_exists( '\TAMUS\Order\User_Roles' ) ) {
			require_once TAMUS_ORDER_DIR_PATH . 'src/class-user-roles.php';
			$user_roles = new \TAMUS\Order\User_Roles();
		}

		require_once TAMUS_ORDER_DIR_PATH . 'src/class-user-tamu.php';
		new \TAMUS\Order\User_Tamu();

		require_once TAMUS_ORDER_DIR_PATH . 'src/class-legacy-support.php';
		new \TAMUS\Order\Legacy_Support();

		// Modify the Dashboard widgets.
		require_once TAMUS_ORDER_DIR_PATH . 'src/class-dashboard.php';
		new \TAMUS\Order\Dashboard();

		// Load required JS and CSS.
		require_once TAMUS_ORDER_DIR_PATH . 'src/class-assets.php';
		new \TAMUS\Order\Assets();

		// Create post types.
		require_once TAMUS_ORDER_DIR_PATH . 'src/class-tamusorder-posttype.php';
		new \TAMUS\Order\TAMUS_Order_PostType();

		require_once TAMUS_ORDER_DIR_PATH . 'src/class-product-posttype.php';
		new \TAMUS\Order\Product_PostType();

		require_once TAMUS_ORDER_DIR_PATH . 'src/class-bundle-posttype.php';
		new \TAMUS\Order\Bundle_PostType();

		require_once TAMUS_ORDER_DIR_PATH . 'src/class-program-posttype.php';
		new \TAMUS\Order\Program_PostType();

		require_once TAMUS_ORDER_DIR_PATH . 'src/class-department-posttype.php';
		new \TAMUS\Order\Department_PostType();

		// Register page templates.
		require_once TAMUS_ORDER_DIR_PATH . 'src/class-pagetemplate.php';
		$order_form = new \TAMUS\Order\PageTemplate( TAMUS_ORDER_TEMPLATE_PATH, 'order-form-template.php', 'Order Form' );
		$order_form->register();
		$orders = new \TAMUS\Order\PageTemplate( TAMUS_ORDER_TEMPLATE_PATH, 'orders.php', 'Orders' );
		$orders->register();
		$my_orders = new \TAMUS\Order\PageTemplate( TAMUS_ORDER_TEMPLATE_PATH, 'my-orders.php', 'My Orders' );
		$my_orders->register();
		$my_account = new \TAMUS\Order\PageTemplate( TAMUS_ORDER_TEMPLATE_PATH, 'my-account.php', 'My Account' );
		$my_account->register();

		// Register settings page.
		add_action( 'acf/init', array( $this, 'register_custom_fields' ) );

		add_action( 'init', array( $this, 'init' ) );

		add_filter( 'manage_users_columns', array( $this, 'add_user_admin_columns' ) );

		add_filter( 'manage_users_custom_column', array( $this, 'render_user_admin_columns' ), 10, 3 );

		add_filter( 'admin_body_class', array( $this, 'identify_user_role' ) );

	}

	/**
	 * Initialization hook.
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function init() {

		// Create product category taxonomy.
		require_once TAMUS_ORDER_DIR_PATH . 'src/class-taxonomy.php';
		new \TAMUS\Order\Taxonomy(
			array( 'Product Category', 'Product Categories' ),
			'product-category',
			array( 'product', 'bundle' ),
			array(
				'capabilities' => array(
					'manage_terms' => 'manage_product_categories',
					'edit_terms'   => 'manage_product_categories',
					'delete_terms' => 'manage_product_categories',
					'assign_terms' => 'manage_product_categories',
				),
			),
			array(),
			'',
			true
		);

	}

	/**
	 * Register the settings page
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_custom_fields() {
		
		if ( function_exists( 'acf_add_options_page' ) ) {
			
			require_once TAMUS_ORDER_DIR_PATH . 'fields/settings-fields.php';
			
			acf_add_options_page(
				array(
					'page_title' => 'Order Application Settings',
					'menu_title' => 'App Settings',
					'menu_slug'  => 'tamusorder-settings',
					'capability' => 'wso_manage_options',
					'redirect'   => false,
				)
			);

		}

		require_once TAMUS_ORDER_DIR_PATH . 'fields/user-fields.php';

	}

	/**
	 * Identify the current user's user role in the admin page body class.
	 *
	 * @param string $classes The class list.
	 *
	 * @return string
	 */
	public function identify_user_role( $classes ) {

		$user     = wp_get_current_user();
		$roles    = ( array ) $user->roles;
		$classes .= ' ' . implode( ' ', $roles );

		return $classes;

	}

	/**
	 * Add department column for users.
	 *
	 * @param string[] $column Column names in slug => label pairs.
	 *
	 * @return array
	 */
	public function add_user_admin_columns( $column ) {

		$column['department'] = 'Department';
		$midpoint             = 4;
		$arr_1                = array_slice( $column, 0, $midpoint );
		$arr_2                = array_slice( $column, $midpoint, count( $column ) - $midpoint );
		$arr_1['department']  = 'Department';
		$column               = array_merge( $arr_1, $arr_2 );
		return $column;

	}

	/**
	 * Render the user department names in admin columns.
	 *
	 * @param string $val         The column value.
	 * @param string $column_name The column name.
	 * @param int    $user_id     The user ID.
	 *
	 * @return string
	 */
	public function render_user_admin_columns( $val, $column_name, $user_id ) {

		switch ( $column_name ) {
			case 'department':
				return get_the_title( get_the_author_meta( 'department', $user_id ) );
				break;
			default:
		}
		return $val;

	}

}
