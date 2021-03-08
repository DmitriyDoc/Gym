
<div class="sidebar-option">
    <?php $cats = get_categories();
        if ( $cats ) :
    ?>
        <div class="so-categories">
            <h5 class="title">Categories</h5>
            <ul>
                <?php
                foreach ($cats as $cat) :
                    $cat_link = get_category_link( $cat->cat_ID );
                    ?>
                    <li>
                        <a href=" <?php echo $cat_link; ?> "> <?php echo $cat->name; ?>
                            <span> <?php echo $cat->count; ?> </span>
                        </a>
                    </li>
                <?php
                endforeach;
                ?>

            </ul>
        </div>
    <?php
        endif;
    ?>
    <div class="so-latest">
        <h5 class="title">Feature posts</h5>
        <div class="latest-large set-bg" data-setbg="<?php the_post_thumbnail_url('medium'); ?>">
            <div class="ll-text">
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <ul>
                    <li><?php echo get_the_date('M,d,Y'); ?></li>
                    <li><?php echo get_comments_number(); ?> Comments</li>
                </ul>
            </div>
        </div>
        <?php
            $args = array(
                'post_type' => 'post',
                'numberposts' => 4,
                'order' => 'DESC'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();

        ?>
        <div class="latest-item">
            <div class="li-pic">
                <?php the_post_thumbnail('thumbnail', []); ?>
            </div>
            <div class="li-text">
                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                <span class="li-time"><?php echo get_the_date('M,d,Y'); ?></span>
            </div>

        </div>
        <?php
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
    </div>

    <?php
        if ( is_active_sidebar('gym-banner') ) {
            dynamic_sidebar('gym-banner');
        }
    ?>

</div>
