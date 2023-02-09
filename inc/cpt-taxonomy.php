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

    return $title;
}
  
add_filter( 'enter_title_here', 'wpb_change_title_text' );