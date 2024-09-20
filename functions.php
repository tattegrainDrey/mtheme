<?php

/* -------------------------------------- Style */
function enqueue_styles() {
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

/* -------------------------------------- Theme support */
add_theme_support( 'custom-logo', array(
    'height' => 55,
    'width'  => 'auto'
    ) );

/* -------------------------------------- Widgets*/
function enregistrer_sidebar()
{
    register_sidebar(array(
        'name' => __('Footer 1', 'nom-de-mon-theme'),
        'id' => 'footer_1',
        'description' => __('Une zone de widget pour afficher des widgets dans le pied de page.', 'nom-de-mon-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'enregistrer_sidebar');