<?php
/**
 * Template part: 通常投稿カード
 *
 * @package HospitalTheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail" tabindex="-1" aria-hidden="true">
            <?php the_post_thumbnail( 'hospital-card', [ 'loading' => 'lazy' ] ); ?>
        </a>
    <?php endif; ?>

    <div class="post-body">
        <?php hospital_post_meta(); ?>

        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div><!-- .post-body -->

</article><!-- #post-<?php the_ID(); ?> -->
