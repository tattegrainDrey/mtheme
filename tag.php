<?php get_header(); ?>
<main id="main">
    <?php
    if (have_posts()):
        echo "<section id='section' class='index'>";
        echo '<button class="back" onclick="window.history.back();">Go Back</button>';
        echo '<h1>'. single_tag_title() .'</h1>';
        while (have_posts()):
            the_post();
    ?>
            <article>
                <a href="<?php the_permalink() ?> ">
                    <div class="metainfo">
                        <div class="line1">
                            <h3><?php the_time('j F Y') ?></h3>
                            <h3><?php the_author() ?> </h3>
                        </div>
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <?php the_post_thumbnail(); ?>
                    <?php the_excerpt(); ?>
                </a>
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