<?php

require_once(__DIR__ . '/includes/widgets/widget-text.php');
require_once(__DIR__ . '/includes/widgets/widget-socials.php');
require_once(__DIR__ . '/includes/widgets/widget-map.php');
require_once(__DIR__ . '/includes/widgets/widget-contact-info.php');
require_once(__DIR__ . '/includes/widgets/widget-footer-info.php');
require_once(__DIR__ . '/includes/widgets/widget-services-video.php');
require_once(__DIR__ . '/includes/widgets/widget-appointment-index.php');
require_once(__DIR__ . '/includes/widgets/widget-choose-us.php');

add_action('after_setup_theme', 'gym_setup');
add_action('wp_enqueue_scripts','gym_scripts');
add_action('widgets_init', 'gym_register');
add_action('init', 'gym_register_types');
add_action('add_meta_boxes','gym_meta_boxes');


add_action('admin_init', 'gym_register_slogan');
add_action('admin_post_nopriv_gym-modal-form', 'gym_modal_form_handler');
add_action('admin_post_gym-modal-form', 'gym_modal_form_handler');

add_action( 'manage_posts_custom_column', 'gym_order_status_column', 5, 2 );



add_filter('show_admin_bar','__return_false');
add_filter('manage_posts_columns', 'gym_add_col_order_status');


// Отключение лишних скриптов WP
    remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
    remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
    remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
    remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
    remove_action('wp_head','wp_generator');  // скрыть версию wordpress

    remove_action('wp_head','start_post_rel_link',10,0);
    remove_action('wp_head','index_rel_link');
    remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );
//

