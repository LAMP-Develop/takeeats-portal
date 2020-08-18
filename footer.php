<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>

<div class="cta">

<div class="cta-takeeats">
<div class="cta-takeeats-wrap">
<div class="cta-takeeats__txt">
<p class="cta-takeeats__txt-ttl">あなたのお店でも<span><i>無料</i>でテイクアウト</span><span>はじめませんか？</span></p>
<div class="cta-takeeats-btn d-md-block d-none">
<a class="btn btn-primary rounded-pill px-5" href="https://system.take-eats.jp" target="_blank"><span class="d-block small font-weight-bold">＼最短1営業日／</span>無料でお店に導入！</a>
</div>
</div>
<div class="cta-takeeats__img">
<img src="<?php echo $wp_url; ?>/dist/images/cta_pict.png" alt="あなたのお店でも無料でテイクアウトはじめませんか？" srcset="<?php echo $wp_url; ?>/dist/images/cta_pict.png 1x, <?php echo $wp_url; ?>/dist/images/cta_pict@2x.png 2x">
</div>

<img class="cta-takeeats-wrap-bg" src="<?php echo $wp_url; ?>/dist/images/cta_wave.png" alt="装飾" srcset="<?php echo $wp_url; ?>/dist/images/cta_wave.png 1x, <?php echo $wp_url; ?>/dist/images/cta_wave@2x.png 2x">

</div>

<div class="cta-takeeats-btn d-md-none">
<a class="btn btn-primary rounded-pill" href="https://system.take-eats.jp" target="_blank"><span class="d-block small font-weight-bold">＼最短1営業日／</span>無料でお店に導入！</a>
</div>

</div>

<!-- <div class="container">
<div class="footer-bnr">
<a class="mb-md-0 mb-3" href="<?php echo $home; ?>/request/">
<img class="w-100" src="<?php echo $wp_url; ?>/dist/images/banner_portal.png" alt="TakeEats" srcset="<?php echo $wp_url; ?>/dist/images/banner_portal.png 1x, <?php echo $wp_url; ?>/dist/images/banner_portal@2x.png 2x">
</a>
</div>
</div> -->
</div>

</main>

<footer class="footer py-5">
<div class="container">
<ul class="footer-links">
<li><a href="<?php echo $home; ?>/request/">掲載のお申し込み</a></li>
<li><a href="<?php echo $home; ?>/company/">企業情報</a></li>
<li><a href="<?php echo $home; ?>/term/">利用規約</a></li>
<li><a href="<?php echo $home; ?>/privacy-policy/">プライバシーポリシー</a></li>
</ul>
<p class="mb-0 text-center socket">©2020 <a class="text-white" href="<?php echo $home; ?>">TakeEats（テイクイーツ）</a></p>
</div>
</footer>
<?php wp_footer(); ?>
<?php if (is_home() || is_front_page()): ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
new Swiper(".swiper-container", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  breakpoints: {
    768: {
      slidesPerView: 2,
      slidesPerGroup: 2,
      spaceBetween: 10,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
</script>
<?php endif; ?>
</body>
</html>