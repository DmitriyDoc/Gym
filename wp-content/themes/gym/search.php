<?php
    get_header();
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo gym_assets_path('img/breadcrumb-bg.jpg'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Searching</h2>
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
            <div class="col-lg-12 p-0 search-section">
                <h4 class="search-title">Search by: "<?php echo get_search_query('s');?>"</h4>
                <?php
                    $args = array_merge( $wp_query->query, array( 'post_type' => "post") );
                    query_posts($args);
                        if (have_posts()) : while (have_posts()) : the_post();
                ?>
                    <a href="<?php the_permalink();?>"><?php  the_title(); the_excerpt(); ?></a>
                <?php
                        endwhile;
                            the_posts_pagination();
                        else:
                ?>

                    <p>The search has not given any results.</p>


                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php
    get_footer();
?>

