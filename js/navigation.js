/**
 * Hospital Classic Theme - Navigation JS
 *
 * ハンバーガーメニューのトグル制御など、
 * フロントエンドの動作制御を担います。
 * functions.php の wp_enqueue_scripts を経由してエンキューされます。
 *
 * @package HospitalTheme
 */

( function () {
    'use strict';

    /* ----------------------------------------------------------
     * ハンバーガーメニューのトグル
     * ---------------------------------------------------------- */
    var menuToggle = document.querySelector( '.menu-toggle' );
    var primaryMenu = document.getElementById( 'primary-menu' );

    if ( menuToggle && primaryMenu ) {
        menuToggle.addEventListener( 'click', function () {
            var expanded = menuToggle.getAttribute( 'aria-expanded' ) === 'true';
            menuToggle.setAttribute( 'aria-expanded', String( ! expanded ) );
            primaryMenu.classList.toggle( 'is-active' );
        } );
    }

    /* ----------------------------------------------------------
     * スクロール時のヘッダー影の調整
     * ---------------------------------------------------------- */
    var header = document.querySelector( '.site-header' );

    if ( header ) {
        window.addEventListener( 'scroll', function () {
            if ( window.scrollY > 10 ) {
                header.classList.add( 'is-scrolled' );
            } else {
                header.classList.remove( 'is-scrolled' );
            }
        } );
    }

    /* ----------------------------------------------------------
     * ページトップへスムーズスクロール
     * ---------------------------------------------------------- */
    var scrollTopBtn = document.querySelector( '.scroll-top' );

    if ( scrollTopBtn ) {
        scrollTopBtn.addEventListener( 'click', function ( e ) {
            e.preventDefault();
            window.scrollTo( { top: 0, behavior: 'smooth' } );
        } );

        window.addEventListener( 'scroll', function () {
            if ( window.scrollY > 300 ) {
                scrollTopBtn.classList.add( 'is-visible' );
            } else {
                scrollTopBtn.classList.remove( 'is-visible' );
            }
        } );
    }

} )();
