<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<aside class="sidebar col-md-3 mt-md-0 mt-4">

<?php if (is_active_sidebar('side-bar')) {
    dynamic_sidebar('side-bar');
} ?>

<div class="sidebar-inner">
<h3>その他のおすすめ記事</h3>
<div class="sidebar__posts">
<?php
$no = 1;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'rand',
];
$posts = get_posts($args);
foreach ($posts as $post): setup_postdata($post);
$t = get_the_title();
$p = get_the_permalink();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
}
?>
<a class="sidebar__posts-article" href="<?php echo $p; ?>">
<div class="sidebar__posts-article-thumbnail"><img src="<?php echo $i; ?>" alt="<?php echo $t; ?>"></div>
<div class="sidebar__posts-article-txt">
<h4><?php echo $t; ?></h4>
<time class="post-time" data-time="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time>
</div>
</a>
<?php $no++; endforeach; wp_reset_postdata(); ?>
</div>
</div>
</aside>
