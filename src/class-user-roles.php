<?php
/**
 * The file that defines customizations to user roles for all custom post types.
 *
 * @link       https://github.com/zachwatkins/cla-workstation-order/blob/master/src/class-user-roles.php
 * @since      1.0.0
 * @package    cla-workstation-order
 * @subpackage cla-workstation-order/src
 */

namespace CLA_Workstation_Order;

/**
 * The core plugin class
 *
 * @since 1.0.0
 * @return void
 */
class User_Roles {

	/**
	 * File name
	 *
	 * @var file
	 */
	private static $file = __FILE__;

	/**
	 * Initialize the class
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {
	}

	/**
	 * Register user roles
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function register() {

		// Update existing Subscriber role.
		$subscriber_role = get_role( 'subscriber' );
		$subscriber_role->add_cap( 'read', false );

		/**
		 * Add new roles with custom post type capabilities.
		 */

		// WSO Admin role.
		$wso_admin_caps = array(
      'create_wsorders'              => true, // This is needed to edit others orders for some reason.
      'read_wsorder'                 => true,
      'read_private_wsorders'        => true,
      'edit_wsorder'                 => true,
      'edit_wsorders'                => true,
      'edit_others_wsorders'         => true,
      'edit_private_wsorders'        => true,
      'edit_published_wsorders'      => true, // Required to read published wsorders.
      'publish_wsorders'             => true, // Required for changing the post status.
      'delete_wsorder'               => true,
      'delete_wsorders'              => true,
      'delete_others_wsorders'       => true,
      'delete_private_wsorders'      => true,
      'delete_published_wsorders'    => true,
      'create_programs'              => true,
      'read_program'                 => true,
      'read_private_programs'        => true,
      'edit_program'                 => true,
      'edit_programs'                => true,
      'edit_others_programs'         => true,
      'edit_private_programs'        => true,
      'edit_published_programs'      => true,
      'publish_programs'             => true,
      'delete_program'               => true,
      'delete_programs'              => true,
      'delete_others_programs'       => true,
      'delete_private_programs'      => true,
      'delete_published_programs'    => true,
      'create_departments'           => true,
      'read_department'              => true,
      'read_private_departments'     => true,
      'edit_department'              => true,
      'edit_departments'             => true,
      'edit_others_departments'      => true,
      'edit_private_departments'     => true,
      'edit_published_departments'   => true,
      'publish_departments'          => true,
      'delete_department'            => true,
      'delete_departments'           => true,
      'delete_others_departments'    => true,
      'delete_private_departments'   => true,
      'delete_published_departments' => true,
			'manage_product_categories'    => true,
      'create_products'              => true,
      'read_product'                 => true,
      'read_private_products'        => true,
      'edit_product'                 => true,
      'edit_products'                => true,
      'edit_others_products'         => true,
      'edit_private_products'        => true,
      'edit_published_products'      => true,
      'publish_products'             => true,
      'delete_product'               => true,
      'delete_products'              => true,
      'delete_others_products'       => true,
      'delete_private_products'      => true,
      'delete_published_products'    => true,
      'create_bundles'               => true,
      'read_bundle'                  => true,
      'read_private_bundles'         => true,
      'edit_bundle'                  => true,
      'edit_bundles'                 => true,
      'edit_others_bundles'          => true,
      'edit_private_bundles'         => true,
      'edit_published_bundles'       => true,
      'publish_bundles'              => true,
      'delete_bundle'                => true,
      'delete_bundles'               => true,
      'delete_others_bundles'        => true,
      'delete_private_bundles'       => true,
      'delete_published_bundles'     => true,
			'manage_wso_options'           => true,
			'upload_files'                 => true,
			'unfiltered_html'              => true,
			'read'                         => true,
			'upload_files'                 => true,
			'remove_users'                 => true,
			'promote_users'                => true,
			'list_users'                   => true,
      'switch_users'                 => true,
			'manage_categories'            => false,
			'create_posts'                 => false,
			'read_post'                    => false,
			'read_private_posts'           => false,
			'edit_post'                    => false,
			'edit_posts'                   => false,
			'edit_others_posts'            => false,
			'edit_private_posts'           => false,
			'edit_published_posts'         => false,
			'publish_posts'                => false,
			'delete_post'                  => false,
			'delete_posts'                 => false,
			'delete_others_posts'          => false,
			'delete_private_posts'         => false,
			'delete_published_posts'       => false,
		);
		$this->add_role( 'wso_admin', 'WSO Admin', false, $wso_admin_caps );

