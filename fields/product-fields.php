<?php
/**
 * The file that defines Advanced Custom Fields for the product post type.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/fields/product-fields.php
 * @author:    Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/fields
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

if(function_exists('acf_add_local_field_group') ) :

    acf_add_local_field_group(
        array(
        'key' => 'group_5fff75ac5fde3',
        'title' => 'Product Fields',
        'fields' => array(
        array(
        'key' => 'field_5fff76371ba19',
        'label' => 'Program',
        'name' => 'program',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
        ),
        'post_type' => array(
                0 => 'program',
        ),
        'taxonomy' => '',
        'allow_null' => 0,
        'multiple' => 0,
        'return_format' => 'object',
        'ui' => 1,
        ),
        array(
        'key' => 'field_600070f84dfe4',
        'label' => 'Description',
        'name' => 'description',
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
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
        ),
        array(
        'key' => 'field_600071044dfe5',
        'label' => 'Vendor',
        'name' => 'vendor',
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
        'key' => 'field_600071124dfe6',
        'label' => 'SKU',
        'name' => 'sku',
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
        'key' => 'field_5fff75b61ba16',
        'label' => 'Price',
        'name' => 'price',
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
        'key' => 'field_600071384dfe7',
        'label' => 'Visibility',
        'name' => 'visibility',
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
                    'key' => 'field_6012cfb50d556',
                    'label' => 'This product is bundle-only and should not be shown.',
                    'name' => 'bundle_only',
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
                array(
                    'key' => 'field_6012cfcb0d557',
                    'label' => 'This product is archived and should no longer be used.',
                    'name' => 'archived',
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
        array(
        'key' => 'field_600071e74dfe8',
        'label' => 'Descriptors',
        'name' => 'descriptors',
        'type' => 'wysiwyg',
        'instructions' => 'These will display in the product\'s More Info pop-up window',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'delay' => 0,
        ),
        ),
        'location' => array(
        array(
        array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'product',
        ),
        ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        )
    );

endif;
