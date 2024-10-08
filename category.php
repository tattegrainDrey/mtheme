<?php get_header(); ?>
<main id="main">
    <?php
    if (have_posts()):
        echo "<section id='section' class='category'>";
        echo '<button class="back" onclick="window.history.back();">Go Back</button>';
        $post_count = 0;
        $ad_post = get_post(230);

        while (have_posts()):
            the_post();
            $post_count++;
    ?>
            <article class="article">
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


            if ($post_count % 3 == 0) {
                echo '<article class="wpads">';
                echo apply_filters('the_content', $ad_post->post_content);
                echo '</article>';
            }
        endwhile;
        echo "</section>";
    else:
        echo "You don't have any posts for index.php";
        echo "<script>console.log('You don't have any posts for index.php')</script>";
    endif; ?>
</main>
<?php get_footer(); ?>