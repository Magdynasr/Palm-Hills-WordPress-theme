<?php
/**
 * Front Page Template — Palm Hills Online School Homepage
 */
get_header();
?>

<!-- =============================================
     HERO SECTION
     ============================================= -->
<section class="hero" id="hero" aria-label="<?php esc_attr_e( 'Hero', 'palm-hills-school' ); ?>">
    <?php
    $hero_bg_id = get_theme_mod( 'palm_hero_bg', '' );
    $hero_bg_url = $hero_bg_id ? wp_get_attachment_image_url( $hero_bg_id, 'palm-hero' ) : '';
    if ( $hero_bg_url ) : ?>
        <div class="hero__bg" style="background-image: url('<?php echo esc_url( $hero_bg_url ); ?>');" aria-hidden="true"></div>
    <?php else : ?>
        <div class="hero__bg hero__bg--gradient" aria-hidden="true"></div>
    <?php endif; ?>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="container hero__container">
        <div class="hero__content">
            <span class="hero__badge fade-up">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                <?php esc_html_e( 'Egypt\'s Premier Online School', 'palm-hills-school' ); ?>
            </span>
            <h1 class="hero__title fade-up delay-1">
                <?php echo esc_html( palm_get_option( 'palm_hero_title', 'Excellence in\nOnline Education' ) ); ?>
            </h1>
            <p class="hero__subtitle fade-up delay-2">
                <?php echo esc_html( palm_get_option( 'palm_hero_subtitle', 'Empowering students across Egypt with world-class online education, combining academic rigor with modern digital learning experiences.' ) ); ?>
            </p>
            <div class="hero__cta fade-up delay-3">
                <a href="<?php echo esc_url( palm_get_option( 'palm_hero_cta1_url', '/admissions' ) ); ?>" class="btn btn--primary btn--lg">
                    <?php echo esc_html( palm_get_option( 'palm_hero_cta1', 'Apply Now' ) ); ?>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="<?php echo esc_url( palm_get_option( 'palm_hero_cta2_url', '/programs' ) ); ?>" class="btn btn--outline btn--lg">
                    <?php echo esc_html( palm_get_option( 'palm_hero_cta2', 'Explore Programs' ) ); ?>
                </a>
            </div>
        </div>

        <!-- Hero Visual Card -->
        <div class="hero__visual fade-in delay-2" aria-hidden="true">
            <div class="hero-card">
                <div class="hero-card__header">
                    <div class="hero-card__avatar">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div>
                        <strong><?php esc_html_e( 'Student Dashboard', 'palm-hills-school' ); ?></strong>
                        <span><?php esc_html_e( 'Grade 10 — IGCSE', 'palm-hills-school' ); ?></span>
                    </div>
                </div>
                <div class="hero-card__stats">
                    <div class="hero-card__stat">
                        <span><?php esc_html_e( 'Courses', 'palm-hills-school' ); ?></span>
                        <strong>8</strong>
                    </div>
                    <div class="hero-card__stat">
                        <span><?php esc_html_e( 'Progress', 'palm-hills-school' ); ?></span>
                        <strong>74%</strong>
                    </div>
                    <div class="hero-card__stat">
                        <span><?php esc_html_e( 'Streak', 'palm-hills-school' ); ?></span>
                        <strong>21d</strong>
                    </div>
                </div>
                <div class="hero-card__progress">
                    <div class="hero-card__progress-label">
                        <span><?php esc_html_e( 'Mathematics', 'palm-hills-school' ); ?></span>
                        <span>88%</span>
                    </div>
                    <div class="hero-card__bar"><div style="width:88%"></div></div>
                    <div class="hero-card__progress-label">
                        <span><?php esc_html_e( 'Science', 'palm-hills-school' ); ?></span>
                        <span>76%</span>
                    </div>
                    <div class="hero-card__bar"><div style="width:76%"></div></div>
                    <div class="hero-card__progress-label">
                        <span><?php esc_html_e( 'English', 'palm-hills-school' ); ?></span>
                        <span>92%</span>
                    </div>
                    <div class="hero-card__bar"><div style="width:92%"></div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <a href="#stats" class="hero__scroll" aria-label="<?php esc_attr_e( 'Scroll down', 'palm-hills-school' ); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 12l4 4 4-4M12 8v8"/></svg>
    </a>
</section>

