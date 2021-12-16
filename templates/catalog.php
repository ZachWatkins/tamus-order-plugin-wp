<?php
/**
 * The file that renders the catalog template
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/templates/catalog.php
 * @author     Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/templates
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

/**
 * Registers and enqueues template styles.
 *
 * @since 1.0.0
 * @return void
 */
function tamus_workstation_order_form_styles() {

	wp_register_style(
		'tamus-order-plugin-wp-form-template',
		TAMUS_ORDER_DIR_URL . 'css/order-form-template.css',
		false,
		filemtime( TAMUS_ORDER_DIR_PATH . 'css/order-form-template.css' ),
		'screen'
	);

	wp_enqueue_style( 'tamus-order-plugin-wp-form-template' );

}
add_action( 'wp_enqueue_scripts', 'tamus_workstation_order_form_styles', 1 );

/**
 * Registers and enqueues template scripts.
 *
 * @since 1.0.0
 * @return void
 */
function tamus_workstation_order_form_scripts() {

	if ( ! is_user_logged_in() ) {
		return;
	}

	wp_register_script(
		'tamus-order-plugin-wp-form-scripts',
		TAMUS_ORDER_DIR_URL . 'js/order-form.js',
		false,
		filemtime( TAMUS_ORDER_DIR_PATH . 'js/order-form.js' ),
		'screen'
	);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tamus-order-plugin-wp-form-scripts' );

}
add_action( 'wp_enqueue_scripts', 'tamus_workstation_order_form_scripts', 1 );

add_action( 'the_content', function(){

	if ( ! is_user_logged_in() ) {
		return;
	}

	/**
	 * Get the Form Helper class.
	 */
	require_once TAMUS_ORDER_DIR_PATH . 'src/class-order-form-helper.php';
	$form_helper = new \TAMUS\Order\Order_Form_Helper();

	/**
	 * Get product categories.
	 */
	$apple_list  = $form_helper->get_products( 'apple', false, true );
	$pc_list     = $form_helper->get_products( 'pc', false, true );
	$addons_list = $form_helper->get_products( 'add-on', false, true );
	$output = "<div id=\"tamus-order-form\"><div id=\"products\" class=\"cell small-12 medium-auto\">{$apple_list}{$pc_list}{$addons_list}</div></div>";
	echo $output;
});

genesis();
