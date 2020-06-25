<?php
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
            $param .= "?".$key."=".$val;
            if ($key === 'pages') {
                $param .= "?page=".$val;
            }
        } else {
            $param .= "&".$key."=".$val;
            if ($key === 'pages') {
                $param .= "&page=".$val;
            }
        }
    }
    ++$temp;
}

$data = get_restaurant($param);
$total = $data['total'];
$current_page = $data['current_page'];

$pref = get_pref();
$genres = get_genres();

get_header(); ?>

<?php get_template_part('template-part/modal/search-form'); ?>

<section class="py-4 search">
<div class="container">
<div class="search__filter">
<!-- <div class="dropdown d-inline-block">
<button type="button" class="btn btn-secondary font-weight-bold dropdown-toggle" id="sort-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sort-amount-down mr-2"></i>並び替え</button>
<div class="dropdown-menu" aria-labelledby="sort-menu">
<a class="dropdown-item" href="#">おすすめ</a>
<a class="dropdown-item" href="#">最新</a>
</div>
</div> -->
<button type="button" class="btn btn-secondary font-weight-bold" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-filter mr-2"></i>絞り込み</button>
</div>
<!-- search__filter -->
<div class="search__current my-3">
<?php
if ($_GET['pref'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">'.$pref[((int)$_GET['pref']-1)]['name'].'</span>';
}
if ($_GET['genre'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">'.$genres[((int)$_GET['genre']-1)]['name'].'</span>';
}
if ($_GET['credit_card'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">クレカ</span>';
}
if ($_GET['electronic_money'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">電子マネー</span>';
}
if ($_GET['parking_flag'] != '') {
    echo '<span class="badge badge-light p-2 mr-2">駐車場あり</span>';
}
?>
</div>
<!-- search__current -->
<div class="search__result-txt my-3 small">検索結果：<span><?php echo $data['total']; ?></span>件</div>
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
$business_hours = $val['business_hours'];
$regular_holiday = $val['regular_holiday'];
?>
<a class="shop-buzz__list-inner shadow-sm text-body" href="<?php $home; ?>/restaurant?id=<?php echo $shop_id; ?>">
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

<!-- <div class="shop-buzz__list-inner-label">
<span>送料無料</span>
<span>宅配可</span>
</div> -->

<div class="shop-buzz__list-inner-time text-muted"><?php echo $shop_address1.' '.$shop_address2; ?></div>

</div>
</div>
</a>
<?php endforeach; ?>
</div>
<!-- search__result -->

<?php search_page_navi($total, $current_page); ?>
</div>
</section>
<?php get_footer();
