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

if(function_exists('acf_add_local_field_group') ) :

    acf_add_local_field_group(
        array(
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
                'sub_fields' => array(
                    array(
                        'key' => 'field_6009c33c9d0ab',
                        'label' => 'Network and Information Systems',
                        'name' => 'network_and_information_systems',
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
                                'key' => 'field_6009c5780f28b',
                                'label' => 'Department',
                                'name' => 'department_post_id',
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
                                    0 => 'department',
                                ),
                                'taxonomy' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                                'return_format' => 'id',
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_6009c33c9d0ac',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_6009c33c9d0ad',
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
                                'return_format' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_6009c1ac9d09c',
                        'label' => 'Communications',
                        'name' => 'communications',
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
                                'key' => 'field_6009c4a40f286',
                                'label' => 'Department',
                                'name' => 'department_post_id',
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
                                    0 => 'department',
                                ),
                                'taxonomy' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                                'return_format' => 'id',
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_6009c2389d09d',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_6009c2aa9d09e',
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
                                'return_format' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_6009c2e99d09f',
                        'label' => 'Research and Development',
                        'name' => 'research_and_development',
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
                                'key' => 'field_6009c5020f287',
                                'label' => 'Department',
                                'name' => 'department_post_id',
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
                                    0 => 'department',
                                ),
                                'taxonomy' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                                'return_format' => 'id',
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_6009c2e99d0a0',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_6009c2e99d0a1',
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
                                'return_format' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_6009c2fa9d0a2',
                        'label' => 'Facilities',
                        'name' => 'facilities',
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
                                'key' => 'field_6009c5290f288',
                                'label' => 'Department',
                                'name' => 'department_post_id',
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
                                    0 => 'department',
                                ),
                                'taxonomy' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                                'return_format' => 'id',
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_6009c2fa9d0a3',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_6009c2fa9d0a4',
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
                                'return_format' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_6009c31f9d0a5',
                        'label' => 'Events Management',
                        'name' => 'events_management',
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
                                'key' => 'field_6009c5470f289',
                                'label' => 'Department',
                                'name' => 'department_post_id',
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
                                    0 => 'department',
                                ),
                                'taxonomy' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                                'return_format' => 'id',
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_6009c31f9d0a6',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_6009c31f9d0a7',
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
                                'return_format' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_6009c32a9d0a8',
                        'label' => 'Finance',
                        'name' => 'finance',
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
                                'key' => 'field_6009c55f0f28a',
                                'label' => 'Department',
                                'name' => 'department_post_id',
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
                                    0 => 'department',
                                ),
                                'taxonomy' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                                'return_format' => 'id',
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_6009c32a9d0a9',
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
                                'return_format' => '',
                            ),
                            array(
                                'key' => 'field_6009c32a9d0aa',
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
                                'return_format' => '',
                            ),
                        ),
                    ),
                ),
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
        'show_in_rest' => 0,
        )
    );
    
endif;
