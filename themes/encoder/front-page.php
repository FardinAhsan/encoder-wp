
<?php get_header(); ?>
    <!-- ################## SLider Section #######################-->
    <section id="home">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">
            <!-- Carousel inner -->
            <?php
            $i = 1;
            $args = array(
                'status' => 'publish',
                'post_type' => 'post',
                'slug' => 'home-slider',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );
            $slide_query = new WP_Query($args);
            if ($slide_query->have_posts()) {
                ?>
                <div class="carousel-inner">
                    <?php while ($slide_query->have_posts()) : $slide_query->the_post();
                    ?>
                    <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>">
                        <!-- <img class="img-responsive" src="<?php the_post_thumbnail() ?>" alt="slider"> -->
                        <?php
                        the_post_thumbnail('', array('class' => 'img-responsive'));
                        ?>
                        <div class="slider-content">
                            <div class="col-md-12 text-center v-center">
                                <h2 class="animated2">
                                    <span><?php the_title() ?></span>
                                    <!-- <span>Welcome to <strong>Encoder IT Solution</strong></span> -->
                                </h2>
                                <h3 class="animated7">
                                    <span><?php the_content() ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--/ Carousel item end -->
                    <?php
                    $i++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php 
            } else {
                "nothing to show";
            }
            ?>
            <!-- Carousel inner end-->
            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- ################## Slider Section #######################-->

    <!-- our working progress section start-->
    <section class="working-progress-area">
        <div class="container">
            <!-- title area -->
            <div class="row">
                <div class="progress-area-title">
                    <div class="col-lg-8">
                        <h2>Our Working Progress</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, ea.Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Illo, ea</p>
                    </div>
                </div>
            </div>
            <!-- sikk area -->
            <div class="skills">
                <div class="row">
                <?php
                $args = array(
                    'status' => 'publish',
                    'post_type' => 'skill',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                );
                $skill_query = new WP_Query($args);
                if ($skill_query->have_posts()) {
                    while ($skill_query->have_posts()) : $skill_query->the_post();
                    $content = get_post_meta($post->ID, 'sk_chart_id', true);
                    ?>
                        <div class="col-lg-3">
                            <div class="single-skill">
                                <div class="chart" data-percent="<?php echo $content ?>" data-scale-color="#ffb400"><?php echo $content ?>%</div>
                                <h3><?php the_title(); ?></h3>
                            </div>
                        </div>
                <?php
                endwhile;
                wp_reset_postdata();
            } else {
                "nothing to show";
            }
            ?>
                </div>
            </div>

        </div>
    </section>
    <!-- our working progress section end-->

    <!-- testimonial area start -->
    <section class="testimonial-area">
        <div class="bg-overlay"></div>
        <div class="container">

            <div class="row">
                <div class="testimonial-area-title">

                    <div class="col-lg-8">
                        <h2>Feedback From Our Real Clients</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non iste optio molestias
                            tempore
                            reprehenderit eligendi voluptatum quo libero soluta perferendis?</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <div class="testimonial-content">
                            <div class="carousel-inner">
                            <?php
                            $i = 1;
                            $args = array(
                                'status' => 'publish',
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                            );
                            $t_query = new WP_Query($args);
                            if ($t_query->have_posts()) {

                                while ($t_query->have_posts()) : $t_query->the_post();
                                $position = get_post_meta($post->ID, 'sk_chart_id', true);
                                ?>
                                    <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>">
                                        <div class="single-testimonial item">
                                            <div class="single-testimonial-tumb">
                                                <!-- <img src="" alt=""> -->
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <span class="thumb-details"><?php the_content() ?></span>
                                            <div class="tumb-title">
                                                <h4><?php the_title() ?></h4>
                                                <p><?php echo $position ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                    endwhile;
                                    wp_reset_postdata();

                                } else {
                                    "something wrong";

                                }
                                ?>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->

    <!-- our portfolio section start -->
    <section class="portfolio-area">
        <div class="container">
            <div class="portfolio">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="portfolio-area-title">
                            <h2>Our Work</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, quisquam!
                                Laudantium
                                culpa
                                possimus ex rem!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="protfolio-nav">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link" type="" data-filter="all">All</a>
                                </li>
                            <?php
                            $argss = array(
                                'status' => 'publish',
                                'post_type' => 'work',
                                'posts_per_page' => -1,
                                'order' => 'ASC'
                            );

                            $mixitup_querys = new WP_Query($argss);
                            if(is_array($mixitup_querys->posts) && !empty($mixitup_querys->posts)){
                                foreach ($mixitup_querys->posts as $work_posts) {
                                    $taxs = wp_get_post_terms($work_posts->ID, 'mixitup', array("fields" => "all"));
                                    if (is_array($taxs) && !empty($taxs)) {
                                        foreach ($taxs as $tax) {
                                            $work_tax[$tax->slug]=$tax->name;
                                        }
                                    }

                                }
                            }

                            foreach($work_tax as $work_slug => $work_name):
                            ?>

                            <li class="nav-item">
                                <a class="nav-link" type="" data-filter=".<?php echo esc_attr($work_slug)?>"><?php echo esc_html($work_name) ?></a>
                            </li>
                            <?php
                             endforeach;
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php

                if ($mixitup_querys->have_posts()) {
                    while ($mixitup_querys->have_posts()) : $mixitup_querys->the_post();
                        $item_classs="";
                        $terms = get_the_terms(get_the_ID(),'mixitup');
                        if ($terms) {
                            foreach($terms as $term){
                                $item_classs.=$term->slug.' ';
                            }
                        }
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mix <?php echo $item_classs?>">
                        <div class="hovereffect">
                            <?php
                            the_post_thumbnail('', array('class' => 'img-responsive'));
                            ?>

                            <div class="overlay">
                                <h2><?php the_title() ?></h2>
                                <a class="info" href="#">Live Demo</a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            } else {
                "post not found";
            }
            ?>
                </div>
            </div>
        </div>
    </section>
    <!-- our portfolio section end -->

    <!-- ################## Start Our Services ################### -->
    <section id="what-we-do">
        <div class="container">
            <h2 class="section-title mb-2 h1">What we do</h2>
            <p class="text-center text-muted h5">Having and managing a correct marketing strategy is crucial in a fast
                moving market.</p>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-1">
                            <h3 class="card-title">Web design</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more">Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-2">
                            <h3 class="card-title">Back-end development</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more">Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-3">
                            <h3 class="card-title">Wordpress Website</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more">Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-4">
                            <h3 class="card-title">Responsive Design</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more">Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-5">
                            <h3 class="card-title">Front-end development</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more">Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-6">
                            <h3 class="card-title">Mobile Application</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void();" title="Read more" class="read-more">Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ################## End Our Services ################### -->

<?php get_footer(); ?>