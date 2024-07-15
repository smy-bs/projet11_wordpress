<?php

function projet11_supports()
{
    add_theme_support('title-tag');
}

function projet11_enqueue_styles()
{ //함수는 테마의 스타일 시트를 등록하고 로드합니다.
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
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}

// add logo
function projet11_theme_setup()
{
    add_theme_support('custom-logo');
}

// menu toggle 
function script_menu()
{
    wp_enqueue_script(
        'js_menu',
        get_template_directory_uri() . './js/menu.js',
        array()
    );
}

// add contact_btn 
function contact_btn($items, $args)
{
    //var_dump($items , $args);
    $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-94"><span role="button" class="contact_btn" >CONTACT</span></li>';
    return $items;
}
add_filter('wp_nav_menu_items', 'contact_btn', 10, 2);

//random image
function get_random_photo()
{
    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => 1,
        'orderby' => 'rand'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $image_url = get_the_post_thumbnail_url();
        wp_reset_postdata();
        return $image_url;
    }
    return false;
}

// add script
function script_lightbox()
{
    wp_enqueue_script(
        'js_lightbox',
        get_template_directory_uri() . './js/lightbox.js',
        array()
    );
}
function script_filter()
{
    wp_enqueue_script(
        'js_filter',
        get_template_directory_uri() . './js/filter.js',
        array()
    );


    /* AJOUTER AJAX ADMIN   */
    wp_localize_script('js_filter', 'js_filter_js', array('ajax_url' => admin_url('admin-ajax.php')));
}

function load_more_posts_ajax()
{
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $page,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            $image_url = get_the_post_thumbnail_url();
            $categories = get_the_category();
            $category_names = array_map(function ($cat) {
                return $cat->name;
            }, $categories);
            $category_list = implode(', ', $category_names);
            $reference = get_post_meta(get_the_ID(), 'reference', true);
            $post_id = get_the_ID();
?>
            <div class="card">
                <img class="post_img" src="<?php echo $image_url; ?>" alt="<?php the_title_attribute(); ?>" data-ref="<?php echo $reference; ?>" data-cat="<?php echo esc_attr($category_list); ?>" />
                <img class="fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/maximize.svg" alt="fullscreen logo" role="button" aria-pressed="false" />
                <a href="<?php the_permalink(); ?>">
                    <img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri(); ?>/assets/eye.svg" />
                    <span class="title"><?php echo $reference; ?></span>
                    <span class="categorie"><?php echo $category_list; ?></span>
                </a>
            </div>
        <?php
        }
        $content = ob_get_clean();
        wp_reset_postdata();
        $has_more = $query->max_num_pages > $page;
        wp_send_json_success(['content' => $content, 'has_more' => $has_more]);
    } else {
        wp_send_json_error('No more posts');
    }
}

function filter_post_ajax()
{
    $category = $_POST['category'];
    $format = $_POST['format'];
    $data_order = $_POST['date'];

    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => []
    );

    if ($category) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $category,
            'operator' => 'IN'
        );
    }

    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format
        );
    }

    if ($data_order === "A PARTIR DES PLUS ANCIENNES") {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    }


    $query = new WP_Query($args);
    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            $image_url = get_the_post_thumbnail_url();
            $categories = get_the_category_list(', ');
            $reference = get_post_meta(get_the_ID(), 'reference', true);
            $post_id = get_the_ID();
        ?>


            <!-- <div class="card">
                <a href="<?php //echo $image_url; 
                            ?>">
                    <img class="post_img" 
                    src="<?php //echo $image_url; 
                            ?>" 
                    alt="<?php //the_title_attribute(); 
                            ?>" 
                    data-imgId="<?php //echo $post_id; 
                                ?>" />
                </a>
                <div class="overlay">
                    <a href="<?php //the_permalink(); 
                                ?>" 
                    class="right-text">Reference: <?php //echo $reference; 
                                                    ?></a>
                    <a href="<?php //the_permalink(); 
                                ?>" class="left-text">Catégories: 
                        <?php //echo $categories; 
                        ?></a>
                    <div class="center-icons">
                        <img class="fullscreen" src="<?php //echo get_template_directory_uri(); 
                                                        ?>/assets/maximize.svg" alt="fullscreen logo" role="button" aria-pressed="false" />
                        <img class="lightbox-eye" src="<?php //echo get_template_directory_uri(); 
                                                        ?>/assets/eye.svg" alt="lightbox eye" role="button" aria-pressed="false" />
                    </div>
                </div>
            </div> -->


            <div class="card">
                <img class="post_img" src="<?php echo $image_url; ?>" alt="<?php the_title_attribute(); ?>" data-ref="<?php echo $reference; ?>" data-cat="<?php echo $categories; ?>" />

                <img class="fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/maximize.svg" alt="fullscreen logo" role="button" aria-pressed="false" />

                <a href="<?php the_permalink(); ?>">
                    <img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri(); ?>/assets/eye.svg" />


                    <span class="title"><?php echo $reference; ?></span></a>
                <span class="categorie"><?php echo $categories; ?></span></a>

            </div>

<?php
        }
        $content = ob_get_clean();
        wp_reset_postdata();
        // $has_more = $query->max_num_pages > $page;
        wp_send_json_success(['content' => $content, 'category' => $category, 'format' => $format, 'date' => $data_order]);


        wp_die();
        wp_reset_postdata();

        $has_more = $query->max_num_pages > $page;


        // wp_send_json_success(['content' => $content, 'has_more' => $has_more]);
    } else {
        wp_send_json(['category' => $category, 'format' => $format, 'date' => $data_order]);
    }
}

function my_plugin_enqueue_scripts()
{
    // Enqueue jQuerywp_enqueue_script('jquery'); 
    wp_enqueue_script('jquery');
    // Enqueue your custom script (optional)
    wp_enqueue_script('script-Js', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}



// add_action('wp_enqueue_scripts', 'projet11_scripts');

add_action('wp_enqueue_scripts', 'my_plugin_enqueue_scripts');
add_action('wp_enqueue_scripts', 'script_menu');
add_action('wp_enqueue_scripts', 'script_filter');
add_action('wp_enqueue_scripts', 'script_lightbox');
add_action('after_setup_theme', 'projet11_theme_setup');
add_action('wp_enqueue_scripts', 'projet11_enqueue_styles');
add_action('after_setup_theme', 'projet11_supports');
add_action('init', 'register_my_menus');

/* traiter les ajax  */
add_action('wp_ajax_load_more_posts', 'load_more_posts_ajax');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_ajax');

add_action('wp_ajax_filter_post_ajax', 'filter_post_ajax');
add_action('wp_ajax_nopriv_filter_post_ajax', 'filter_post_ajax');


?>