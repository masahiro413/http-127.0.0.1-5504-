<?php
/**
 * Template for displaying search results
 *
 * @package HospitalTheme
 */

get_header();
?>

    <main id="main" class="site-content" role="main">
        <div class="container">

            <header class="archive-header">
                <?php hospital_breadcrumbs(); ?>
                <h1 class="archive-title">
                    <?php
                    printf(
                        /* translators: %s: search query. */
                        esc_html__( '「%s」の検索結果', 'hospital-theme' ),
                        '<span>' . esc_html( get_search_query() ) . '</span>'
                    );
                    ?>
                </h1>
            </header><!-- .archive-header -->

            <div class="two-column">
                <div class="content-area">

                    <?php if ( have_posts() ) : ?>

                        <div class="posts-list">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/content/content', get_post_format() );
                            endwhile;
                            ?>
                        </div><!-- .posts-list -->

                        <?php
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
