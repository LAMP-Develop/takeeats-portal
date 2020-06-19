<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="mv">
<div class="container">
<h2>
<span>
<img src="<?php echo $wp_url; ?>/dist/images/mv_icon_01.png" alt="アイコン" srcset="<?php echo $wp_url; ?>/dist/images/mv_icon_01.png 1x, <?php echo $wp_url; ?>/dist/images/mv_icon_01@2x.png 2x">
近くのテイクアウトの<br>名店を探す
<img src="<?php echo $wp_url; ?>/dist/images/mv_icon_02.png" alt="アイコン" srcset="<?php echo $wp_url; ?>/dist/images/mv_icon_02.png 1x, <?php echo $wp_url; ?>/dist/images/mv_icon_02@2x.png 2x">
</span>
</h2>
<div class="text-center mt-4">
<button class="btn btn-primary text-white" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-search mr-2"></i>近くのテイクアウト対応店を探す</button>
</div>
</div>
</section>
<!-- mv -->
<?php get_template_part('template-part/modal/search-form'); ?>
<section class="search">
<div class="container">
<div class="search__area">
<h3>よく見られているエリア</h3>
<ul>
<li><a href="<?php echo $home; ?>/search/">京都</a></li>
</ul>
</div>
</div>
<div class="search__genre bg-light">
<h3><div class="container">ジャンルから探す</div></h3>
<div class="search__genre-list">
<ul>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_sushi.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_sushi.png 1x, <?php echo $wp_url; ?>/dist/images/genre_sushi@2x.png 2x">
<span>寿司</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_sakana.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_sakana.png 1x, <?php echo $wp_url; ?>/dist/images/genre_sakana@2x.png 2x">
<span>魚料理</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_washoku.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_washoku.png 1x, <?php echo $wp_url; ?>/dist/images/genre_washoku@2x.png 2x">
<span>和食</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_okonomi.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_okonomi.png 1x, <?php echo $wp_url; ?>/dist/images/genre_okonomi@2x.png 2x">
<span>お好み焼き</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_chuka.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_chuka.png 1x, <?php echo $wp_url; ?>/dist/images/genre_chuka@2x.png 2x">
<span>中華</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_italy.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_italy.png 1x, <?php echo $wp_url; ?>/dist/images/genre_italy@2x.png 2x">
<span>イタリアン</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_niku.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_niku.png 1x, <?php echo $wp_url; ?>/dist/images/genre_niku@2x.png 2x">
<span>焼肉</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/">
<img src="<?php echo $wp_url; ?>/dist/images/genre_hum.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_hum.png 1x, <?php echo $wp_url; ?>/dist/images/genre_hum@2x.png 2x">
<span>ファストフード</span>
</a>
</li>
</ul>
</div>
</div>
</section>
<!-- search -->
<section class="sec sec-border buzz">
<div class="container">
<h2 class="ttl-h2">いま話題のお店</h2>
<div class="shop-buzz">
<div class="shop-buzz__list">
<?php for ($i=1; $i <= 5; $i++): ?>
<div class="shop-buzz__list-inner">
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="" srcset="<?php echo $wp_url; ?>/dist/images/topic_sample.png 1x, <?php echo $wp_url; ?>/dist/images/topic_sample@2x.png 2x">
<h3>店舗名店舗名店舗名</h3>
<div class="shop-buzz__list-inner-tag">
<span class="shop-buzz__list-inner-tag-map">京都</span>
<span class="shop-buzz__list-inner-tag-genre">ジャンル</span>
</div>
</div>
<?php endfor; ?>
</div>
</div>
</div>
</section>
<!-- buzz -->
<section class="sec sec-border">
<div class="container">
<h2 class="ttl-h2">おすすめ特集</h2>
<div class="featured">
<?php
$no = 1;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
];
$posts = get_posts($args);
foreach ($posts as $post): setup_postdata($post);
$t = get_the_title();
$p = get_the_permalink();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'medium');
}
?>
<a class="featured-article" href="<?php echo $p; ?>">
<?php if ($no === 1): ?>
<span class="featured-article-new">New!</span>
<?php endif; ?>
<img src="<?php echo $i; ?>" alt="<?php echo $t; ?>">
<h3><?php echo $t; ?></h3>
</a>
<?php $no++; endforeach; wp_reset_postdata(); ?>
</div>
</div>
</section>
<!-- featured -->
<section class="sec sec-border">
<div class="container">
<h2 class="ttl-h2">商品注文ランキング</h2>
<div class="menu__ranking">
<?php for ($i=1; $i <= 5; $i++): ?>
<a class="menu__ranking__inner" href="<?php echo $home; ?>/restaurant?recommend=1">
<div class="menu__ranking__inner__thumbnail">
<span class="menu__ranking__inner__thumbnail-no"><?php echo $i; ?></span>
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="" srcset="<?php echo $wp_url; ?>/dist/images/topic_sample.png 1x, <?php echo $wp_url; ?>/dist/images/topic_sample@2x.png 2x">
<span class="menu__ranking__inner__thumbnail-area">京都</span>
</div>
<p class="menu__ranking__inner-name">バジルソースのパスタ</p>
<p class="menu__ranking__inner-shop">TakeCafe</p>
<p class="menu__ranking__inner-price">¥<span>980</span>[税込]</p>
</a>
<?php endfor; ?>
</div>
</div>
</section>
<!-- ranking -->
<section class="sec sec-border">
<div class="container">
<h2 class="ttl-h2 mb-3">#TakeEats</h2>
<p class="text-center font-weight-bold mb-4 small">「#TakeEats」で気になるお店を探そう！</p>
</div>
<div class="insta-feed">
<?php for ($i=1; $i <= 9; $i++): ?>
<div><img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="" srcset="<?php echo $wp_url; ?>/dist/images/topic_sample.png 1x, <?php echo $wp_url; ?>/dist/images/topic_sample@2x.png 2x"></div>
<?php endfor; ?>
</div>
</div>
</section>
<!-- insta -->

<?php get_footer();