<?php

class Gym_Widget_Socials extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_widget_socials',
            'Gym - виджет для иконок соц. сетей',
            [
                'name' => 'Gym - виджет для иконок соц. сетей',
                'description' => 'Выводит иконку и ссылку на соответствующую социальную сеть'
            ]
        );
    }

    private $socials = [
        'facebook' => 'fa-facebook',
        'twitter' => 'fa-twitter',
        'youtube' => 'fa-youtube-play',
        'instagram' => 'fa-instagram',
        'fenvelope' => 'fa-envelope-o'
    ];

    public function form( $instance )
    {
 ?>
        <p>
            <label for="<?php echo $this->get_field_id('id-socials'); ?> ">
                Ссылка на социальную сеть:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-socials'); ?>"
                name="<?php echo $this->get_field_name('socials-link'); ?>"
                value="<?php echo $instance['socials-link']; ?>"
                class="widefat"
                type=" text"
            >

        </p>

        <p>
            <label for="<?php echo $this->get_field_id('id-slug'); ?> ">
                Выберите социальную сеть:
            </label>
            <select
                id="<?php echo $this->get_field_id('id-slug'); ?>"
                name="<?php echo $this->get_field_name('socials-class'); ?>"
                class="widefat"
             >

            <?php
                foreach ( $this->socials as $slug => $class) :
            ?>
                    <option
                        value="<?php echo trim($class);?>"

                        <?php selected( $instance['socials-class'], trim($class), true); ?>
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
        $link = $instance['socials-link'];
        $class = $instance['socials-class'];

?>
        <a href="<?php echo $link; ?>" target="_blank"><i class="fa  <?php echo $class; ?>"></i></a>

<?php
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}