<!-- =============================================
     STATS BAR
     ============================================= -->
<section class="stats" id="stats" aria-label="<?php esc_attr_e( 'School Statistics', 'palm-hills-school' ); ?>">
    <div class="container">
        <div class="stats__grid">
            <?php
            $stats = [
                [ 'number' => '2,500+', 'label' => 'Enrolled Students',   'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>' ],
                [ 'number' => '15+',    'label' => 'Years of Excellence',  'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>' ],
                [ 'number' => '120+',   'label' => 'Expert Educators',     'icon' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>' ],
                [ 'number' => '98%',    'label' => 'Parent Satisfaction',  'icon' => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>' ],
            ];
            foreach ( $stats as $i => $stat ) : ?>
                <div class="stats__item fade-up delay-<?php echo $i + 1; ?>">
                    <div class="stats__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <?php echo $stat['icon']; ?>
                        </svg>
                    </div>
                    <div class="stats__number" data-target="<?php echo esc_attr( $stat['number'] ); ?>">
                        <?php echo esc_html( $stat['number'] ); ?>
                    </div>
                    <div class="stats__label"><?php echo esc_html( $stat['label'] ); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =============================================
     ABOUT SECTION
     ============================================= -->
<section class="section about" id="about">
    <div class="container">
        <div class="about__grid">
            <div class="about__visual fade-in">
                <div class="about__image-wrap">
                    <div class="about__image-main">
                        <div class="about__image-placeholder">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                    </div>
                    <div class="about__badge-card about__badge-card--founded">
                        <strong>2009</strong>
                        <span><?php esc_html_e( 'Founded', 'palm-hills-school' ); ?></span>
                    </div>
                    <div class="about__badge-card about__badge-card--accredited">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 0 1.946-.806 3.42 3.42 0 0 1 4.438 0 3.42 3.42 0 0 0 1.946.806 3.42 3.42 0 0 1 3.138 3.138 3.42 3.42 0 0 0 .806 1.946 3.42 3.42 0 0 1 0 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 1 0-4.438 3.42 3.42 0 0 0 .806-1.946 3.42 3.42 0 0 1 3.138-3.138z"/></svg>
                        <?php esc_html_e( 'MOE Accredited', 'palm-hills-school' ); ?>
                    </div>
                </div>
            </div>

            <div class="about__content fade-up">
                <span class="section__label"><?php esc_html_e( 'About Us', 'palm-hills-school' ); ?></span>
                <h2 class="about__title"><?php esc_html_e( 'Shaping Futures Through Digital Excellence', 'palm-hills-school' ); ?></h2>
                <p class="about__lead">
                    <?php esc_html_e( 'Palm Hills Online School is Egypt\'s leading private online education institution, combining the prestige of Palm Hills with cutting-edge digital learning technology.', 'palm-hills-school' ); ?>
                </p>
                <p class="about__text">
                    <?php esc_html_e( 'Founded in 2009, we have been at the forefront of transforming education in Egypt. Our curriculum blends the National Egyptian curriculum with international standards, preparing students for global opportunities while honoring our Egyptian heritage.', 'palm-hills-school' ); ?>
                </p>
                <div class="about__values">
                    <?php
                    $values = [
                        [ 'title' => 'Academic Excellence', 'text' => 'Rigorous curriculum delivered by certified educators with international training.' ],
                        [ 'title' => 'Holistic Development', 'text' => 'Beyond academics — arts, sports, life skills, and character building.' ],
                        [ 'title' => 'Digital Innovation', 'text' => 'State-of-the-art LMS platform with live classes, recorded lessons & AI tutoring.' ],
                    ];
                    foreach ( $values as $value ) : ?>
                        <div class="about__value">
                            <div class="about__value-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            <div>
                                <strong><?php echo esc_html( $value['title'] ); ?></strong>
                                <p><?php echo esc_html( $value['text'] ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="about__cta">
                    <a href="/about" class="btn btn--primary"><?php esc_html_e( 'Learn More About Us', 'palm-hills-school' ); ?></a>
                    <a href="/virtual-tour" class="btn btn--outline-navy"><?php esc_html_e( 'Virtual Tour', 'palm-hills-school' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     PROGRAMS SECTION
     ============================================= -->
<section class="section section--gray programs" id="programs">
    <div class="container">
        <div class="section__header fade-up">
            <span class="section__label"><?php esc_html_e( 'Academic Programs', 'palm-hills-school' ); ?></span>
            <h2 class="section__title"><?php esc_html_e( 'Programs Built for Success', 'palm-hills-school' ); ?></h2>
            <p class="section__desc"><?php esc_html_e( 'Comprehensive, accredited programs from Grade 1 through Grade 12 with multiple curriculum tracks.', 'palm-hills-school' ); ?></p>
        </div>

        <?php
        $programs_query = new WP_Query( [
            'post_type'      => 'palm_program',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ] );

        if ( $programs_query->have_posts() ) :
            echo '<div class="programs__grid grid grid--3">';
            while ( $programs_query->have_posts() ) : $programs_query->the_post();
                get_template_part( 'template-parts/card', 'program' );
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
        ?>
        <!-- Fallback static programs -->
        <div class="programs__grid grid grid--3">
            <?php
            $default_programs = [
                [ 'grade' => 'Grades 1–5',  'title' => 'Primary School',    'color' => '#4CAF82', 'icon' => '🌱', 'features' => [ 'Core subjects', 'Arabic & Islamic Studies', 'Arts & Music', 'Physical Education' ] ],
                [ 'grade' => 'Grades 6–8',  'title' => 'Middle School',     'color' => '#2196CC', 'icon' => '📚', 'features' => [ 'Advanced Sciences', 'Mathematics', 'Social Studies', 'Technology' ] ],
                [ 'grade' => 'Grades 9–12', 'title' => 'High School',       'color' => '#9C27B0', 'icon' => '🎓', 'features' => [ 'National Curriculum', 'University Preparation', 'Career Guidance', 'Leadership' ] ],
                [ 'grade' => 'Grades 9–12', 'title' => 'IGCSE Track',       'color' => '#c9a84c', 'icon' => '🌍', 'features' => [ 'Cambridge Curriculum', '30+ Subjects', 'Global Recognition', 'SAT Prep' ] ],
                [ 'grade' => 'All Grades',  'title' => 'STEM Enrichment',   'color' => '#F44336', 'icon' => '🔬', 'features' => [ 'Coding & Robotics', 'Science Labs (Virtual)', 'Math Olympiad', 'Innovation Projects' ] ],
                [ 'grade' => 'All Grades',  'title' => 'Arabic & Islamic',  'color' => '#3E6B3A', 'icon' => '📖', 'features' => [ 'Quran Memorization', 'Arabic Language', 'Islamic Studies', 'Heritage & Culture' ] ],
            ];
            foreach ( $default_programs as $i => $prog ) : ?>
                <article class="program-card card fade-up delay-<?php echo ( $i % 3 ) + 1; ?>">
                    <div class="program-card__header" style="--prog-color: <?php echo esc_attr( $prog['color'] ); ?>">
                        <div class="program-card__icon"><?php echo $prog['icon']; ?></div>
                        <span class="program-card__grade"><?php echo esc_html( $prog['grade'] ); ?></span>
                    </div>
                    <div class="program-card__body">
                        <h3 class="program-card__title"><?php echo esc_html( $prog['title'] ); ?></h3>
                        <ul class="program-card__features">
                            <?php foreach ( $prog['features'] as $feature ) : ?>
                                <li>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    <?php echo esc_html( $feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="/programs/<?php echo esc_attr( sanitize_title( $prog['title'] ) ); ?>" class="program-card__link">
                            <?php esc_html_e( 'Learn More', 'palm-hills-school' ); ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="programs__footer fade-up">
            <a href="/programs" class="btn btn--outline-navy btn--lg"><?php esc_html_e( 'View All Programs', 'palm-hills-school' ); ?></a>
        </div>
    </div>
</section>

<!-- =============================================
     WHY CHOOSE US
     ============================================= -->
<section class="section features" id="features">
    <div class="container">
        <div class="section__header fade-up">
            <span class="section__label"><?php esc_html_e( 'Why Palm Hills', 'palm-hills-school' ); ?></span>
            <h2 class="section__title"><?php esc_html_e( 'Education That Sets the Standard', 'palm-hills-school' ); ?></h2>
        </div>

        <div class="features__grid grid grid--4">
            <?php
            $features = [
                [ 'icon' => 'M15 10l4.553-2.069A1 1 0 0 1 21 8.82V18a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8.82a1 1 0 0 1 1.447-.888L9 10m6 0v8M9 10v8M9 10H5M15 10h4',
                  'title' => 'Live & On-Demand Classes', 'text' => 'Interactive live sessions with recorded access so students never miss a lesson.' ],
                [ 'icon' => 'M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM19.622 10.395l-1.097-2.65L20 6l-2-2-1.735 1.483-2.707-1.113L12.935 2h-1.954l-.623 2.37-2.707 1.113L6 4 4 6l1.453 1.789-1.08 2.657L2 11v2l2.373.554 1.08 2.657L4 18l2 2 1.735-1.483 2.707 1.113.623 2.37h1.954l.623-2.37 2.707-1.113L18 20l2-2-1.453-1.789 1.08-2.657L22 13v-2l-2.378-.605z',
                  'title' => 'AI-Powered Learning', 'text' => 'Personalized learning paths powered by AI that adapts to each student\'s pace.' ],
                [ 'icon' => 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75M9 7a4 4 0 1 0 0-8 4 4 0 0 0 0 8z',
                  'title' => 'Expert Faculty', 'text' => '120+ certified educators with international qualifications and years of experience.' ],
                [ 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 0 1.946-.806 3.42 3.42 0 0 1 4.438 0 3.42 3.42 0 0 0 1.946.806 3.42 3.42 0 0 1 3.138 3.138 3.42 3.42 0 0 0 .806 1.946 3.42 3.42 0 0 1 0 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 1 0-4.438 3.42 3.42 0 0 0 .806-1.946 3.42 3.42 0 0 1 3.138-3.138z',
                  'title' => 'Fully Accredited', 'text' => 'Ministry of Education accredited with internationally recognized Cambridge IGCSE pathway.' ],
                [ 'icon' => 'M3 15a4 4 0 0 0 4 4h9a5 5 0 0 0 1.82-9.66A6 6 0 1 0 3 15z',
                  'title' => 'Cloud Platform', 'text' => 'Access from any device — desktop, tablet, or mobile — anywhere in the world.' ],
                [ 'icon' => 'M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8zM6 1v3M10 1v3M14 1v3',
                  'title' => 'Parent Dashboard', 'text' => 'Real-time progress tracking, attendance reports, and direct teacher communication.' ],
                [ 'icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z',
                  'title' => 'Safe Digital Environment', 'text' => 'COPPA & GDPR compliant platform with robust child safety measures.' ],
                [ 'icon' => 'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM14 2v6h6M16 13H8M16 17H8M10 9H8',
                  'title' => 'Bilingual Curriculum', 'text' => 'Instruction in both Arabic and English, honoring our culture while building global skills.' ],
            ];
            foreach ( $features as $i => $feat ) : ?>
                <div class="feature-item fade-up delay-<?php echo ( $i % 4 ) + 1; ?>">
                    <div class="feature-item__icon">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="<?php echo $feat['icon']; ?>"/>
                        </svg>
                    </div>
                    <h3 class="feature-item__title"><?php echo esc_html( $feat['title'] ); ?></h3>
                    <p class="feature-item__text"><?php echo esc_html( $feat['text'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =============================================
     NEWS & EVENTS
     ============================================= -->
<section class="section section--gray news" id="news">
    <div class="container">
        <div class="section__header fade-up">
            <span class="section__label"><?php esc_html_e( 'News & Events', 'palm-hills-school' ); ?></span>
            <h2 class="section__title"><?php esc_html_e( 'Stay Up to Date', 'palm-hills-school' ); ?></h2>
            <p class="section__desc"><?php esc_html_e( 'The latest from our school community — events, achievements, and announcements.', 'palm-hills-school' ); ?></p>
        </div>

        <?php
        $news_query = new WP_Query( [
            'post_type'      => [ 'palm_news', 'post' ],
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        ] );

        if ( $news_query->have_posts() ) : ?>
            <div class="news__grid grid grid--3">
                <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                    <article class="news-card card fade-up">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="news-card__image">
                                <?php the_post_thumbnail( 'palm-card', [ 'loading' => 'lazy', 'alt' => get_the_title() ] ); ?>
                                <span class="news-card__category">
                                    <?php
                                    $cats = get_the_category();
                                    echo $cats ? esc_html( $cats[0]->name ) : esc_html__( 'News', 'palm-hills-school' );
                                    ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="news-card__image news-card__image--placeholder">
                                <span class="news-card__category"><?php esc_html_e( 'News', 'palm-hills-school' ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="news-card__body">
                            <div class="news-card__meta">
                                <time datetime="<?php echo get_the_date( 'c' ); ?>">
                                    <?php echo get_the_date( 'F j, Y' ); ?>
                                </time>
                            </div>
                            <h3 class="news-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="news-card__excerpt"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news-card__link">
                                <?php esc_html_e( 'Read More', 'palm-hills-school' ); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <!-- Fallback static news -->
            <div class="news__grid grid grid--3">
                <?php
                $default_news = [
                    [ 'category' => 'Achievement', 'date' => 'April 20, 2026', 'title' => 'Palm Hills Students Win National Science Olympiad', 'excerpt' => 'Our Grade 9 students secured first place in Egypt\'s National Science Olympiad, demonstrating exceptional problem-solving skills.' ],
                    [ 'category' => 'Event',       'date' => 'April 15, 2026', 'title' => 'Annual Virtual Open Day — May 10th, 2026', 'excerpt' => 'Join us for our virtual open day and discover how Palm Hills Online School can shape your child\'s future.' ],
                    [ 'category' => 'Partnership', 'date' => 'April 8, 2026',  'title' => 'New Partnership with Cambridge Assessment', 'excerpt' => 'We are proud to announce an expanded partnership with Cambridge Assessment International Education to offer more IGCSE subjects.' ],
                ];
                foreach ( $default_news as $i => $item ) : ?>
                    <article class="news-card card fade-up delay-<?php echo $i + 1; ?>">
                        <div class="news-card__image news-card__image--placeholder">
                            <span class="news-card__category"><?php echo esc_html( $item['category'] ); ?></span>
                        </div>
                        <div class="news-card__body">
                            <div class="news-card__meta"><time><?php echo esc_html( $item['date'] ); ?></time></div>
                            <h3 class="news-card__title"><a href="/news"><?php echo esc_html( $item['title'] ); ?></a></h3>
                            <p class="news-card__excerpt"><?php echo esc_html( $item['excerpt'] ); ?></p>
                            <a href="/news" class="news-card__link">
                                <?php esc_html_e( 'Read More', 'palm-hills-school' ); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="news__footer fade-up">
            <a href="/news" class="btn btn--outline-navy"><?php esc_html_e( 'All News & Events', 'palm-hills-school' ); ?></a>
        </div>
    </div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="section testimonials" id="testimonials">
    <div class="container">
        <div class="section__header fade-up">
            <span class="section__label"><?php esc_html_e( 'Testimonials', 'palm-hills-school' ); ?></span>
            <h2 class="section__title"><?php esc_html_e( 'Words from Our Community', 'palm-hills-school' ); ?></h2>
        </div>

        <div class="testimonials__slider" id="testimonials-slider">
            <div class="testimonials__track" id="testimonials-track">
                <?php
                $testimonial_query = new WP_Query( [
                    'post_type'      => 'palm_testimonial',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                ] );

                if ( $testimonial_query->have_posts() ) :
                    while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
                        $role   = get_post_meta( get_the_ID(), 'testimonial_role', true );
                        $rating = get_post_meta( get_the_ID(), 'testimonial_rating', true ) ?: 5;
                        ?>
                        <div class="testimonial-card fade-up">
                            <div class="testimonial-card__stars">
                                <?php for ( $s = 0; $s < 5; $s++ ) : ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="<?php echo $s < $rating ? 'currentColor' : 'none'; ?>" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <?php endfor; ?>
                            </div>
                            <blockquote class="testimonial-card__quote"><?php the_content(); ?></blockquote>
                            <div class="testimonial-card__author">
                                <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'thumbnail', [ 'class' => 'testimonial-card__avatar', 'alt' => get_the_title() ] );
                                else : ?>
                                    <div class="testimonial-card__avatar testimonial-card__avatar--placeholder">
                                        <?php echo mb_substr( get_the_title(), 0, 1 ); ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <strong><?php the_title(); ?></strong>
                                    <?php if ( $role ) : ?><span><?php echo esc_html( $role ); ?></span><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                else :
                    $default_testimonials = [
                        [ 'name' => 'Dina Hassan',   'role' => 'Parent of Grade 8 Student',  'quote' => 'Palm Hills Online School has been transformative for our family. My daughter\'s confidence and academic performance have soared. The teachers are dedicated and the platform is incredibly easy to use.' ],
                        [ 'name' => 'Ahmed Farouk',  'role' => 'Parent of Grade 11 Student', 'quote' => 'The IGCSE track is phenomenal. My son received offers from universities in the UK and the US, directly attributable to the preparation he received here. Outstanding school.' ],
                        [ 'name' => 'Mariam Samir',  'role' => 'Grade 12 Student',           'quote' => 'I joined Palm Hills in Grade 9 after struggling in traditional school. The personalized attention and flexible schedule changed everything. I\'m now heading to university with confidence.' ],
                        [ 'name' => 'Khaled Nour',   'role' => 'Parent of Grade 4 Student',  'quote' => 'My son looks forward to school every day — something I never thought I\'d say. The interactive lessons and caring teachers make all the difference.' ],
                        [ 'name' => 'Salma El-Din',  'role' => 'Grade 10 Student',           'quote' => 'The STEM program here is incredible. I\'ve built robots, coded apps, and participated in national science competitions. Palm Hills made me love learning.' ],
                        [ 'name' => 'Rania Ibrahim',  'role' => 'Parent of Grade 6 Student', 'quote' => 'As working parents, the flexibility of Palm Hills Online School is a lifesaver. Our daughter gets a world-class education and we can support her learning journey.' ],
                    ];
                    foreach ( $default_testimonials as $i => $t ) : ?>
                        <div class="testimonial-card fade-up delay-<?php echo ( $i % 3 ) + 1; ?>">
                            <div class="testimonial-card__stars">
                                <?php for ( $s = 0; $s < 5; $s++ ) : ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <?php endfor; ?>
                            </div>
                            <blockquote class="testimonial-card__quote">"<?php echo esc_html( $t['quote'] ); ?>"</blockquote>
                            <div class="testimonial-card__author">
                                <div class="testimonial-card__avatar testimonial-card__avatar--placeholder">
                                    <?php echo esc_html( mb_substr( $t['name'], 0, 1 ) ); ?>
                                </div>
                                <div>
                                    <strong><?php echo esc_html( $t['name'] ); ?></strong>
                                    <span><?php echo esc_html( $t['role'] ); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
            </div>
            <div class="testimonials__nav">
                <button class="testimonials__btn" id="testimonials-prev" aria-label="<?php esc_attr_e( 'Previous', 'palm-hills-school' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                </button>
                <button class="testimonials__btn" id="testimonials-next" aria-label="<?php esc_attr_e( 'Next', 'palm-hills-school' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     ADMISSIONS CTA BANNER
     ============================================= -->
<section class="cta-banner" aria-label="<?php esc_attr_e( 'Admissions Call to Action', 'palm-hills-school' ); ?>">
    <div class="cta-banner__bg" aria-hidden="true"></div>
    <div class="container cta-banner__container">
        <div class="cta-banner__content fade-up">
            <span class="section__label"><?php esc_html_e( 'Enroll Today', 'palm-hills-school' ); ?></span>
            <h2><?php esc_html_e( 'Ready to Begin Your Journey\nWith Palm Hills?', 'palm-hills-school' ); ?></h2>
            <p><?php esc_html_e( 'Applications for the 2026–2027 academic year are now open. Limited seats available — secure your child\'s place today.', 'palm-hills-school' ); ?></p>
            <div class="cta-banner__actions">
                <a href="/admissions" class="btn btn--primary btn--lg">
                    <?php esc_html_e( 'Start Application', 'palm-hills-school' ); ?>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="/contact" class="btn btn--outline btn--lg">
                    <?php esc_html_e( 'Book a Consultation', 'palm-hills-school' ); ?>
                </a>
            </div>
        </div>
        <div class="cta-banner__features fade-in delay-2" aria-hidden="true">
            <?php
            $cta_features = [
                [ 'icon' => '✓', 'text' => 'Free trial period' ],
                [ 'icon' => '✓', 'text' => 'Flexible payment plans' ],
                [ 'icon' => '✓', 'text' => 'No enrollment fees' ],
                [ 'icon' => '✓', 'text' => 'All materials included' ],
            ];
            foreach ( $cta_features as $f ) : ?>
                <div class="cta-banner__feature">
                    <span class="cta-banner__check"><?php echo $f['icon']; ?></span>
                    <span><?php echo esc_html( $f['text'] ); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