function gym_setup() {
    register_nav_menu( 'menu-header', 'Меню в Header');
    register_nav_menu( 'menu-footer', 'Меню в Footer');

    add_theme_support( 'custom-logo' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

}

function gym_scripts() {

// Подключение не выводится так как WP сам выводит свежую версию jquery head
//    wp_enqueue_script(
//        'jquery',
//        get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js',
//        [],
//        '3.3.1',
//        true
//    );
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        ['jquery'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'magnific-popup',
        get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',
        ['jquery','bootstrap'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'masonry',
        get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js',
        ['jquery','bootstrap','magnific-popup'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'jquery-barfiller',
        get_template_directory_uri() . '/assets/js/jquery.barfiller.js',
        ['jquery','bootstrap','magnific-popup','masonry'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'jquery-slicknav',
        get_template_directory_uri() . '/assets/js/jquery.slicknav.js',
        ['jquery','bootstrap','magnific-popup','masonry','jquery-barfiller'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'owl-carousel',
        get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
        ['jquery','bootstrap','magnific-popup','masonry','jquery-barfiller','jquery-slicknav'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery','bootstrap','magnific-popup','masonry','jquery-barfiller','jquery-slicknav','owl-carousel'],
        '1.1',
        true
    );
    wp_enqueue_script(
        'costom-js',
        get_template_directory_uri() . '/assets/js/custom.js',
        ['jquery','bootstrap','magnific-popup','masonry','jquery-barfiller','jquery-slicknav','owl-carousel','main-js'],
        '1.1',
        true
    );

    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        [],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'font-awesome',
        get_template_directory_uri() . '/assets/css/font-awesome.min.css',
        ['bootstrap'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'flaticon',
        get_template_directory_uri() . '/assets/css/flaticon.css',
        ['bootstrap','font-awesome'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'owl-carousel',
        get_template_directory_uri() . '/assets/css/owl.carousel.min.css',
        ['bootstrap','font-awesome','flaticon'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'barfiller',
        get_template_directory_uri() . '/assets/css/barfiller.css',
        ['bootstrap','font-awesome','flaticon','owl-carousel'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'magnific-popup',
        get_template_directory_uri() . '/assets/css/magnific-popup.css',
        ['bootstrap','font-awesome','flaticon','owl-carousel','barfiller'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'slicknav',
        get_template_directory_uri() . '/assets/css/slicknav.min.css',
        ['bootstrap','font-awesome','flaticon','owl-carousel','barfiller','magnific-popup'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'gym-style',
        get_template_directory_uri() . '/assets/css/style.css',
        ['bootstrap','font-awesome','flaticon','owl-carousel','barfiller','magnific-popup','slicknav'],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        ['bootstrap','font-awesome','flaticon','owl-carousel','barfiller','magnific-popup','slicknav','gym-style'],
        '1.0',
        'all'
    );


    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-embed');
    wp_dequeue_script('wp-embed');
}

function gym_register() {
    register_sidebar([
        'name' => 'Sidebar в подвале для копирайта',
        'id' => 'gym-copyright',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar в подвале для соц. сетей',
        'id' => 'gym-socials-bottom',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar в шапке для соц. сетей',
        'id' => 'gym-socials-top',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для карты',
        'id' => 'gym-map',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для информации в Контактах',
        'id' => 'gym-info-contacts',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для информации в Подвале',
        'id' => 'gym-info-footer',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для видео в Services',
        'id' => 'gym-info-services-video',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для заявки в About us и главной ',
        'id' => 'gym-appointment-index',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для редактирования приемуществ',
        'id' => 'gym-choose-us',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Sidebar для баннера 300x300',
        'id' => 'gym-banner',
        'before_widget' => null,
        'after_widget' => null
    ]);


    register_widget('gym_widget_text');
    register_widget('gym_widget_socials');
    register_widget('gym_widget_map');
    register_widget('gym_widget_contact_info');
    register_widget('gym_widget_footer_info');
    register_widget('gym_widget_services_video');
    register_widget('gym_appointment_info');
    register_widget('gym_choose_us');
}

function gym_register_types() {
    register_post_type( 'services', [
        'labels' => [
            'name'               => 'Services', // основное название для типа записи
            'singular_name'      => 'Услуга', // название для одной записи этого типа
            'add_new'            => 'Добавить новую услугу', // для добавления новой записи
            'add_new_item'       => 'Добавить новую услугу', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать услугу', // для редактирования типа записи
            'new_item'           => 'Новая услуга', // текст новой записи
            'view_item'          => 'Смотреть услуги', // для просмотра записи этого типа.
            'search_items'       => 'Искать услуги', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Услуги', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-index-card',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'trainers', [
        'labels' => [
            'name'               => 'Trainers', // основное название для типа записи
            'singular_name'      => 'Тренер', // название для одной записи этого типа
            'add_new'            => 'Добавить нового тренера', // для добавления новой записи
            'add_new_item'       => 'Добавить нового тренера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать нового тренера', // для редактирования типа записи
            'new_item'           => 'Новая тренер', // текст новой записи
            'view_item'          => 'Смотреть тренеров', // для просмотра записи этого типа.
            'search_items'       => 'Искать тренеров', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тренеры', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'classes', [
        'labels' => [
            'name'               => 'Classes', // основное название для типа записи
            'singular_name'      => 'Класс', // название для одной записи этого типа
            'add_new'            => 'Добавить новый класс', // для добавления новой записи
            'add_new_item'       => 'Добавить новый класс', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать новый класс', // для редактирования типа записи
            'new_item'           => 'Новый класс', // текст новой записи
            'view_item'          => 'Смотреть класс', // для просмотра записи этого типа.
            'search_items'       => 'Искать класс', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Классы', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-screenoptions',
        'hierarchical'        => false,
        'supports'            => ['title','thumbnail'],
        'has_archive' => false
    ]);
    register_post_type( 'main-slider', [
        'labels' => [
            'name'               => 'Slider', // основное название для типа записи
            'singular_name'      => 'Главный слайдер', // название для одной записи этого типа
            'add_new'            => 'Добавить слайдер', // для добавления новой записи
            'add_new_item'       => 'Добавить слайдер', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать слайдер', // для редактирования типа записи
            'new_item'           => 'Новый слайдер', // текст новой записи
            'view_item'          => 'Смотреть слайдер', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайдер', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Главный слайдер', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-money',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'tarif', [
        'labels' => [
            'name'               => 'Tarif', // основное название для типа записи
            'singular_name'      => 'Тарифный план', // название для одной записи этого типа
            'add_new'            => 'Добавить Тарифный план', // для добавления новой записи
            'add_new_item'       => 'Добавить Тарифный план', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать Тарифный план', // для редактирования типа записи
            'new_item'           => 'Новая Тарифный план', // текст новой записи
            'view_item'          => 'Смотреть Тарифный план', // для просмотра записи этого типа.
            'search_items'       => 'Искать Тарифный план', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тарифный план', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-tickets-alt',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => false
    ]);
    register_post_type( 'orders', [
        'labels' => [
            'name'               => 'Orders', // основное название для типа записи
            'singular_name'      => 'Заявка', // название для одной записи этого типа
            'add_new'            => 'Добавить заявку', // для добавления новой записи
            'add_new_item'       => 'Добавить заявку', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать заявку', // для редактирования типа записи
            'new_item'           => 'Новая заявка', // текст новой записи
            'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
            'search_items'       => 'Искать заявку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Заявки', // название меню
        ],
        'public'              => false,

        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-clipboard',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => false
    ]);
    register_post_type( 'shedules', [
        'labels' => [
            'name'               => 'Shedules', // основное название для типа записи
            'singular_name'      => 'Занятие', // название для одной записи этого типа
            'add_new'            => 'Добавить новое занятие', // для добавления новой записи
            'add_new_item'       => 'Добавить новое занятие', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать занятие', // для редактирования типа записи
            'new_item'           => 'Новое занятие', // текст новой записи
            'view_item'          => 'Смотреть занятие', // для просмотра записи этого типа.
            'search_items'       => 'Искать занятие', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Занятия', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-backup',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => false
    ]);

    register_taxonomy('tabs', ['shedules'], [
        'labels'                => [
            'name'              => 'Tabs',
            'singular_name'     => 'Таб',
            'search_items'      => 'Найти табы',
            'all_items'         => 'Все табы',
            'view_item '        => 'Посмотреть табы',
            'edit_item'         => 'Редактировать табы',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить табы',
            'new_item_name'     => 'Добавить табы',
            'menu_name'         => 'Все табы',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);
    register_taxonomy('times', ['shedules'], [
        'labels'                => [
            'name'              => 'Times',
            'singular_name'     => 'Время',
            'search_items'      => 'Найти время',
            'all_items'         => 'Все время',
            'view_item '        => 'Посмотреть время',
            'edit_item'         => 'Редактировать время',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить время',
            'new_item_name'     => 'Добавить время',
            'menu_name'         => 'Все время',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);
    register_taxonomy('days', ['shedules'], [
        'labels'                => [
            'name'              => 'Days',
            'singular_name'     => 'День',
            'search_items'      => 'Найти день недели',
            'all_items'         => 'Все дни недели',
            'view_item '        => 'Посмотреть дни недели',
            'edit_item'         => 'Редактировать дни недели',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить день недели',
            'new_item_name'     => 'Добавить день недели',
            'menu_name'         => 'Все дни недели',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);
    register_taxonomy('tax-classes', ['trainers','classes'], [
        'labels'                => [
            'name'              => 'Залы',
            'singular_name'     => 'Зал',
            'search_items'      => 'Найти зал',
            'all_items'         => 'Все залы',
            'view_item '        => 'Посмотреть залы',
            'edit_item'         => 'Редактировать залы',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить зал',
            'new_item_name'     => 'Добавить зал',
            'menu_name'         => 'Все залы',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);
    register_taxonomy('tax-profi', ['trainers','classes','shedules'], [
        'labels'                => [
            'name'              => 'Profile',
            'singular_name'     => 'Профиль',
            'search_items'      => 'Найти профиль',
            'all_items'         => 'Все профили',
            'view_item '        => 'Посмотреть профиль',
            'edit_item'         => 'Редактировать профиль',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить профиль',
            'new_item_name'     => 'Добавить профиль',
            'menu_name'         => 'Все профили',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);


}

function gym_meta_boxes () {
    $fields = [
        'gym_order_date' => 'Дата заявки:',
        'gym_order_name' => 'Имя клиента:',
        'gym_order_phone' => 'Телефон клиента:',
        'gym_order_choice_id' => 'ID заявки:',
    ];
    foreach ( $fields as $slug => $text ) {
        add_meta_box(
            $slug,
            $text ,
            'gym_order_fields_cb',
            'orders',
            'advanced',
            'default',
            $slug
        );
    }

}


function gym_register_slogan () {
    add_settings_field (
        'gym_option_field_slogan',
        'Слоган Вашего сайта',
        'gym_option_slogan_cb',
        'general',
        'default',
        ['label_for' => 'gym_option_field_slogan']
    );
    register_setting(
        'general',
        'gym_option_field_slogan',
        'strval'

    );
}
function gym_option_slogan_cb ( $args ) {
    $slug = $args['label_for'];
?>
    <textarea
        id="<?php echo $slug; ?>"
        value="<?php echo get_option( $slug ); ?>"
        cols="30"
        rows="5"
        name="<?php echo $slug; ?>"
        class="regular-text code"
    >
        <?php echo get_option( $slug ); ?>
    </textarea>
<?php
}

function gym_modal_form_handler () {
    $name = $_POST['gym-user-name'] ? $_POST['gym-user-name'] : 'Аноним';
    $phone = $_POST['gym-user-phone'] ? $_POST['gym-user-phone'] : false;
    $choice = $_POST['form-post-id'] ? $_POST['form-post-id'] : 'empty';


    if ( $phone ) {
        $name = wp_strip_all_tags( $name );
        $phone = wp_strip_all_tags( $phone );
        $choice = wp_strip_all_tags( $choice );
        $id = wp_insert_post( wp_slash([
            'post_title' => 'Заявка №',
            'post_type' => 'orders',
            'post_status' => 'publish',
            'meta_input' => [
                'gym_order_name' => $name,
                'gym_order_phone' => $phone,
                'gym_order_choice_id' => $choice
            ]
        ]));
        if ( $id !== 0 ) {
            wp_update_post([
                'ID' => $id,
                'post_title' => 'Заявка №' . $id
            ]);
            update_field('orders_status', 'new', $id);
        }
    }
    header('Location:'. home_url());

}
function gym_order_fields_cb ( $post_obj, $slug ) {
     $slug = $slug['args'];
     switch ( $slug ) {
         case 'gym_order_date':
             $data = $post_obj->post_date;
             break;
         case 'gym_order_choice_id':
             $id = get_post_meta( $post_obj->ID, $slug, true );
             $title = get_the_title( $id );
             $type = get_post_type_object( get_post_type( $id ))->labels->name;
             $data = 'Клиент выбрал: <strong>' . $title . '</strong>' . '<br>Из раздела:<strong> ' . $type . '</strong>';
             break;
         default:
             $data = get_post_meta( $post_obj->ID, $slug, true );
             $data = $data ? $data : 'Нет данных';
             break;
     }

     echo '<p>' . $data . '</p>' ;

}


function gym_order_status_column($col_name, $id) {
    if ( $col_name !== 'col_order_status' ) return;
    $status = get_post_meta($id,'orders_status', true);
    switch ( $status ) {
        case 'new':
            echo '<strong><span style="color: #00ff00;" >'. $status .'</span></strong>' ;
            break;
        case 'proccessing':
            echo '<strong><span style="color: #ff9900;" >'. $status .'</span</strong>' ;
            break;
        case 'done':
            echo '<strong><span style="color: #ff0000;" >'. $status .'</span> </strong>';
            break;

        default:
            echo '<span>'. $status .'</span>' ;
            break;
    }
}
function gym_add_col_order_status($defaults) {
    $type = get_current_screen();
    if ($type->post_type === 'orders') {
        $defaults['col_order_status'] = 'Статус заказа';
    }
    return $defaults;
}

function gym_assets_path ( $name ) {
    return get_template_directory_uri() . '/assets/' . $name;
}