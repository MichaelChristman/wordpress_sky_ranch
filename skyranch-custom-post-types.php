<?php

/**********************************************************************
 *
 * Custom Post Types
 * 
 ***********************************************************************/

//register post types
function skyranch_custom_post_types() {
    $forwardLabels = [
        'name'               => 'Forward',
        'singular_name'      => 'Forward',
        'menu_name'          => 'Forward',
        'name_admin_bar'     => 'Forward',
        'add_new'            => 'Add New Forward',
        'add_new_item'       => 'Add New Forward',
        'new_item'           => 'New Forward',
        'edit_item'          => 'Edit Forward',
        'view_item'          => 'View Forward',
        'all_items'          => 'All Forward',
        'search_items'       => 'Search Forward',
        'not_found'          => 'No Forward found',
        'not_found_in_trash' => 'No Forward found in trash'
    ];

    $forwardArgs = [
        'labels'             => $forwardLabels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-editor-textcolor',
        'rewrite'            => array('slug'=> 'forward'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt',
                                'page-attributes', 'post-formats')

    ];
    register_post_type('forward',  $forwardArgs);
    
    $modelLabels = [
        'name'               => 'Models',
        'singular_name'      => 'Model',
        'menu_name'          => 'Models',
        'name_admin_bar'     => 'Model',
        'add_new'            => 'Add New Model',
        'add_new_item'       => 'Add New Model',
        'new_item'           => 'New Model',
        'edit_item'          => 'Edit Model',
        'view_item'          => 'View Model',
        'all_items'          => 'All Models',
        'search_items'       => 'Search Models',
        'not_found'          => 'No Models found',
        'not_found_in_trash' => 'No Models found in trash'
    ];

    $modelArgs = [
        'labels'             => $modelLabels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-store',
        'rewrite'            => array('slug'=> 'model'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt',
                                'page-attributes', 'post-formats')

    ];
    register_post_type('model',  $modelArgs);
    
    $contactInfoLabels = [
        'name'               => 'Contact Info',
        'singular_name'      => 'Contact Info',
        'menu_name'          => 'Contact Info',
        'name_admin_bar'     => 'Contact Info',
        'add_new'            => 'Add New Contact Info',
        'add_new_item'       => 'Add New Contact Info',
        'new_item'           => 'New Contact Info',
        'edit_item'          => 'Edit Contact Info',
        'view_item'          => 'View Contact Info',
        'all_items'          => 'All Contact Info',
        'search_items'       => 'Search Contact Info',
        'not_found'          => 'No Contact Info found',
        'not_found_in_trash' => 'No Contact Info found in trash'
    ];

    $contactInfoArgs = [
        'labels'             => $contactInfoLabels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-testimonial',
        'rewrite'            => array('slug'=> 'contact-info'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'page-attributes', 'post-formats')

    ];
    register_post_type('contact-info',  $contactInfoArgs);
}
add_action('init', 'skyranch_custom_post_types');