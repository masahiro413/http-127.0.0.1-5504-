<?php
/**
 * Template part: 投稿が見つからない場合の表示
 *
 * @package HospitalTheme
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( '記事が見つかりません', 'hospital-theme' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p>
                <?php
                printf(
                    wp_kses(
                        /* translators: 1: link to WP admin new post page. */
                        __( 'まだ記事がありません。<a href="%1$s">最初の記事を投稿しましょう</a>！', 'hospital-theme' ),
                        [ 'a' => [ 'href' => [] ] ]
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                ?>
            </p>
        <?php elseif ( is_search() ) : ?>
            <p><?php esc_html_e( '検索キーワードを変えて再度お試しください。', 'hospital-theme' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'お探しのコンテンツが見つかりませんでした。', 'hospital-theme' ); ?></p>
        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
