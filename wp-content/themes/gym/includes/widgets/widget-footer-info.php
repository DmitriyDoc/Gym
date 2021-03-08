<?php

class Gym_Widget_Footer_Info extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_widget_footer_info',
            'Gym - виджет для контактной информации',
            [
                'name' => 'Gym - виджет для контактной информации',
                'description' => 'Выводит контактную информацию в подвале'
            ]
        );
    }

    private $icons_f = [
        'map' => 'fa-map-marker',
        'mobile' => 'fa-mobile',
        'envelope' => 'fa-envelope',

    ];

    public function form( $instance )
    {

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('id-info-footer-one'); ?> ">
                Информационный блок №1 в текстовом виде:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-info-footer-one'); ?>"
                name="<?php echo $this->get_field_name('footer-text-one'); ?>"
                value="<?php echo $instance['footer-text-one']; ?>"
                class="widefat"
                type=" text"
                required
            >
            <label for="<?php echo $this->get_field_id('id-footer-info-two'); ?> ">
                Информационный блок №2 в текстовом виде (опционально):
            </label>
            <input
                id="<?php echo $this->get_field_id('id-footer-info-two'); ?>"
                name="<?php echo $this->get_field_name('footer-text-two'); ?>"
                value="<?php echo $instance['footer-text-two']; ?>"
                class="widefat"
                type=" text"
            >

        </p>

        <p>
            <label for="<?php echo $this->get_field_id('id-footer-icon'); ?> ">
                Выберите иконку:
            </label>
            <select
                id="<?php echo $this->get_field_id('id-footer-icon'); ?>"
                name="<?php echo $this->get_field_name('info-class-footer'); ?>"
                class="widefat"
            >

                <?php
                foreach ( $this->icons_f as $slug => $class) :
                    ?>
                    <option
                        value="<?php echo trim($class);?>"

                        <?php selected( $instance['info-class-footer'], trim($class), true); ?>
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
        $text1 = $instance['footer-text-one'];
        $text2 = $instance['footer-text-two'];
        $icon = $instance['info-class-footer'];
        if ( $icon == $this->icons_f['map'] ) {
?>
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa <?php echo $icon; ?>"></i>
                    <p><?php echo $text1; ?></p>
                </div>
            </div>
<?php

        } elseif ( $icon == $this->icons_f['mobile'] ) {
?>
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa <?php echo $icon; ?>"></i>
                    <ul>
                        <li><?php echo $text1; ?></li>
                        <li><?php echo $text2; ?></li>
                    </ul>
                </div>
            </div>
<?php
        } elseif ( $icon == $this->icons_f['envelope'] ) {
            ?>
            <div class="col-md-4">
                <div class="gt-text email">
                    <i class="fa <?php echo $icon; ?>"></i>
                    <p>Support: <?php echo $text1; ?></p>
                </div>
            </div>
<?php
        } else {

            echo "Информационные иконки не заданы. Настройте виджет верно!";
        }
    }

    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }
}