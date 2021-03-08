<!DOCTYPE <?php language_attributes(); ?> >
<html lang="zxx">

    <head>
        <meta charset="<?php bloginfo(); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

        <?php wp_head(); ?>

    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Offcanvas Menu Section Begin -->
        <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div class="canvas-close">
                <i class="fa fa-close"></i>
            </div>
            <div class="canvas-search search-switch">
                <i class="fa fa-search"></i>
            </div>

            <?php wp_nav_menu([
                'theme_location' => 'menu-header',
                'container' => 'nav',
                'container_class' => 'canvas-menu mobile-menu',
                'items_wrap' => '<ul>%3$s</ul>',
            ]) ?>

            <div id="mobile-menu-wrap"></div>
            <div class="canvas-social">

                <?php
                    if ( is_active_sidebar('gym-socials-top') ) {
                        dynamic_sidebar('gym-socials-top');
                    }
                ?>

            </div>
        </div>
        <!-- Offcanvas Menu Section End -->

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <?php the_custom_logo();?>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <?php wp_nav_menu([
                                'theme_location' => 'menu-header',
                                'container' => 'nav',
                                'container_class' => 'nav-menu',
                                'items_wrap' => '<ul>%3$s</ul>',
                        ]); ?>

                    </div>
                    <div class="col-lg-3">
                        <div class="top-option">
                            <div class="to-search search-switch">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="to-social">

                                <?php
                                    if ( is_active_sidebar('gym-socials-top') ) {
                                        dynamic_sidebar('gym-socials-top');
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header End -->