<?php
/**
 * Hospital Classic Theme - テンプレートタグ（共通ヘルパー関数）
 *
 * テンプレートファイルから呼び出す再利用可能な関数を定義します。
 * DRY原則に基づき、繰り返し処理を関数化しています。
 *
 * @package HospitalTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ------------------------------------------------------------------
 * 投稿タグ一覧の取得・出力（DRY原則の適用）
 * ------------------------------------------------------------------ */

/**
 * 現在の投稿に紐付くタグの配列を返します。
 *
 * @param int|null $post_id 投稿 ID（省略時は現在の投稿）
 * @return WP_Term[] タグの配列。タグが無い場合は空配列。
 */
function hospital_get_post_tags( $post_id = null ) {
    $tags = get_the_tags( $post_id );
    return is_array( $tags ) ? $tags : [];
}

/**
 * タグ一覧 HTML を出力します。
 *
 * @param int|null $post_id 投稿 ID（省略時は現在の投稿）
 */
function hospital_the_post_tags( $post_id = null ) {
    $tags = hospital_get_post_tags( $post_id );
    if ( empty( $tags ) ) {
        return;
    }
    echo '<div class="post-tags">';
    echo '<span class="tag-label">' . esc_html__( 'タグ：', 'hospital-theme' ) . '</span>';
    foreach ( $tags as $tag ) {
        printf(
            '<a href="%s">%s</a>',
            esc_url( get_tag_link( $tag ) ),
            esc_html( $tag->name )
        );
    }
    echo '</div>';
}

/* ------------------------------------------------------------------
 * パンくずリスト
 * ------------------------------------------------------------------ */

/**
 * パンくずリストを出力します。
 * プラグイン非依存の軽量実装です。
 */
function hospital_breadcrumbs() {
    $separator = '<span aria-hidden="true">&rsaquo;</span>';

    echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'パンくずリスト', 'hospital-theme' ) . '">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'ホーム', 'hospital-theme' ) . '</a>';

    if ( is_single() ) {
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $cat = $categories[0];
            echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
        }
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';

    } elseif ( is_page() ) {
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';

    } elseif ( is_category() ) {
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span aria-current="page">' . esc_html( single_cat_title( '', false ) ) . '</span>';

    } elseif ( is_tag() ) {
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span aria-current="page">' . esc_html( single_tag_title( '', false ) ) . '</span>';

    } elseif ( is_date() ) {
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span aria-current="page">' . esc_html( get_the_date( 'Y年n月' ) ) . '</span>';

    } elseif ( is_search() ) {
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        /* translators: %s: search keyword */
        echo '<span aria-current="page">' . esc_html( sprintf( __( '「%s」の検索結果', 'hospital-theme' ), get_search_query() ) ) . '</span>';

    } elseif ( is_404() ) {
        echo $separator; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<span aria-current="page">' . esc_html__( 'ページが見つかりません', 'hospital-theme' ) . '</span>';
    }

    echo '</nav>';
}

/* ------------------------------------------------------------------
 * SNS シェアボタン
 * ------------------------------------------------------------------ */

/**
 * SNS シェアボタンを出力します。
 *
 * @param int|null $post_id 投稿 ID（省略時は現在の投稿）
 */
function hospital_sns_share_buttons( $post_id = null ) {
    $post_url   = esc_url( get_permalink( $post_id ) );
    $post_title = esc_attr( get_the_title( $post_id ) );

    $twitter_url  = 'https://twitter.com/intent/tweet?url=' . rawurlencode( get_permalink( $post_id ) ) . '&text=' . rawurlencode( get_the_title( $post_id ) );
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( get_permalink( $post_id ) );
    $line_url     = 'https://social-plugins.line.me/lineit/share?url=' . rawurlencode( get_permalink( $post_id ) );
    ?>
    <div class="sns-share">
        <p class="sns-share-title"><?php esc_html_e( 'この記事をシェア', 'hospital-theme' ); ?></p>
        <div class="sns-share-buttons">
            <a href="<?php echo esc_url( $twitter_url ); ?>"
               class="sns-share-btn twitter"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="<?php esc_attr_e( 'Twitterでシェア', 'hospital-theme' ); ?>">
                Twitter
            </a>
            <a href="<?php echo esc_url( $facebook_url ); ?>"
               class="sns-share-btn facebook"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="<?php esc_attr_e( 'Facebookでシェア', 'hospital-theme' ); ?>">
                Facebook
            </a>
            <a href="<?php echo esc_url( $line_url ); ?>"
               class="sns-share-btn line"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="<?php esc_attr_e( 'LINEでシェア', 'hospital-theme' ); ?>">
                LINE
            </a>
        </div>
    </div>
    <?php
}

/* ------------------------------------------------------------------
 * 関連記事の取得
 * ------------------------------------------------------------------ */

/**
 * 同カテゴリーの関連記事を WP_Query で取得して出力します。
 *
 * @param int $post_id   現在の投稿 ID
 * @param int $max_posts 表示件数（デフォルト: 3）
 */
function hospital_related_posts( $post_id, $max_posts = 3 ) {
    $categories = get_the_category( $post_id );
    if ( empty( $categories ) ) {
        return;
    }

    $cat_ids = wp_list_pluck( $categories, 'term_id' );

    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => absint( $max_posts ),
        'post__not_in'        => [ absint( $post_id ) ],
        'category__in'        => array_map( 'absint', $cat_ids ),
        'ignore_sticky_posts' => true,
        'orderby'             => 'rand',
        'no_found_rows'       => true,
    ];

    $related_query = new WP_Query( $args );

    if ( ! $related_query->have_posts() ) {
        return;
    }
    ?>
    <section class="related-posts">
        <h2 class="section-title"><?php esc_html_e( '関連記事', 'hospital-theme' ); ?></h2>
        <div class="related-posts-list">
            <?php
            while ( $related_query->have_posts() ) :
                $related_query->the_post();
                ?>
                <article class="related-post-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'hospital-related', [ 'loading' => 'lazy' ] ); ?>
                        <?php endif; ?>
                        <p class="related-post-title"><?php the_title(); ?></p>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}

/* ------------------------------------------------------------------
 * 投稿メタ情報（日付・カテゴリー）の出力
 * ------------------------------------------------------------------ */

/**
 * 投稿メタ情報（投稿日・カテゴリー）を出力します。
 */
function hospital_post_meta() {
    ?>
    <div class="post-meta">
        <time class="post-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
            <?php echo esc_html( get_the_date() ); ?>
        </time>
        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) :
            $cat = $categories[0];
            ?>
            <a class="post-category" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
                <?php echo esc_html( $cat->name ); ?>
            </a>
        <?php endif; ?>
    </div>
    <?php
}
