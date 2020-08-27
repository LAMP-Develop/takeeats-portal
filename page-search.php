<?php
global $pref_name,$genre_name,$pref_id,$genre_id;
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
$request = $_GET;
$param = '';
$temp = 0;
foreach ($request as $key => $val) {
    if ($val == '' && $val == null) {
        unset($request[$key]);
    } else {
        if ($param === '') {
            if ($key === 'keyword') {
                $val = urlencode($val);
            }
            if ($key === 'pages') {
                $param .= "?page=".$val;
            } else {
                $param .= "?".$key."=".$val;
            }
        } else {
            if ($key === 'keyword') {
                $val = urlencode($val);
            }
            if ($key === 'pages') {
                $param .= "&page=".$val;
            } else {
                $param .= "&".$key."=".$val;
            }
        }
    }
    ++$temp;
}
// var_dump($param);
$data = get_restaurant($param);
$total = $data['total'];
$current_page = $data['current_page'];
$pref = get_pref();
$genres = get_genres();
if ($_GET['pref'] != '') {
    $pref_name = $pref[((int)$_GET['pref']-1)]['name'];
    $pref_id = (int)$_GET['pref'];
}
if ($_GET['genre'] != '') {
    $genre_name = $genres[((int)$_GET['genre']-1)]['name'];
    $genre_id = (int)$_GET['genre'];
}
get_header(); ?>
<?php get_template_part('template-part/modal/search-form'); ?>
<section class="py-4 search">
<div class="container">
<div class="search__filter">
<button type="button" class="btn btn-secondary font-weight-bold" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-filter mr-2"></i>絞り込み</button>
</div>
<!-- search__filter -->
<div class="search__current my-3">
<?php
if ($_GET['keyword'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">'.$_GET['keyword'].'</span>';
}
if ($_GET['pref'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">'.$pref[((int)$_GET['pref']-1)]['name'].'</span>';
}
if ($_GET['genre'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">'.$genres[((int)$_GET['genre']-1)]['name'].'</span>';
}
if ($_GET['credit_card'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">クレカ可</span>';
}
if ($_GET['electronic_money'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">電子マネー可</span>';
}
if ($_GET['parking_flag'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">駐車場あり</span>';
}
?>
</div>
<!-- search__current -->
<div class="search__result-txt my-3 small">検索結果：<span><?php echo number_format($data['total']); ?></span>件</div>
<!-- search__result-txt -->
<div class="search__result">
<?php
foreach ($data['data'] as $key => $val):
$shop_id = $val['id'];
$shop_name = $val['name'];
$shop_address1 = $val['address1'];
$shop_address2 = $val['address2'];
$shop_genre = $genres[((int)$val['cuisine_genre_id']-1)]['name'];
$shop_pref = $pref[((int)$val['pref_id']-1)]['name'];
$shop_access = mb_strimwidth($val['access'], 0, 90, "…");
$business_hours = mb_strimwidth($val['business_hours'], 0, 90, "…");
$regular_holiday = mb_strimwidth($val['regular_holiday'], 0, 85, "…");
$tags = explode(',', $val['tags']);
$takeeats_url = $val['takeeats_url'];
$credit_card = $val['credit_card'];
if ($takeeats_url != '' && $takeeats_url != null) {
    $recommend_flag = true;
    $recommend = '&recommend=1';
    $menus = get_menu($shop_id)['data'];
} else {
    $recommend_flag = false;
    $recommend = '';
    $menus = [];
}
?>
<a class="shop-buzz__list-inner shadow-sm text-body" href="<?php echo $home; ?>/restaurant?id=<?php echo $shop_id.$recommend; ?>">
<?php if ($recommend_flag): ?>
<span class="shop-buzz__list-inner-ribbon"><img src="<?php echo $wp_url; ?>/dist/images/icon_check.png" srcset="<?php echo $wp_url; ?>/dist/images/icon_check.png 1x, <?php echo $wp_url; ?>/dist/images/icon_check@2x.png 2x" alt="アイコン">ネット注文可</span>
<?php endif; ?>
<h3><?php echo $shop_name; ?></h3>
<div class="shop-buzz__list-inner-wrap">
<?php if ($recommend_flag && count($menus) != 0): ?>
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
<span class="shop-buzz__list-inner-tag-genre"><?php echo $shop_genre; ?></span>
<span class="shop-buzz__list-inner-tag-map"><?php echo $shop_access; ?></span>
<div class="shop-buzz__list-inner-label">
<?php
if ($tags[0] != '' && $tags[0] != null):
foreach ($tags as $key => $tag): ?>
<span><?php echo $tag; ?></span>
<?php endforeach; endif; ?>
<?php if ($credit_card != null): ?>
<span>クレカ可</span>
<?php endif; ?>
</div>
<div class="shop-buzz__list-inner-time text-muted">
<span class="d-block"><?php echo $business_hours; ?></span>
<span class="d-block mt-1">定休日：<?php echo $regular_holiday; ?></span>
</div>
</div>
<div class="shop-buzz__list-inner-link">お店の詳細を見る<i class="fas fa-chevron-right ml-2"></i></div>
</div>
</a>
<?php endforeach; ?>
</div>
<!-- search__result -->
<?php search_page_navi($total, $current_page); ?>
</div>
</section>
<?php get_footer();
