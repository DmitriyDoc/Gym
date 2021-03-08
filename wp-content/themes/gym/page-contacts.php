<?php
/*
Template Name: Шаблон для страницы CONTACT
*/

    get_header();
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?php the_title(); ?></h2>
                <?php echo get_template_part('includes/tmp/breadcrumbs')?>
            </div>
        </div>
    </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title contact-title">
                    <span>Contact Us</span>
                    <h2>GET IN TOUCH</h2>
                </div>
                <div class="contact-widget">

                    <?php
                        if ( is_active_sidebar('gym-info-contacts') ) {
                            dynamic_sidebar('gym-info-contacts');
                        }
                    ?>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="leave-comment">
                    <?php echo do_shortcode('[contact-form-7 id="371" title="Контактная форма на странице контактов"]'); ?>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
        <div class="map">

            <?php
                if ( is_active_sidebar('gym-map') ) {
                    dynamic_sidebar('gym-map');
                }
            ?>

        </div>
    </div>
    </section>
    <!-- Contact Section End -->


<?php
        endwhile;
    endif;
get_footer();
?>

