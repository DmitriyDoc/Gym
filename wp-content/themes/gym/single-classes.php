<?php
    get_header();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Classes</h2>
                        <?php echo get_template_part('includes/tmp/breadcrumbs')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <div class="container">
            <div class="row">
                <?php
                    if ( have_posts() ) :
                ?>
                <div class="col-lg-8">
                    <?php
                        while ( have_posts() ) :
                            the_post();
                            $id_trainer = get_field('class_trainers_select');


                    ?>
                        <div class="class-details-text">
                            <div class="cd-pic">
                                <img src="<?php echo get_field('class_picture')['url']; ?>" alt="">
                            </div>

                            <div class="cd-text">
                                <div class="cd-single-item">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo get_field('class_description'); ?></p>
                                </div>
                                <div class="cd-single-item">
                                    <h3>Trainer</h3>
                                    <p> <?php echo get_field( 'class_trainers_desc' ); ?></p>
                                </div>
                            </div>
                            <div class="cd-trainer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cd-trainer-pic">
                                            <img
                                                src="<?php echo get_fields( $id_trainer )['trainer_foto']['url']; ?>"
                                                alt="<?php echo get_fields( $id_trainer )['trainer_foto']['alt']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cd-trainer-text">
                                            <div class="trainer-title">
                                                <h4><?php echo get_fields( $id_trainer )['trainers_name']; ?></h4>
                                                <span><?php echo get_fields( $id_trainer )['trainer_profi']; ?></span>
                                            </div>
                                            <div class="trainer-social">
                                                <a href="<?php echo get_fields( $id_trainer )['trainer_facebook']; ?>"><i class="fa fa-facebook"></i></a>
                                                <a href="<?php echo get_fields( $id_trainer )['trainer_twitter']; ?>"><i class="fa fa-twitter"></i></a>
                                                <a href="<?php echo get_fields( $id_trainer )['trainer_youtube']; ?>"><i class="fa fa-youtube-play"></i></a>
                                                <a href="<?php echo get_fields( $id_trainer )['trainer_instagram']; ?>"><i class="fa fa-instagram"></i></a>
                                                <a href="<?php echo get_fields( $id_trainer )['trainer_envelopes']; ?>"><i class="fa  fa-envelope-o"></i></a>
                                            </div>
                                            <p><?php echo get_fields( $id_trainer )['trainer_info']; ?></p>
                                            <ul class="trainer-info">
                                                <li><span>Age</span><?php echo get_fields( $id_trainer )['trainer_age']; ?></li>
                                                <li><span>Weight</span><?php echo get_fields( $id_trainer )['trainer_weight']; ?> lbs</li>
                                                <li><span>Height</span>
                                                    <?php echo get_fields( $id_trainer )['trainer_height_foot']; ?>'
                                                    <?php echo get_fields( $id_trainer )['trainer_height_inch']; ?>``
                                                </li>
                                                <li><span>Occupation</span><?php echo get_fields( $id_trainer )['trainers_occupation']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile;
                    ?>
                </div>
                <?php
                    else:
                        echo get_template_part('includes/tmp/no-posts');
                    endif;
                ?>
                <div class="col-lg-4 col-md-8">
                    <?php echo get_template_part('includes/tmp/sidebar')?>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Details Section End -->



<?php
    get_footer();
?>