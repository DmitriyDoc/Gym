<?php
    get_header();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Team</h2>
                        <?php echo get_template_part('includes/tmp/breadcrumbs')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
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
            <?php
                if ( have_posts() ) :
            ?>
            <div class="row">
                    <?php
                        while ( have_posts() ) :
                            the_post();
                    ?>

                    <div class="col-lg-4 col-sm-6">
                        <div class="ts-item set-bg"
                             data-setbg="<?php echo get_field('trainer_foto')['url']; ?>"
                        >
                            <div class="ts_text">
                                <h4><?php the_field('trainers_name') ?></h4>
                                <span><?php the_field('trainer_profi') ?></span>
                                <div class="tt_social">
                                    <a href="<?php the_field('trainer_facebook') ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="<?php the_field('trainer_twitter') ?>"><i class="fa fa-twitter"></i></a>
                                    <a href="<?php the_field('trainer_youtube') ?>"><i class="fa fa-youtube-play"></i></a>
                                    <a href="<?php the_field('trainer_instagram') ?>"><i class="fa fa-instagram"></i></a>
                                    <a href="<?php the_field('trainer_envelopes') ?>"><i class="fa  fa-envelope-o"></i></a>
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
        </div>
    </section>
    <!-- Team Section End -->

<?php
    get_footer();
?>