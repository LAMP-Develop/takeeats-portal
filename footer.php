<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<div class="py-md-5 py-3 cta">
<div class="container">

<div class="footer-bnr">
<a class="mb-md-0 mb-3" href="<?php echo $home; ?>/request/">
<img class="w-100 d-md-none" src="<?php echo $wp_url; ?>/dist/images/banner_portal.png" alt="TakeEats" srcset="<?php echo $wp_url; ?>/dist/images/banner_portal.png 1x, <?php echo $wp_url; ?>/dist/images/banner_portal@2x.png 2x">
<img class="w-100 d-md-block d-none" src="<?php echo $wp_url; ?>/dist/images/banner_portal_pc.png" alt="TakeEats" srcset="<?php echo $wp_url; ?>/dist/images/banner_portal_pc.png 1x, <?php echo $wp_url; ?>/dist/images/banner_portal_pc@2x.png 2x">
</a>
<a href="https://system.take-eats.jp" target="_blank" onclick="gtag('event','click',{'event_category':'bnr','event_label':'サービスサイト'});">
<img class="w-100 d-md-none" src="<?php echo $wp_url; ?>/dist/images/banner_service.png" alt="TakeEats" srcset="<?php echo $wp_url; ?>/dist/images/banner_service.png 1x, <?php echo $wp_url; ?>/dist/images/banner_service@2x.png 2x">
<img class="w-100 d-md-block d-none" src="<?php echo $wp_url; ?>/dist/images/banner_service_pc.png" alt="TakeEats" srcset="<?php echo $wp_url; ?>/dist/images/banner_service_pc.png 1x, <?php echo $wp_url; ?>/dist/images/banner_service_pc@2x.png 2x">
</a>
</div>

</div>
</div>
</main>

<footer class="footer py-5">
<div class="container">
<ul class="footer-links">
<li><a href="<?php echo $home; ?>/request/">掲載のお申し込み</a></li>
<li><a href="<?php echo $home; ?>/company/">企業情報</a></li>
<li><a href="<?php echo $home; ?>/term/">利用規約</a></li>
<li><a href="<?php echo $home; ?>/privacy-policy/">プライバシーポリシー</a></li>
<!-- <li><a href="<?php echo $home; ?>/contact/">お問い合わせ</a></li> -->
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
<?php endif;?>

</body>
</html>