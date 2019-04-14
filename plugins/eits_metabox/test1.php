<?php 


if(!defined('ABSPATH')){
    die("Sorry Guys, You'r in Wrong Turn");
}


function sntv_video_metabox(){
    add_meta_box('sntv_yt_id', 'Set Youtube Video ID', 'sntv_video_fields', 'video', 'normal', 'high');
}
add_action('add_meta_boxes', 'sntv_video_metabox');



$pre = 'ytd_';

$video_fields = array(
    array(
        'id' => $pre.'video_id',
        'type' => 'text',
        'label' => 'Youtube Video ID',
        'desc' => 'Insert Your Video Id inside the box',
    ),
);



function sntv_video_fields(){
    global $post, $video_fields;
    printf('<input type="hidden" name="%s" value="%s">','sntv_metabox_nonce', wp_create_nonce(basename(__FILE__)));    

    echo "<div>";
        foreach($video_fields as $vf){

            $sntv_meta = get_post_meta($post->ID, $vf['id'], true);

            switch($vf['type']):                
                case 'text' :
                echo '<div>';
                    printf('<p><label>%s</label></p>', $vf["label"] );
                    printf('<input type="%s" name="%s" id="%s" class="form-control" value="%s">', $vf['type'], $vf['id'], $vf['id'],$sntv_meta);
                echo '</div>';
                break;

            endswitch;
        }
    echo "</div>";
}


function save_sntv_meta_value($post_id){
    global $video_fields;

    if (!isset( $_POST['sntv_metabox_nonce'] ) ) {
        return $post_id;
    }

    if(!wp_verify_nonce( $_POST['sntv_metabox_nonce'], basename(__FILE__) ) ){
        return $post_id;
    }

    if(defined('DOING_AUTOSAVE')  && DOING_AUTOSAVE){
        return $post_id;
    }

    if(!current_user_can('edit_post', $post_id) ){
        return $post_id;
    }

    foreach($video_fields as $vf ){
        $old = get_post_meta($post_id, $vf['id'], true);
        $new = $_POST[$vf['id']];

        if($new && $old != $new ){
            update_post_meta($post_id, $vf['id'], $new);
        }elseif( '' == $new && $old){
            delete_post_meta($post_id, $vf['id'], $old);
        }

    }

}
add_action('save_post', 'save_sntv_meta_value');