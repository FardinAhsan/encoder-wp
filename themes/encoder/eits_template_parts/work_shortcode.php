<?php

# Dynamic Portfolio With Shortcode
 
function cb_portfolio_shortcode($atts){
    extract( shortcode_atts( array(
            'category' => ''
    ), $atts, '' ) );
   
$q = new WP_Query(
    array('posts_per_page' => '-1', 'post_type' => 'work')
    );            
           

//Portfolio taxanomy query
    $args = array(
            'post_type' => 'work',
            'paged' => $paged,
            'posts_per_page' => -1,
    );

    $portfolio = new WP_Query($args);
    if(is_array($portfolio->posts) && !empty($portfolio->posts)) {
            foreach($portfolio->posts as $gallery_post) {
                    $post_taxs = wp_get_post_terms($gallery_post->ID, 'mixitup', array("fields" => "all"));
                    if(is_array($post_taxs) && !empty($post_taxs)) {
                            foreach($post_taxs as $post_tax) {
                                    $portfolio_taxs[$post_tax->slug] = $post_tax->name;
                            }
                    }
            }
    }
    if(is_array($portfolio_taxs) && !empty($portfolio_taxs) && get_post_meta($post->ID, 'pyre_portfolio_filters', true) != 'no'):
?>            

            <!--Category Filter-->
            <div class="category-filter">
                    <ul>
                        <?php foreach($portfolio_taxs as $portfolio_tax_slug => $portfolio_tax_name): ?>
                            <!-- <li class="filter" data-category="<?php $portfolio_tax_slug; ?>"><?php echo $portfolio_tax_name; ?></li> -->
                            <li>
                                <a class="nav-link" type="" data-filter=".<?php echo $portfolio_tax_slug; ?>"><?php echo $portfolio_tax_name; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
            </div>
            <!--End-->

            <?php endif; ?>

<?php

    $list = '<div class="portfolio-thumbnail"><div class="megafolio-container noborder">';
    while($q->have_posts()) : $q->the_post();
            $idd = get_the_ID();
            //$portfolio_subtitle = get_post_meta($idd, 'portfolio_subtitle', true);
            //$filterr = get_post_meta($idd, 'filterr', true);
            $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio_small_image' );
            //$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio_large_image' );
            //$small_image_url = the_post_thumbnail('project_smal_image', array('class' => 'post-thumb'));
           
            //Get Texanmy class
           
            $item_classes = '';
            $item_cats = get_the_terms($post->ID, 'mixitup');
            if($item_cats):
            foreach($item_cats as $item_cat) {
                    $item_classes .= $item_cat->slug . ' ';
            }
            endif;
                   
            $single_link =
            $list .= '    
         
                   <!--Thumbnail 1 Start-->
                   <div class="mega-entry '.$item_classes.'" id="" data-src="'.$small_image_url[0].'">
                         
                           <!--Hover Effect Start-->
                           <a class="" href="'.get_permalink().'">
                                   <div class="mega-hover alone notitle">
                                 
                                           <!-- Link Button -->
                                           <div class="mega-hoverview"></div>
                                           
                                   </div>
                           </a>
                           <!--Hover Effect End-->
                         
                   </div>
                 
           ';        
    endwhile;
    $list.= '</div></div>';
    wp_reset_query();
    return $list;
}
add_shortcode('work', 'cb_portfolio_shortcode');
