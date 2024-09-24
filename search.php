<?php get_header(); ?>
<main id="main">
    <?php
    if ( have_posts() ) :
        echo "<section id='section' class='index'>";
        echo '<button class="back" onclick="window.history.back();">Go Back</button>';
        // Capture the search query
        $search_query = get_search_query();
    
        // Define the categories you want to filter by
        $category_slugs = array('commentaries', 'updates');
    
        // Create a new WP_Query for filtering
        $args = array(
            'category_name' => implode(',', $category_slugs), // Filter by category
            's' => $search_query, // Search for the query
            'posts_per_page' => -1 // Get all results
        );
    
        // Execute the query
        $search_results = new WP_Query($args);
    
        // Sort results based on the frequency of search terms
        $sorted_results = array();
    
        if ($search_results->have_posts()) {
            while ($search_results->have_posts()) {
                $search_results->the_post();
    
                // Count how many times the search terms appear in the post content
                $content = get_the_content();
                $count = substr_count(strtolower($content), strtolower($search_query));
    
                if ($count > 0) {
                    $sorted_results[] = array(
                        'post' => get_the_ID(),
                        'count' => $count
                    );
                }
            }
    
            // Sort by frequency count in descending order
            usort($sorted_results, function($a, $b) {
                return $b['count'] - $a['count'];
            });
    
            // Display sorted results
            foreach ($sorted_results as $result) {
                $post = get_post($result['post']);
                setup_postdata($post);
                ?>
                <article>
                <a href="<?php the_permalink() ?> ">
                    <div class="metainfo">
                        <div class="line1">
                            <h3><?php the_time('j F Y') ?></h3>
                            <h3><?php the_author() ?> </h3>
                        </div>
                        <div class="line2">
                            <div class="entry-count">Occurrences: <?php echo $result['count']; ?></div>
                        </div>
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                </a>
            </article>
                <?php
            }
    
            wp_reset_postdata(); // Reset post data
        } else {
            echo '<p>' . __( 'No results found.', 'text-domain' ) . '</p>';
        }
        echo "</section>";
    else :
        echo "<section id='section'>";
            echo "<div> We haven't found anything pertaining to". __('', 'text-domain') .". Please try another query. </div>";
            echo get_search_form();
        echo "<section>";
        echo "<script>console.log('You don't have any posts for index.php')</script>";
    endif; ?>
</main>
<?php get_footer(); ?>