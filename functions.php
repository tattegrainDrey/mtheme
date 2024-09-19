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