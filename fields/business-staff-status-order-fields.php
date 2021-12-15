<?php
/**
 * The file that defines Advanced Custom Fields for the order post type's business staff status fields.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/fields/business-staff-status-order-fields.php
 * @author:    Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/fields
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5fff6ec0e01ee',
	'title' => 'Business Staff Status',
	'fields' => array(
		array(
			'key' => 'field_5fff6ec0e2f7e',
			'label' => 'Business Staff Status',
			'name' => 'business_staff_status',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5fff70b84ffe4',
					'label' => 'Business Staff',
					'name' => 'business_staff',
					'type' => 'user',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'role' => array(
						0 => 'wso_business_admin',
					),
					'allow_null' => 1,
					'multiple' => 0,
					'return_format' => 'array',
				),
				array(
					'key' => 'field_601d646e59d65',
					'label' => 'Comments',
					'name' => 'comments',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5fff70b84ffe4',
								'operator' => '!=empty',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_601d731345341',
					'label' => 'Account Number',
					'name' => 'account_number',
					'type' => 'text',
					'instructions' => 'You must enter the correct business account number before you can confirm the order.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5fff70b84ffe4',
								'operator' => '!=empty',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5fff6ec0e4385',
					'label' => 'Confirm your approval of this work order and send it on to the IT Logistics staff member',
					'name' => 'confirmed',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 0,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'current_user_role',
				'operator' => '==',
				'value' => 'wso_business_admin',
			),
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tamusorder',
			),
		),
		array(
			array(
				'param' => 'current_user_role',
				'operator' => '==',
				'value' => 'logistics',
			),
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tamusorder',
			),
		),
		array(
			array(
				'param' => 'current_user_role',
				'operator' => '==',
				'value' => 'logistics_admin',
			),
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tamusorder',
			),
		),
		array(
			array(
				'param' => 'current_user_role',
				'operator' => '==',
				'value' => 'wso_admin',
			),
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tamusorder',
			),
		),
	),
	'menu_order' => 5,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
