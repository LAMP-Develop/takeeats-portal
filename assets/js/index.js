// CSSインポート
import '../sass/app.scss';

// JSインポート
import 'bootstrap';

$(function ($) {
  let w = $(window).width();
  let md = 991.98;

  if (w <= md) {
    // 画像src切り替え
    $('.img-switch').each(function () {
      $(this).attr('src', $(this).attr('src').replace('_pc', '_sp'));
    });
  }

  // スムーススクロール
  $('a[href^="#"]').on('click', function () {
    var speed = 500;
    var href = $(this).attr('href');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top - 100;
    $('html, body').animate({ scrollTop: position }, speed, 'swing');
    return false;
  });

  // スクロールイベント
  $(window).on('scroll', function () {
    let s = $(window).scrollTop();
  });
});
