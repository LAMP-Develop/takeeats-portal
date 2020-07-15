<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section id="mv" class="mv">
<div class="container">
<h2 class="mb-0">
<span>
<img src="<?php echo $wp_url; ?>/dist/images/mv_icon_01.png" alt="アイコン" srcset="<?php echo $wp_url; ?>/dist/images/mv_icon_01.png 1x, <?php echo $wp_url; ?>/dist/images/mv_icon_01@2x.png 2x">
おうちグルメを楽しもう
<img src="<?php echo $wp_url; ?>/dist/images/mv_icon_02.png" alt="アイコン" srcset="<?php echo $wp_url; ?>/dist/images/mv_icon_02.png 1x, <?php echo $wp_url; ?>/dist/images/mv_icon_02@2x.png 2x">
</span>
</h2>
</div>
</section>
<!-- mv -->

<div class="mv__search shadow-sm">
<a class="mv__search-geo" href="<?php echo $home; ?>/search?geo=true"><i class="fas fa-map-marker-alt mr-2 text-info"></i>現在地から探す</a>
<form class="mv__search__form" action="<?php echo $home; ?>/search/" method="get">
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text"><i class="fas fa-pen"></i></div>
</div>
<input type="text" class="form-control" name="keyword" value="" placeholder="お店の名前、市区町村、駅名">
</div>
<div class="mt-3 mv__search__form-btn">
<button class="btn btn-block btn-primary text-nowrap" type="submit"><i class="fas fa-search mr-2"></i>検索する</button>
</div>
</form>
</div>

<section class="search">
<div class="container">
</div>
<div class="search__genre bg-white">
<h3><span class="container d-block mx-auto">人気のジャンル</span></h3>
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
<?php get_template_part('template-part/parts/reco-restaurants'); ?>
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
<div class="swiper-pagination"></div>
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
