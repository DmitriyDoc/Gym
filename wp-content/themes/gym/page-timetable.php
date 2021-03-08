<?php
/*
Template Name: Шаблон для страницы TIMETABLE
*/
get_header();
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

        <!-- Class Timetable Section Begin -->
    <section class="class-timetable-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>Find Your Time</span>
                        <h2>Classes timetable</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="table-controls">
                        <ul>
                            <?php
                                $tabs = get_terms([
                                        'taxonomy' => 'tabs',
                                        'hide_empty' => false
                                ]);
                                foreach ($tabs as $tab) :

                            ?>
                            <li  data-tsfilter="<?php echo $tab->slug; ?>"><?php echo $tab->name; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $times = get_terms([
                                        'taxonomy' => 'times',
                                        'orderby'       => 'slug',
                                        'order'         => 'ASC',
                                        'hide_empty' => false
                                    ]);
                                    foreach ($times as $time) :
                                ?>
                                <tr>
                                    <td class="class-time"><?php echo $time->name; ?></td>
                                    <?php
                                        $actions = new WP_Query([
                                            'post-per-page' => -1,
                                            'post_type' => 'shedules',
                                            'times' => $time->slug,
                                            'orderby' => 'meta_value_num',
                                            'order' => 'ASC'
                                        ]);
                                        if ( $actions->have_posts() ) :
                                            while ( $actions->have_posts() ) :
                                                $actions->the_post();
                                                $data_tab = get_the_terms($id, 'tabs')[1];
                                                $prof = get_the_terms($id, 'tax-profi')[0];
                                                $trainer = esc_html(get_the_title(get_field('shedule_trainer')));
                                    ?>
                                        <td class="hover-bg ts-meta" data-tsmeta="<?php echo $data_tab->slug; ?>">
                                            <h5><?php echo $prof->name; ?></h5>
                                            <span><?php echo $trainer; ?></span>
                                        </td>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Class Timetable Section End -->


<?php

    get_footer();
?>

