<?php
/**
 * Generic Page Template
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-hero">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'palm-hills-school' ); ?></a>
            <span class="sep">›</span>
            <span><?php the_title(); ?></span>
        </nav>
        <h1><?php the_title(); ?></h1>
        <?php if ( has_excerpt() ) : ?>
            <p><?php the_excerpt(); ?></p>
        <?php endif; ?>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="page-content" style="max-width: 800px; margin-inline: auto;">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
