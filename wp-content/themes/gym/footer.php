        <!-- Get In Touch Section Begin -->
        <div class="gettouch-section">
            <div class="container">
                <div class="row">
                    
                    <?php
                        if ( is_active_sidebar('gym-info-footer') ) {
                            dynamic_sidebar('gym-info-footer');
                        }
                    ?>

                </div>
            </div>
        </div>
        <!-- Get In Touch Section End -->

        <!-- MODAL WINDOW -->
        <div class="modal" id="modal-form" >
            <div class="wrapper">
                <section class="modal-content modal-form" id="modal-form">
                    <button class="modal__closer" onclick="return modalClose();">
                        <span class="sr-only">Close</span>
                    </button>
                    <form
                            method="POST"
                            action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                            class="modal-form__form"
                            id="info-form"
                    >
                        <h2 class="modal-content__h"> Send you request</h2>
                        <p> Leave your contacts and the manager will contact you  </p>
                        <p>
                            <label>
                                <span class="sr-only">Name: </span>
                                <input type="text" name="gym-user-name" placeholder="name">
                            </label>
                        </p>
                        <p>
                            <label>
                                <span class="sr-only">Tel:</span>
                                <input type="text" name="gym-user-phone" placeholder="tel" pattern="^\+{0,1}[0-9]{4,}$" required>
                            </label>
                        </p>
                        <input type="hidden" name="action" value="gym-modal-form">
                        <button class="btn" type="submit">Send</button>

                    </form>
                </section>
            </div>
        </div>
        <!-- MODAL WINDOW END -->

        <!-- Footer Section Begin -->
        <section class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="fs-about">
                            <div class="fa-logo">
                                <?php the_custom_logo();?>
                            </div>
<!--                            Слоган сайта задается через Меню-Настройки-Общие-->
                            <p> <?php echo get_option( 'gym_option_field_slogan' ); ?></p>

                            <div class="fa-social">

                                <?php
                                    if ( is_active_sidebar('gym-socials-bottom') ) {
                                        dynamic_sidebar('gym-socials-bottom');
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="fs-widget">
                            <h4>Useful links</h4>
                            <?php wp_nav_menu([
                                'theme_location' => 'menu-footer',
                                'container' => null,
                                'container_class' => null,
                                'items_wrap' => '<ul>%3$s</ul>',
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="fs-widget">
                            <h4>Classes</h4>
                            <ul>
                                <li><a href="/classes/fitness">Fitness</a></li>
                                <li><a href="/classes/cardio">Cardio</a></li>
                                <li><a href="/classes/bodybuilding">Bodybuilding</a></li>
                                <li><a href="/classes/strenght">Strenght</a></li>
                                <li><a href="/classes/training">Training</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="fs-widget">
                            <h4>Tips & Guides</h4>
                            <div class="fw-recent">
                                <h6><a href="#">Physical fitness may help prevent depression, anxiety</a></h6>
                                <ul>
                                    <li>3 min read</li>
                                    <li>20 Comment</li>
                                </ul>
                            </div>
                            <div class="fw-recent">
                                <h6><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a></h6>
                                <ul>
                                    <li>3 min read</li>
                                    <li>20 Comment</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="copyright-text">

                            <?php
                                if ( is_active_sidebar('gym-copyright') ) {
                                    dynamic_sidebar('gym-copyright');
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form action="<?php bloginfo( 'url' ); ?>" method="get" class="search-model-form">
                    <input name="s" type="text" id="search-input" value="<?php echo get_search_query('s'); ?>" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <?php wp_footer(); ?>

    </body>

</html>