<?php

class Gym_Widget_Contact_Info extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'gym_widget_contact_info',
            'Gym - виджет для вывода контактной информации',
            [
                'name' => 'Gym - виджет для вывода контактной информации',
                'description' => 'Выводит контактную информацию в контактах'
            ]
        );
    }

    private $icons = [
        'map' => 'fa-map-marker',
        'mobile' => 'fa-mobile',
        'envelope' => 'fa-envelope',

    ];

    public function form( $instance )
    {

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('id-info-one'); ?> ">
                Информационный блок №1 в текстовом виде:
            </label>
            <input
                id="<?php echo $this->get_field_id('id-info-one'); ?>"
                name="<?php echo $this->get_field_name('info-text-one'); ?>"
                value="<?php echo $instance['info-text-one']; ?>"
                class="widefat"
                type=" text"
                required
            >
            <label for="<?php echo $this->get_field_id('id-info-two'); ?> ">
                Информационный блок №2 в текстовом виде (опционально):
            </label>
            <input
                    id="<?php echo $this->get_field_id('id-info-two'); ?>"
                    name="<?php echo $this->get_field_name('info-text-two'); ?>"
                    value="<?php echo $instance['info-text-two']; ?>"
                    class="widefat"
                    type=" text"
            >

        </p>

        <p>
            <label for="<?php echo $this->get_field_id('id-icon'); ?> ">
                Выберите иконку:
            </label>
            <select
                id="<?php echo $this->get_field_id('id-icon'); ?>"
                name="<?php echo $this->get_field_name('info-class'); ?>"
                class="widefat"
            >

                <?php
                    foreach ( $this->icons as $slug => $class) :
                ?>
                    <option
                        value="<?php echo trim($class);?>"

                        <?php selected( $instance['info-class'], trim($class), true); ?>
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
        $text1 = $instance['info-text-one'];
        $text2 = $instance['info-text-two'];
        $icon = $instance['info-class'];
        if ( $icon == $this->icons['map'] ) {
?>
            <div class="cw-text">
                <i class="fa <?php echo $icon; ?> "></i>
                <p><?php echo $text1; ?></p>
            </div>
<?php

        } elseif ( $icon == $this->icons['mobile'] ) {
?>
            <div class="cw-text">
                <i class="fa <?php echo $icon; ?>"></i>
                <ul>
                    <li><?php echo $text1; ?></li>
                    <li><?php echo $text2; ?></li>
                </ul>
            </div>
<?php
        } elseif ( $icon == $this->icons['envelope'] ) {
?>
            <div class="cw-text email">
                <i class="fa <?php echo $icon; ?>"></i>
                <p>Support: <?php echo $text1; ?></p>
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