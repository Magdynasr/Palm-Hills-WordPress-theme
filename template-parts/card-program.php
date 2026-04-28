<?php
/**
 * Template Part: Program Card
 * Used by: programs post type archive / front-page
 */
$color = get_post_meta( get_the_ID(), 'program_color', true ) ?: '#1a2744';
$grade = get_post_meta( get_the_ID(), 'program_grade', true );
$icon  = get_post_meta( get_the_ID(), 'program_icon',  true ) ?: '📚';
?>
<article class="program-card card fade-up">
    <div class="program-card__header" style="--prog-color: <?php echo esc_attr( $color ); ?>">
        <div class="program-card__icon"><?php echo $icon; ?></div>
        <?php if ( $grade ) : ?>
            <span class="program-card__grade"><?php echo esc_html( $grade ); ?></span>
        <?php endif; ?>
    </div>
    <div class="program-card__body">
        <h3 class="program-card__title"><?php the_title(); ?></h3>
        <p style="font-size: var(--font-size-sm); color: var(--color-gray-600); margin-bottom: var(--space-4);">
            <?php the_excerpt(); ?>
        </p>
        <a href="<?php the_permalink(); ?>" class="program-card__link">
            <?php esc_html_e( 'Learn More', 'palm-hills-school' ); ?>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</article>
