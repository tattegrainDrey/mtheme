<?php

/* -------------------------------------- Style */
function enqueue_styles()
{
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

/* -------------------------------------- Theme support */
function my_theme_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 55,
        'width'  => 'auto'
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

/* -------------------------------------- Widgets*/
function enregistrer_sidebar()
{
    register_sidebar(array(
        'name' => __('Footer Links', 'nom-de-mon-theme'),
        'id' => 'footer_1',
        'description' => __('Une zone de widget pour afficher des widgets dans le pied de page.', 'nom-de-mon-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'enregistrer_sidebar');

/* --------------------------------------  Menu*/
function save_menu()
{
    register_nav_menus(array(
        'main-menu' => 'Header Menu'
    ));
}
add_action('init', 'save_menu', 0);

/* -------------------------------------- Possibly adding get_search_form to Menu*/

function add_search_form_to_menu($items, $args) {
    if ($args->theme_location == 'main-menu') { 
        ob_start();
        get_search_form(); 
        $search_form = ob_get_clean();
        if (!empty($search_form)) {
            error_log('Search Form: ' . $search_form); // Log to debug
            $items .= '<li class="menu-item search-form">' . $search_form . '</li>';
        } else {
            error_log('Search form is empty');
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form_to_menu', 10, 2);