<?php
/**
 * Sky Ranch functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sky_Ranch
 */


if ( ! function_exists( 'skyranch_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skyranch_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sky Ranch, use a find and replace
		 * to change 'skyranch' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'skyranch', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'skyranch' ),
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
		add_theme_support( 'custom-background', apply_filters( 'skyranch_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'skyranch_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skyranch_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'skyranch_content_width', 640 );
}
add_action( 'after_setup_theme', 'skyranch_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skyranch_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skyranch' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skyranch' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skyranch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skyranch_scripts() {
	wp_enqueue_style( 'skyranch-style', get_stylesheet_uri() );

	wp_enqueue_script( 'skyranch-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20180627', true );

        wp_localize_script('skyranch-navigation','skyranchScreenReaderText',array(
            'expand' => __('Expand Child Menu','skyranch'),
            'collapse' => __('Collapse Child Menu','skyranch')
        ));
        
	wp_enqueue_script( 'skyranch-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
//        wp_enqueue_script('menu-links', get_template_directory_uri() . '/js/skyranch-js/menu-links.js', array( 'jquery' ) ,'20180613', false);
//        wp_enqueue_script('page-links', get_template_directory_uri() . '/js/skyranch-js/page-links.js', array( 'jquery' ) ,'20180618', false);
        wp_enqueue_script('meta-navigation', get_template_directory_uri() . '/js/skyranch-js/skyranch-functions.js', array( 'jquery' ) ,'20180709', true);
        
        wp_localize_script('meta-navigation','skyranchScreenReaderText',array(
            'categories' => __('Categories ','skyranch'),
            'expandCategories' => __('Expand Categories List','skyranch'),
            'collapseCategories' => __('Collapse Categories List','skyranch'),
            'tags' => __('Tags','skyranch'),
            'expandTags' => __('Expand Tags List','skyranch'),
            'collapseTags' => __('Collapse Tags List','skyranch')
        ));
        
//        wp_localize_script('meta-navigation','skyranchScreenReaderText',array(
//            'expandCategories' => __('Expand Categories List','skyranch'),
//            'collapseCategories' => __('Collapse Categories List','skyranch'),
//            'expandTags' => __('Expand Tags List','skyranch'),
//            'collapseTags' => __('Collapse Tags List','skyranch')
//        ));
        
//        wp_localize_script('page-links', 'ajaxnavigation', array(
//                'ajaxurl' => admin_url( 'admin-ajax.php' ),
//                'query_vars' => json_encode( $wp_query->query )
//        ));
        
        wp_enqueue_style( 'skyranch-fontawesome','https://use.fontawesome.com/releases/v5.4.1/css/all.css' );
        
}
add_action( 'wp_enqueue_scripts', 'skyranch_scripts' );

//add_action( 'wp_ajax_nopriv_ajax_navigation', 'my_ajax_navigation' );
//add_action( 'wp_ajax_ajax_navigation', 'my_ajax_navigation' );
//
//function my_ajax_navigation() {
//    
//    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
//    
//    
//    if($_POST['slug']){
//         $query_vars['pagename'] = $_POST['slug'];
//    }
//    
//    if($_POST['post_slug']){
//         $query_vars['name'] = $_POST['post_slug'];
//    }
//    
////    pagination need refactoring
//     if($_POST['paged']){
//         $query_vars['paged'] = $_POST['paged'];
//    }
//    
//    if($_POST['page']){
//        $query_vars['page'] = $_POST['page'];
//    }
//    
//    if($_POST['year']){
//        $query_vars['year'] = $_POST['year'];
//    }
//    
//    if($_POST['month']){
//        $query_vars['monthnum'] = $_POST['month'];
//    }
//    
//    if($_POST['day']){
//        $query_vars['day'] = $_POST['day'];
//    }
//    
//    if($_POST['category']){
//        $query_vars['category_name'] = $_POST['category'];
//    }
//    
//     if($_POST['tag']){
//        $query_vars['tag'] = $_POST['tag'];
//    }
//    
//    if($_POST['author']){
//        $query_vars['author_name'] = $_POST['author'];
//    }
//
//    if($query_vars !== NULL){
//        
//        $posts = new WP_Query( $query_vars );
//        
//        $GLOBALS['wp_query'] = $posts;
//
//
//
//        if( ! $posts->have_posts() ) { 
//            get_template_part( 'template-parts/content', 'none' );
//        }
//        else {
//
//
//                the_posts_pagination( array(
//                    'prev_text'          => __( 'Previous page', 'skyranch' ),
//                    'next_text'          => __( 'Next page', 'skyranch' ),
//                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'skyranch' ) . ' </span>',
//                ) );
//
//
//
//            while ( $posts->have_posts() ) { 
//                $posts->the_post();
//
//                get_template_part( 'template-parts/content', get_post_format() );
//
//                if($_POST['post_slug']){
//                    the_post_navigation();
//                }
//
//
//                // If comments are open or we have at least one comment, load up the comment template.
//                if ( comments_open() || get_comments_number() ) :
//                        comments_template();
//                endif;
//            }
//
//
//        }
//        
//    }else{
//            //this needs to create the homepage loop
////        load(home_url());
//        
//    }
//
//    die();
//}




 


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

/*
 * Sky Ranch custom post types
 */
//require get_template_directory() . '/skyranch-custom-post-types/php';
require_once('skyranch-custom-post-types.php');
/**
 * Sky Ranch theme functions
 */
//require get_template_directory() . '/skyranch-functions/skyranch-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

