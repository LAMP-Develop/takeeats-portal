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

<div class="py-5 bg-light">
<div class="container">
<div class="row">
<div class="col-md-8">

<section class="sec buzz">
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
    $menus = get_menu($shop_id)['data'];
?>
<a class="shop-buzz__list-inner shadow-sm text-body" href="<?php echo $home; ?>/restaurant?id=<?php echo $shop_id; ?>&recommend=1">
<h3><?php echo $shop_name; ?></h3>
<div class="shop-buzz__list-inner-wrap">
<?php if (count($menus) != 0): ?>
<div class="shop-buzz__list-inner-imgs">
<?php foreach ($menus as $key => $menu): ?>
<div><img src="//ssl.omomuki.me/storage/<?php echo $menu['thumbnail']; ?>" alt="<?php echo $menu['name']; ?>"></div>
<?php
if ($key === 2) {
    break;
}
endforeach; ?>
</div>
<?php endif; ?>
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

<section class="sec bg-white rounded-lg">
<div class="container">
<h2 class="ttl-h2">おすすめ特集</h2>
<div class="featured">
<a class="yell-bnr featured-article" href="<?php echo $home; ?>/special/yell-meshi/">
<img src="<?php echo $wp_url; ?>/dist/images/banner_yell.png" alt="エール飯" srcset=" <?php echo $wp_url; ?>/dist/images/banner_yell.png 1x, <?php echo $wp_url; ?>/dist/images/banner_yell@2x.png 2x">
</a>
<?php
$no = 1;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 2,
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
<a class="featured-article gird-temp-<?php echo ($key+1); ?>" href="<?php echo $p; ?>">
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

</div>

<div class="col-md-4">
<div class="modal d-block position-static">
<form action="<?php echo $home; ?>/search/" method="GET">
<div class="modal-header">
</div>
<div class="modal-body">
<div class="search-form">
<h3 class="modal-body-title">場所指定</h3>
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link active" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="false">エリア一覧</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link" id="zipcode-tab" data-toggle="tab" href="#zipcode" role="tab" aria-controls="zipcode" aria-selected="false">郵便番号</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="area" role="tabpanel" aria-labelledby="area-tab">
<select name="pref" id="pref-select" class="form-control border-0">
<option value="">---</option>

<option value="13" <?php
if ($_GET['pref'] != '' && "13" == $_GET['pref']) {
    echo "selected";
} ?>>東京都</option>
<option value="26" <?php
if ($_GET['pref'] != '' && "26" == $_GET['pref']) {
    echo "selected";
} ?>>京都府</option>
<option value="27" <?php
if ($_GET['pref'] != '' && "27" == $_GET['pref']) {
    echo "selected";
} ?>>大阪府</option>

</select>
</div>

<div class="tab-pane fade" id="zipcode" role="tabpanel" aria-labelledby="zipcode-tab">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text border-0" id="zipicon">〒</span>
</div>
<input type="text" class="form-control border-0" name="zipcode" placeholder="000-0000" aria-describedby="zipicon">
</div>
</div>

</div>
</div>

<div class="search-form mt-4">
<h3 class="modal-body-title">ジャンル指定</h3>
<div class="bg-light p-3">
<select name="genre" id="genre-select" class="form-control border-0">
<option value="">---</option>
<?php
$genres = get_genres();
foreach ($genres as $key => $val): ?>
<option value="<?php echo $val['id']; ?>" <?php
if ($_GET['genre'] != '' && $val['id'] == $_GET['genre']) {
    echo "selected";
} ?>><?php echo $val['name']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="search-form mt-4">
<h3 class="modal-body-title">こだわり条件</h3>
<div class="bg-light p-3">
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="credit" name="credit_card" value="1" <?php if ($_GET['credit_card'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="credit">クレジットカード可</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="electronic" name="electronic_money" value="1" <?php if ($_GET['electronic_money'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="electronic">電子マネー可</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="parking" name="parking_flag" value="1" <?php if ($_GET['parking_flag'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="parking">駐車場あり</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="gnavi" name="gnavi_url" value="1" <?php if ($_GET['gnavi_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="gnavi">ぐるなび掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="tabelog" name="tabelog_url" value="1" <?php if ($_GET['tabelog_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="tabelog">食べログ掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="demaecan" name="demaecan_url" value="1" <?php if ($_GET['demaecan_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="demaecan">出前館掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="ubereats" name="ubereats_url" value="1" <?php if ($_GET['ubereats_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="ubereats">Uber Eats掲載</label>
</div>
</div>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-block btn-primary"><i class="fas fa-search mr-2"></i>検索する</button>
</div>
</form>
</div>
</div>
<!-- sidebar -->
</div>
</div>
</div>

<?php get_footer();