<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="sec">
<div class="wrap">
<ul>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<!-- ここに記事 -->
<?php endwhile; endif; ?>
</ul>
</div>
</section>
<?php get_footer();