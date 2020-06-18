<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<div class="py-5 border-top">
<div class="container">
<div class="row">
<?php
if (have_posts()):
while (have_posts()): the_post();
$id = get_the_ID();
$t = get_the_title();
$p = get_the_permalink();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url($id, 'large');
}
?>
<article class="col-md-9">
<header class="post-header">
<?php if ($i): ?>
<figure class="mt-0 mb-4 d-block w-100 post-thumbnail">
<img class="w-100" src="<?php echo $i; ?>" alt="<?php echo $t; ?>">
</figure>
<?php endif; ?>
<h2 class="post-ttl"><?php echo $t; ?></h2>
<time class="post-time" data-time="<?php the_time('Y-m-d'); ?>"><i class="far fa-calendar-alt mr-1 text-primary"></i><?php the_time('Y年n月j日'); ?></time>
</header>
<div class="post-main">
<?php the_content(); ?>
</div>
</article>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer();