<?php
/**
 * promptgenius functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package promptgenius
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function promptgenius_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on promptgenius, use a find and replace
		* to change 'promptgenius' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'promptgenius', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'promptgenius' ),
			'secondary' => esc_html__( 'Secondary', 'promptgenius' ),
			'footer-about' => esc_html__( 'Footer About', 'promptgenius' ),
			'footer-legal' => esc_html__( 'Footer Legal', 'promptgenius' ),
		)
	);

	function add_custom_fonts() {
		wp_enqueue_style('darker-grotesque-font', 'https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap');
	}
	add_action('wp_enqueue_scripts', 'add_custom_fonts');
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'promptgenius_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'promptgenius_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function promptgenius_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'promptgenius_content_width', 640 );
}
add_action( 'after_setup_theme', 'promptgenius_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function promptgenius_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'promptgenius' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'promptgenius' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'promptgenius_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function promptgenius_scripts() {
    wp_enqueue_style('promptgenius-style', get_stylesheet_uri(), array(), _S_VERSION);

    // Aggiungi qui il tuo script ajaxEvents.js
    wp_enqueue_script('ajax-events-script', get_template_directory_uri() . '/js/ajaxEvents.js', array('jquery'), null, true);
    wp_localize_script('ajax-events-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('promptgenius-custom-script', get_template_directory_uri() . '/js/script.js', array('jquery'), _S_VERSION, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'promptgenius_scripts');


function create_custom_post_types() {

    // Register AI Post Type
    register_post_type('ai', array(
        'labels' => array(
            'name' => __('AI'),
            'singular_name' => __('AI')
        ),
        'public' => true,
        'has_archive' => true,
		'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-smartphone', // Example icon
		'taxonomies'  => array('category'),
    ));

    // Register Tech Post Type
    register_post_type('tech', array(
        'labels' => array(
            'name' => __('Tech'),
            'singular_name' => __('Tech')
        ),
        'public' => true,
        'has_archive' => true,
		'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-desktop',
		'taxonomies'  => array('category'),
 // Example icon
    ));

    // Register Dev Post Type
    register_post_type('dev', array(
        'labels' => array(
            'name' => __('Dev'),
            'singular_name' => __('Dev')
        ),
        'public' => true,
        'has_archive' => true,
		'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-hammer',
		'taxonomies'  => array('category'),
 // Example icon
    ));

    // Register Society Post Type
    register_post_type('society', array(
        'labels' => array(
            'name' => __('Society'),
            'singular_name' => __('Society')
        ),
        'public' => true,
        'has_archive' => true,
		'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
		'taxonomies'  => array('category'),
 // Example icon
    ));

    // Register AI Tools Post Type
    register_post_type('ai-tools', array(
        'labels' => array(
            'name' => __('AI Tools'),
			'show_in_nav_menus' => true,
            'singular_name' => __('AI Tool')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-admin-tools',
		'taxonomies'  => array('category'),
    ));

    // Register Guides Post Type
    register_post_type('guides', array(
        'labels' => array(
            'name' => __('Guides'),
			'show_in_nav_menus' => true,
            'singular_name' => __('Guide')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-welcome-learn-more',
		'taxonomies'  => array('category'),
    ));

    // Register Experiences Post Type
    register_post_type('experiences', array(
        'labels' => array(
            'name' => __('Experiences'),
			'show_in_nav_menus' => true,
            'singular_name' => __('Experience')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-universal-access-alt',
		'taxonomies'  => array('category'),
 // Example icon
    ));
}

add_action('init', 'create_custom_post_types');

function remove_posts_menu() {
   
    // Remove the existing Posts menu
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'remove_posts_menu');

function promptgenius_add_svg_to_menu( $items, $args ) {
    // Check if the targeted menu is the 'secondary' menu
    if ( $args->theme_location == 'secondary' ) {
        // Define the SVG icon
        $svg_icon = '<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0V6.25H6.25V0H0ZM18.75 0V6.25H25V0H18.75ZM9.375 9.375V15.625H15.625V9.375H9.375ZM0 18.75V25H6.25V18.75H0ZM18.75 18.75V25H25V18.75H18.75Z" fill="#00F0FF"/></svg>'; 

        // Replace a specific placeholder or menu item title with the SVG icon
        // Ensure to replace a unique and identifiable part of the menu item
        $items = str_replace('>LESS<', '>LESS' . $svg_icon . '<', $items);
    }

    return $items;
}
add_filter( 'wp_nav_menu_items', 'promptgenius_add_svg_to_menu', 10, 2 );

function crea_tassonomia_in_evidenza() {
    $labels = array(
        'name'              => 'In Evidenza',
        'singular_name'     => 'In Evidenza',
        'search_items'      => 'Cerca In Evidenza',
        'all_items'         => 'Tutti In Evidenza',
        'parent_item'       => 'Parente In Evidenza',
        'parent_item_colon' => 'Parente In Evidenza:',
        'edit_item'         => 'Modifica In Evidenza',
        'update_item'       => 'Aggiorna In Evidenza',
        'add_new_item'      => 'Aggiungi Nuovo In Evidenza',
        'new_item_name'     => 'Nuovo Nome In Evidenza',
        'menu_name'         => 'In Evidenza',
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );

    register_taxonomy('in_evidenza', array('ai', 'tech', 'dev', 'society','ai-tools', 'guides', 'experiences'), $args);
}
add_action('init', 'crea_tassonomia_in_evidenza');

function aggiungi_classe_a_p($content) {
    $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="excerpt">', $content);
    return $content;
}
add_filter('the_excerpt', 'aggiungi_classe_a_p');

function add_class_menu_search( $classes, $item, $args ) {
    if ( 'primary' === $args->theme_location ) {
        $menu_items = wp_get_nav_menu_items($args->menu);
        if (!empty($menu_items) && $item->ID === $menu_items[0]->ID) {
            $classes[] = 'search-bar';
        }
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_class_menu_search', 10, 3 );


add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
function load_more_posts() {
    $query_vars = json_decode( stripslashes( $_POST['query'] ), true );
    $query_vars['paged'] = $_POST['page'] + 1;
    $query_vars['posts_per_page'] = 5;
    $query_vars['post_status'] = 'publish';
    $query_vars['post_type'] = array('ai', 'tech', 'dev', 'society', 'ai-tools', 'guides', 'experiences');

    $posts = new WP_Query( $query_vars );
    $output = '';
    if ($posts->have_posts()) : 
        while ($posts->have_posts()) : $posts->the_post();
            ob_start();
            get_template_part('template-parts/content', 'post');
            $output .= ob_get_clean();
        endwhile;
    endif;

    $response = [
        'content' => $output,
        'next_page' => $query_vars['paged'],
        'max_page' => $posts->max_num_pages
    ];
    wp_send_json($response);
}

