<?php get_header(); ?>
<main id="main">
    <?php
    if (have_posts()):
        echo "<section id='section' class='home'>";
        while (have_posts()):
            the_post();
    ?>
            <article>
                <?php the_content(); ?>
            </article>
    <?php
        endwhile;
        echo "</section>";
    else:
        echo "You don't have any posts for home.php";
        echo "<script>console.log('You don't have any posts for home.php')</script>";
    endif; ?>
</main>
<?php get_footer(); ?>