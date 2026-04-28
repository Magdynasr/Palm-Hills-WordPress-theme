<?php
/**
 * Palm Hills Online School — Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'PALM_VERSION', '1.0.0' );
define( 'PALM_DIR', get_template_directory() );
define( 'PALM_URI', get_template_directory_uri() );

/* =============================================
   THEME SETUP
   ============================================= */
function palm_theme_setup() {
    load_theme_textdomain( 'palm-hills-school', PALM_DIR . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    register_nav_menus( [
        'primary'  => __( 'Primary Navigation', 'palm-hills-school' ),
        'footer'   => __( 'Footer Navigation', 'palm-hills-school' ),
    ] );

    add_image_size( 'palm-hero',    1920, 1080, true );
    add_image_size( 'palm-card',     600,  400, true );
    add_image_size( 'palm-thumb',    400,  300, true );
}
add_action( 'after_setup_theme', 'palm_theme_setup' );

/* =============================================
   ENQUEUE STYLES & SCRIPTS
   ============================================= */
function palm_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'palm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // Main stylesheet (style.css = theme header only, main styles in assets)
    wp_enqueue_style( 'palm-style', get_stylesheet_uri(), [ 'palm-google-fonts' ], PALM_VERSION );

    // Main CSS — read from filesystem so it works regardless of URL/server config
    $main_css_file = PALM_DIR . '/assets/css/main.css';
    if ( file_exists( $main_css_file ) ) {
        wp_add_inline_style( 'palm-style', file_get_contents( $main_css_file ) );
    } else {
        // Fallback: try enqueuing via URL
        wp_enqueue_style( 'palm-main', PALM_URI . '/assets/css/main.css', [ 'palm-style' ], PALM_VERSION );
    }

    // Main JS
    wp_enqueue_script( 'palm-main', PALM_URI . '/assets/js/main.js', [], PALM_VERSION, true );

    // Pass data to JS
    wp_localize_script( 'palm-main', 'palmData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'palm_nonce' ),
        'siteUrl' => get_site_url(),
    ] );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'palm_enqueue_assets' );

/* =============================================
   WIDGET AREAS
   ============================================= */
function palm_register_sidebars() {
    $defaults = [
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ];

    register_sidebar( array_merge( $defaults, [
        'name' => __( 'Sidebar', 'palm-hills-school' ),
        'id'   => 'sidebar-1',
    ] ) );

    register_sidebar( array_merge( $defaults, [
        'name' => __( 'Footer Column 1', 'palm-hills-school' ),
        'id'   => 'footer-1',
    ] ) );

    register_sidebar( array_merge( $defaults, [
        'name' => __( 'Footer Column 2', 'palm-hills-school' ),
        'id'   => 'footer-2',
    ] ) );
}
add_action( 'widgets_init', 'palm_register_sidebars' );

/* =============================================
   CUSTOM POST TYPES
   ============================================= */
