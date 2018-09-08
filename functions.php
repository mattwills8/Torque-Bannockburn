<?php
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
        } endif;

function wpbootstrap_scripts_with_jquery()
{
    // Register the script like this for a theme:
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) );
    wp_enqueue_script( 'bootstrap-jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js' );
    wp_enqueue_script( 'blog-scripts', get_stylesheet_directory_uri() . '/js/clean-blog.min.js' );
}

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

// Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//Register the theme's sidebars
/*
if ( function_exists( 'register_sidebars' ) ) {
    register_sidebars( 4, array(
        'name'          => __('RW Ventures Footer Column %d'),
        'id'            => __('rwv_footer_column'),
        'description'   => 'Widgets in this area will be displayed in the Footer.',
        'class'         => 'rwv-footer-col-%d',
        'before_widget' => '<li id="%1$s" class="widget rwv-widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ) );
}
*/
function arphabet_widgets_init() {
	if ( function_exists( 'register_sidebars' ) ) {
	    register_sidebars( 3, array(
	        'name'          => __('Bannockburn-Lakes-Footer-%d'),
	        'id'            => __('footer_column'),
	        'description'   => 'Widgets in this area will be displayed in the Footer.',
	        'before_widget' => '<div>',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="heading2">',
	        'after_title'   => '</h2>',
	        'before_content'  => '<p class="footertext">',
	        'after_content'   => '</p>'
	    ) );
	}
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/*
 * Availability Post Type
 */
function tq_create_post_type() {
  register_post_type( 'availability',
    array(
      'labels' => array(
        'name' => __( 'Availability' ),
        'singular_name' => __( 'Available Suite' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-building',
    )
  );
}
add_action( 'init', 'tq_create_post_type' );

function tq_create_availability_tax() {
    register_taxonomy(
        'building',
        'availability',
        array(
            'label' => __( 'Building' ),
            'rewrite' => array( 'slug' => 'building' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'floor',
        'availability',
        array(
            'label' => __( 'Floor' ),
            'rewrite' => array( 'slug' => 'floor' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'tq_create_availability_tax' );
?>
