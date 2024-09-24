<form id="searchform" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="search" name="search" value="<?php echo get_search_query() ?> "> 
    <button type="submit" value="<?php esc_attr_e('Search'); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/icons/search.svg'); ?>" alt="search ico">
    </button>
</form>