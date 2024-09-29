<?php get_header(); ?>
<main id="main">
    <?php
    if (have_posts()):
        echo "<section id='section' class='tag'>";
        echo '<button class="back" onclick="window.history.back();">Go Back</button>';
        $post_count = 0;
    ?>
        <h1><?php single_tag_title('Tag: ', true); ?></h1>
        <?php
        while (have_posts()):
            the_post();
            $post_count++;
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



            // Insert the 'past' post every 3 posts



            if ($post_count % 3 == 0) {



            ?>



                <article class="wpads">

                    <?php echo get_the_excerpt(get_page_by_path('ad')); ?>

                </article>



    <?php



            }
        endwhile;
        echo "</section>";
    else:
        echo "You don't have any posts for index.php";
        echo "<script>console.log('You don't have any posts for index.php')</script>";
    endif; ?>
</main>
<?php get_footer(); ?>