		// Logistics role.
		$logistics_caps = array(
      'create_wsorders'              => true, // This is needed to edit others orders for some reason.
      'read_wsorder'                 => true,
      'read_private_wsorders'        => true,
      'edit_wsorder'                 => true,
      'edit_wsorders'                => true,
      'edit_others_wsorders'         => true,
      'edit_private_wsorders'        => true,
      'edit_published_wsorders'      => true, // Required to read published wsorders.
      'publish_wsorders'             => true, // Required for changing the post status.
      'delete_wsorder'               => true,
      'delete_wsorders'              => true,
      'delete_others_wsorders'       => true,
      'delete_private_wsorders'      => true,
      'delete_published_wsorders'    => true,
      'create_programs'              => true,
      'read_program'                 => true,
      'read_private_programs'        => true,
      'edit_program'                 => true,
      'edit_programs'                => true,
      'edit_others_programs'         => true,
      'edit_private_programs'        => true,
      'edit_published_programs'      => true,
      'publish_programs'             => true,
      'delete_program'               => true,
      'delete_programs'              => true,
      'delete_others_programs'       => true,
      'delete_private_programs'      => true,
      'delete_published_programs'    => true,
      'create_departments'           => true,
      'read_department'              => true,
      'read_private_departments'     => true,
      'edit_department'              => true,
      'edit_departments'             => true,
      'edit_others_departments'      => true,
      'edit_private_departments'     => true,
      'edit_published_departments'   => true,
      'publish_departments'          => true,
      'delete_department'            => true,
      'delete_departments'           => true,
      'delete_others_departments'    => true,
      'delete_private_departments'   => true,
      'delete_published_departments' => true,
			'manage_product_categories'    => true,
      'create_products'              => true,
      'read_product'                 => true,
      'read_private_products'        => true,
      'edit_product'                 => true,
      'edit_products'                => true,
      'edit_others_products'         => true,
      'edit_private_products'        => true,
      'edit_published_products'      => true,
      'publish_products'             => true,
      'delete_product'               => true,
      'delete_products'              => true,
      'delete_others_products'       => true,
      'delete_private_products'      => true,
      'delete_published_products'    => true,
      'create_bundles'               => true,
      'read_bundle'                  => true,
      'read_private_bundles'         => true,
      'edit_bundle'                  => true,
      'edit_bundles'                 => true,
      'edit_others_bundles'          => true,
      'edit_private_bundles'         => true,
      'edit_published_bundles'       => true,
      'publish_bundles'              => true,
      'delete_bundle'                => true,
      'delete_bundles'               => true,
      'delete_others_bundles'        => true,
      'delete_private_bundles'       => true,
      'delete_published_bundles'     => true,
			'upload_files'                 => true,
			'unfiltered_html'              => true,
			'read'                         => true,
			'upload_files'                 => true,
			'manage_categories'            => false,
			'create_posts'                 => false,
			'read_post'                    => false,
			'read_private_posts'           => false,
			'edit_post'                    => false,
			'edit_posts'                   => false,
			'edit_others_posts'            => false,
			'edit_private_posts'           => false,
			'edit_published_posts'         => false,
			'publish_posts'                => false,
			'delete_post'                  => false,
			'delete_posts'                 => false,
			'delete_others_posts'          => false,
			'delete_private_posts'         => false,
			'delete_published_posts'       => false,
		);
		$this->add_role( 'wso_logistics', 'Logistics', false, $logistics_caps );

		/**
		 * Logistics Admin capabilities.
		 */
		$logistics_admin_caps = array(
			'create_users'                 => true,
			'delete_users'                 => true,
			'add_users'                    => true,
			'edit_users'                   => true,
			'remove_users'                 => true,
			'promote_users'                => true,
			'list_users'                   => true,
			'switch_users'                 => true,
			'manage_wso_options'           => true,
    );
    $logistics_admin_caps = array_merge( $logistics_admin_caps, $logistics_caps );
		$this->add_role( 'wso_logistics_admin', 'Logistics Admin', false, $logistics_admin_caps );

		/**
		 * IT Rep capabilities.
		 */
		$it_rep_caps = array(
		);
		$this->add_role( 'wso_it_rep', 'IT Rep', false, $it_rep_caps );

		/**
		 * Admin capabilities.
		 */
		$business_admin_caps = array(
		);
		$this->add_role( 'wso_business_admin', 'Business Admin', false, $business_admin_caps );

	}

	/**
	 * Add new user role.
	 *
	 * @param string $role         Role name.
	 * @param string $display_name Display name for role.
	 * @param string $base_role    The base role name to extend.
	 * @param array  $caps         The new capabilities applied to the base role capabilities.
	 *
	 * @return void
	 */
	private function add_role( $role, $display_name, $base_role, $caps ) {

		$base_caps = $base_role === false ? array() : get_role( $base_role )->capabilities;
		$caps      = array_merge( $base_caps, $caps );
		add_role( $role, $display_name, $caps );

	}

	/**
	 * Unregister user roles and capability changes.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function unregister() {

		// Update existing Subscriber role.
		$subscriber_role = get_role( 'subscriber' );
		$subscriber_role->add_cap( 'read', true );

		remove_role( 'wso_admin' );
		remove_role( 'wso_logistics_admin' );
		remove_role( 'wso_logistics' );
		remove_role( 'wso_it_rep' );
		remove_role( 'wso_primary_it_rep' );
		remove_role( 'wso_department_it_rep' );
		remove_role( 'wso_program_it_rep' );
		remove_role( 'wso_business_admin' );
		remove_role( 'wso_program_business_admin' );
		remove_role( 'wso_department_business_admin' );
		remove_role( 'wso_primary_business_admin' );

	}
}