function palm_register_post_types() {
    // News & Events
    register_post_type( 'palm_news', [
        'labels' => [
            'name'          => __( 'News & Events', 'palm-hills-school' ),
            'singular_name' => __( 'News Item', 'palm-hills-school' ),
            'add_new_item'  => __( 'Add News Item', 'palm-hills-school' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'show_in_rest'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'     => 'dashicons-megaphone',
        'rewrite'       => [ 'slug' => 'news' ],
    ] );

    // Programs
    register_post_type( 'palm_program', [
        'labels' => [
            'name'          => __( 'Programs', 'palm-hills-school' ),
            'singular_name' => __( 'Program', 'palm-hills-school' ),
            'add_new_item'  => __( 'Add Program', 'palm-hills-school' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'show_in_rest'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'     => 'dashicons-welcome-learn-more',
        'rewrite'       => [ 'slug' => 'programs' ],
    ] );

    // Testimonials
    register_post_type( 'palm_testimonial', [
        'labels' => [
            'name'          => __( 'Testimonials', 'palm-hills-school' ),
            'singular_name' => __( 'Testimonial', 'palm-hills-school' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_rest'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'menu_icon'     => 'dashicons-format-quote',
    ] );
}
add_action( 'init', 'palm_register_post_types' );

/* =============================================
   CUSTOM TAXONOMY
   ============================================= */
function palm_register_taxonomies() {
    register_taxonomy( 'program_level', 'palm_program', [
        'labels' => [
            'name'          => __( 'Program Levels', 'palm-hills-school' ),
            'singular_name' => __( 'Program Level', 'palm-hills-school' ),
        ],
        'hierarchical'  => true,
        'show_in_rest'  => true,
        'rewrite'       => [ 'slug' => 'program-level' ],
    ] );

    register_taxonomy( 'news_category', 'palm_news', [
        'labels' => [
            'name'          => __( 'News Categories', 'palm-hills-school' ),
            'singular_name' => __( 'News Category', 'palm-hills-school' ),
        ],
        'hierarchical'  => true,
        'show_in_rest'  => true,
        'rewrite'       => [ 'slug' => 'news-category' ],
    ] );
}
add_action( 'init', 'palm_register_taxonomies' );

/* =============================================
   EXCERPT LENGTH
   ============================================= */
function palm_excerpt_length( $length ) {
    return is_admin() ? $length : 20;
}
add_filter( 'excerpt_length', 'palm_excerpt_length' );

function palm_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'palm_excerpt_more' );

/* =============================================
   CUSTOM WALKER FOR NAV MENU
   ============================================= */
class Palm_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="nav__dropdown">';
    }
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $id = 0 ) {
        $item    = $data_object;
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );

        $class_str = implode( ' ', array_filter( array_map( 'sanitize_html_class', $classes ) ) );
        $output   .= '<li class="nav__item ' . esc_attr( $class_str ) . '">';

        $atts = [];
        $atts['href']   = ! empty( $item->url ) ? $item->url : '#';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn )    ? $item->xfn    : '';
        $atts['class']  = 'nav__link' . ( $has_children ? ' nav__link--has-dropdown' : '' );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        $title  = apply_filters( 'the_title', $item->title, $item->ID );
        $arrow  = $has_children ? '<svg class="nav__arrow" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>' : '';
        $output .= '<a' . $attributes . '>' . esc_html( $title ) . $arrow . '</a>';
    }
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/* =============================================
   THEME CUSTOMIZER
   ============================================= */
function palm_customize_register( $wp_customize ) {
    // School Info Section
    $wp_customize->add_section( 'palm_school_info', [
        'title'    => __( 'School Information', 'palm-hills-school' ),
        'priority' => 30,
    ] );

    $fields = [
        'palm_phone'   => [ 'label' => 'Phone Number',   'default' => '+20 10 1234 5678' ],
        'palm_email'   => [ 'label' => 'Email Address',   'default' => 'info@palmhillsschool.edu.eg' ],
        'palm_address' => [ 'label' => 'School Address',  'default' => 'Palm Hills, 6th of October City, Giza, Egypt' ],
        'palm_facebook'  => [ 'label' => 'Facebook URL',  'default' => '#' ],
        'palm_instagram' => [ 'label' => 'Instagram URL', 'default' => '#' ],
        'palm_youtube'   => [ 'label' => 'YouTube URL',   'default' => '#' ],
        'palm_twitter'   => [ 'label' => 'Twitter/X URL', 'default' => '#' ],
    ];

    foreach ( $fields as $id => $args ) {
        $wp_customize->add_setting( $id, [
            'default'           => $args['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $args['label'], 'palm-hills-school' ),
            'section' => 'palm_school_info',
            'type'    => 'text',
        ] );
    }

    // Hero Section
    $wp_customize->add_section( 'palm_hero', [
        'title'    => __( 'Hero Section', 'palm-hills-school' ),
        'priority' => 35,
    ] );

    $hero_fields = [
        'palm_hero_title'    => [ 'label' => 'Hero Title',    'default' => 'Excellence in Online Education' ],
        'palm_hero_subtitle' => [ 'label' => 'Hero Subtitle', 'default' => 'Empowering students across Egypt with world-class online education, combining academic rigor with modern digital learning experiences.' ],
        'palm_hero_cta1'     => [ 'label' => 'CTA Button 1 Text', 'default' => 'Apply Now' ],
        'palm_hero_cta1_url' => [ 'label' => 'CTA Button 1 URL',  'default' => '/admissions' ],
        'palm_hero_cta2'     => [ 'label' => 'CTA Button 2 Text', 'default' => 'Explore Programs' ],
        'palm_hero_cta2_url' => [ 'label' => 'CTA Button 2 URL',  'default' => '/programs' ],
    ];

    foreach ( $hero_fields as $id => $args ) {
        $wp_customize->add_setting( $id, [
            'default'           => $args['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $args['label'], 'palm-hills-school' ),
            'section' => 'palm_hero',
            'type'    => 'text',
        ] );
    }

    $wp_customize->add_setting( 'palm_hero_bg', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ] );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'palm_hero_bg', [
        'label'     => __( 'Hero Background Image', 'palm-hills-school' ),
        'section'   => 'palm_hero',
        'mime_type' => 'image',
    ] ) );
}
add_action( 'customize_register', 'palm_customize_register' );

/* =============================================
   HELPER FUNCTIONS
   ============================================= */
function palm_get_option( $key, $fallback = '' ) {
    return get_theme_mod( $key, $fallback );
}

function palm_social_links() {
    $links = [
        'facebook'  => [ 'icon' => 'facebook',  'label' => 'Facebook'  ],
        'instagram' => [ 'icon' => 'instagram', 'label' => 'Instagram' ],
        'youtube'   => [ 'icon' => 'youtube',   'label' => 'YouTube'   ],
        'twitter'   => [ 'icon' => 'twitter',   'label' => 'Twitter/X' ],
    ];

    $output = '<div class="social-links">';
    foreach ( $links as $key => $data ) {
        $url = palm_get_option( "palm_{$key}", '#' );
        $output .= sprintf(
            '<a href="%s" class="social-links__item" aria-label="%s" target="_blank" rel="noopener noreferrer">%s</a>',
            esc_url( $url ),
            esc_attr( $data['label'] ),
            palm_social_icon( $data['icon'] )
        );
    }
    $output .= '</div>';
    return $output;
}

function palm_social_icon( $name ) {
    $icons = [
        'facebook'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
        'instagram' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
        'youtube'   => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white"/></svg>',
        'twitter'   => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
    ];
    return $icons[ $name ] ?? '';
}

/* =============================================
   BODY CLASSES
   ============================================= */
function palm_body_classes( $classes ) {
    if ( is_front_page() ) $classes[] = 'is-front-page';
    if ( is_singular() )   $classes[] = 'is-singular';
    return $classes;
}
add_filter( 'body_class', 'palm_body_classes' );

/* =============================================
   REMOVE EMOJI SCRIPTS (PERFORMANCE)
   ============================================= */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
