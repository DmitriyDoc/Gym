<?php
get_header();
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
?>

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg=" <?php echo the_post_thumbnail_url(); ?> ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="bh-text">
                        <h3><?php the_title(); ?></h3>
                        <ul>
                            <li>by <?php the_author(); ?></li>
                            <li><?php echo get_the_date('M,d,Y'); ?></li>
                            <li><?php echo get_comments_number(); ?> Comment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero Section End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="blog-details-text">
                        <div class="blog-details-title">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

<?php
        endwhile;
    endif;
get_footer();
?>
