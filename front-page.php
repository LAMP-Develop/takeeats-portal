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
      <a class="btn btn-primary text-white" href=""><i class="fas fa-search mr-2"></i>近くのテイクアウト対応店を探す</a>
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
</section>
<?php get_footer();