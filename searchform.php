<form id="search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" name="search">
    <button type="submit">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/icons/search.svg'); ?>" alt="search ico">
    </button>
</form>