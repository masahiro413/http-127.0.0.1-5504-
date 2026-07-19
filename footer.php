    <footer class="site-footer" role="contentinfo">
        <div class="container">

            <div class="footer-widgets">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php else : ?>
                    <div class="footer-widget">
                        <h3 class="footer-widget-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
                        <p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php else : ?>
                    <div class="footer-widget">
                        <h3 class="footer-widget-title"><?php esc_html_e( '診療時間', 'hospital-theme' ); ?></h3>
                        <p><?php esc_html_e( '月〜金：9:00〜17:00', 'hospital-theme' ); ?><br>
                        <?php esc_html_e( '土：9:00〜12:00', 'hospital-theme' ); ?><br>
                        <?php esc_html_e( '日・祝：休診', 'hospital-theme' ); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                <?php else : ?>
                    <div class="footer-widget">
                        <h3 class="footer-widget-title"><?php esc_html_e( 'アクセス', 'hospital-theme' ); ?></h3>
                        <p><?php esc_html_e( '〒000-0000', 'hospital-theme' ); ?><br>
                        <?php esc_html_e( '○○県○○市○○町1-1-1', 'hospital-theme' ); ?><br>
                        <?php esc_html_e( 'TEL：000-000-0000', 'hospital-theme' ); ?></p>
                    </div>
                <?php endif; ?>
            </div><!-- .footer-widgets -->

            <nav class="footer-nav" aria-label="<?php esc_attr_e( 'フッターメニュー', 'hospital-theme' ); ?>">
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu-list',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]
                );
                ?>
            </nav><!-- .footer-nav -->

        </div><!-- .container -->

        <div class="site-info">
            <p>
                &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
                <?php esc_html_e( 'All rights reserved.', 'hospital-theme' ); ?>
            </p>
        </div><!-- .site-info -->

    </footer><!-- .site-footer -->

</div><!-- .site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
