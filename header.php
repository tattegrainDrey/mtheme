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
            document.cookie = "width = " + width;
        })

        window.addEventListener("resize", function() {
            var width = window.innerWidth;
            document.cookie = "width = " + width;
        })
    </script>
</head>

<body>

    <?php
    if (isset($_COOKIE['width'])) {
        $width = intval($_COOKIE['width']);
        echo gettype($width);
    }
    ?>
    <header>
        <div class="fixtures">
            <img src="https://mediatone.ca/menu/" alt="menu ico">
            <?php
                if (has_custom_logo() && has_site_icon()) {
                    if ($width < 900) {
                        do_favicon();
                    }
                    else {
                        get_custom_logo();
                    }
                }
                elseif (!has_custom_logo()){
                    do_favicon();
                }
                else {
                    get_custom_logo();
                }
            ?>
            
            <img src="https://mediatone.ca/search/" alt="search ico">
        </div>
        <div></div>
    </header>