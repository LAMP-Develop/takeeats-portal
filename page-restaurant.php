<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();

if ($_GET['recommend'] == '1') {
    $recommend = true;
} else {
    $recommend = false;
}

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
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
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
<p>〒604-8131 京都府京都市中京区菱屋町３２−１ 三条東洞院東入ル</p>
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104573.29726034151!2d135.70535535002745!3d35.00881933433474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001089300bcb213%3A0xb7a56d575ebdf516!2z5a-_44GX44Gu44KA44GV44GXIOS4ieadoeacrOW6lw!5e0!3m2!1sja!2sjp!4v1592533194800!5m2!1sja!2sjp"></iframe>
</div>
<div class="text-center mt-3">
<a class="btn btn-primary font-weight-bold rounded-pill" href="" target="_blank">GoogleMapで見る</a>
</div>
</div>
</div>
<!-- restaurant__access -->
<div class="restaurant__overview restaurant-block">
<h2 class="restaurant-ttl">店舗情報</h2>
<div class="container">
<p>保存料なしの無添加なカレーと栄養たっぷりの野菜ジュースを。定番バターチキンカレー、激辛ビーフカレーからコンビネーションカレーまで。</p>
<table>
<tbody>
<tr>
<th>電話番号</th>
<td><a class="text-body" href="tel:"><i class="fas fa-phone mr-1 text-info"></i>000-000-0000</a></td>
</tr>
<tr>
<th>駐車場</th>
<td>なし</td>
</tr>
<tr>
<th>クレジットカード</th>
<td>VISA、MasterCard</td>
</tr>
<tr>
<th>電子決済</th>
<td>PayPay、LINEPay、auPay</td>
</tr>
<tr>
<th>公式HP</th>
<td><a class="text-body" href="https://google.com" target="_blank">https://google.com</a></td>
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
<td><i class="far fa-circle text-primary"></i></td>
<td></td>
<td><i class="far fa-circle text-primary"></i></td>
<td></td>
</tr>
</tbody>
</table>
<div class="mt-2">
<a class="btn btn-secondary btn-block text-left" href="">食べログ</a>
<a class="btn btn-secondary btn-block text-left" href="">出前館</a>
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
