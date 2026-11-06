<?php
/**
 * Custom Post Types & Taxonomies Registration
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function quadro_register_custom_post_types() {

    // 1. Team Member Custom Post Type
    $member_labels = array(
        'name'                  => _x('Team Members', 'Post type general name', 'quadro'),
        'singular_name'         => _x('Team Member', 'Post type singular name', 'quadro'),
        'menu_name'             => _x('Team Members', 'Admin Menu text', 'quadro'),
        'name_admin_bar'        => _x('Team Member', 'Add New on Toolbar', 'quadro'),
        'add_new'               => __('Add New Member', 'quadro'),
        'add_new_item'          => __('Add New Team Member', 'quadro'),
        'new_item'              => __('New Team Member', 'quadro'),
        'edit_item'             => __('Edit Team Member', 'quadro'),
        'view_item'             => __('View Team Member', 'quadro'),
        'all_items'             => __('All Team Members', 'quadro'),
        'search_items'          => __('Search Team Members', 'quadro'),
        'parent_item_colon'     => __('Parent Team Members:', 'quadro'),
        'not_found'             => __('No team members found.', 'quadro'),
        'not_found_in_trash'    => __('No team members found in Trash.', 'quadro'),
        'featured_image'        => _x('Member Profile Photo', 'Overrides the “Featured Image” phrase', 'quadro'),
        'set_featured_image'    => _x('Set profile photo', 'Overrides the “Set featured image” phrase', 'quadro'),
        'remove_featured_image' => _x('Remove profile photo', 'Overrides the “Remove featured image” phrase', 'quadro'),
        'use_featured_image'    => _x('Use as profile photo', 'Overrides the “Use as featured image” phrase', 'quadro'),
    );

    $member_args = array(
        'labels'             => $member_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team-members', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('team_member', $member_args);

    // 2. Portfolio Project Custom Post Type
    $project_labels = array(
        'name'                  => _x('Projects', 'Post type general name', 'quadro'),
        'singular_name'         => _x('Project', 'Post type singular name', 'quadro'),
        'menu_name'             => _x('Projects', 'Admin Menu text', 'quadro'),
        'name_admin_bar'        => _x('Project', 'Add New on Toolbar', 'quadro'),
        'add_new'               => __('Add New Project', 'quadro'),
        'add_new_item'          => __('Add New Project', 'quadro'),
        'new_item'              => __('New Project', 'quadro'),
        'edit_item'             => __('Edit Project', 'quadro'),
        'view_item'             => __('View Project', 'quadro'),
        'all_items'             => __('All Projects', 'quadro'),
        'search_items'          => __('Search Projects', 'quadro'),
        'not_found'             => __('No projects found.', 'quadro'),
        'not_found_in_trash'    => __('No projects found in Trash.', 'quadro'),
        'featured_image'        => _x('Project Showcase Mockup', 'Overrides the “Featured Image” phrase', 'quadro'),
        'set_featured_image'    => _x('Set project mockup', 'Overrides the “Set featured image” phrase', 'quadro'),
        'remove_featured_image' => _x('Remove project mockup', 'Overrides the “Remove featured image” phrase', 'quadro'),
        'use_featured_image'    => _x('Use as project mockup', 'Overrides the “Use as featured image” phrase', 'quadro'),
    );

    $project_args = array(
        'labels'             => $project_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('portfolio_project', $project_args);

    // 3. Taxonomies for Projects: Project Category
    $cat_labels = array(
        'name'              => _x('Project Categories', 'taxonomy general name', 'quadro'),
        'singular_name'     => _x('Project Category', 'taxonomy singular name', 'quadro'),
        'search_items'      => __('Search Categories', 'quadro'),
        'all_items'         => __('All Categories', 'quadro'),
        'parent_item'       => __('Parent Category', 'quadro'),
        'parent_item_colon' => __('Parent Category:', 'quadro'),
        'edit_item'         => __('Edit Category', 'quadro'),
        'update_item'       => __('Update Category', 'quadro'),
        'add_new_item'      => __('Add New Category', 'quadro'),
        'new_item_name'     => __('New Category Name', 'quadro'),
        'menu_name'         => __('Categories', 'quadro'),
    );

    register_taxonomy('project_category', array('portfolio_project'), array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_in_rest'      => true,
    ));

    // 4. Taxonomies for Team: Member Roles
    $role_labels = array(
        'name'              => _x('Member Roles', 'taxonomy general name', 'quadro'),
        'singular_name'     => _x('Member Role', 'taxonomy singular name', 'quadro'),
        'search_items'      => __('Search Roles', 'quadro'),
        'all_items'         => __('All Roles', 'quadro'),
        'edit_item'         => __('Edit Role', 'quadro'),
        'update_item'       => __('Update Role', 'quadro'),
        'add_new_item'      => __('Add New Role', 'quadro'),
        'new_item_name'     => __('New Role Name', 'quadro'),
        'menu_name'         => __('Roles', 'quadro'),
    );

    register_taxonomy('member_role', array('team_member'), array(
        'hierarchical'      => true,
        'labels'            => $role_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'member-role'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'quadro_register_custom_post_types');

