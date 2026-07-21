<?php
/**
 * DonkTest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DonkTest
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
function funfun_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on DonkTest, use a find and replace
		* to change 'funfun' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'funfun', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'funfun' ),
		)
	);

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
			'funfun_custom_background_args',
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

	    add_image_size( 'icon-size', 48, 48, true ); 
	    // De laatste parameter (true) zorgt voor een harde crop, waarbij de afbeelding exact 48x48 pixels zal zijn.
	

}
add_action( 'after_setup_theme', 'funfun_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function funfun_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'funfun_content_width', 640 );
}
add_action( 'after_setup_theme', 'funfun_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function funfun_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'funfun' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'funfun' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'funfun_widgets_init' );


function create_team_post_type() {
    $labels = array(
        'name'               => 'Teams',
        'singular_name'      => 'Team',
        'menu_name'          => 'Teams',
        'name_admin_bar'     => 'Team',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team',
        'new_item'           => 'New Team',
        'edit_item'          => 'Edit Team',
        'view_item'          => 'View Team',
        'all_items'          => 'All Teams',
        'search_items'       => 'Search Teams',
        'parent_item_colon'  => 'Parent Teams:',
        'not_found'          => 'No teams found.',
        'not_found_in_trash' => 'No teams found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups', // Add menu icon
        'show_in_rest'		 => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    );

    register_post_type( 'team', $args );
}
add_action( 'init', 'create_team_post_type' );

function create_team_taxonomy() {
    $labels = array(
        'name'              => 'Team categorieën',
        'singular_name'     => 'Team categorie',
        'search_items'      => 'Zoek categorieën',
        'all_items'         => 'Alle categorieën',
        'parent_item'       => 'Hoofdcategorie',
        'parent_item_colon' => 'Hoofdcategorie:',
        'edit_item'         => 'Bewerk categorie',
        'update_item'       => 'Update categorie',
        'add_new_item'      => 'Nieuwe categorie toevoegen',
        'new_item_name'     => 'Nieuwe categorienaam',
        'menu_name'         => 'Categorieën',
    );

    register_taxonomy('team_category', array('team'), array(
        'hierarchical'      => true, // true = categorieën zoals posts
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'team-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'create_team_taxonomy');

/** ================================= AGENDA ========================================== */

function register_agenda_post_type() {

    register_post_type('agenda', array(
        'labels' => array(
            'name' => 'Agenda',
            'singular_name' => 'Agenda'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title'),
        'show_in_rest' => true,
        'has_archive' => false,
    ));

}
add_action('init', 'register_agenda_post_type');

/** ================================= TEAMS MENU ========================================== */

function register_teams_menu() {
    register_nav_menu('teams-menu', __('Teams Menu'));
}
add_action('init', 'register_teams_menu');

class Thumbnail_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start Level - Begin een nieuw sub-menu
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // End Level - Sluit het sub-menu af
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start Element - Begin een nieuw menu-item
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $post;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = join(' ', array_filter($item->classes));
        $class_names = ' class="menu-item ' . esc_attr($class_names) . '"';

        // Haal de post thumbnail op indien beschikbaar
        $thumbnail = '';
        if ($item->type == 'post_type' && has_post_thumbnail($item->object_id)) {
            $thumbnail = get_the_post_thumbnail($item->object_id, 'medium', array('class' => 'menu-thumbnail'));
        } else {
            // Gebruik de standaardafbeelding alleen voor sub-menu-items
            if ($depth > 0) {
                $thumbnail = '<img src="' . get_template_directory_uri() . '/assets/images/donk-default-team.png" alt="' . esc_attr($item->title) . '" class="menu-thumbnail" />';
            }
        }

        // Bouw het menu-item op met thumbnail en titel
        $output .= $indent . '<li' . $class_names . '>';
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= $thumbnail; // Toon de thumbnail of de standaardafbeelding (alleen voor sub-menu)
        $output .= '<span class="menu-item-title">' . $item->title . '</span>'; // Toon de titel
        $output .= '</a>';
    }

    // End Element - Sluit het <li> element af
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}





/**
 * Enqueue scripts and styles.
 */
function funfun_scripts() {
	wp_enqueue_style( 'funfun-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'funfun-style', 'rtl', 'replace' );

	wp_enqueue_script( 'funfun-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'funfun_scripts' );

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
