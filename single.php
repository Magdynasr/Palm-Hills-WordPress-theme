<?php
/**
 * Single Post / News Template
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-hero">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'palm-hills-school' ); ?></a>
            <span class="sep">›</span>
            <a href="<?php echo esc_url( home_url( '/news' ) ); ?>"><?php esc_html_e( 'News', 'palm-hills-school' ); ?></a>
            <span class="sep">›</span>
            <span><?php the_title(); ?></span>
        </nav>
        <h1><?php the_title(); ?></h1>
        <p>
            <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time>
            <?php
            $cats = get_the_category();
            if ( $cats ) echo ' · ' . esc_html( $cats[0]->name );
            ?>
        </p>
    </div>
</div>

<section class="section">
    <div class="container">
        <article style="max-width: 820px; margin-inline: auto;">
            <?php if ( has_post_thumbnail() ) : ?>
                <div style="border-radius: var(--radius-xl); overflow:hidden; margin-bottom: var(--space-10); box-shadow: var(--shadow-lg);">
                    <?php the_post_thumbnail( 'palm-hero', [ 'style' => 'width:100%;height:auto;', 'alt' => get_the_title() ] ); ?>
                </div>
            <?php endif; ?>

            <div class="page-content" style="line-height:1.8; color: var(--color-gray-800);">
                <?php the_content(); ?>
            </div>

            <?php
            $prev = get_previous_post();
            $next = get_next_post();
            if ( $prev || $next ) : ?>
                <div style="display:flex; justify-content:space-between; margin-top: var(--space-12); padding-top: var(--space-8); border-top: 1px solid var(--color-gray-200); gap: var(--space-4);">
                    <?php if ( $prev ) : ?>
                        <a href="<?php echo get_permalink( $prev ); ?>" class="btn btn--outline-navy">
                            ← <?php echo esc_html( $prev->post_title ); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ( $next ) : ?>
                        <a href="<?php echo get_permalink( $next ); ?>" class="btn btn--outline-navy" style="margin-left:auto;">
                            <?php echo esc_html( $next->post_title ); ?> →
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </article>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
