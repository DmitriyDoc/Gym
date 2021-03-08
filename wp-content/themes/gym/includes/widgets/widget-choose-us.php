<?php

class Gym_Choose_Us extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_choose_us',
            'Gym - приемущества',
            [
                'name' => 'Gym - приемущества',
                'description' => 'Выводит блок с приемуществами в разделе About us и на Главной'
            ]
        );
    }

    private $class = [
        'stationary-bike' => 'flaticon-034-stationary-bike',
        'juice' => 'flaticon-033-juice',
        'dumbell' => 'flaticon-002-dumbell',
        'heart-beat' => 'flaticon-014-heart-beat'
    ];

    public function form( $instance )
    {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('id-title'); ?> ">
                Заголовок:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                value="<?php echo $instance['title']; ?>"
                class="widefat"
                type=" text"
            >

        </p>

        <p>
            <label for="<?php echo $this->get_field_id('id-desc'); ?> ">
                Описание:
            </label>
            <textarea
                id="<?php echo $this->get_field_id('id-desc'); ?>"
                name="<?php echo $this->get_field_name('desc'); ?>"
                rows="5"
                class="widefat"
            >
                <?php echo $instance['desc']; ?>
            </textarea>

        </p>

        <p>
            <label for="<?php echo $this->get_field_id('id-class'); ?> ">
                Выберите иконку:
            </label>
            <select
                id="<?php echo $this->get_field_id('id-class'); ?>"
                name="<?php echo $this->get_field_name('class'); ?>"
                class="widefat"
            >

                <?php
                    foreach ( $this->class as $slug => $item) :
                ?>
                    <option
                        value="<?php echo trim($item);?>"

                        <?php selected( $instance['class'], trim($item), true); ?>
                    >
                        <?php echo $slug; ?>
                    </option>

                <?php
                    endforeach;
                ?>

            </select>

        </p>
        <?php
    }

    public function widget( $args, $instance )
    {
        $title = $instance['title'];
        $description = $instance['desc'];
        $class = $instance['class'];

        ?>

        <div class="col-lg-3 col-sm-6">
            <div class="cs-item">
                <span class="<?php echo $class; ?>"></span>
                <h4><?php echo $title; ?></h4>
                <p><?php echo $description; ?></p>
            </div>
        </div>

        <?php
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}