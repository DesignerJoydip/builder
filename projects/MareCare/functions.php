<?php 
// support title tag
add_theme_support( 'title-tag' );


// support Enqueue Scripts -----------------------------
function marecare_enqueue_scripts(){

	wp_enqueue_style( 'fontawasome', get_template_directory_uri().'/assets/fonts/fontawesome/font-awesome.min.css', array(), '1.0' );
	wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', array(), '1.0' );
	wp_enqueue_style( 'bootstrap-mincss', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_style( 'plugins-style', get_template_directory_uri().'/assets/css/plugins-style.css', array(), '1.0' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0' );


	// Theme stylesheet.
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// Theme main jquery.
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap-minjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.7', true );
	wp_enqueue_script( 'plugins-scriptjs', get_template_directory_uri() . '/assets/js/plugins-script.js', array(), '1.0', true );
	wp_enqueue_script( 'custom-scriptjs', get_template_directory_uri() . '/assets/js/custom-script.js', array(), '1.0', true );

}
add_action('wp_enqueue_scripts','marecare_enqueue_scripts');

//-----------------------------------------------------


// support logo ---------------------------------
function marecare_logo_setup() {
    
    add_theme_support( 'custom-logo' );

}
add_action( 'after_setup_theme', 'marecare_logo_setup' );
//-----------------------------------------------------



// for show menu item ---------------------------------
function marecare_theme_setup() {
  register_nav_menus( array( 
    'header' => 'Header menu', 
    'footer' => 'Footer menu' 
  ) );
 }
add_action( 'after_setup_theme', 'marecare_theme_setup' );
//-----------------------------------------------------

function marecare_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'marecare_post_thumbnails' );


/*--------------------------------------------------------------------
Walker function
---------------------------------------------------------------------*/
require get_template_directory(). "/inc/walker.php";


/*--------------------------------------------------------------------
Custom post type 
---------------------------------------------------------------------*/
require get_template_directory(). "/inc/custom_post_type_labels.php";

/*--------------------------------------------------------------------
Custom metaboxes
---------------------------------------------------------------------*/
require get_template_directory(). "/inc/custom_metaboxes.php";


/*--------------------------------------------------------------------
Custom Widget types
---------------------------------------------------------------------*/
require get_template_directory(). "/inc/widget.php";



/*---------- remove media button from page banner metabox -------------*/
function check_post_type_and_remove_media_buttons() {
global $current_screen;
// use 'post', 'page' or 'custom-post-type-name'
if( 'page' == $current_screen->post_type ) remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head','check_post_type_and_remove_media_buttons');







/*--------------------------------------------------------------------
Custom metaboxes
---------------------------------------------------------------------*/
require get_template_directory(). "/inc/save_postdata.php";



/*--------------------------------------------------------------------
Widget function
---------------------------------------------------------------------*/
function marecare_widgets_init() {
  register_sidebar( array(
    'name'          => 'Home Quick Link Box 1',
    'id'            => 'homequiclink-1',
    'description'   => 'Add widgets here to appear in your sidebar.',
    'before_widget' => '<div id="%1$s" class="widget quickServiceBox">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    'before_quick_image'  => '<div class="imageContent">',
    'after_quick_image'   => '</div>',
    'before_descrp'  => '<div class="textContent"><div class="wrapCont"><p>',
    'after_descrp'   => '</p></div></div>',
    'before_quick_btn_title'  => '<div class="btnWrap">',
    'after_quick_btn_title'   => '</div>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Home Quick Link Box 2' ),
    'id'            => 'homequiclink-2',
    'description'   => __( 'Add widgets here to appear in your sidebar.' ),
    'before_widget' => '<div id="%1$s" class="widget quickServiceBox">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    'before_quick_image'  => '<div class="imageContent">',
    'after_quick_image'   => '</div>',
    'before_descrp'  => '<div class="textContent"><div class="wrapCont"><p>',
    'after_descrp'   => '</p></div></div>',
    'before_quick_btn_title'  => '<div class="btnWrap">',
    'after_quick_btn_title'   => '</div>',
    
  ) );
  register_sidebar( array(
    'name'          => __( 'Home Quick Link Box 3' ),
    'id'            => 'homequiclink-3',
    'description'   => __( 'Add widgets here to appear in your sidebar.' ),
    'before_widget' => '<div id="%1$s" class="widget quickServiceBox">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    'before_quick_image'  => '<div class="imageContent">',
    'after_quick_image'   => '</div>',
    'before_descrp'  => '<div class="textContent"><div class="wrapCont"><p>',
    'after_descrp'   => '</p></div></div>',
    'before_quick_btn_title'  => '<div class="btnWrap">',
    'after_quick_btn_title'   => '</div>',
  ) );
   register_sidebar( array(
    'name'          => __( 'Footer Content' ),
    'id'            => 'footer-content-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.' ),
    //'before_widget' => '<div id="%1$s" class="widget quickServiceBox">',
    //'after_widget'  => '</div>',
    'before_title'  => '<h3 class="footerHeading">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'marecare_widgets_init' );














 














