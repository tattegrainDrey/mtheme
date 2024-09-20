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
    function get_initials($site_name) {
        $words = explode(' ', $site_name); // Split the string into words
        $initials = '';
    
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper($word[0]); // Get the first letter and convert to uppercase
            }
        }
    
        return $initials;
    }
    
    $initials = get_initials( get_bloginfo('name'));
    


    if (isset($_COOKIE['width'])) {
        $width = intval($_COOKIE['width']);
    }
    ?>
    <header>
        <div class="fixtures">
            <img src="https://mediatone.ca/menu/" alt="menu ico">
            
            <?php
                if (has_custom_logo() && has_site_icon()) {
                    echo "<script> console.log('choice 1') </script>";
                    if ($width < 900) {
                        echo "<img src=" . get_site_icon_url() . " alt='site ico' class='logo ico'>";
                        echo "<script> console.log('choice 1.1') </script>";
                    }
                    else {
                        the_custom_logo();
                        echo "<script> console.log('choice 1.2') </script>";
                    }
                }
                elseif (!has_custom_logo() && has_site_icon()){
                    echo "<script> console.log('choice 2') </script>";
                    echo "<img src=" . get_site_icon_url() . " alt='site ico' class='logo ico'>";
                }
                elseif (!has_site_icon() && has_custom_logo()) {
                    echo "<script> console.log('choice 3') </script>";
                    the_custom_logo();
                }
                else {
                    echo "<a href=" . get_bloginfo('url') . "> <h1>" . get_bloginfo('name') . "<h1> </a>";                  
                }
            ?>
            
            <img src="https://mediatone.ca/search/" alt="search ico">
        </div>
        <div></div>
    </header>