<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<aside>
<?php if (is_active_sidebar('sidebar')) {
    dynamic_sidebar('sidebar');
} ?>
</aside>
