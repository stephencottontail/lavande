<?php
/**
 * Lavande functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lavande
 */

if ( ! function_exists( 'lavande_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lavande_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lavande, use a find and replace
	 * to change 'lavande' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lavande', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'lavande' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/**
	 * Add support for various Jetpack features
	 */
	add_theme_support( 'jetpack-social-menu' );

	add_theme_support( 'jetpack-content-options', array(
		'blog-display'      => false,
		'post-details'      => array(
			'stylesheet'      => 'lavande-style',
			'date'            => '.posted-on',
			'categories'      => '.cat-links',
			'tags'            => '.tags-links',
			'author'          => '.byline',
		),
	) );
	
	add_theme_support( 'jetpack-responsive-videos' );
	
	/**
	 * Add support for editor styling
	 */
	add_editor_style( array( get_theme_file_uri( 'assets/css/editor-style.css' ), lavande_google_fonts() ) );
}
endif;
add_action( 'after_setup_theme', 'lavande_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lavande_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lavande_content_width', 768 );
}
add_action( 'after_setup_theme', 'lavande_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lavande_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'lavande' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lavande' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'lavande' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'lavande' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lavande_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lavande_scripts() {
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.css' ) );
	wp_enqueue_style( 'lavande-google-fonts', lavande_google_fonts() );
	wp_enqueue_style( 'lavande-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lavande-navigation', get_theme_file_uri( 'assets/js/navigation.js' ), array( 'jquery' ), '20151215', true );
	wp_enqueue_script( 'lavande-skip-link-focus-fix', get_theme_file_uri( 'assets/js/skip-link-focus-fix.js' ), array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lavande_scripts' );

/**
 * Enqueue Google fonts (or not)
 */
function lavande_google_fonts() {
	$fonts = array();
	$fonts_url = '';
	
	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language */
	if ( 'off' !== _x( 'on', 'Playfair Display: on or off', 'lavande' ) ) {
		$fonts[] = 'Playfair Display:400,400i,900,900i';
	}
	
	/* translators: If there are characters in your language that are not supported by Alegreya Sans, translate this to 'off'. Do not translate into your own language */
	if( 'off' !== _x( 'on', 'Alegreya Sans: on or off', 'lavande' ) ) {
		$fonts[] = 'Alegreya Sans:400,400i,700,700i';
	}
	
	if ( $fonts ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	
	return esc_url_raw( $fonts_url );
}

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( 'inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_theme_file_path( 'inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_theme_file_path( 'inc/customizer.php' );
