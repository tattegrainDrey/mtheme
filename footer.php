<footer>
    <div class="maxfoot">
        <?php
            if (has_site_icon()){
                echo "<script> console.log('choice 2') </script>";
                echo "<img src=" . get_site_icon_url() . " alt='site ico' class='logo ico'>";
            }
            else {
                echo "<h2>" . $initials . "</h2>";
            }
        ?>
    </div>
    <div class="minfoot">Copyright © 2024 Media Tone</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>