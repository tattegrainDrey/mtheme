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
        $search_form = '<li class="menu-item search-form">' .
            '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">' .
            '<label>' .
            '<input type="search" placeholder="Search …" value="" name="s" class="search-field" />' .
            '</label>' .
            '<button type="submit" class="search-submit">Search</button>' .
            '</form>' .
            '</li>';
        $items .= $search_form;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form_to_menu', 10, 2);