<?php
/**
 * Template for displaying archive pages
 * カテゴリー別・日付別アーカイブページ
 *
 * @package HospitalTheme
 */

get_header();
?>

    <main id="main" class="site-content" role="main">
        <div class="container">

            <header class="archive-header">
                <?php hospital_breadcrumbs(); ?>
                <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
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
