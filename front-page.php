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
<button class="btn btn-primary text-white py-2 px-3" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-search mr-2"></i>近くのテイクアウト対応店を探す</button>
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
<section class="sec bg-light buzz">
<div class="container">
<h2 class="ttl-h2">いま話題のお店</h2>
<div class="shop-buzz">
<div class="shop-buzz__list">
<?php
$data = get_restaurant('?fixed=1')['data'];
$pref = get_pref();
$genres = get_genres();
foreach ($data as $key => $val):
    $shop_id = $val['id'];
    $shop_name = $val['name'];
    $shop_address1 = $val['address1'];
    $shop_address2 = $val['address2'];
    $shop_genre = $genres[((int)$val['cuisine_genre_id']-1)]['name'];
    $shop_pref = $pref[((int)$val['pref_id']-1)]['name'];
    $business_hours = $val['business_hours'];
    $regular_holiday = $val['regular_holiday'];
    $tags = explode(',',$val['tags']);
?>
<a class="shop-buzz__list-inner shadow-sm text-body" href="<?php echo $home; ?>/restaurant?id=<?php echo $shop_id; ?>&recommend=1">
<h3><?php echo $shop_name; ?></h3>
<div class="shop-buzz__list-inner-wrap">
<!-- <div class="shop-buzz__list-inner-imgs">
<div><img src="<?php echo $wp_url; ?>/dist/images/banner_yell.png" alt="エール飯"></div>
<div><img src="<?php echo $wp_url; ?>/dist/images/banner_yell.png" alt="エール飯"></div>
<div><img src="<?php echo $wp_url; ?>/dist/images/banner_yell.png" alt="エール飯"></div>
</div> -->
<div class="shop-buzz__list-inner-tag">
<span class="shop-buzz__list-inner-tag-map"><?php echo $shop_pref; ?></span>
<span class="shop-buzz__list-inner-tag-genre"><?php echo $shop_genre; ?></span>
<?php if ($tags[0] != '' && $tags[0] != null): ?>
<div class="shop-buzz__list-inner-label">
<?php foreach ($tags as $key => $tag): ?>
<span><?php echo $tag; ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="shop-buzz__list-inner-time text-muted"><?php echo $shop_address1.' '.$shop_address2; ?></div>
</div>
</div>
</a>
<?php
if ($key === 4) {
    break;
}
endforeach; ?>
</div>
</div>
</div>
</section>
<!-- buzz -->
<section class="sec sec-border">
<div class="container">
<h2 class="ttl-h2">おすすめ特集</h2>

<a class="yell-bnr d-block text-center mb-md-5 mb-3" href="<?php echo $home; ?>/special/yell-meshi/">
<img src="<?php echo $wp_url; ?>/dist/images/banner_yell.png" alt="エール飯" srcset=" <?php echo $wp_url; ?>/dist/images/banner_yell.png 1x, <?php echo $wp_url; ?>/dist/images/banner_yell@2x.png 2x">
</a>

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
    $i = get_the_post_thumbnail_url(get_the_ID(), 'large');
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

<a class="d-block text-center pt-3 mt-3 border-top text-body" href="<?php echo $home; ?>/special/">特集記事一覧へ<i class="fas fa-angle-right ml-3"></i></a>

</div>
</section>
<!-- featured -->
<!-- <section class="sec sec-border">
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
</section> -->
<!-- ranking -->
<section class="sec sec-border">
<div class="container">
<h2 class="ttl-h2 mb-3">#TakeEats</h2>
<p class="text-center font-weight-bold mb-4 small">「#TakeEats」で気になるお店を探そう！</p>
</div>
<?php echo do_shortcode('[instagram-feed]'); ?>
</div>
</section>
<!-- insta -->

<?php get_footer();