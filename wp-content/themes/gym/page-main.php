<?php
/*
Template Name: Шаблон для страницы MAIN
*/
    get_header();
?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
            <div class="hs-slider owl-carousel">
                <?php
                    $args = array(
                        'post_type' => 'main-slider',
                        'order' => 'ASC'
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) :
                        $query->the_post();
                        //$posts = $query->posts;
                ?>

                <div class="hs-item set-bg" data-setbg="<?php echo get_field('slider_pic');?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <div class="hi-text">
                                    <span><?php echo get_field('slider_sub_title'); ?></span>
                                    <h1><?php echo get_field('slider_title'); ?></h1>
                                    <a href="<?php echo get_post_type_archive_link('services');?>" target="_blank" class="primary-btn">
                                        <?php echo get_field('slider_button'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>

    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Why choose us?</span>
                    <h2>PUSH YOUR LIMITS FORWARD</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                if ( is_active_sidebar('gym-choose-us') ) {
                    dynamic_sidebar('gym-choose-us');
                }
            ?>
        </div>
    </div>
</section>
    <!-- ChoseUs Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Classes</span>
                        <h2>WHAT WE CAN OFFER</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="<?php echo gym_assets_path('img/classes/class-1.jpg'); ?>" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Strenght</span>
                            <h5>Weightlifting</h5>
                            <a href="<?php echo get_post_type_archive_link('classes') . 'strenght';?>" target="_blank"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="<?php echo gym_assets_path('img/classes/class-2.jpg'); ?>" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Cardio</span>
                            <h5>Indoor cycling</h5>
                            <a href="<?php echo get_post_type_archive_link('classes') . 'cardio';?>" target="_blank"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="<?php echo gym_assets_path('img/classes/class-3.jpg'); ?>" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Bodybuilding</span>
                            <h5>Kettlebell power</h5>
                            <a href="<?php echo get_post_type_archive_link('classes') . 'bodybuilding';?>" target="_blank"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="<?php echo gym_assets_path('img/classes/class-4.jpg'); ?>" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Fitness</span>
                            <h4>Indoor cycling</h4>
                            <a href="<?php echo get_post_type_archive_link('classes') . 'fitness';?>" target="_blank"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="<?php echo gym_assets_path('img/classes/class-5.jpg'); ?>" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Training</span>
                            <h4>Boxing</h4>
                            <a href="<?php echo get_post_type_archive_link('classes') . 'training';?>" target="_blank"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="<?php echo gym_assets_path('img/banner-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <?php
                            if ( is_active_sidebar('gym-appointment-index') ) {
                                dynamic_sidebar('gym-appointment-index');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                    $args = array(
                        'post_type' => 'tarif',
                        'order' => 'ASC'
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) :
                        $query->the_post();

                        $tarif_services = get_field('tarif_services');
                        $tarif_services = explode("\n", $tarif_services);

                ?>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3><?php echo get_field('tarif_title'); ?></h3>
                        <div class="pi-price">
                            <h2>$<?php echo get_field('tarif_price'); ?></h2>
                            <span><?php echo get_field('tarif_class'); ?></span>
                        </div>
                        <ul>
                            <?php foreach ( $tarif_services as $item) : ?>
                            <li><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a
                            href="#modal-form"
                            data-post-id="<?php echo $id;?>"
                            class="primary-btn pricing-btn"
                            onclick="return modalOpen(this);"
                        >
                            Enroll now
                        </a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->


    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>TRAIN WITH EXPERTS</h2>
                        </div>
                        <a href="#modal-form" class="primary-btn btn-normal appoinment-btn" onclick="return modalOpen();">appointment</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
                    <?php
                        $args = array(
                            'post_type' => 'trainers',
                            'order' => 'ASC'
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                //$posts = $query->posts;
                    ?>

                    <div class="col-lg-4">
                        <div class="ts-item set-bg" data-setbg="<?php echo get_field('trainer_foto')['url'];?>">
                            <div class="ts_text">
                                <h4><?php echo get_field('trainers_name'); ?></h4>
                                <span><?php echo get_field('trainer_profi'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->


<?php
    get_footer();
?>
