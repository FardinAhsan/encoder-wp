<?php
/*
Plugin Name: EITS Metabox
Plugin URI: https://github.com/sntv_metabox
Description: this plugin is for creating a simeple title box for getting video id
Version: 1.0
Author: Encoder IT Solution
Author URI: http://encoderitsolution.net
License: GNU
License URI: gnu.org
Text Domain: encoder
Domain Path:  /languages
 */

if (!defined('ABSPATH')) {
    die("die");
}

function eits_skill_meatabox(){

    $types = array('skill', 'testimonial');

    // for skill post type
    if (in_array('skill', $types)) {
        add_meta_box(
            "eits_chart_val",
            "Set Skills Chart Value",
            "eits_chart_fields",
            "skill",
            "normal",
            "high"
        );
    }
    // testimonial post type
    if (in_array('testimonial',$types)) {
        add_meta_box(
            "eits_chart_val",
            "Set Client Position",
            "eits_chart_fields",
            "testimonial",
            "normal",
            "high"
        );
    }

}
add_action("add_meta_boxes", "eits_skill_meatabox");
$pre = 'sk_';
$fields = array(
    array(
        'id' => $pre . 'chart_id',
        'type' => 'text',
        'label' => 'Chart Value',
        'decs' => 'Insert Your Chart value Inside the box',
    ),
);

function eits_chart_fields(){
    global $fields, $post;
    wp_nonce_field('skill_nonce_action', 'skill_nonce_name');

    echo "<div>";
    foreach ($fields as $vf) {
        $eits_meta = get_post_meta($post->ID, $vf['id'], true);
        switch ($vf['type']) :
            case 'text':
            echo "<div class='form-group'>";
            // printf('<p><label>%s</label></p>', $vf["label"]);
            printf('<input type="%s" name="%s" id="%s" class="form-control" value="%s">', $vf["type"], $vf["id"], $vf["id"], $eits_meta);
            echo "</div>";
            break;
        endswitch;
    }
    echo "</div>";
}

function save_eits_meta_value($post_id){

    global $fields;

    $nonce = (isset($_POST['skill_nonce_name'])) ? $_POST['skill_nonce_name'] : '';
    if ('' == $nonce) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['skill_nonce_name'], 'skill_nonce_action')) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    if (wp_is_post_autosave($post_id)) {
        return $post_id;
    }

    if (wp_is_post_revision($post_id)) {
        return $post_id;
    }

    foreach ($fields as $vf) {
        $old = get_post_meta($post_id, $vf['id'], true);
        $new = (isset($_POST[$vf['id']])) ? sanitize_text_field($_POST[$vf['id']]) : "";

        if ('' == $new) {
            delete_post_meta($post_id, $vf['id'], $old);
        }

        if ($new) {
            update_post_meta($post_id, $vf['id'], $new);
        }

    }

}
add_action("save_post", "save_eits_meta_value");
