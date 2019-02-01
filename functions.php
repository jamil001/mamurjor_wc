<?php
/**
 * flipmart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flipmart
 */

if ( ! function_exists( 'flipmart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flipmart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on flipmart, use a find and replace
		 * to change 'flipmart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flipmart', get_template_directory() . '/languages' );

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
			'main_menu' => esc_html__( 'Primary', 'flipmart' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'flipmart_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'flipmart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flipmart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'flipmart_content_width', 640 );
}
add_action( 'after_setup_theme', 'flipmart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flipmart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'flipmart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'flipmart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'flipmart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 
 define( "VERSION", time() );
function flipmart_scripts() {
	wp_enqueue_style( 'flipmart-bootstrapcss', get_template_directory_uri() . '/assets/css/bootstrap.min.css', VERSION, true );
	wp_enqueue_style( 'flipmart-maincss', get_template_directory_uri() . '/assets/css/main.css', VERSION , true );
	wp_enqueue_style( 'flipmart-bluecss', get_template_directory_uri() . '/assets/css/blue.css',  VERSION , true );
	wp_enqueue_style( 'flipmart-owlcss', get_template_directory_uri() . '/assets/css/owl.carousel.css',  VERSION , true );
	wp_enqueue_style( 'flipmart-transitionsowl', get_template_directory_uri() . '/assets/css/owl.transitions.css',  VERSION , true );
	wp_enqueue_style( 'flipmart-animatecss', get_template_directory_uri() . '/assets/css/animate.min.css',  VERSION , true );
	wp_enqueue_style( 'flipmart-rateitcss', get_template_directory_uri() . '/assets/css/rateit.css',  VERSION , true );
	wp_enqueue_style( 'flipmart-bootstrapselect', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css',  VERSION , true );
	wp_enqueue_style( 'flipmart-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css',  VERSION , true );

	wp_enqueue_style( 'flipmart-woo', get_template_directory_uri() . '/assets/css/woo.css',  '78999999' , true );
	wp_enqueue_style( 'flipmart-navigation', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700' );
	wp_enqueue_style( 'flipmart-navigation', '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' );
	wp_enqueue_style( 'flipmart-navigation', '//fonts.googleapis.com/css?family=Montserrat:400,700' );
    wp_enqueue_style( 'flipmart-style', get_stylesheet_uri() );

	wp_enqueue_script( 'flipmart-jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.1.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-dropdownjs', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-carouseljs', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-echo', get_template_directory_uri() . '/assets/js/echo.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-easing', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-sliderjs', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-rateitjs', get_template_directory_uri() . '/assets/js/jquery.rateit.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-lightboxjs', get_template_directory_uri() . '/assets/js/lightbox.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-bootstrapselect', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(),  VERSION , true );
	wp_enqueue_script( 'flipmart-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(),  VERSION , true );

	




	wp_enqueue_script( 'flipmart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(),  VERSION , true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flipmart_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}



//woo remove

function woo_remove(){
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
}
add_action( 'init', 'woo_remove' );




// row for shop
function shop_columns(){
	return 3;
}
add_filter( 'loop_shop_columns', 'shop_columns' );



//breadcrumb

function flipmart_bread(){
	return array(
			'delimiter'     => ' &#47 ',
			'wrap_before'   => '<div class="breadcrumb-inner"> <ul class="list-inline list-unstyled">',
			'wrap_after'    => '</ul></div>',
			'before'        => '',
			'after'         => '',
			'home'          => _x( 'Home', 'breadcrumb', 'woocommerce' ),

	);
}
add_filter( 'woocommerce_breadcrumb_defaults', 'flipmart_bread' );



//pagination
function flipmart_pagination(){
	global $wp_query;
	
	if( $wp_query->max_num_pages <= 1 ) return;
	
	$big = 9999999999; // need an unlikely integer
	$pages = paginate_links( array(
			'base'        => str_replace( $big, '%#%', esc_url( get_pagenum_link($big))),
			'format'      => '?paged=%#%',
			'current'     => max( 1, get_query_var('paged')),
			'total'       => $wp_query->max_num_pages,
			'type'        => 'array',
			'prev_next'   => true,
			'prev_text'   => __('<i class="fa fa-angle-left" aria-hidden="true" ></i>'),
			'next_text'   => __('<i class="fa fa-angle-right" aria-hidden="true" ></i>'),
	));
	
	if( is_array(pages)){
		$paged = ( get_query_var('paged') == 0) ? 1 : get_query_var('paged');
		echo '<div class="pagination-container"><ul class="list-inline list-unstyled" >';
		foreach ($pages as $page){
			echo "<li>$page</li>";
		}
		echo '</ul></div>';
	}
	
	
	
}





