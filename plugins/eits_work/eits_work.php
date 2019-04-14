<?php
/*
Plugin Name: EITS Work
Plugin URI: http://github.com/plugin_companion
Description: It is a companion plugin for any wordpress theme
Version: 1.0
Author: encoderitsolution
Author URI: http://encoderitsolution.net
License: GNU
License URI: http://gnu.org
Text Domain: encoder
Domain Path:  '/languages'
*/


function eits_works(){
    $singularName="work";
    $pluralName="works";
    $labels = array(
        'name' => $pluralName,
        'singular_name' => $singularName,
        'all_items' => 'All '.$pluralName,
        'add_new' => 'Add New',
        'add_new_item' => 'Add New '.$singularName,
        'not_found' => 'No '.$pluralName.' Found Here',
        'not_found_in_trash' => 'No '.$pluralName.' Found In trash',
        'search_items' => 'Search '.$pluralName,
        'featured_image' => $singularName.' Cover',
        'set_featured_image' => 'Set '.$singularName.' Cover'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $singularName),
        'archive' => true,
        'supports' => array('title','editor', 'thumbnail', 'excerpt','author'),
        'hierarchical' => false,
        'capability_type' => 'post',
        'menu_position' => 14,
        'menu_icon' => 'dashicons-video-alt',
    );

    register_post_type($singularName, $args);
}
add_action('init', 'eits_works');

function eits_create_taxonomies(){
    $singularName="mixitup";
    $pluralName="mixitups";
    $post_type="work";

    $label = array(
        'name' => _x($pluralName, '', 'code_companion'),
        'singular_name' => _x($singularName, '', 'code_companion'),
        'search_items' => _x('Search '.$pluralName, '', 'code_companion'),
        'all_items' => _x('All '.$pluralName, '', 'code_companion'),
        'add_new_item' => _x('Add New '.$singularName, '', 'code_companion'),
        'parent_item' => _x('Parent '.$singularName, '', 'code_companion'),
        'parent_item_colon' => _x('Parent '.$singularName.':', '', 'code_companion'),
        'menu_name' => _x($singularName, '', 'code_companion'),
        'new_item_name' => _x('New '.$singularName, '', 'code_companion'),
        'edit_item' => _x('Edit '.$singularName, '', 'code_companion'),
        'update_item' => _x('Update Genre', '', 'code_companion'),
        'not_found' => _x('No '.$pluralName.' found', '', 'code_companion'),
    );
    $args = array(
        'labels' => $label,
        'public' => true,
        'show_in_nav_menus'=>true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $singularName),
    );
    register_taxonomy($singularName, $post_type, $args);
};
add_action('init', 'eits_create_taxonomies');