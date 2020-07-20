<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php if (is_home() || is_front_page()): ?>
<link rel="stylesheet" href="//unpkg.com/swiper/swiper-bundle.min.css">
<?php endif;?>
<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167493209-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-167493209-2');
</script>
</head>
<?php if (!is_page(['search', 'geo'])): ?>
<body class="bg-light">
<?php else: ?>
<body>
<?php endif; ?>
<header class="header shadow-sm sticky-top bg-white">
<nav class="navbar navbar-expand-xlg justify-content-start align-items-center">
<h1 class="navbar-brand p-0 m-0">
<a class="d-inline-block align-middle" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/dist/images/logo.png" alt="<?php bloginfo('name'); ?>" srcset="<?php echo $wp_url; ?>/dist/images/logo.png 1x, <?php echo $wp_url; ?>/dist/images/logo@2x.png 2x">
</a>
<!-- <span class="d-inline-block align-middle">お店検索</span> -->
</h1>
<div class="navbar-search-icon" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-search"></i><span>検索</span></div>
</nav>
</header>
<?php get_template_part('template-part/modal/search-form'); ?>
<main>
