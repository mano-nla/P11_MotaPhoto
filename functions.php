<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Chargement script et style //
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/script.js'), true);

}

function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
    register_nav_menu( 'footer-menu', __( 'Menu pied de page', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Chargement des photos sur la page d'accueil en Ajax //
add_action('wp_ajax_front_page_load_more', 'front_page_load_more');
add_action('wp_ajax_nopriv_front_page_load_more', 'front_page_load_more');

function front_page_load_more() {

    check_ajax_referer('front-page-load-more', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $tax_query = array('relation' => 'AND');

if(!empty($_POST['categorie'])){
    $tax_query[] = array(
        'taxonomy' => 'categorie',
        'field'    => 'slug',
        'terms'    => sanitize_text_field($_POST['categorie']),
    );
}

if(!empty($_POST['format'])){
    $tax_query[] = array(
        'taxonomy' => 'format',
        'field'    => 'slug',
        'terms'    => sanitize_text_field($_POST['format']),
    );
}

$order = isset($_POST['order']) ? $_POST['order'] : 'ASC';

$args = array(
    'post_type'      => 'photos',
    'posts_per_page' => 8,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => $order,
);

if(count($tax_query) > 1){
    $args['tax_query'] = $tax_query;
}

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        ob_start();

        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('templates_part/photo-block');
        }

        wp_reset_postdata();

        wp_send_json_success(ob_get_clean());
    }

    wp_send_json_error();
}

// Filtrage et triage des photos sur la front page //
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');

function filter_photos(){

    $tax_query = array('relation' => 'AND');

    if(!empty($_POST['categorie'])){
        $tax_query[] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_POST['categorie']),
        );
    }

    if(!empty($_POST['format'])){
        $tax_query[] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_POST['format']),
        );
    }

    $order = isset($_POST['order']) ? $_POST['order'] : 'ASC';

    $args = array(
        'post_type'      => 'photos',
        'posts_per_page' => 8,
        'orderby'        => 'date',
        'order'          => $order,
        'tax_query'      => count($tax_query) > 1 ? $tax_query : '',
    );

    $query = new WP_Query($args);

    if($query->have_posts()){

        ob_start();

        while($query->have_posts()){
            $query->the_post();
            get_template_part('templates_part/photo-block');
        }

        wp_reset_postdata();

        wp_send_json_success(ob_get_clean());
    }

    wp_send_json_error();
}