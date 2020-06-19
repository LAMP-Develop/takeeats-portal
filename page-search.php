<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>

<?php get_template_part('template-part/modal/search-form'); ?>

<section class="py-4 search">
<div class="container">
<div class="search__filter">
<div class="dropdown d-inline-block">
<button type="button" class="btn btn-secondary font-weight-bold dropdown-toggle" id="sort-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sort-amount-down mr-2"></i>並び替え</button>
<div class="dropdown-menu" aria-labelledby="sort-menu">
<a class="dropdown-item" href="#">おすすめ</a>
<a class="dropdown-item" href="#">最新</a>
</div>
</div>
<button type="button" class="btn btn-secondary font-weight-bold" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-filter mr-2"></i>絞り込み</button>
</div>
<!-- search__filter -->
<div class="search__current my-3"></div>
<!-- search__current -->
<div class="search__result-txt my-3 small">検索結果：<span>10</span></div>
<!-- search__result-txt -->
<div class="search__result">
<div class="search__result__inner shadow-sm">
<figure class="search__result__inner-thumbnail">
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="">
</figure>
<div class="search__result__inner__wrap">
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
<div class="search__result__inner-btn">
<a class="btn btn-primary text-white" href="<?php echo $home; ?>/restaurant?recommend=1">メニューを見る</a>
</div>
</div>
</div>
<!-- search__result__inner -->
<div class="search__result__inner shadow-sm">
<figure class="search__result__inner-thumbnail">
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="">
</figure>
<div class="search__result__inner__wrap">
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
<div class="search__result__inner-btn">
<a class="btn btn-primary text-white" href="<?php echo $home; ?>/restaurant?recommend=1">メニューを見る</a>
</div>
</div>
</div>
<!-- search__result__inner -->
<div class="search__result__inner shadow-sm">
<figure class="search__result__inner-thumbnail">
<img src="<?php echo $wp_url; ?>/dist/images/topic_sample.png" alt="">
</figure>
<div class="search__result__inner__wrap">
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
<div class="search__result__inner-btn">
<a class="btn btn-primary text-white" href="<?php echo $home; ?>/restaurant?recommend=1">メニューを見る</a>
</div>
</div>
</div>
<!-- search__result__inner -->

<!-- ここから無料枠 -->
<div class="search__result__inner shadow-sm">
<a href="<?php echo $home; ?>/restaurant?recommend=0">
<div class="search__result__inner__wrap">
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
</div>
</a>
</div>
<!-- search__result__inner -->
<div class="search__result__inner shadow-sm">
<a href="<?php echo $home; ?>/restaurant?recommend=0">
<div class="search__result__inner__wrap">
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
</div>
</a>
</div>
<!-- search__result__inner -->
<div class="search__result__inner shadow-sm">
<a href="<?php echo $home; ?>/restaurant?recommend=0">
<div class="search__result__inner__wrap">
<p class="search__result__inner-name">店名が入ります。</p>
<p class="search__result__inner-info">
<span>インド料理</span>
<span>京都市中京区</span>
</p>
<p class="search__result__inner-time">営業時間 11:00~22:00 / 定休日：火曜</p>
</div>
</a>
</div>
<!-- search__result__inner -->
</div>
<!-- search__result -->
</div>
</section>

<?php get_footer();