<?php

class Gym_Widget_Text extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_widget_text',
            'Gym - текстовый виджет',
            [
                'name' => 'Gym - текстовый виджет',
                'description' => 'выводит простой текст без верстки'
            ]
        );
    }

    public function form( $instance )
    {
?>
        <p>
            <label for="<?php echo $this->get_field_id('id-text'); ?> ">
                Введите текст:
            </label>
            <textarea
                id="<?php echo $this->get_field_id('id-text'); ?>"
                class="widefat"
                type=" text"
                rows="10"
                name="<?php echo $this->get_field_name('text'); ?>"

            >
                <?php echo $instance['text']; ?>
            </textarea>
        </p>
<?php
    }

    public function widget( $args, $instance )
    {
        echo $instance['text'];
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}