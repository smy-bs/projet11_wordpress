<?php

function projet11_supports () {
    add_theme_support('title-tag');
}

function projet11_enqueue_styles() { //함수는 테마의 스타일 시트를 등록하고 로드합니다.
    // Enqueue the main stylesheet
    wp_enqueue_style('projet11-main', get_stylesheet_uri()); //// Load the main stylesheet
    // Enqueue additional styles
    wp_enqueue_style('additional-styles', get_template_directory_uri() . '/css/additional-styles.css');
   
   
    // Enqueue specific styles for header, footer, single, and page
    if (is_front_page()) {
        // Load the header style on the front page
        wp_enqueue_style('projet11-header', get_template_directory_uri() . '/css/header.css');
    }

    if (is_single()) {
        // Load the single page style
        wp_enqueue_style('projet11-single', get_template_directory_uri() . '/css/single.css', array(), '1.0.1');
    }

    if (is_page()) {
        // Load the general page style
        wp_enqueue_style('projet11-page', get_template_directory_uri() . '/css/page.css');
    }

    // Load the footer style on all pages (as an example, if you want to load a footer style everywhere)
    wp_enqueue_style('projet11-footer', get_template_directory_uri() . '/css/footer.css');
}
// register menus
function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}

// add logo
function projet11_theme_setup() {
    add_theme_support( 'custom-logo' );
}

// menu toggle 
function script_menu() {
    wp_enqueue_script(
        'js_menu',
        get_template_directory_uri().'./js/menu.js',
        array()
    );
}
// add script
function script_lightbox() {
    wp_enqueue_script(
        'js_lightbox',
        get_template_directory_uri().'./js/lightbox.js',
        array()
    );
}
function script_filter() {
    wp_enqueue_script(
        'js_filter',
        get_template_directory_uri().'./js/filter.js',
        array()
    );
    /* AJOUTER AJAX ADMIN   */
    wp_localize_script('js_filter', 'js_filter_js', array('ajax_url' => admin_url('admin-ajax.php')));
}

function single_post_ajax(){
    echo "hello from backend";
    wp_die();
    wp_reset_postdata();
}



    
    
// add_action('wp_enqueue_scripts', 'cookinfamily_scripts');

add_action( 'wp_enqueue_scripts', 'script_menu' );
add_action('wp_enqueue_scripts', 'script_filter');
add_action('wp_enqueue_scripts', 'script_lightbox');
add_action( 'after_setup_theme', 'projet11_theme_setup' );
add_action('wp_enqueue_scripts', 'projet11_enqueue_styles');
add_action('after_setup_theme', 'projet11_supports');
add_action( 'init', 'register_my_menus' );

/* trater les ajax  */
add_action('wp_ajax_single_post_ajax', 'single_post_ajax');
add_action('wp_ajax_nopriv_single_post_ajax', 'single_post_ajax');
?>