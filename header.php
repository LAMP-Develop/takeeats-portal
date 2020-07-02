<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?php wp_head(); ?>
<?php if (!is_user_logged_in()): ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167493209-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-167493209-2');
</script>
<?php endif; ?>
</head>
<body>
<header class="header shadow-sm">
<nav class="navbar navbar-expand-xlg justify-content-start align-items-center">
<a class="navbar-brand p-0 mb-1" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/dist/images/logo.png" alt="<?php bloginfo('name'); ?>" srcset="<?php echo $wp_url; ?>/dist/images/logo.png 1x, <?php echo $wp_url; ?>/dist/images/logo@2x.png 2x">
</a>
<h1 class="navbar-brand m-0 text-white bg-primary py-1 px-3">お店検索</h1>

<button class="navbar-toggler ml-auto px-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="fas fa-bars"></i>
</button>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto mt-3">
<li class="nav-item border-top">
<a class="nav-link text-body font-weight-bold d-block py-3" href="<?php echo $home; ?>">トップページ</a>
</li>
<li class="nav-item border-top">
<a class="nav-link text-body font-weight-bold d-block py-3" href="https://system.take-eats.jp" target="_blank">当サイトへの掲載について</a>
</li>
<li class="nav-item border-top">
<a class="nav-link text-body font-weight-bold d-block py-3" href="<?php echo $home; ?>/special/">特集</a>
</li>
</ul>
</div>

</nav>
</header>
<main>