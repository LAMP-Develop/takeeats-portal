<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="sec">
<div class="container">
<div class="featured">
<?php if (have_posts()): while (have_posts()): the_post();
$t = get_the_title();
$p = get_the_permalink();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'medium');
}
?>
<a class="featured-article" href="<?php echo $p; ?>">
<img src="<?php echo $i; ?>" alt="<?php echo $t; ?>">
<h3><?php echo $t; ?></h3>
</a>
<?php endwhile; endif; ?>
</div>
</div>
</section>
<?php get_footer();