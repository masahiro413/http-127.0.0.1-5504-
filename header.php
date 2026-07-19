<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">

    <header class="site-header" role="banner">
        <div class="container">

            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <p class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </p>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'メニューを開閉する', 'hospital-theme' ); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav id="primary-menu" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'プライマリメニュー', 'hospital-theme' ); ?>">
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu-list',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ]
                );
                ?>
            </nav><!-- .main-navigation -->

        </div><!-- .container -->
    </header><!-- .site-header -->
