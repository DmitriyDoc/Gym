<?php

class Gym_Appointment_Info extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_appointment_info',
            'Gym - виджет для заявки',
            [
                'name' => 'Gym - виджет для заявки',
                'description' => 'Позволяет сделать заявку '
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

        </p>
        <?php
    }

    public function widget( $args, $instance )
    {
        ?>

        <h2><?php echo $instance['title']; ?></h2>
        <div class="bt-tips"><?php echo $instance['sub-title']; ?></div>
        <a href="#modal-form" class="primary-btn  btn-normal" onclick="return modalOpen();">Appointment</a>
        <?php
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}