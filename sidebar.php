<?php
/**
 * Sidebar template
 *
 * @package HospitalTheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'サイドバー', 'hospital-theme' ); ?>">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- .widget-area -->
