info
<?php get_header(); ?>
<main>
    <?php
    if (have_posts()):
        echo "<section class='index'>";
        $post_count = 0; // Initialize a counter
        $total_posts = wp_count_posts()->publish; // Get total number of published posts
        
        while (have_posts()):
            the_post();
            $post_count++; // Increment the counter
    ?>
            <article>
                <div class="metainfo">
                    <div class="line1">
                        <h3><?php the_time('j F Y') ?></h3>
                        <h3><?php the_author() ?> </h3>
                    </div>
                </div>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail(); ?> 
                <?php the_excerpt(); ?>
            </article>
            <?php if ($post_count < $total_posts): ?>
                <hr> <!-- Only add <hr> if this is not the last post -->
            <?php endif; ?>
    <?php
        endwhile;
        echo "</section>";
    else:
        echo "You don't have any posts for index.php";
        echo "<script>console.log('You don't have any posts for index.php')</script>";
    endif; ?>
</main>
<?php get_footer(); ?>
