<?php
/**
 * Hospital Classic Theme - ナビゲーションメニューの登録
 *
 * register_nav_menus() でメニューロケーションを登録します。
 * テーマ内では wp_nav_menu() で動的出力します。
 *
 * @package HospitalTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ナビゲーションメニューの登録
 */
function hospital_register_nav_menus() {
    register_nav_menus(
        [
            'primary'   => __( 'プライマリメニュー', 'hospital-theme' ),
            'footer'    => __( 'フッターメニュー', 'hospital-theme' ),
        ]
    );
}
add_action( 'after_setup_theme', 'hospital_register_nav_menus' );
