<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<?php
if (have_posts()):
while (have_posts()): the_post();
$t = get_the_title();
$category = get_the_category();
$cat_name = $category[0]->cat_name;
$posttags = get_the_tags();
$time = get_the_time('Y-m-d');
?>
<?php
endwhile;
else: ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer();