<?php
    get_header();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Services</h2>
                        <?php echo get_template_part('includes/tmp/breadcrumbs')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What we do?</span>
                        <h2>PUSH YOUR LIMITS FORWARD</h2>
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
                            <div class="col-lg-3 col-md-6 p-0">
                                <div class="ss-pic">
                                    <img
                                        src="<?php echo get_field('services_picture')['url']; ?>"
                                        alt="<?php echo get_field('services_picture')['alt']; ?>"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 p-0">
                                <div class="ss-text">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php the_field('services_description') ?></p>
                                    <a
                                        href="#modal-form"
                                        data-post-id="<?php echo $id;?>"
                                        onclick="return modalOpen(this);"
                                    >
                                        Explore
                                    </a>
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
    <!-- Services Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="<?php echo gym_assets_path('img/banner-bg.jpg'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text service-banner">
                        <?php
                            if ( is_active_sidebar('gym-info-services-video') ) {
                                dynamic_sidebar('gym-info-services-video');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

<!-- Pricing Section Begin -->
    <section class="pricing-section spad" >
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


<?php
    get_footer();
?>
