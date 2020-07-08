<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
?>

<section class="sec buzz">
<h2 class="ttl-h2">いま話題のお店</h2>
<div class="shop-buzz">
<div class="shop-buzz__list">
<?php
$data = get_restaurant('?fixed=1')['data'];
$pref = get_pref();
$genres = get_genres();
foreach ($data as $keys => $val):
    $shop_id = $val['id'];
    $shop_name = $val['name'];
    $shop_address1 = $val['address1'];
    $shop_address2 = $val['address2'];
    $shop_genre = $genres[((int)$val['cuisine_genre_id']-1)]['name'];
    $shop_pref = $pref[((int)$val['pref_id']-1)]['name'];
    $business_hours = $val['business_hours'];
    $regular_holiday = $val['regular_holiday'];
    $tags = explode(',', $val['tags']);
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
if ($keys === 3) {
    break;
}
endforeach; ?>
</div>
</div>
</section>