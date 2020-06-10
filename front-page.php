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
      <button class="btn btn-primary text-white"><i class="fas fa-search mr-2"></i>近くのテイクアウト対応店を探す</button>
    </div>
  </div>
</section>

<section class="search">
  <div class="container">
    <div class="search__area">
      <h3>よく見られているエリア</h3>
      <ul>
        <li><a href="">東京</a></li>
        <li><a href="">東京</a></li>
        <li><a href="">東京</a></li>
        <li><a href="">東京</a></li>
      </ul>
    </div>
  </div>
  <div class="search__genre bg-light">
    <h3><div class="container">ジャンルから探す</div></h3>
    <div class="search__genre-list">
      <ul>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_sushi.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_sushi.png 1x, <?php echo $wp_url; ?>/dist/images/genre_sushi@2x.png 2x">
          <span>寿司</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_sakana.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_sakana.png 1x, <?php echo $wp_url; ?>/dist/images/genre_sakana@2x.png 2x">
          <span>魚料理</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_washoku.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_washoku.png 1x, <?php echo $wp_url; ?>/dist/images/genre_washoku@2x.png 2x">
          <span>和食</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_okonomi.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_okonomi.png 1x, <?php echo $wp_url; ?>/dist/images/genre_okonomi@2x.png 2x">
          <span>お好み焼き</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_chuka.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_chuka.png 1x, <?php echo $wp_url; ?>/dist/images/genre_chuka@2x.png 2x">
          <span>中華</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_italy.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_italy.png 1x, <?php echo $wp_url; ?>/dist/images/genre_italy@2x.png 2x">
          <span>イタリアン</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_niku.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_niku.png 1x, <?php echo $wp_url; ?>/dist/images/genre_niku@2x.png 2x">
          <span>焼肉</span>
        </li>
        <li>
          <img src="<?php echo $wp_url; ?>/dist/images/genre_hum.png" alt="料理のジャンル" srcset="<?php echo $wp_url; ?>/dist/images/genre_hum.png 1x, <?php echo $wp_url; ?>/dist/images/genre_hum@2x.png 2x">
          <span>ファストフード</span>
        </li>
      </ul>
    </div>
  </div>
</section>
<?php get_footer();