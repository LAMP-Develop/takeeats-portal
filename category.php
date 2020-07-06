<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<div class="py-md-5 py-4">
<div class="container">
<div class="row">
<div class="col-md-9">
<h2 class="archives-ttl">”<?php single_cat_title(); ?>” 記事一覧</h2>
<div class="archives">
<?php if (have_posts()): while (have_posts()): the_post();
$t = get_the_title();
$p = get_the_permalink();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'medium');
}
?>
<article class="archives__inner">
<a href="<?php echo $p; ?>">
<figure class="archives__inner-thumbnail"><img src="<?php echo $i; ?>" alt="<?php echo $t; ?>"></figure>
<div class="archives__inner-info">
<time data-time="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<h3><?php echo $t; ?></h3>
</div>
</a>
</article>
<?php endwhile; endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer();
