<?php
/**
 * The file that defines Advanced Custom Fields for the program post type.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/fields/program-fields.php
 * @author:    Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/src
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

if( function_exists('acf_add_local_field_group') ):
	
	$subfield = array(
		'key'   => 'field_6009cxxxxxxxx',
		'label' => '{Title}',
		'name'  => '{slug}',
		'type'  => 'group',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'layout' => 'block',
		'sub_fields' => array(
			array(
				'key'   => 'field_6009cxxxxxxxx',
				'label' => 'Department',
				'name'  => 'department_post_id',
				'type'  => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'post_type' => array(
					0 => 'department',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple'   => 0,
				'return_format' => 'id',
				'ui' => 1,
			),
			array(
				'key' => 'field_6009cxxxxxxxx',
				'label' => 'IT Representatives',
				'name' => 'it_reps',
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
					0 => 'wso_it_rep',
				),
				'allow_null' => 0,
				'multiple' => 1,
				'return_format' => 'id',
			),
			array(
				'key' => 'field_6009cxxxxxxxx',
				'label' => 'Business Admins',
				'name' => 'business_admins',
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
				'allow_null' => 0,
				'multiple' => 1,
				'return_format' => 'id',
			),
		),
	);

	// Build each department subfield from the Department posts.
	$department_objs = new \WP_Query( array(
		'post_type' => 'department',
	) );
	$departments = array();
	foreach ( $department_objs->posts as $key => $dept_post ) {
		$departments[ $key ] = array(
			'label' => get_the_title( $dept_post ),
			'name' => get_post_field( 'post_name', $dept_post ),
			'default_value' => $dept_post,
		);
	}
	$department_subfields = array();
	foreach ( $departments as $department ) {
		$dept_subfield = $subfield;
		// Change the subfield label.
		// Change the name.
		foreach ( $department as $key => $value ) {
			$dept_subfield[ $key ] = $value;
		}
		// Randomize the keys.
		$dept_subfield['key'] = 'field_' . uniqid();
		foreach ( $dept_subfield['sub_fields'] as $key => $subsubfield ) {
			$dept_subfield['sub_fields'][ $key ]['key'] = 'field_' . uniqid();
		}
		$department_subfields[] = $dept_subfield;
	}

	acf_add_local_field_group(array(
		'key' => 'group_5fff77f0910ae',
		'title' => 'Program Fields',
		'fields' => array(
			array(
				'key' => 'field_5fff77faa4987',
				'label' => 'Prefix',
				'name' => 'prefix',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => 16,
			),
			array(
				'key' => 'field_5fff7813a4988',
				'label' => 'Allocation',
				'name' => 'allocation',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '$',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5fff781da4989',
				'label' => 'Threshold',
				'name' => 'threshold',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '$',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_6006f98dc985f',
				'label' => 'Fiscal Year',
				'name' => 'fiscal_year',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
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
				'key' => 'field_6006fa173dcf0',
				'label' => 'Callouts',
				'name' => 'callouts',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 3,
				'layout' => 'row',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_6006fa253dcf1',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => 300,
					),
					array(
						'key' => 'field_6006fa393dcf2',
						'label' => 'Body',
						'name' => 'body',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => 500,
						'rows' => '',
						'new_lines' => '',
					),
				),
			),
			array(
				'key' => 'field_616dbd8b65666',
				'label' => 'Product Category Order',
				'name' => 'product_category_order',
				'type' => 'repeater',
				'instructions' => 'Click & drag each Category\'s handle to change the display order',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_616dc0bd65667',
						'label' => 'Product Category',
						'name' => 'product_category_term',
						'type' => 'taxonomy',
						'instructions' => 'Select a Product Category',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'product-category',
						'field_type' => 'select',
						'allow_null' => 0,
						'add_term' => 0,
						'save_terms' => 0,
						'load_terms' => 0,
						'return_format' => 'id',
						'multiple' => 0,
					),
				),
			),
			array(
				'key' => 'field_6009c1879d09b',
				'label' => 'Assignments',
				'name' => 'assign',
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
				'sub_fields' => $department_subfields,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'program',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;
