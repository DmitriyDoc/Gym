<?php

class Gym_Widget_Services_Video extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_widget_services_video',
            'Gym - виджет для  Видео блока',
            [
                'name' => 'Gym - виджет для вставки Видео блока',
                'description' => 'Полезен для видео в разделе Services '
            ]
        );
    }

    public function form( $instance )
    {
        ?>
        <p>

            <label for="<?php echo $this->get_field_id('id-title'); ?> ">
                Введите основной текст заголовка:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                value="<?php echo $instance['title']; ?>"
                class="widefat"
                type="text"

            >
            <label for="<?php echo $this->get_field_id('id-sub-title'); ?> ">
                Введите продолжение заголовка:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-sub-title'); ?>"
                name="<?php echo $this->get_field_name('sub-title'); ?>"
                value="<?php echo $instance['sub-title']; ?>"
                class="widefat"
                type="text"

            >
            <label for="<?php echo $this->get_field_id('id-video'); ?> ">
                Введите ссылку на видео:
            </label>
            <textarea
                id="<?php echo $this->get_field_id('id-video'); ?>"
                name="<?php echo $this->get_field_name('video'); ?>"
                value="<?php echo esc_html($instance['video']); ?>"
                class="widefat"
                type=" text"
                rows="10"
            >
                <?php echo esc_html($instance['video']); ?>
            </textarea>

        </p>
        <?php
    }

    public function widget( $args, $instance )
    {
?>

        <h2><?php echo $instance['title']; ?></h2>
        <div class="bt-tips"><?php echo $instance['sub-title']; ?></div>
        <a href="<?php echo esc_html($instance['video']); ?>" class="play-btn video-popup"><i
                class="fa fa-caret-right"></i></a>

<?php
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}