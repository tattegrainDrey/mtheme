<?php get_header(); ?>
<main id="main">
    <?php
    if (have_posts()):
        echo "<section id='section' class='error'>";
        echo '<button class="back" onclick="window.history.back();">Go Back</button>';
        while (have_posts()):
            the_post();
    ?>
            <article>
                I think you're lost... You can either use the button above to go back or use the search bar.
                <?php get_search_form() ?> 
            </article>
    <?php
        endwhile;
        echo "</section>";
    else:
        echo "You don't have any posts for index.php";
        echo "<script>console.log('You don't have any posts for index.php')</script>";
    endif; ?>
</main>
<?php get_footer(); ?>