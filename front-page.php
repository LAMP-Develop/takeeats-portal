<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="mv">
<div class="container">
<h2>
<span>
<img src="<?php echo $wp_url; ?>/dist/images/mv_icon_01.png" alt="アイコン" srcset="<?php echo $wp_url; ?>/dist/images/mv_icon_01.png 1x, <?php echo $wp_url; ?>/dist/images/mv_icon_01@2x.png 2x">
近くのテイクアウトできる<br>お店を探す
<img src="<?php echo $wp_url; ?>/dist/images/mv_icon_02.png" alt="アイコン" srcset="<?php echo $wp_url; ?>/dist/images/mv_icon_02.png 1x, <?php echo $wp_url; ?>/dist/images/mv_icon_02@2x.png 2x">
</span>
</h2>
<div class="text-center mt-4">
<button class="btn btn-primary text-white" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-search mr-2"></i>お店を検索する</button>
</div>
</div>
</section>
<!-- mv -->
<?php get_template_part('template-part/modal/search-form'); ?>
<section class="search">
<div class="container">
<div class="search__area shadow-sm">
<h3>よく見られているエリア</h3>
<ul>
<li><a href="<?php echo $home; ?>/search/?pref=26">京都</a></li>
<li><a href="<?php echo $home; ?>/search/?pref=27">大阪</a></li>
<li><a href="<?php echo $home; ?>/search/?pref=13">東京</a></li>
</ul>
</div>
</div>
<div class="search__genre bg-white">
<h3><div class="container">ジャンルから探す</div></h3>
<div class="search__genre-list">
<ul>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=1">
<img src="<?php echo $wp_url; ?>/dist/images/genre_sushi.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_sushi.png 1x, <?php echo $wp_url; ?>/dist/images/genre_sushi@2x.png 2x">
<span>寿司</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=2">
<img src="<?php echo $wp_url; ?>/dist/images/genre_sakana.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_sakana.png 1x, <?php echo $wp_url; ?>/dist/images/genre_sakana@2x.png 2x">
<span>魚料理</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=3">
<img src="<?php echo $wp_url; ?>/dist/images/genre_washoku.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_washoku.png 1x, <?php echo $wp_url; ?>/dist/images/genre_washoku@2x.png 2x">
<span>和食</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=5">
<img src="<?php echo $wp_url; ?>/dist/images/genre_okonomi.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_okonomi.png 1x, <?php echo $wp_url; ?>/dist/images/genre_okonomi@2x.png 2x">
<span>お好み焼き</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=8">
<img src="<?php echo $wp_url; ?>/dist/images/genre_chuka.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_chuka.png 1x, <?php echo $wp_url; ?>/dist/images/genre_chuka@2x.png 2x">
<span>中華</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=9">
<img src="<?php echo $wp_url; ?>/dist/images/genre_italy.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_italy.png 1x, <?php echo $wp_url; ?>/dist/images/genre_italy@2x.png 2x">
<span>イタリアン</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=14">
<img src="<?php echo $wp_url; ?>/dist/images/genre_niku.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_niku.png 1x, <?php echo $wp_url; ?>/dist/images/genre_niku@2x.png 2x">
<span>焼肉</span>
</a>
</li>
<li>
<a class="text-body" href="<?php echo $home; ?>/search/?genre=21">
<img src="<?php echo $wp_url; ?>/dist/images/genre_hum.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_hum.png 1x, <?php echo $wp_url; ?>/dist/images/genre_hum@2x.png 2x">
<span>ファストフード</span>
</a>
</li>
</ul>
</div>
</div>
</section>
<!-- search -->

<div class="py-md-5 bg-light">
<div class="container">
<div class="row">
<div class="col-md-8">

<?php get_template_part('template-part/parts/reco-restaurants') ?>
<!-- buzz -->

<section class="sec bg-white rounded-lg">
<div class="container">
<h2 class="ttl-h2">おすすめ特集</h2>

<div class="swiper-container">
<div class="swiper-wrapper featured">
<?php
$no = 1;
$args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
];
$posts = get_posts($args);
foreach ($posts as $key => $post): setup_postdata($post);
$t = get_the_title();
$p = get_the_permalink();
if (has_post_thumbnail()) {
    $i = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
?>
<div class="swiper-slide">
<a class="featured-article" href="<?php echo $p; ?>">
<img src="<?php echo $i; ?>" alt="<?php echo $t; ?>">
<h3><?php echo $t; ?></h3>
</a>
</div>
<?php endforeach; wp_reset_postdata(); ?>
</div>
<!-- Add Pagination -->
<div class="swiper-pagination"></div>
<!-- Add Arrows -->
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>

<a class="d-block text-center pt-3 mt-3 border-top text-body" href="<?php echo $home; ?>/special/">特集記事一覧へ<i class="fas fa-angle-right ml-3"></i></a>
</div>
</section>
</div>

<div class="col-md-4 d-md-block d-none">
<?php get_template_part('template-part/parts/search-restaurants') ?>
</div>
<!-- sidebar -->
</div>
</div>
</div>

<?php get_footer();
