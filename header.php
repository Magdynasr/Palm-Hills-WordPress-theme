<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <style id="palm-critical">
        /* ── CRITICAL LAYOUT ── runs before external CSS, overridden by it where both apply ── */
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
        a{text-decoration:none;color:inherit;}
        ul{list-style:none;}

        /* CSS variables fallback */
        :root{
            --color-navy:#1a2744;--color-navy-dark:#111c36;--color-gold:#c9a84c;
            --color-white:#fff;--color-gray-200:#e2e6f0;--color-gray-800:#2e3350;
            --container-max:1200px;--header-height:80px;--space-6:1.5rem;
        }

        /* Container */
        .container{width:100%;max-width:1200px;margin-left:auto;margin-right:auto;padding-left:1.5rem;padding-right:1.5rem;}

        /* Topbar */
        .topbar{background:#111c36;padding:10px 0;font-size:0.875rem;}
        .topbar__inner{display:flex;align-items:center;justify-content:space-between;gap:1rem;}
        .topbar__left,.topbar__right{display:flex;align-items:center;gap:1.25rem;}
        .topbar__item{display:flex;align-items:center;gap:6px;color:rgba(255,255,255,0.75);}
        .topbar__portal{display:flex;align-items:center;gap:6px;color:#c9a84c;border:1px solid rgba(201,168,76,0.3);padding:5px 14px;border-radius:9999px;font-size:0.75rem;font-weight:500;}
        .social-links{display:flex;align-items:center;gap:10px;}
        .social-links__item{display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:50%;color:rgba(255,255,255,0.65);border:1px solid rgba(255,255,255,0.12);}

        /* Header */
        .header{position:sticky;top:0;z-index:1000;background:#fff;border-bottom:1px solid #e2e6f0;box-shadow:0 2px 20px rgba(26,39,68,0.06);}

        /* Nav */
        .nav{display:flex;align-items:center;justify-content:space-between;flex-wrap:nowrap;height:80px;gap:1.5rem;}
        .nav__list{display:flex;flex-direction:row;align-items:center;flex:1;justify-content:center;gap:0.25rem;}
        .nav__item{position:relative;}
        .nav__link{display:flex;align-items:center;gap:4px;padding:8px 14px;font-size:0.875rem;font-weight:500;color:#2e3350;white-space:nowrap;border-radius:8px;}
        .nav__actions{display:flex;align-items:center;gap:12px;flex-shrink:0;}
        .nav__hamburger{display:none;}

        /* Logo */
        .custom-logo-link{display:flex;align-items:center;flex-shrink:0;}
        .custom-logo{height:64px;width:auto;max-height:64px;object-fit:contain;display:block;}
        .nav__logo{flex-shrink:0;display:flex;align-items:center;gap:12px;}

        /* Button */
        .btn--primary{display:inline-flex;align-items:center;gap:8px;background:#c9a84c;color:#111c36;padding:10px 20px;border-radius:9999px;font-weight:600;font-size:0.875rem;white-space:nowrap;border:2px solid #c9a84c;}

        /* Dropdown */
        .nav__dropdown{display:none;position:absolute;top:calc(100% + 8px);left:50%;transform:translateX(-50%);min-width:220px;background:#fff;border-radius:16px;box-shadow:0 10px 40px rgba(26,39,68,0.14);border:1px solid #e2e6f0;padding:8px;z-index:100;}
        .nav__item--has-children:hover .nav__dropdown{display:block;}
        .nav__dropdown .nav__link{display:block;padding:10px 14px;}

        /* Mobile overlay */
        #nav-mobile{visibility:hidden;transform:translateX(100%);transition:transform 0.4s ease,visibility 0s 0.4s;}
        #nav-mobile.is-open{visibility:visible;transform:translateX(0);transition:transform 0.4s ease,visibility 0s;}

        /* Mobile breakpoint */
        @media(max-width:768px){
            .topbar{display:none;}
            .nav__list{display:none;}
            .nav__cta{display:none;}
            .nav__hamburger{display:flex;flex-direction:column;gap:5px;padding:8px;cursor:pointer;background:none;border:none;}
            .nav__hamburger span{display:block;width:22px;height:2px;background:#1a2744;border-radius:2px;}
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- =============================================
     TOP BAR
     ============================================= -->
<div class="topbar">
    <div class="container">
        <div class="topbar__inner">
            <div class="topbar__left">
                <a href="mailto:<?php echo esc_attr( palm_get_option( 'palm_email', 'info@palmhillsschool.edu.eg' ) ); ?>" class="topbar__item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <?php echo esc_html( palm_get_option( 'palm_email', 'info@palmhillsschool.edu.eg' ) ); ?>
                </a>
                <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', palm_get_option( 'palm_phone', '+20101234567' ) ) ); ?>" class="topbar__item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 10.6a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <?php echo esc_html( palm_get_option( 'palm_phone', '+20 10 1234 5678' ) ); ?>
                </a>
            </div>
            <div class="topbar__right">
                <?php echo palm_social_links(); ?>
                <a href="/parent-portal" class="topbar__portal">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?php esc_html_e( 'Parent Portal', 'palm-hills-school' ); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- =============================================
     MAIN HEADER / NAV
     ============================================= -->
<header class="header" id="site-header">
    <div class="container">
        <nav class="nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'palm-hills-school' ); ?>">

            <!-- Logo -->
            <?php if ( has_custom_logo() ) :
                the_custom_logo();
            else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" aria-label="<?php bloginfo( 'name' ); ?> – <?php esc_attr_e( 'Home', 'palm-hills-school' ); ?>">
                    <div class="nav__logo-text">
                        <span class="nav__logo-main">Palm Hills</span>
                        <span class="nav__logo-sub">Online School</span>
                    </div>
                </a>
            <?php endif; ?>

            <!-- Nav Links -->
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav__list',
                'walker'         => new Palm_Nav_Walker(),
                'fallback_cb'    => function() {
                    echo '<ul class="nav__list">
                        <li class="nav__item"><a href="/" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="/about" class="nav__link">About Us</a></li>
                        <li class="nav__item nav__item--has-children">
                            <a href="/programs" class="nav__link nav__link--has-dropdown">Programs
                                <svg class="nav__arrow" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                            <ul class="nav__dropdown">
                                <li class="nav__item"><a href="/programs/primary" class="nav__link">Primary School</a></li>
                                <li class="nav__item"><a href="/programs/middle" class="nav__link">Middle School</a></li>
                                <li class="nav__item"><a href="/programs/high" class="nav__link">High School</a></li>
                                <li class="nav__item"><a href="/programs/igcse" class="nav__link">IGCSE Track</a></li>
                            </ul>
                        </li>
                        <li class="nav__item"><a href="/news" class="nav__link">News &amp; Events</a></li>
                        <li class="nav__item"><a href="/admissions" class="nav__link">Admissions</a></li>
                        <li class="nav__item"><a href="/contact" class="nav__link">Contact</a></li>
                    </ul>';
                },
            ] );
            ?>

            <!-- CTA + Hamburger -->
            <div class="nav__actions">
                <a href="/admissions" class="btn btn--primary nav__cta">
                    <?php esc_html_e( 'Apply Now', 'palm-hills-school' ); ?>
                </a>
                <button class="nav__hamburger" aria-label="<?php esc_attr_e( 'Toggle menu', 'palm-hills-school' ); ?>" aria-expanded="false" aria-controls="nav-mobile">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

        </nav>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="nav-overlay" id="nav-mobile" aria-hidden="true">
    <div class="nav-overlay__inner">
        <button class="nav-overlay__close" aria-label="<?php esc_attr_e( 'Close menu', 'palm-hills-school' ); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18M6 6l12 12"/></svg>
        </button>
        <div class="nav-overlay__logo">
            <?php if ( has_custom_logo() ) :
                the_custom_logo();
            else : ?>
                <div class="nav__logo-text">
                    <span class="nav__logo-main">Palm Hills</span>
                    <span class="nav__logo-sub">Online School</span>
                </div>
            <?php endif; ?>
        </div>
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-overlay__list',
            'fallback_cb'    => function() {
                echo '<ul class="nav-overlay__list">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/programs">Programs</a></li>
                    <li><a href="/news">News &amp; Events</a></li>
                    <li><a href="/admissions">Admissions</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>';
            },
        ] );
        ?>
        <div class="nav-overlay__actions">
            <a href="/admissions" class="btn btn--primary"><?php esc_html_e( 'Apply Now', 'palm-hills-school' ); ?></a>
            <a href="/parent-portal" class="btn btn--outline-navy"><?php esc_html_e( 'Parent Portal', 'palm-hills-school' ); ?></a>
        </div>
        <?php echo palm_social_links(); ?>
    </div>
</div>

<main id="main-content" class="site-main">
