<?php
/**
 * Hospital Classic Theme - CSS / JavaScript のエンキュー
 *
 * wp_enqueue_scripts フックを使い、スタイルシートと
 * スクリプトを適切に読み込みます。
 *
 * @package HospitalTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * フロントエンド用スタイルシート・スクリプトの登録
 */
function hospital_enqueue_scripts() {

    // Google Fonts（Noto Sans JP）
    wp_enqueue_style(
        'hospital-google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600;700&display=swap',
        [],
        null
    );

    // メインスタイルシート（style.css）
    wp_enqueue_style(
        'hospital-style',
        get_stylesheet_uri(),
        [ 'hospital-google-fonts' ],
        HOSPITAL_THEME_VERSION
    );

    // ナビゲーション・汎用 JavaScript
    wp_enqueue_script(
        'hospital-navigation',
        HOSPITAL_THEME_URI . '/js/navigation.js',
        [],
        HOSPITAL_THEME_VERSION,
        true  // フッターに出力
    );

    // コメント返信スクリプト（コメントページのみ）
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'hospital_enqueue_scripts' );

/**
 * ブロックエディター用スタイルシートの登録
 */
function hospital_enqueue_block_editor_assets() {
    wp_enqueue_style(
        'hospital-editor-style',
        HOSPITAL_THEME_URI . '/style.css',
        [],
        HOSPITAL_THEME_VERSION
    );
}
add_action( 'enqueue_block_editor_assets', 'hospital_enqueue_block_editor_assets' );
