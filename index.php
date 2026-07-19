<?php
/**
 * The main template file (記事一覧・メインループ)
 *
 * @package HospitalTheme
 */

get_header();
?>

    <main id="main" class="site-content" role="main">
        <div class="container">

            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( '新着情報', 'hospital-theme' ); ?></h1>
                </header>
            <?php endif; ?>

            <div class="two-column">
                <div class="content-area">

                    <?php if ( have_posts() ) : ?>

                        <div class="posts-list">
                            <?php
                            /* メインループ（have_posts / the_post） */
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/content/content', get_post_format() );
                            endwhile;
                            ?>
                        </div><!-- .posts-list -->

                        <?php
                        /* ページネーション */
                        the_posts_pagination(
                            [
                                'mid_size'  => 2,
                                'prev_text' => '&laquo; ' . __( '前へ', 'hospital-theme' ),
                                'next_text' => __( '次へ', 'hospital-theme' ) . ' &raquo;',
                            ]
                        );
                        ?>

                    <?php else : ?>
                        <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                    <?php endif; ?>

                </div><!-- .content-area -->

                <?php get_sidebar(); ?>

            </div><!-- .two-column -->
        </div><!-- .container -->
    </main><!-- #main -->

<?php
get_footer();
