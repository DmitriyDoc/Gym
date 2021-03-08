<?php

/*
Template Name: Шаблон для страницы ABOUT
*/
    get_header();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>About us</h2>
                        <?php echo get_template_part('includes/tmp/breadcrumbs')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

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

<?php
    get_footer();
?>

