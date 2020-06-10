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
<?php endif; ?>
</head>
<body>
<header>
<nav class="navbar navbar-expand-md justify-content-start align-items-baseline">
<a class="navbar-brand p-0" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/dist/images/logo.png" alt="<?php bloginfo('name'); ?>" srcset="<?php echo $wp_url; ?>/dist/images/logo.png 1x, <?php echo $wp_url; ?>/dist/images/logo@2x.png 2x">
</a>
<h1 class="navbar-brand m-0 p-0">近くのテイクアウトの<br>名店を探す</h1>
</nav>
</header>
<main>