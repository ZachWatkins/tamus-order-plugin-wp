<?php
/**
 * The file that defines the Order post type
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/src/class-order-posttype-emails.php
 * @author     Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/src
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

namespace TAMUS\Order\Post;

/**
 * Add assets
 *
 * @package tamus-order-plugin-wp
 * @since 1.0.0
 */
class Emails {

	/**
	 * Initialize the class
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {

		// Custom action hooks for triggering emails.
		add_action( 'tamusorder_it_rep_confirmed', array( $this, 'it_rep_confirmation_email' ) );
		add_action( 'tamusorder_business_staff_confirmed', array( $this, 'business_staff_confirmation_email' ) );
		add_action( 'tamusorder_logistics_confirmed', array( $this, 'logistics_confirmation_email' ) );
		add_action( 'tamusorder_returned', array( $this, 'order_returned_email' ) );
		add_action( 'tamusorder_submitted', array( $this, 'order_submitted_email' ) );

		// Notify parties of changes to order status.
		add_filter( 'acf/update_value/key=field_5fff6b71a22b0', array( $this, 'it_rep_confirmed' ), 12, 2 );
		add_filter( 'acf/update_value/key=field_5fff6ec0e4385', array( $this, 'bus_staff_confirmed' ), 12, 2 );
		add_filter( 'acf/update_value/key=field_5fff6f3cef757', array( $this, 'logistics_confirmed' ), 12, 2 );

	}

	/**
	 * Determine if the order requires business approval.
	 *
	 * @param int $post_id The post ID.
	 *
	 * @return boolean
	 */
	private function order_requires_business_approval( $post_id ) {
		$business_admin = (int) get_post_meta( $post_id, 'business_staff_status_business_staff', true );
		if ( ! empty( $business_admin ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Emails sent when an order is submitted.
	 *
	 * @param int $post_id The order post ID.
	 *
	 * @return void
	 */
	public function order_submitted_email( $post_id ) {

		// Get user information.
		$current_user       = wp_get_current_user();
		$current_user_name  = $current_user->display_name;
		$current_user_email = $current_user->user_email;

		// Email settings.
		$headers = array( 'Content-Type: text/html; charset=UTF-8' );

		// Get current program meta.
		$program_id   = get_field( 'program', $post_id );
		$program_name = get_the_title( $program_id );

		// Get order information.
		$order_url = get_permalink( $post_id );

		// Email end user.
		$message = "<p>Howdy,</p>
<p>Liberal Arts IT has received your order.</p>

<p>Your {$program_name} order will be reviewed to ensure all necessary information and funding is in place.</p>
<p>
  Following review, your workstation request will be combined with others from your department to create a consolidated {$program_name} purchase. Consolidated orders are placed to maximize efficiency. Your order will be processed and received by IT Logistics in 4-6 weeks, depending on how early in the order cycle you make your selection. Once received, your workstation will be released to departmental IT staff who will then image your workstation, install software and prepare the device for delivery. These final steps generally take one to two days.
</p>
<p>You may view your order online at any time using this link: <a href=\"{$order_url}\">{$order_url}</a>.</p>

<p>
  Have a great day!
  <em>-Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";
		wp_mail( "{$current_user_name} <{$current_user_email}>", 'Workstation Order Received', $message, $headers );

		// Email IT Rep.
		$it_rep_fields        = get_field( 'it_rep_status', $post_id );
		$primary_it_rep_id    = $it_rep_fields['it_rep']['ID'];
		$primary_it_rep_name  = $it_rep_fields['it_rep']['display_name'];
		$primary_it_rep_email = $it_rep_fields['it_rep']['user_email'];
		$affiliated_it_reps   = get_field( 'affiliated_it_reps', $post_id );
		if ( is_array( $affiliated_it_reps ) ) {
			foreach ( $affiliated_it_reps as $key => $it_rep_id ) {
				if ( $it_rep_id !== $primary_it_rep_id ) {
					$af_it_rep = get_user_by( 'ID', $it_rep_id );
					if ( false !== $af_it_rep ) {
						$arep_name  = $af_it_rep->display_name;
						$arep_email = $af_it_rep->user_email;
						$headers[]  = "Cc: {$arep_name} <{$arep_email}>";
					}
				}
			}
		}
		$message = "<p>
  <strong>There is a new {$program_name} order that requires your attention.</strong>
</p>
<p>
  Please review this order carefully for any errors or omissions, then confirm it to pass along in the ordering workflow, or return it to the customer with your feedback and ask that they correct the order.
</p>
<p>
  You can view the order at this link: <a href=\"{$order_url}\">{$order_url}</a>.
</p>
<p>
  Have a great day!
  <em>-Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";
		wp_mail( "{$primary_it_rep_name} <{$primary_it_rep_email}>", 'Workstation Order Received', $message, $headers );
	}

	/**
	 * Once IT Rep has confirmed, if business approval is needed then
	 * send an email to the business admin.
	 *
	 * @param string $value   The new value of the field.
	 * @param int    $post_id The post ID.
	 *
	 * @return string
	 */
	public function it_rep_confirmed( $value, $post_id ) {

		$old_value = (int) get_post_meta( $post_id, 'it_rep_status_confirmed', true );
		if ( 1 === intval( $value ) && 0 === $old_value ) {
			do_action( 'tamusorder_it_rep_confirmed', $post_id );
		}

		return $value;

	}

	/**
	 * IT Rep confirmed the order so now we email the next approver.
	 *
	 * @param int $post_id The order post ID.
	 *
	 * @return void
	 */
	public function it_rep_confirmation_email( $post_id ) {

		// IT Rep confirmed the order.
		$post                    = get_post( $post_id );
		$order_name              = get_the_title( $post_id );
		$user_id                 = $post->post_author;
		$end_user                = get_user_by( 'id', $user_id );
		$end_user_name           = $end_user->display_name;
		$user_department_post    = get_field( 'department', "user_{$user_id}" );
		$department_abbreviation = get_field( 'abbreviation', $user_department_post->ID );
		$to                      = '';
		$headers                 = array( 'Content-Type: text/html; charset=UTF-8' );

		// Check if business approval is needed.
		$requires_bus_approval = $this->order_requires_business_approval( $post_id );

		if ( $requires_bus_approval ) {

			$business_admins              = get_field( 'affiliated_business_staff', $post_id );
			$primary_business_admin_id    = (int) get_post_meta( $post_id, 'business_staff_status_business_staff', true );
			$primary_business_admin       = get_user_by( 'ID', $primary_business_admin_id );
			$primary_business_admin_email = $primary_business_admin->user_email;
			$primary_business_admin_name  = $primary_business_admin->display_name;
			if ( is_array( $business_admins ) ) {
				foreach ( $business_admins as $abus_user_id ) {
					if ( $abus_user_id !== $primary_business_admin_id ) {
						$abus_user = get_user_by( 'ID', $abus_user_id );
						if ( $abus_user ) {
							$abus_name  = $abus_user->display_name;
							$abus_email = $abus_user->user_email;
							$headers[]  = "Cc: {$abus_name} <{$abus_email}>";
						}
					}
				}
			}
			// Send email.
			$to      = "{$primary_business_admin_name} <{$primary_business_admin_email}>";
			$message = $this->email_body_it_rep_to_business( $post_id, $end_user_name );

		} else {

			// Get logistics email setting.
			$enable_logistics_email = (int) get_field( 'enable_emails_to_logistics', 'option' );
			if ( 1 === $enable_logistics_email ) {

				// Get logistics email.
				$logistics_email = get_field( 'logistics_email', 'option' );

				// Send email.
				$to      = "IT Logistics <{$logistics_email}>";
				$message = $this->email_body_to_logistics( $post_id );

			}
		}

		// Send email.
		if ( ! empty( $to ) ) {
			$title = "[{$order_name}] Workstation Order Approval - {$department_abbreviation} - {$end_user_name}";
			wp_mail( $to, $title, $message, $headers );
		}
	}

	/**
	 * Once Business Staff has confirmed, then
	 * send an email to the logistics address.
	 *
	 * @param string $value   The new value of the field.
	 * @param int    $post_id The post ID.
	 *
	 * @return string
	 */
	public function bus_staff_confirmed( $value, $post_id ) {

		$old_value = (int) get_post_meta( $post_id, 'business_staff_status_confirmed', true );
		if ( 1 === intval( $value ) && 0 === $old_value ) {
			do_action( 'tamusorder_business_staff_confirmed', $post_id );
		}

		return $value;

	}

	/**
	 * Send email after business staff confirms the order.
	 *
	 * @param int $post_id The order post ID.
	 *
	 * @return void
	 */
	public function business_staff_confirmation_email( $post_id ) {

		// Logistics email enabled.
		$enable_logistics_email = (int) get_field( 'enable_emails_to_logistics', 'option' );

		if ( 1 === $enable_logistics_email ) {

			$post = get_post( $post_id );
			// Get the order name.
			$order_name = get_the_title( $post_id );
			// Declare end user variables.
			$user_id                 = $post->post_author;
			$end_user                = get_user_by( 'id', $user_id );
			$end_user_name           = $end_user->display_name;
			$user_department_post    = get_field( 'department', "user_{$user_id}" );
			$department_abbreviation = get_field( 'abbreviation', $user_department_post->ID );
			// Get logistics email.
			$logistics_email = get_field( 'logistics_email', 'option' );
			// Send email.
			$to      = "IT Logistics <{$logistics_email}>";
			$title   = "[{$order_name}] Workstation Order Approval - {$department_abbreviation} - {$end_user_name}";
			$message = $this->email_body_to_logistics( $post_id );
			$headers = array( 'Content-Type: text/html; charset=UTF-8' );
			wp_mail( $to, $title, $message, $headers );

		}
	}

	/**
	 * IT Logistics checks their "Confirmed" checkbox, then
	 * end user is emailed with "order approval completed email".
	 *
	 * @param string $value   The new value of the field.
	 * @param int    $post_id The post ID.
	 *
	 * @return string
	 */
	public function logistics_confirmed( $value, $post_id ) {

		$old_value = (int) get_post_meta( $post_id, 'it_logistics_status_confirmed', true );
		if ( 1 === intval( $value ) && 0 === $old_value ) {
			do_action( 'tamusorder_logistics_confirmed', $post_id );
		}

		return $value;

	}

	/**
	 * Email end user after logistics confirms the order.
	 *
	 * @param int $post_id The order post ID.
	 *
	 * @return void
	 */
	public function logistics_confirmation_email( $post_id ) {

		$post = get_post( $post_id );
		// Get the order name.
		$order_name = get_the_title( $post_id );
		// Declare end user variables.
		$user_id                 = $post->post_author;
		$end_user                = get_user_by( 'id', $user_id );
		$end_user_email          = $end_user->user_email;
		$end_user_name           = $end_user->display_name;
		$user_department_post    = get_field( 'department', "user_{$user_id}" );
		$department_abbreviation = get_field( 'abbreviation', $user_department_post->ID );
		// Send email.
		$to      = "{$end_user_name} <{$end_user_email}>";
		$title   = "[{$order_name}] Workstation Order Approval - {$department_abbreviation} - {$end_user_name}";
		$message = $this->email_body_order_approved( $post_id );
		$headers = array( 'Content-Type: text/html; charset=UTF-8' );
		wp_mail( $to, $title, $message, $headers );

	}

	/**
	 * Email generated for returned workstation orders.
	 *
	 * @param int $post_id The post ID.
	 *
	 * return void
	 */
	public function order_returned_email( $post_id ) {

		$headers                 = array( 'Content-Type: text/html; charset=UTF-8' );
		$user_id                 = get_post_meta( $post_id, 'order_author', true );
		$end_user                = get_user_by( 'id', $user_id );
		$end_user_name           = $end_user->display_name;
		$end_user_email          = $end_user->user_email;
		$returning_user_id       = (int) get_post_meta( $post_id, 'returned_by', true );
		$returning_user          = get_user_by( 'id', $returning_user_id );
		$returning_user_name     = $returning_user->display_name;
		$returning_user_email    = $returning_user->user_email;
		$returned_comments       = get_post_meta( $post_id, 'returned_comments', true );
		$order_name              = get_the_title( $post_id );
		$user_department_post    = get_field( 'department', "user_{$user_id}" );
		$department_abbreviation = get_field( 'abbreviation', $user_department_post->ID );

		/**
		 * If status changed to "Returned" then do this.
		 * subject: [{$order_name}] Returned Workstation Order - {$department_abbreviation} - {$end_user_name}
		 * to: end user
		 * cc: whoever set it to return
		 * body: email_body_return_to_user( $post->ID, $_POST['acf'] );
		 */
		$to        = "{$end_user_name} <{$end_user_email}>";
		$title     = "[{$order_name}] Returned Workstation Order - {$department_abbreviation} - {$end_user_name}";
		$message   = $this->email_body_return_to_user( $post_id, $returned_comments );
		$headers[] = "Cc: {$returning_user_name} <{$returning_user_email}>";
		wp_mail( $to, $title, $message, $headers );

	}

	/**
	 * The email body which is sent to the business admin when the IT rep confirms the order.
	 *
	 * @param int    $post_id The order post ID.
	 * @param string $end_user_name The name of the end user who created the order.
	 *
	 * @return string
	 */
	private function email_body_it_rep_to_business( $post_id, $end_user_name ) {

		$program_id      = get_field( 'program', $post_id );
		$program_name    = get_the_title( $program_id );
		$contribution    = get_field( 'contribution_amount', $post_id );
		$addfund_amount  = '$' . number_format( $contribution, 2, '.', ',' );
		$addfund_account = get_field( 'contribution_account', $post_id );
		$order_url       = get_permalink( $post_id );
		$message         = "<p>
  Howdy<br />
  <strong>There is a new {$program_name} order that requires your attention for financial resolution.</strong></p>
<p>
  {$end_user_name} elected to contribute additional funds toward their order in the amount of {$addfund_amount}. An account reference of \"{$addfund_account}\" needs to be confirmed or replaced with the correct account number that will be used on the official requisition.
</p>
<p>
  You can view the order at this link: <a href=\"{$order_url}\">{$order_url}</a>.
</p>
<p>
  Have a great day!<br />
  <em>- Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";

		return $message;

	}

	/**
	 * The email body which is sent to logistics.
	 *
	 * @param int $post_id The order post ID.
	 *
	 * @return string
	 */
	private function email_body_to_logistics( $post_id ) {

		$program_id   = get_field( 'program', $post_id );
		$program_name = get_the_title( $program_id );
		$order_url    = get_permalink( $post_id );
		$message      = "<p><strong>There is a new {$program_name} order that requires your approval.</strong></p>
<p>
  Please review this order carefully for any errors or omissions, then approve order for purchasing.
</p>
<p>
  You can view the order at this link: <a href=\"{$order_url}\">{$order_url}</a>.
</p>
<p>
  Have a great day!<br />
  <em>- Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";

		return $message;

	}

	/**
	 * The email body which is sent to the end user when the order is returned.
	 *
	 * @param int   $post_id          The order post ID.
	 * @param array $returned_comment The comment text provided by the user who returned the order.
	 *
	 * @return string
	 */
	private function email_body_return_to_user( $post_id, $returned_comment ) {

		$order_url    = get_permalink( $post_id );
		$program_id   = get_field( 'program', $post_id );
		$program_name = get_the_title( $program_id );
		$actor_user   = wp_get_current_user();
		$actor_id     = $actor_user->ID;
		$actor_name   = $actor_user->display_name;
		$message      = "<p>
  Howdy,
</p>
<p>
  Your {$program_name} order has been returned by {$actor_name}. This could be because it was missing some required information, missing a necessary part, or could not be fulfilled as is. An explanation should appear below in the comments.
</p>
<p>
  Comments from {$actor_name}: {$returned_comment}
</p>
<p>
  Next step is to resolve your order's issue with the person who returned it (who has been copied on this email for your convenience), then correct the existing order. You may access your order online at any time using this link: <a href=\"{$order_url}\">{$order_url}</a>.
</p>

<p>
	Have a great day!<br />
	<em>- Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";

		return $message;

	}

	/**
	 * The email body which is sent to the IT rep and business admin when the order is returned to the end user.
	 *
	 * @param int    $post_id          The order post ID.
	 * @param array  $returned_comment The comment text provided by the user who returned the order.
	 * @param string $end_user_name    The name of the end user who created the order.
	 *
	 * @return string
	 */
	private function email_body_return_to_user_forward( $post_id, $returned_comment, $end_user_name ) {

		$program_id   = get_field( 'program', $post_id );
		$program_name = get_the_title( $program_id );
		$actor_user   = wp_get_current_user();
		$actor_name   = $actor_user->display_name;
		$order_url    = get_permalink( $post_id );
		$message      = "<p>
  Howdy,
</p>
<p>
  The {$program_name} order for {$end_user_name} has been returned by {$actor_name}. An explanation should appear below in the comments.
</p>
<p>
  Comments from {$actor_name}: {$returned_comment}
</p>
<p>
  {$end_user_name} will correct the order and resubmit.
</p>
<p>
  You can view the order at this link: <a href=\"{$order_url}\">{$order_url}</a>.
</p>
<p>
  Have a great day!<br />
  <em>- Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";

		return $message;

	}

	/**
	 * The email body content for an approved order.
	 *
	 * @param int $post_id The post ID.
	 *
	 * @return string
	 */
	private function email_body_order_approved( $post_id ) {

		$program_id   = get_field( 'program', $post_id );
		$program_name = get_the_title( $program_id );
		$end_user_id  = get_field( 'order_author', $post_id );
		$user         = get_userdata( $end_user_id );
		$user_name    = $user->display_name;
		$message      = "<p>
	Howdy,
</p>
<p>
	The {$program_name} order for {$user_name} has been approved.
</p>
<p>
  Have a great day!<br />
  <em>- Liberal Arts IT</em>
</p>
<p><em>This email was sent from an unmonitored email address. Please do not reply to this email.</em></p>";

		return $message;

	}
}
