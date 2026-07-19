<?php
/**
 * Template for displaying 404 pages
 *
 * @package HospitalTheme
 */

get_header();
?>

    <main id="main" class="site-content" role="main">
        <div class="container">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'ページが見つかりません', 'hospital-theme' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'お探しのページが見つかりませんでした。URLをご確認いただくか、検索をお試しください。', 'hospital-theme' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </div><!-- .container -->
    </main><!-- #main -->

<?php
get_footer();
