<?php
/**
 * Hospital Classic Theme - テーマ初期設定
 *
 * add_theme_support() による WordPress 標準機能の拡張と
 * コンテンツ幅の設定を行います。
 *
 * @package HospitalTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * テーマ初期設定
 */
function hospital_theme_setup() {

    // テキストドメインの読み込み（翻訳対応）
    load_theme_textdomain( 'hospital-theme', HOSPITAL_THEME_DIR . '/languages' );

    // 自動フィードリンク
    add_theme_support( 'automatic-feed-links' );

    // title タグをWordPressが管理
    add_theme_support( 'title-tag' );

    // アイキャッチ画像
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 630, true );
    add_image_size( 'hospital-card', 600, 338, true );
    add_image_size( 'hospital-related', 400, 225, true );

    // HTML5 マークアップ
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );

    // カスタムロゴ
    add_theme_support(
        'custom-logo',
        [
            'height'      => 80,
            'width'       => 240,
            'flex-width'  => true,
            'flex-height' => true,
        ]
    );

    // ブロックエディター向けカラーパレット
    add_theme_support(
        'editor-color-palette',
        [
            [
                'name'  => __( 'Hospital Blue', 'hospital-theme' ),
                'slug'  => 'hospital-blue',
                'color' => '#005bac',
            ],
            [
                'name'  => __( 'Dark Navy', 'hospital-theme' ),
                'slug'  => 'dark-navy',
                'color' => '#1a2d4a',
            ],
            [
                'name'  => __( 'Light Gray', 'hospital-theme' ),
                'slug'  => 'light-gray',
                'color' => '#f9f9f9',
            ],
        ]
    );

    // エディタースタイルの同期
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'hospital_theme_setup' );

/**
 * コンテンツ幅の設定
 */
function hospital_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'hospital_content_width', 720 );
}
add_action( 'after_setup_theme', 'hospital_content_width', 0 );
