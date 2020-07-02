<?php
global $shop_name,$shop_address1;

$home = esc_url(home_url());
$wp_url = get_template_directory_uri();

$pref = get_pref();
$genres = get_genres();

$data = get_restaurant_detail($_GET['id']);
$shop_id = $data['id'];
$shop_name = $data['name'];
$shop_zipcode = $data['zipcode'];
$shop_address1 = $data['address1'];
$shop_address2 = $data['address2'];
$shop_genre = $genres[((int)$data['cuisine_genre_id']-1)]['name'];
$business_hours = $data['business_hours'];
$regular_holiday = $data['regular_holiday'];
$gmap_url = $data['gmap_url'];
$shop_tel = $data['tel'];
$shop_access = $data['access'];
$parking_flag = $data['parking_flag'];
if ($parking_flag) {
    $parking_text = $data['parking_text'];
}
$credit_card = $data['credit_card'];
$electronic_money = $data['electronic_money'];
$hp_url = $data['hp_url'];
$gnavi_url = $data['gnavi_url'];
$tabelog_url = $data['tabelog_url'];
$demaecan_url = $data['demaecan_url'];
$ubereats_url = $data['ubereats_url'];
$takeeats_url = $data['takeeats_url'];

if ($takeeats_url != '' && $takeeats_url != null) {
    $recommend = true;
    $menus = get_menu($shop_id)['data'];
} else {
    $recommend = false;
}

get_header(); ?>

<section class="py-4 restaurant">
<div class="sp-mode">
<div class="search__result__inner__wrap shadow-sm my-0 position-relative">

