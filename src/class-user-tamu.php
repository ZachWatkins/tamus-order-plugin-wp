<?php
/**
 * The file that applies TAMU conventions to WordPress user information management.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/src/class-user-tamu.php
 * @author     Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.1.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/src
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

namespace TAMUS\Order;

/**
 * TAMU User information handling.
 *
 * @package tamus-order-plugin-wp
 * @since 1.1.0
 */
class User_Tamu {

	/**
	 * Construct the class object instance.
	 *
	 * @return User_Tamu
	 */
	public function __construct() {

		add_action( 'admin_head-user-edit.php', array( $this, 'change_profile_labels' ) );
		add_action( 'admin_head-user-new.php', array( $this, 'change_profile_labels' ) );

	}

	/**
	 * Replace Username with NetID
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function change_profile_labels() {

		add_filter( 'gettext', array( $this, 'change_labels' ) );

	}

	/**
	 * Filter the Username label.
	 *
	 * @since 1.1.0
	 *
	 * @param string $input The label input.
	 *
	 * @return string
	 */
	public function change_labels( $input ) {

		switch ( $input ) {

			case 'Username':
				$input = 'NetID';
				break;
			case 'First Name':
			case 'Last Name':
				$input .= ' (recommended)';
				break;
			default:
				break;
		}

		return $input;

	}
}
