<?php

require_once dirname(__FILE__).'/vendor/autoload.php';

use Searche\Classes\Theme;

$theme = new Theme;



/**
 * Add theme menu
 */
function add_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __( 'Main menu' ),
            'footer-menu' => __( 'Footer Menu' ),
            'sidebar-menu' => __( 'Sidebar Menu' ),
            'extra-menu' => __( 'Extra Menu' ),
        )
    );
}
add_action( 'init', 'add_menus' );


/**
 * Add footer widgets
 */
function add_footer_widgets()
{
    register_sidebar(array(
        'name'          => __( 'Sidebar', 'wp-searche' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar area.', 'wp-searche' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar(array(
        'name'          => __( 'Footer 1', 'wp-searche' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer area.', 'wp-searche' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar(array(
        'name'          => __( 'Footer 2', 'wp-searche' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer area.', 'wp-searche' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar(array(
        'name'          => __( 'Footer 3', 'wp-searche' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer area.', 'wp-searche' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar(array(
        'name'          => __( 'Footer 4', 'wp-searche' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer area.', 'wp-searche' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'add_footer_widgets' );


/**
 * Add Yoast sitemap if it exists
 */
function get_yoast_sitemap($linkClass = '')
{
    $sitemap = '<a class="'.$linkClass.'" href="'.get_site_url().'/sitemap.xml" target="_blank"/>Sitemap</a>';
    return (in_array('wordpress-seo/wp-seo.php', apply_filters('active_plugins', get_option('active_plugins')))) ? $sitemap : false;
}


/**
 * Disable emojis
 * Will increase pagespeed
 */
function disable_emojis()
{
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    //add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );


/**
 * Remove Gutenberg Block Library CSS from loading on the frontend
 */
function remove_wp_block_library_css()
{
    wp_dequeue_style( 'wp-block-library');
    wp_dequeue_style( 'wp-block-library-theme');
    wp_dequeue_style( 'wc-block-style');
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );


/**
 * Use the classic editor in the backend
 */
add_filter('use_block_editor_for_post', '__return_false', 10);


/**
 * Remove Gutenberg widget area
 */
function remove_gutenberg_widget_area()
{
    remove_theme_support( 'widgets-block-editor' );
}
add_action('after_setup_theme','remove_gutenberg_widget_area');
add_filter('use_widgets_block_editor','__return_false');



function custom_upload_filter($file)
{
    //$source = $file['name'];
    //$destination = $file['name'].'.webp';
    //$options = [];
    //WebPConvert::convert($source, $destination, $options);
}
add_filter('wp_handle_upload_prefilter','custom_upload_filter');