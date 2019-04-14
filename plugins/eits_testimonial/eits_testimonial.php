<?php
/*
Plugin Name: EITS Testimonial
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


function eits_testimonials_init(){

    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'all_items' => 'All Testimonials',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'not_found' => 'No Testimonials Found Here',
        'not_found_in_trash' => 'No Testimonials Found In trash',
        'search_items' => 'Search Testimonials',
        'featured_image' => 'Testimonial Cover',
        'set_featured_image' => 'Set Testimonial Cover'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonial'),
        'archive' => true,
        'supports' => array('title','editor', 'thumbnail', 'excerpt','author'),
        'hierarchical' => false,
        'capability_type' => 'post',
        'menu_position' => 12,
        'menu_icon' => 'dashicons-admin-tools',
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'eits_testimonials_init');
