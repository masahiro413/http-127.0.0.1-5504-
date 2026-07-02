<?php
/**
 * Hospital Classic Theme - カスタムフック
 *
 * add_action / add_filter を活用した非侵襲的なカスタマイズ。
 * コアファイルを直接編集せずにWordPressの動作を拡張します。
 *
 * @package HospitalTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ------------------------------------------------------------------
 * アーカイブタイトルのカスタマイズ（add_filter の活用）
 * ------------------------------------------------------------------ */

/**
 * the_archive_title() の出力をフィルターし、プレフィックスを調整します。
 *
 * @param string $title アーカイブタイトル
 * @return string カスタマイズ後のタイトル
 */
function hospital_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        /* translators: %s: tag name */
        $title = sprintf( __( 'タグ：%s', 'hospital-theme' ), single_tag_title( '', false ) );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_year() ) {
        /* translators: %s: year */
        $title = sprintf( __( '%s年', 'hospital-theme' ), get_the_date( 'Y' ) );
    } elseif ( is_month() ) {
        /* translators: %s: year-month */
        $title = sprintf( __( '%sの記事', 'hospital-theme' ), get_the_date( 'Y年n月' ) );
    } elseif ( is_day() ) {
        /* translators: %s: date */
        $title = sprintf( __( '%sの記事', 'hospital-theme' ), get_the_date() );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'hospital_archive_title' );

/* ------------------------------------------------------------------
 * 抜粋文字数・末尾のカスタマイズ
 * ------------------------------------------------------------------ */

/**
 * 抜粋の文字数を変更します（日本語対応）。
 *
 * @return int 文字数
 */
function hospital_excerpt_length() {
    return 80;
}
add_filter( 'excerpt_length', 'hospital_excerpt_length', 999 );

/**
 * 抜粋末尾の省略表記をカスタマイズします。
 *
 * @return string 省略表記
 */
function hospital_excerpt_more() {
    return '…';
}
add_filter( 'excerpt_more', 'hospital_excerpt_more' );

/* ------------------------------------------------------------------
 * body_class のカスタマイズ
 * ------------------------------------------------------------------ */

/**
 * body タグにテーマ固有のクラスを追加します。
 *
 * @param string[] $classes 既存のクラス配列
 * @return string[] 拡張後のクラス配列
 */
function hospital_body_classes( $classes ) {
    if ( is_singular() ) {
        $classes[] = 'singular';
    }
    return $classes;
}
add_filter( 'body_class', 'hospital_body_classes' );

/* ------------------------------------------------------------------
 * カスタムウィジェットエリアの登録
 * ------------------------------------------------------------------ */

/**
 * ウィジェットエリアを登録します。
 */
function hospital_widgets_init() {
    register_sidebar(
        [
            'name'          => __( 'サイドバー', 'hospital-theme' ),
            'id'            => 'sidebar-1',
            'description'   => __( '記事一覧・詳細ページのサイドバーに表示されます。', 'hospital-theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => __( 'フッターウィジェット 1', 'hospital-theme' ),
            'id'            => 'footer-1',
            'description'   => __( 'フッター左カラム', 'hospital-theme' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        ]
    );

    register_sidebar(
        [
            'name'          => __( 'フッターウィジェット 2', 'hospital-theme' ),
            'id'            => 'footer-2',
            'description'   => __( 'フッター中央カラム', 'hospital-theme' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        ]
    );

    register_sidebar(
        [
            'name'          => __( 'フッターウィジェット 3', 'hospital-theme' ),
            'id'            => 'footer-3',
            'description'   => __( 'フッター右カラム', 'hospital-theme' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        ]
    );
}
add_action( 'widgets_init', 'hospital_widgets_init' );
