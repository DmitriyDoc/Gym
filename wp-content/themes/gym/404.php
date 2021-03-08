<?php
    get_header();
?>
    <!-- 404 Section Begin -->
    <section class="section-404">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-404">
                        <h1>404</h1>
                        <h3>Opps! This page Could Not Be Found!</h3>
                        <p>Sorry bit the page you are looking for does not exist, have been removed or name changed</p>
                        <form action="<?php bloginfo( 'url' ); ?>" method="get" class="search-404">
                            <input name="s" type="text" value="<?php echo get_search_query('s'); ?>" placeholder="Enter your keyword">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <a href="/"><i class="fa fa-home"></i> Go back home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 Section End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="<?php echo gym_assets_path('img/hero/hero-1.jpg'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="<?php echo gym_assets_path('img/hero/hero-2.jpg'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


<?php
get_footer();
?>