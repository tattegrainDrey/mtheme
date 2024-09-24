<?php get_header(); ?>
<main>
    <?php
    if (have_posts()):
        echo "<section class='single'>";
        while (have_posts()):
            the_post();
            $tags = get_the_tags();
            if ($tags) {
                $tag_links = array(); // Create an array to hold the tag links

                foreach ($tags as $tag) {
                    $tag_links[] = '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
                }
            }
    ?>
            <article>
                <div class="metainfo">
                    <div class="line1">
                        <h3><?php the_time('j F Y') ?></h3>
                        <h3><?php the_author() ?> </h3>
                    </div>
                    <div class="line2 tags">
                        <?php echo implode(' · ', $tag_links); ?>
                    </div>
                </div>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
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