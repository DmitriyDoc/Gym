<?php

class Gym_Widget_Map extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_widget_map',
            'Gym - виджет для вставки HTML кода',
            [
                'name' => 'Gym - виджет для вставки HTML кода',
                'description' => 'Полезен для видео, карт и прочего встраемого html '
            ]
        );
    }

    public function form( $instance )
    {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('id-code'); ?> ">
                Введите Html:
            </label>
            <textarea
                id="<?php echo $this->get_field_id('id-code'); ?>"
                name="<?php echo $this->get_field_name('code'); ?>"
                value="<?php echo esc_html($instance['code']); ?>"
                class="widefat"
                type=" text"
                rows="10"
            >
                <?php echo esc_html($instance['code']); ?>
            </textarea>
        </p>
        <?php
    }

    public function widget( $args, $instance )
    {
        echo $instance['code'];
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}