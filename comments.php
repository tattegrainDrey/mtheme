<?php
    if (post_password_required()) {
        return;
    }
?>

<div class="comments-container" id="comments">
<?php
    // Check if there are comments.
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf( _nx( 'One Comment', '%1$s Comments', $comments_number, 'comments title', 'text-domain' ), number_format_i18n( $comments_number ) );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>

        <?php
        // Pagination for comments.
        the_comments_navigation();

    else :
        // If no comments, display a message.
        echo '<p>' . __( 'No comments yet.', 'text-domain' ) . '</p>';
    endif;
    ?>

    <?php
    // Comment form.
    comment_form();
    ?>
</div>