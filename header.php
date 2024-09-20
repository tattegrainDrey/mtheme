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
       if (window.onload) {
        var width = window.innerWidth;
        console.log(width > 400)
       }
    </script>
</head>

<body>
    <header>
        <div class="fixtures">
            <img src="https://mediatone.ca/menu/" alt="menu ico">
            <?php the_custom_logo(); ?>
            <img src="https://mediatone.ca/search/" alt="search ico">
        </div>
        <div></div>
    </header>