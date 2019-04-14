<?php

    $cssdir = '\assets\css';
    $all_css_dir = 'assets/css';
    $css_scan_dir = __DIR__ . $cssdir;


    $cssfiles = array_diff(scandir($css_scan_dir), array(".", ".."));

    foreach ($cssfiles as $file) :
        printf('wp_enqueue_style("%s", get_theme_file_uri("%s/%s"), array(), null, all);', str_replace(".", "_", $file), $all_css_dir, $file);
    echo "\n";
    endforeach;


    echo "\n";
    echo "\n";
    echo "\n";
    echo "\n";
    echo "\n";


    $jsdir = "\assets\js";
    $all_js_dir = "assets/js";
    $js_scan_dir = __DIR__ . $jsdir;
    $jsfiles = array_diff(scandir($js_scan_dir), array(".", ".."));

    foreach ($jsfiles as $file) :
        printf('wp_enqueue_script("%s", get_theme_file_uri("%s/%s"), array("jquery"), null, true);', str_replace(".", "_", $file), $all_js_dir, $file);
    echo "\n";
    endforeach;