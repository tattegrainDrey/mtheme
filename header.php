<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title><?php bloginfo('name') ?></title>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var width = window.innerWidth;
            var height = window.innerHeight;
            var sect = document.getElementById('section').offsetHeight;
            var main = document.getElementById('main');
            if ((sect / height) < 0.84) {
                main.style.height = '84vh';
            } else {
                main.style.height = '100%';
            }
            document.cookie = "width = " + width;
            document.cookie = "height = " + height; 
            console.log('dimensions : ',width, height, sect)
        })

        window.addEventListener("resize", () => {
            var width = window.innerWidth;
            var height = window.innerHeight;
            var sect = document.getElementById('section').offsetHeight;
            var index = document.getElementById('main');
            if ((sect / height) < 0.84) {
                index.style.height = '84vh';
            } else {
                index.style.height = '100%';
            }
            document.cookie = "width = " + width;
            document.cookie = "height = " + height;

            var theLast = document.getElementById('hamburger').lastElementChild;
            var peeka = document.getElementById('search');
            theLast.insertAdjacentElement("afterend", peeka);  
        })
    </script>

</head>

<body>
    <?php

    if (isset($_COOKIE['width'])) {
        $width = intval($_COOKIE['width']);
    }
    if (isset($_COOKIE['height'])) {
        $height = intval($_COOKIE['height']);
    }
    ?>
    <header>
        <div class="fixtures">
            <img id="menuico" src="<?php echo esc_url(get_template_directory_uri() . '/icons/menu.svg'); ?>" alt="menu ico">

            <?php
            if (has_custom_logo() && has_site_icon()) {
                if ($width < 900) {
                    echo "<a href=" . get_bloginfo('url') . "> <img src=" . get_site_icon_url() . " alt='site ico' class='logo ico'> </a>";
                    echo "<script>console.log('choice 1')</script>";
                } else {
                    the_custom_logo();
                    echo "<script>console.log('choice 2')</script>";
                }
            } elseif (!has_custom_logo() && has_site_icon()) {
                echo "<a href=" . get_bloginfo('url') . "> <img src=" . get_site_icon_url() . " alt='site ico' class='logo ico'> </a>";
                echo "<script>console.log('choice 3')</script>";
            } elseif (!has_site_icon() && has_custom_logo()) {
                the_custom_logo();
                echo "<script>console.log('choice 4')</script>";
            } else {
                echo "<h1 class='long'> <a href=" . get_bloginfo('url') . ">" . get_bloginfo('name') . "</a> </h1>";
                echo "<script>console.log('choice 5')</script>";
            }
            ?>

            <?php wp_nav_menu(array(
                'menu'                 => 'main-menu',
                'menu_id'              => 'hamburger',
                'container'            => 'ul',
                'container_class'      => 'bigScreen',
            ));
            ?>

        </div>
    </header>