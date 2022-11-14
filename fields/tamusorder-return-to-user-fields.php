<?php
/**
 * The file that defines Advanced Custom Fields for returning the order to the end user.
 *
 * @link       https://github.com/zachwatkins/tamus-order-plugin-wp/blob/master/fields/tamusorder-return-to-user-fields.php
 * @author:    Zachary Watkins <zwatkins2@tamu.edu>
 * @since      1.0.0
 * @package    tamus-order-plugin-wp
 * @subpackage tamus-order-plugin-wp/fields
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License v2.0 or later
 */

if(function_exists('acf_add_local_field_group') ) :

    acf_add_local_field_group(
        array(
        'key' => 'group_601d52d563efc',
        'title' => 'Return to User',
        'fields' => array(
        array(
        'key' => 'field_601d52f2e5418',
        'label' => 'Comments',
        'name' => 'returned_comments',
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
        ),
        'location' => array(
        array(
        array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tamusorder',
        ),
        array(
                'param' => 'current_user_role',
                'operator' => '==',
                'value' => 'wso_it_rep',
        ),
        ),
        array(
        array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tamusorder',
        ),
        array(
                'param' => 'current_user_role',
                'operator' => '==',
                'value' => 'wso_business_admin',
        ),
        ),
        array(
        array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tamusorder',
        ),
        array(
                'param' => 'current_user_role',
                'operator' => '==',
                'value' => 'logistics',
        ),
        ),
        array(
        array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tamusorder',
        ),
        array(
                'param' => 'current_user_role',
                'operator' => '==',
                'value' => 'wso_logistics_admin',
        ),
        ),
        array(
        array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tamusorder',
        ),
        array(
                'param' => 'current_user_role',
                'operator' => '==',
                'value' => 'wso_admin',
        ),
        ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        )
    );

endif;
