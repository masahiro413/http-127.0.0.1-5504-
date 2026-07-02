<?php
/**
 * Template for displaying single posts (投稿詳細ページ)
 *
 * @package HospitalTheme
 */

get_header();
?>

    <main id="main" class="site-content" role="main">
        <div class="container">
            <div class="two-column">
                <div class="content-area">

                    <?php
                    while ( have_posts() ) :
                        the_post();
                    ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php hospital_breadcrumbs(); ?>

                            <header class="single-post-header">
                                <?php hospital_post_meta(); ?>
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <?php the_post_thumbnail( 'post-thumbnail', [ 'loading' => 'eager' ] ); ?>
                                    </div>
                                <?php endif; ?>
                            </header><!-- .single-post-header -->

                            <div class="entry-content">
                                <?php
                                the_content(
                                    sprintf(
                                        wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hospital-theme' ),
                                            [ 'span' => [ 'class' => [] ] ]
                                        ),
                                        wp_kses_post( get_the_title() )
                                    )
                                );

                                wp_link_pages(
                                    [
                                        'before' => '<div class="page-links">' . esc_html__( 'ページ:', 'hospital-theme' ),
                                        'after'  => '</div>',
                                    ]
                                );
                                ?>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                <?php hospital_the_post_tags(); ?>
                                <?php hospital_sns_share_buttons( get_the_ID() ); ?>
                            </footer><!-- .entry-footer -->

                        </article><!-- #post-<?php the_ID(); ?> -->

                        <?php hospital_related_posts( get_the_ID() ); ?>

                        <?php
                        // 前後の投稿ナビゲーション
                        the_post_navigation(
                            [
                                'prev_text' => '<span class="nav-subtitle">' . esc_html__( '前の記事', 'hospital-theme' ) . '</span><span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">' . esc_html__( '次の記事', 'hospital-theme' ) . '</span><span class="nav-title">%title</span>',
                            ]
                        );
                        ?>

                        <?php if ( comments_open() || get_comments_number() ) : ?>
                            <?php comments_template(); ?>
                        <?php endif; ?>

                    <?php endwhile; ?>

                </div><!-- .content-area -->

                <?php get_sidebar(); ?>

            </div><!-- .two-column -->
        </div><!-- .container -->
    </main><!-- #main -->

<?php
get_footer();
