<?php get_header(); ?>
<main>
<?php
        if (have_posts()):
            while(have_posts()):
                the_post();
                //the_title('<h3>','</h3>');
            ?> 
            <article>
            <h2><?php the_title();?></h2>
            <h6>Contenu :<h6><?php the_content();
            endwhile; ?>
            </article>
    <?php
        else:
            echo "You don't have any posts for index.php";
            echo "<script>console.log('You don't have any posts for index.php')</script>";
endif; ?>
</main>
<?php get_footer(); ?>