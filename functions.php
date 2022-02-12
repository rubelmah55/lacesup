<?php 

require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists( 'lacesup_setup' ) ) {

	function lacesup_setup() {
		/** Make theme available for translation. */
		load_theme_textdomain( 'lacesup', get_template_directory() . '/languages' );

		/** Enable support for Post Thumbnails on posts and pages. */
		add_theme_support( 'post-thumbnails' );
		//add_image_size( 'post_thumb', 282, 320, true );

		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
		  'menu-1' => esc_html__( 'Primary Menu', 'lacesup' ),
		  'menu-2' => esc_html__( 'Footer Menu', 'lacesup' ),
		) );

	}
}
add_action( 'after_setup_theme', 'lacesup_setup' );

/*** Enqueue scripts and styles. */
function lacesup_scripts() {

	/*** Enqueue styles. */
	wp_enqueue_style('icons', get_template_directory_uri() . '/assets/css/icons.css', array(), time(), 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), time(), 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), time(), 'all');
	wp_enqueue_style('metismenu', get_template_directory_uri() . '/assets/css/metismenu.css', array(), time(), 'all');
	wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), time(), 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), time(), 'all');
	wp_enqueue_style( 'lacesup-style', get_stylesheet_uri(), array(), time());

	/*** Enqueue scripts. */
	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), time(), true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), time(), true);
	wp_enqueue_script('jquery.easing', get_template_directory_uri() . '/assets/js/jquery.easing.js', array(), time(), true);
	wp_enqueue_script('scrollUp.min', get_template_directory_uri() . '/assets/js/scrollUp.min.js', array(), time(), true);
	wp_enqueue_script('slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), time(), true);
	wp_enqueue_script('wow.min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), time(), true);
	wp_enqueue_script('metismenu', get_template_directory_uri() . '/assets/js/metismenu.js', array(), time(), true);
	wp_enqueue_script('active', get_template_directory_uri() . '/assets/js/active.js', array(), time(), true);


}
add_action( 'wp_enqueue_scripts', 'lacesup_scripts' );

/*** ACF OPTIONS PAGE */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

/*** Get all page id */ 
function getPageID() {
	global $post;

	if(is_home() && get_option('page_for_posts')) 
	{
		return get_option('page_for_posts');
	} 

	if(get_post_type() == 'page' && $post->post_parent ) {
		$ancestors = get_post_ancestors($post->ID);
		$root = count($ancestors)-1;
		return $ancestors[$root];
	}

	return $post->ID;
}