<?php if ($gmap_url != null): ?>
<a class="restaurant-mapbtn" href="<?php echo $gmap_url; ?>"><i class="fas fa-map-marker-alt mr-1 text-info"></i>地図</a>
<?php endif; ?>
<p class="search__result__inner-name"><?php echo $shop_name; ?></p>
<p class="search__result__inner-info">
<span><?php echo $shop_genre; ?></span>
<span><?php echo $shop_address1; ?></span>
</p>
<p class="search__result__inner-time">営業時間 <?php echo $business_hours; ?> / 定休日：<?php echo $regular_holiday; ?></p>
</div>
<!-- search__result__inner__wrap -->
<?php if ($recommend): ?>
<div class="restaurant__menu restaurant-block">
<h2 class="restaurant-ttl d-flex justify-content-between align-items-center">
<span>人気テイクアウトメニュー</span>
<a class="btn btn-sm btn-primary rounded-pill px-3" href="<?php echo $takeeats_url; ?>" target="_blank">メニュー一覧<i class="fas fa-angle-right ml-1"></i></a>
</h2>
<div class="container">
<div class="menu__ranking">
<?php if (count($menus) != 0):
foreach ($menus as $key => $menu): ?>
<a class="menu__ranking__inner" href="<?php echo $takeeats_url; ?>" target="_blank">
<div class="menu__ranking__inner__thumbnail">
<img src="//ssl.omomuki.me/storage/<?php echo $menu['thumbnail']; ?>" alt="<?php echo $menu['name']; ?>">
</div>
<p class="menu__ranking__inner-name"><?php echo $menu['name']; ?></p>
<p class="menu__ranking__inner-price">¥<span><?php echo number_format((int)$menu['price']); ?></span>[税抜]</p>
</a>
<?php endforeach; endif; ?>
</div>
</div>
</div>
<!-- restaurant__menu -->
<?php endif; ?>
<div class="restaurant__access restaurant-block">
<h2 class="restaurant-ttl">アクセス</h2>
<div class="container">
<p>〒<?php echo $shop_zipcode; ?> <?php echo $shop_address1; ?> <?php echo $shop_address2; ?></p>
<?php if ($gmap_url): ?>
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://maps.google.co.jp/maps?output=embed&q=<?php echo $shop_name; ?>"></iframe>
</div>
<div class="text-center mt-3">
<a class="btn btn-primary font-weight-bold rounded-pill" href="<?php echo $gmap_url; ?>" target="_blank">GoogleMapで見る</a>
</div>
<?php endif; ?>
</div>
</div>
<!-- restaurant__access -->
<div class="restaurant__overview restaurant-block">
<h2 class="restaurant-ttl">店舗情報</h2>
<div class="container">
<table>
<tbody>
<tr>
<th class="text-nowrap">電話番号</th>
<td><a class="text-body" href="tel:<?php echo $shop_tel; ?>"><i class="fas fa-phone mr-1 text-info"></i><?php echo $shop_tel; ?></a></td>
</tr>
<tr>
<th class="">駐車場</th>
<td>
<?php
if ($parking_flag) {
    echo $parking_text;
} else {
    echo "なし";
}
?>
</td>
</tr>
<tr>
<th class="text-nowrap">クレジットカード</th>
<td><?php
if ($credit_card != null) {
    echo $credit_card;
} else {
    echo "使用不可";
}
?></td>
</tr>
<tr>
<th class="text-nowrap">電子決済</th>
<td><?php
if ($electronic_money != null) {
    echo $electronic_money;
} else {
    echo "使用不可";
}
?></td>
</tr>
<tr>
<th class="text-nowrap"><?php if ($recommend) {
    echo "予約サイト";
} else {
    echo "公式HP";
} ?></th>
<td>
<?php if ($takeeats_url != null): ?>
<a class="text-body" href="<?php echo $takeeats_url; ?>" target="_blank"><?php echo $takeeats_url; ?></a>
<?php else: ?>
<?php if ($hp_url != null): ?>
<a class="text-body" href="<?php echo $hp_url; ?>" target="_blank"><?php echo $hp_url; ?></a>
<?php else: ?>
なし
<?php endif; ?>
<?php endif; ?>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- restaurant__overview -->
<div class="restaurant__external restaurant-block">
<h2 class="restaurant-ttl">掲載グルメサイト</h2>
<div class="container">
<table>
<thead>
<tr>
<th>食べログ</th>
<th>ぐるなび</th>
<th>出前館</th>
<th>Uber Eats</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php
if ($tabelog_url != null) {
    echo '<a href="'.$tabelog_url.'" target="_blank"><i class="far fa-circle text-primary"></i></a>';
}
?></td>
<td><?php
if ($gnavi_url != null) {
    echo '<a href="'.$gnavi_url.'" target="_blank"><i class="far fa-circle text-primary"></i></a>';
}
?></td>
<td><?php
if ($demaecan_url != null) {
    echo '<a href="'.$demaecan_url.'" target="_blank"><i class="far fa-circle text-primary"></i></a>';
}
?></td>
<td><?php
if ($ubereats_url != null) {
    echo '<a href="'.$ubereats_url.'" target="_blank"><i class="far fa-circle text-primary"></i></a>';
}
?></td>
</tr>
</tbody>
</table>
<div class="mt-2">
<?php
if ($gnavi_url != null) {
    echo '<a class="btn btn-secondary btn-block text-left" href="'.$gnavi_url.'" target="_blank">ぐるなび</a>';
}
if ($tabelog_url != null) {
    echo '<a class="btn btn-secondary btn-block text-left" href="'.$tabelog_url.'" target="_blank">食べログ</a>';
}
if ($demaecan_url != null) {
    echo '<a class="btn btn-secondary btn-block text-left" href="'.$demaecan_url.'" target="_blank">出前館</a>';
}
if ($ubereats_url != null) {
    echo '<a class="btn btn-secondary btn-block text-left" href="'.$ubereats_url.'" target="_blank">Uber Eats</a>';
}
?>
</div>
</div>
</div>
<!-- restaurant__external -->
</div>
</section>
<?php if ($recommend): ?>
<a id="restaurant-btn" href="<?php echo $takeeats_url; ?>" target="_blank">テイクアウト予約する</a>
<?php endif; ?>

<?php get_footer();
