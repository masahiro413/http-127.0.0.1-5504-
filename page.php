<?php
/**
 * Template for displaying static pages (固定ページ)
 *
 * get_template_part() によるテンプレートパーツ化を実践。
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

                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

                            <?php hospital_breadcrumbs(); ?>

                            <header class="entry-header">
                                <h1 class="page-title"><?php the_title(); ?></h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php
                                the_content();
                                wp_link_pages(
                                    [
                                        'before' => '<div class="page-links">' . esc_html__( 'ページ:', 'hospital-theme' ),
                                        'after'  => '</div>',
                                    ]
                                );
                                ?>
                            </div><!-- .entry-content -->

                            <?php if ( get_edit_post_link() ) : ?>
                                <footer class="entry-footer">
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(
                                                /* translators: %s: Name of current post. Only visible to screen readers */
                                                __( 'Edit <span class="screen-reader-text">%s</span>', 'hospital-theme' ),
                                                [ 'span' => [ 'class' => [] ] ]
                                            ),
                                            wp_kses_post( get_the_title() )
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                    ?>
                                </footer><!-- .entry-footer -->
                            <?php endif; ?>

                        </article><!-- #post-<?php the_ID(); ?> -->

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
