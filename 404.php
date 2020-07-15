<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="py-5">
<div class="container">
<h2>404 Not Found！</h2>
<p>お探しのページは見つかりませんでした。</p>
<p><a href="<?php echo $home; ?>">トップページへ戻る</a></p>
</div>
</section>
<?php get_footer();