<?php

function style_load()
{
    wp_enqueue_style('style_css', get_template_directory_uri() . "/css/style.css", array(), "1.0", "all");
    wp_enqueue_style('slick_css', get_template_directory_uri() . "/css/slick.css", array(), "1.0", "all");
}

add_action("wp_enqueue_scripts", "style_load");


/* CUSTOM JQUERY */
function load_custom_jquery()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', array(), null, true);
}

add_action("wp_enqueue_scripts", "load_custom_jquery");


function load_script()
{
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), '1.0', true);
    //wp_enqueue_script('main', get_template_directory_uri() . '/js/item.js', array('jquery'), '1.0', true);
    wp_enqueue_script('carousel', get_template_directory_uri() . '/js/carousels.js', array('jquery'), '1.0', true);
}

add_action("wp_enqueue_scripts", "load_script");

/* SVG SUPPORT */

function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* REGISTER THE MAIN MENU  */
function custom_menu()
{
    register_nav_menu('primary-menu', __('Primary Menu'));
    register_nav_menu('side-custom-menu', __('Mobile Menu'));

    /*   //get 'your_custom_menu' id to assign it to the primary menu location created
    $menu_header = get_term_by('name', 'my-custom-menu', 'nav_menu');
    $menu_header_id = $menu_header->term_id;

    //if menu not found, create a new one
    if ($menu_header_id == 0) {
        $menu_header_id = wp_create_nav_menu('Primary Menu');
    }

    //Get all locations (including the one we just created above)
    $locations = get_theme_mod('nav_menu_locations');

    //set the menu to the new location and save into database
    $locations['my-custom-menu'] = $menu_header_id;
    set_theme_mod('nav_menu_locations', $locations); */
}
add_action('init', 'custom_menu');

/* add_filter('menu_image_default_sizes', function ($sizes) {

    // remove the default 36x36 size
    unset($sizes['menu-36x36']);

    // add a new size
    $sizes['menu-50x50'] = array(50, 50);

    // return $sizes (required)
    return $sizes;
});
 */
/* ADD CLASS TO MENU ANCHOR TAGS */
function add_link_atts($atts)
{
    $atts['class'] = "menu__link";
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_link_atts');


add_theme_support('post-thumbnails');

/* WOOCOMMERCE SUPPORT */

function woocommerce_support()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('woocommerce', array(

        'thumbnail_image_width' => 246,
        'single_image_width'    => 504,
    ));

/*     if (!term_exists('TTT')) {
        wp_insert_term('TTT', 'product_cat', array(
            'description' => 'TTT', // optional
            'slug' => 'TTT' // optional
        ));
    } */
}
add_action('after_setup_theme', 'woocommerce_support');
/* 
if (class_exists('Woocommerce')){
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
}
 */


/**
 * Change the breadcrumb separator
 */
add_filter('woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter');
function wcc_change_breadcrumb_delimiter($defaults)
{
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = ' &gt; ';
    return $defaults;
}
/* OVERRIDE WOOCOMMERCE CSS */
add_filter('woocommerce_enqueue_styles', '__return_false');
function wp_enqueue_woocommerce_style()
{
    wp_register_style('woocommerce', get_template_directory_uri() . '/css/woocommerce.css');
    if (class_exists('woocommerce')) {
        wp_enqueue_style('woocommerce');
    }
}
add_action('wp_enqueue_scripts', 'wp_enqueue_woocommerce_style');



add_action('woocommerce_after_shop_loop_item_title', 'remove_rating');
function remove_rating()
{
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
}

add_action('woocommerce_before_shop_loop_item_title', 'remove_sale_flash');
function remove_sale_flash()
{
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');
}

// hide coupon field on cart page
function hide_coupon_field_on_cart($enabled)
{

    if (is_cart()) {
        $enabled = false;
    }

    return $enabled;
}
add_filter('woocommerce_coupons_enabled', 'hide_coupon_field_on_cart');

// hide coupon field on checkout page
function hide_coupon_field_on_checkout($enabled)
{

    if (is_checkout()) {
        $enabled = false;
    }

    return $enabled;
}
add_filter('woocommerce_coupons_enabled', 'hide_coupon_field_on_checkout');

/*
* Creating a function to create our CPT
*/

function material_init()
{
    $labels = array(
        'name' => _x('Slick-Slider', 'slick-slider'),
        'singular_name' => _x('Slick-Slide', 'slick-slide')

    );
    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'menu_icon' => 'dashicons-paperclip',
        'supports' => array('title', 'excerpt', 'thumbnail', 'custom-fields'),
        'hierarchical' => false
    );
    register_post_type('Slider', $args);
}
add_action('init', 'material_init');


remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
