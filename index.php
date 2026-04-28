<?php
/**
 * Main template — fallback for all views
 */
get_header();
?>

<div class="page-hero">
    <div class="container">
        <h1><?php
            if ( is_home() || is_front_page() )     bloginfo( 'name' );
            elseif ( is_category() )                echo 'Category: ' . single_cat_title( '', false );
            elseif ( is_tag() )                     echo 'Tag: ' . single_tag_title( '', false );
            elseif ( is_author() )                  echo 'Author: ' . get_the_author();
            elseif ( is_search() )                  echo 'Search: ' . get_search_query();
            elseif ( is_404() )                     esc_html_e( 'Page Not Found', 'palm-hills-school' );
            else                                    the_archive_title();
        ?></h1>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="grid grid--3">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="news-card card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="news-card__image">
                                <?php the_post_thumbnail( 'palm-card', [ 'loading' => 'lazy', 'alt' => get_the_title() ] ); ?>
                            </div>
                        <?php else : ?>
                            <div class="news-card__image news-card__image--placeholder"></div>
                        <?php endif; ?>
                        <div class="news-card__body">
                            <div class="news-card__meta">
                                <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
                            </div>
                            <h2 class="news-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="news-card__excerpt"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news-card__link">
                                <?php esc_html_e( 'Read More', 'palm-hills-school' ); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="text-align:center; margin-top: 3rem;">
                <?php the_posts_pagination( [
                    'prev_text' => '&larr; ' . __( 'Previous', 'palm-hills-school' ),
                    'next_text' => __( 'Next', 'palm-hills-school' ) . ' &rarr;',
                ] ); ?>
            </div>

        <?php elseif ( is_search() ) : ?>
            <p><?php esc_html_e( 'No results found for your search. Try different keywords.', 'palm-hills-school' ); ?></p>
        <?php elseif ( is_404() ) : ?>
            <div style="text-align:center; padding: 4rem 0;">
                <h2 style="font-size:6rem; color: var(--color-gray-200); margin-bottom: 1rem;">404</h2>
                <p><?php esc_html_e( 'Sorry, the page you\'re looking for doesn\'t exist.', 'palm-hills-school' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary" style="margin-top:2rem;"><?php esc_html_e( 'Back to Home', 'palm-hills-school' ); ?></a>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'No content found.', 'palm-hills-school' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
