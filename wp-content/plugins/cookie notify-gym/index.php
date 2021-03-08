<?php
/*
Plugin Name: Cookie Notify by Gym
Description: Выводит уведобление для пользователей сайта, о том что что сайт использует Cookie
 */

register_activation_hook(__FILE__, 'gcnotify_activation');
register_deactivation_hook(__FILE__, 'gcnotify_deactivation');
register_uninstall_hook(__FILE__, 'gcnotify_delete');

function gcnotify_options() {
    return [
        'gcnotify-bg' => '#000',
        'gcnotify-color' => '#fff',
        'gcnotify-text' => 'This site uses cookies to store data. By continuing to use the site, you agree to work with these files. ',
        'gcnotify-position' => 'bottom'
    ];
}


function gcnotify_activation() {
    $options = gcnotify_options();
    foreach ( $options as $key => $value ){
        update_option( $key, $value);
    }

}

function gcnotify_deactivation() {
    $options = gcnotify_options();
    foreach ( $options as $key => $value ){
        delete_option( $key );
    }
}

function gcnotify_delete() {

}

add_action( 'admin_menu', 'gcnotify_register_menu');

function gcnotify_register_menu() {
    add_menu_page(
        'Cookie уведомление',
        'Cookie уведомление',
        'manage_options',
        'gcnotify_settings',
        'gcnotify_admin_page_view',
        'dashicons-buddicons-community'
    );
}

function gcnotify_admin_page_view() {
    if ( !empty($_POST) ) {
        update_option('gcnotify-bg', $_POST['gcnotify-bg']);
        update_option('gcnotify-color', $_POST['gcnotify-color']);
        update_option('gcnotify-text', $_POST['gcnotify-text']);
        update_option('gcnotify-position', $_POST['gcnotify-position']);
    }

    $bg = get_option('gcnotify-bg');
    $color = get_option('gcnotify-color');
    $text = get_option('gcnotify-text');
    $position = get_option('gcnotify-position');
?>
  <h2>настройки уведомления</h2>
    <form  method="post">
        <p>
            <label>
                Введите значение для цвета фона:
                <input type="text" name="gcnotify-bg" value="<?php echo $bg; ?>">
            </label>
        </p>
        <p>
            <label>
                Введите значение для цвета текста:
                <input type="text" name="gcnotify-color" value="<?php echo $color; ?>">
            </label>
        </p>
        <p>
            <label>
                Введите текст уведомления:
                <input type="text" name="gcnotify-text" value="<?php echo $text; ?>">
            </label>
        </p>
        <fieldset>
            <legend>Введите значение позиции уведомления:</legend>
            <label>
                Сверху
                <input type="radio" name="gcnotify-position" value="top" <?php checked( 'top', $position, true); ?>>
            </label>
            <label>
                Снизу
                <input type="radio" name="gcnotify-position" value="bottom" <?php checked( 'bottom', $position, true); ?>>
            </label>

        </fieldset>
        <br><br>
        <button type="submit">Сохранить настройки</button>
    </form>

<?php
}

add_action( 'wp_footer', 'gcnotify_front_page_view');

function gcnotify_front_page_view() {
    if ( $_COOKIE['gcnotify_cookie_agreement'] !== 'agreed' ) :

    $bg = get_option('gcnotify-bg');
    $color = get_option('gcnotify-color');
    $text = get_option('gcnotify-text');
    $position = get_option('gcnotify-position');
    $css = $position . ': 0;';
?>
    <div class="alert">
        <div class="alert-wrapper">
            <?php echo $text ?>
            <br>
            <br>
            <button class="alert__btn">Accept and close</button>
        </div>
    </div>
        <style>
            .alert {
                color : <?php echo  $color; ?> ;
                background-color: <?php echo  $bg; ?>;
                position: fixed;
            <?php echo  $css; ?>
                left: 0;
                z-index: 9999999;
                text-align: center;
                padding: 20px 10px;
                margin: 0;
                width: 100%;
            }
            .alert button {
                border: 1px solid <?php echo  $color; ?>;
                color : <?php echo  $color; ?> ;
                background-color: transparent;
                font: inherit;
                font-size: 14px;
                padding: 10px 20px;
                cursor: pointer;
            }
            .alert button:hover,
            .alert button:active,
            .alert button:focus{
                background-color: <?php echo  $color; ?>;
                color: <?php echo  $bg; ?>;
                transition: 0.3s;
            }
        </style>

        <script>
            const url = "<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?> ";
            const btn = document.querySelector('.alert__btn');
            btn.addEventListener('click' , function (e) {
                const data = new FormData();
                data.append('action', 'gcnotify_cookie_ajax');
                const xhr = new XMLHttpRequest();
                xhr.open('POST', url);
                xhr.send(data);
                xhr.addEventListener('readystatechange', function () {
                    if ( xhr.readyState !== 4 ) return;
                    if ( xhr.status === 200 ) {
                        btn.parentElement.parentElement.remove();
                    }
                })
            })

        </script>
    </div>
<?php

    endif;
}


add_action('wp_ajax_nopriv_gcnotify_cookie_ajax', 'gcnotify_ajax_handler');
add_action('wp_ajax_gcnotify_cookie_ajax', 'gcnotify_ajax_handler');

function gcnotify_ajax_handler() {
    setcookie('gcnotify_cookie_agreement', 'agreed', time()+60+60*24*30, '/' );
    echo 'OK';
    wp_die();
}