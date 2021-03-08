<?php

    get_header();

?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg=" <?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?> ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Blog Category</h2>
                    <?php echo get_template_part('includes/tmp/breadcrumbs')?>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <div class="col-lg-8 p-0 blog-cat-header">
                            <h5><?php echo $title = single_cat_title('', false); ?></h5>
                            <?php while ( have_posts() ) :
                                    the_post();
                                ?>
                                <div class="blog-item">
                                    <div class="bi-pic">
                                        <?php the_post_thumbnail('full', []); ?>
                                    </div>
                                    <div class="bi-text">
                                        <h5><a href="<?php the_permalink(); ?>" title=" <?php the_title_attribute(); ?>"> <?php the_title(); ?> </a></h5>
                                        <ul>
                                            <li>by <?php the_author(); ?></li>
                                            <li><?php echo get_the_date('M,d,Y'); ?></li>
                                            <li><?php echo get_comments_number(); ?> Comment</li>
                                        </ul>
                                        <p> <?php echo get_the_excerpt(); ?> </p>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                            <?php the_posts_pagination(); ?>
                    </div>
                <?php
                    else :
                        echo get_template_part('includes/tmp/no-posts');
                    endif;

                ?>
                <div class="col-lg-4 col-md-8 p-0">
                    <?php echo get_template_part('includes/tmp/sidebar')?>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->


<?php
    get_footer();
?>
