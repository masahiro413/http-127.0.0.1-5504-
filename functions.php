<?php
/**
 * Hospital Classic Theme - functions.php
 *
 * テーマの中核設定ファイル。
 * 機能ごとに inc/ 配下のファイルへ分割し、責務を明確化しています。
 *
 * @package HospitalTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ------------------------------------------------------------------
 * 定数定義
 * ------------------------------------------------------------------ */
define( 'HOSPITAL_THEME_VERSION', '1.0.0' );
define( 'HOSPITAL_THEME_DIR', get_template_directory() );
define( 'HOSPITAL_THEME_URI', get_template_directory_uri() );

/* ------------------------------------------------------------------
 * 機能別ファイルの読み込み
 * ------------------------------------------------------------------ */
$hospital_includes = [
    '/inc/theme-setup.php',
    '/inc/enqueue.php',
    '/inc/nav-menus.php',
    '/inc/template-tags.php',
    '/inc/custom-hooks.php',
];

foreach ( $hospital_includes as $file ) {
    $filepath = HOSPITAL_THEME_DIR . $file;
    if ( file_exists( $filepath ) ) {
        require_once $filepath;
    }
}
