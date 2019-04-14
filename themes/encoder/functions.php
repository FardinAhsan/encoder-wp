<?php

(site_url() == 'http://localhost/encoder') ? define('VERSION', time()) : define('VERSION', wp_get_theme()->get('Version'));

function encoder_init(){

    load_theme_textdomain("encoder",get_theme_file_path('/languages'));
    register_nav_menus(
        array(
            'header_nav' => __('Header Nav', 'encoder'),
            'footer_nav' => __('Footer Nav', 'encoder'),
        )
    );
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('post-formats', array('standard', 'video', 'link', 'quote'));
    add_theme_support('html5', 'comment-list', 'comment-form', 'gallery', 'caption', 'search-form');
    add_theme_support('automatic-feed-links');

    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');

}
add_action('after_setup_theme','encoder_init');

function encoderIt_assets(){
    wp_enqueue_style('bootstrap',get_theme_file_uri('assets/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('font-awesome',get_theme_file_uri('assets/fa-fonts/css/all.css'));
    wp_enqueue_style('font-awesome',get_theme_file_uri('assets/css/animated.css'));
    wp_enqueue_style('slick-nav',get_theme_file_uri('assets/css/slicknav.css'));
    wp_enqueue_style('animated',get_theme_file_uri('assets/css/animated.css'));
    wp_enqueue_style('owl-carousel-min',get_theme_file_uri('assets/css/owl.carousel.min.css'));
    wp_enqueue_style('owl-carousel-default',get_theme_file_uri('assets/css/owl.theme.default.css'));
    wp_enqueue_style('main',get_stylesheet_uri());
    wp_enqueue_style('responsive',get_theme_file_uri('assets/css/responsive.css'));
    
    wp_enqueue_script('popper', get_theme_file_uri('assets/js/jquery.easypiechart.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('popper', get_theme_file_uri('assets/js/popper.min.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('bootstrap', get_theme_file_uri('assets/bootstrap/js/bootstrap.min.js'), array('popper'), 1.0, true);
    wp_enqueue_script('owl', get_theme_file_uri('assets/js/owl.carousel.min.js'), array('jquery'), 1.0,true);
    wp_enqueue_script('mixitup', get_theme_file_uri('assets/js/mixitup.min.js'), array('jquery'), 1.0,true);
    wp_enqueue_script('map', get_theme_file_uri('assets/js/map.js'), array('jquery'), 1.0,true);
    wp_enqueue_script('custom', get_theme_file_uri('assets/js/custom.js'), array('jquery'), 1.0,true);
    
}

add_action('wp_enqueue_scripts','encoderIt_assets');
