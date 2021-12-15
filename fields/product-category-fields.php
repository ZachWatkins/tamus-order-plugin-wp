<?php
/**
 * The file that defines Advanced Custom Fields for the product post type.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/fields/product-category-fields.php
 * @author:    Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/fields
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_60009dda65a8c',
			'title'                 => 'Product Category Fields',
			'fields'                => array(
				array(
					'key'               => 'field_60009de58de3b',
					'label'             => 'Program',
					'name'              => 'program',
					'type'              => 'post_object',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'post_type'         => array(
						0 => 'program',
					),
					'taxonomy'          => '',
					'allow_null'        => 0,
					'multiple'          => 0,
					'return_format'     => 'object',
					'ui'                => 1,
				),
				array(
					'key'               => 'field_60009e658de3c',
					'label'             => 'Display Order',
					'name'              => 'display_order',
					'type'              => 'post_object',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'post_type'         => array(
						0 => 'product',
					),
					'taxonomy'          => '',
					'allow_null'        => 0,
					'multiple'          => 0,
					'return_format'     => 'object',
					'ui'                => 1,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'product-category',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		)
	);

endif;
