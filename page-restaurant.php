<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();

if ($_GET['recommend'] == '1') {
    $recommend = true;
} else {
    $recommend = false;
}

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
$keys = parse_url($gmap_url);
$gmap_emmbed = end(explode("/", $keys['path']));
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

get_header(); ?>
<?php if ($recommend): ?>
<section class="pb-4 restaurant">
<?php else: ?>
<section class="py-4 restaurant">
<?php endif; ?>
<div class="sp-mode">
<?php if ($recommend): ?>
<figure class="restaurant-thumbnail">
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="">
</figure>
<!-- restaurant-thumbnail -->
<?php endif; ?>

<?php if ($recommend): ?>
<div class="search__result__inner__wrap shadow-sm">
<?php else: ?>
<div class="search__result__inner__wrap shadow-sm my-0">
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
<h2 class="restaurant-ttl">人気テイクアウトメニュー</h2>
<div class="container">
<div class="menu__ranking">
<?php for ($i=1; $i <= 5; $i++): ?>
<a class="menu__ranking__inner" href="" target="_blank">
<div class="menu__ranking__inner__thumbnail">
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="" srcset="<?php echo $wp_url; ?>/dist/images/topic_sample.png 1x, <?php echo $wp_url; ?>/dist/images/topic_sample@2x.png 2x">
</div>
<p class="menu__ranking__inner-name">バジルソースのパスタ</p>
<p class="menu__ranking__inner-price">¥<span>980</span>[税抜]</p>
</a>
<?php endfor; ?>
</div>
</div>
</div>
<!-- restaurant__menu -->
<?php endif; ?>
<div class="restaurant__access restaurant-block">
<h2 class="restaurant-ttl">アクセス</h2>
<div class="container">
<p>〒<?php echo $shop_zipcode; ?> <?php echo $shop_address1; ?> <?php echo $shop_address2; ?></p>
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://maps.google.co.jp/maps?output=embed&q=<?php echo $shop_name; ?>"></iframe>
</div>
<div class="text-center mt-3">
<a class="btn btn-primary font-weight-bold rounded-pill" href="<?php echo $gmap_url; ?>" target="_blank">GoogleMapで見る</a>
</div>
</div>
</div>
<!-- restaurant__access -->
<div class="restaurant__overview restaurant-block">
<h2 class="restaurant-ttl">店舗情報</h2>
<div class="container">
<!-- <p>保存料なしの無添加なカレーと栄養たっぷりの野菜ジュースを。定番バターチキンカレー、激辛ビーフカレーからコンビネーションカレーまで。</p> -->
<table>
<tbody>
<tr>
<th>電話番号</th>
<td><a class="text-body" href="tel:<?php echo $shop_tel; ?>"><i class="fas fa-phone mr-1 text-info"></i><?php echo $shop_tel; ?></a></td>
</tr>
<tr>
<th>駐車場</th>
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
<th>クレジットカード</th>
<td><?php
if ($credit_card != null) {
    echo $credit_card;
} else {
    echo "使用不可";
}
?></td>
</tr>
<tr>
<th>電子決済</th>
<td><?php
if ($electronic_money != null) {
    echo $electronic_money;
} else {
    echo "使用不可";
}
?></td>
</tr>
<tr>
<th>公式HP</th>
<td>
<?php if ($hp_url != null): ?>
<a class="text-body" href="<?php echo $hp_url; ?>" target="_blank"><?php echo $hp_url; ?></a>
<?php else: ?>
なし
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
if ($gnavi_url != null) {
    echo '<i class="far fa-circle text-primary"></i>';
}
?></td>
<td><?php
if ($tabelog_url != null) {
    echo '<i class="far fa-circle text-primary"></i>';
}
?></td>
<td><?php
if ($demaecan_url != null) {
    echo '<i class="far fa-circle text-primary"></i>';
}
?></td>
<td><?php
if ($ubereats_url != null) {
    echo '<i class="far fa-circle text-primary"></i>';
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
<a id="restaurant-btn" href="" target="_blank">テイクアウト予約する</a>
<?php endif; ?>

<?php get_footer();