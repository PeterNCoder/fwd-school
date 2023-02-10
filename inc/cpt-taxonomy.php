<?php

function fwd_register_custom_post_types() {

        $labels = array(
            'name'               => _x( 'Staff', 'post type general name' ),
            'singular_name'      => _x( 'Staff', 'post type singular name' ),
            'menu_name'          => _x( 'Staff', 'admin menu' ),
            'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'staff'  ),
            'add_new_item'       => __( 'Add New Staff'  ),
            'new_item'           => __( 'New Staff' ),
            'edit_item'          => __( 'Edit Staff' ),
            'view_item'          => __( 'View Staff' ),
            'all_items'          => __( 'All Staff'  ),
            'search_items'       => __( 'Search Staff' ),
            'parent_item_colon'  => __( 'Parent Staff:' ),
            'not_found'          => __( 'No staff found.' ),
            'not_found_in_trash' => __( 'No staff found in Trash.' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'staff'),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'menu_icon'          => 'dashicons-admin-users',
            'supports'           => array( 'title' )
        );

        register_post_type( 'fwd-staff', $args );

        $labels = array(
            'name'                  => _x( 'The Class', 'post type general name' ),
            'singular_name'         => _x( 'Student', 'post type singular name'),
            'menu_name'             => _x( 'Students', 'admin menu' ),
            'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
            'add_new'               => _x( 'Add New', 'student' ),
            'add_new_item'          => __( 'Add New Student' ),
            'new_item'              => __( 'New Student' ),
            'edit_item'             => __( 'Edit Student' ),
            'view_item'             => __( 'View Student' ),
            'all_items'             => __( 'All Students' ),
            'search_items'          => __( 'Search Students' ),
            'parent_item_colon'     => __( 'Parent Students:' ),
            'not_found'             => __( 'No students found.' ),
            'not_found_in_trash'    => __( 'No students found in Trash.' ),
            'archives'              => __( 'Student Archives'),
            'insert_into_item'      => __( 'Insert into student'),
            'uploaded_to_this_item' => __( 'Uploaded to this student'),
            'filter_item_list'      => __( 'Filter students list'),
            'items_list_navigation' => __( 'Students list navigation'),
            'items_list'            => __( 'Students list'),
            'featured_image'        => __( 'Student featured image'),
            'set_featured_image'    => __( 'Set student featured image'),
            'remove_featured_image' => __( 'Remove student featured image'),
            'use_featured_image'    => __( 'Use as featured image'),
        );
    
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'show_in_admin_bar'  => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'students' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-admin-users',
            'supports'           => array( 'title', 'thumbnail', 'editor' ),
            'template'           => array( 
                                        array( 'core/paragraph', array( 'placeholder' => 'Add new student...' ) ), 
                                        array( 'core/button',
                                            array(
                                                'text'      => 'Student Portfolio',
                                                'url'       => 'https://wp.bcitwebdeveloper.ca/',
                                                'className' => 'student-portfolio-btn',
                                            ),
                                        ),
                                    ),
            'template_lock'      => 'all',
        );
    
        register_post_type( 'fwd-students', $args );

}
add_action( 'init', 'fwd_register_custom_post_types' );

function fwd_register_taxonomies() {

    $labels = array(
        'name'              => _x( 'Staff Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Type' ),
        'all_items'         => __( 'All Staff Type' ),
        'parent_item'       => __( 'Staff Type Featured' ),
        'parent_item_colon' => __( 'Staff Type Featured:' ),
        'edit_item'         => __( 'Edit Staff Type' ),
        'update_item'       => __( 'Update Staff Type' ),
        'add_new_item'      => __( 'Add New Staff Type' ),
        'new_item_name'     => __( 'New Work Staff Type' ),
        'menu_name'         => __( 'Staff Type' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-type' ),
    );
    register_taxonomy( 'fwd-staff-type', array( 'fwd-staff' ), $args );

    $labels = array(
        'name'              => _x( 'Student Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Types' ),
        'all_items'         => __( 'All Student Type' ),
        'parent_item'       => __( 'Parent Student Type' ),
        'parent_item_colon' => __( 'Parent Student Type:' ),
        'edit_item'         => __( 'Edit Student Type' ),
        'view_item'         => __( 'View Student Type' ),
        'update_item'       => __( 'Update Student Type' ),
        'add_new_item'      => __( 'Add New Student Type' ),
        'new_item_name'     => __( 'New Student Type Name' ),
        'menu_name'         => __( 'Student Type' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-types' ),
    );
    register_taxonomy( 'fwd-student-types', array( 'fwd-students' ), $args );

}
add_action( 'init', 'fwd_register_taxonomies');

function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );

function wpb_change_title_text( $title ){
    $screen = get_current_screen();

    if  ( 'fwd-staff' == $screen->post_type ) {
         $title = 'Add Staff Name';
    }
    if  ( 'fwd-students' == $screen->post_type ) {
        $title = 'Add Student Name';
   }

    return $title;
}
  
add_filter( 'enter_title_here', 'wpb_change_title_text' );