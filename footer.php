<footer>
    <div class="maxfoot">
        <?php
        if (has_site_icon()) {
            echo "<script> console.log('choice 2') </script>";
            echo "<img src=" . get_site_icon_url() . " alt='site ico' class='logo ico'>";
        } else {
            function get_initials($site_name)
            {
                $words = explode(' ', $site_name); // Split the string into words
                $initials = '';

                foreach ($words as $word) {
                    if (!empty($word)) {
                        $initials .= strtoupper($word[0]); // Get the first letter and convert to uppercase
                    }
                }

                return $initials;
            }

            $initials = get_initials(get_bloginfo('name'));
            echo "<h2>" . $initials . "</h2>";
        }
        ?>
    </div>
    <div class="minfoot">Copyright © 2024 Media Tone</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>