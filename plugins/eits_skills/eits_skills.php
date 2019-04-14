<?php
/*
Plugin Name: EITS Working Progress
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


function eits_skills_init(){

    $labels = array(
        'name' => 'Skills',
        'singular_name' => 'Skill',
        'all_items' => 'All Skills',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Skill',
        'not_found' => 'No Skills Found Here',
        'not_found_in_trash' => 'No Skills Found In trash',
        'search_items' => 'Search Skills',
        'featured_image' => 'Skill Cover',
        'set_featured_image' => 'Set Skill Cover'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'skill'),
        'archive' => true,
        'supports' => array('title', 'thumbnail', 'excerpt','author'),
        'hierarchical' => false,
        'capability_type' => 'post',
        'menu_position' => 11,
        'menu_icon' => 'dashicons-admin-tools',
    );

    register_post_type('skill', $args);
}
add_action('init', 'eits_skills_init');
