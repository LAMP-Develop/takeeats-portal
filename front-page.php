<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="py-5">
  <div class="container">
    <div class="mb-5">
      <h2>テキストカラー一覧</h2>
      <p class="text-body">text-body</p>
      <p class="text-primary">text-primary</p>
      <p class="text-secondary">text-secondary</p>
      <p class="text-info">text-info</p>
      <p class="text-success">text-success</p>
      <p class="text-warning">text-warning</p>
      <p class="text-danger">text-danger</p>
      <p class="text-light">text-light</p>
      <p class="text-dark">text-dark</p>
    </div>
    <div class="mb-5">
      <h2>ボタン一覧</h2>
      <div class="mb-3">
        <button class="mr-2 btn btn-primary">text-primary</button>
        <button class="mr-2 btn btn-secondary">text-secondary</button>
        <button class="mr-2 btn btn-info">text-info</button>
        <button class="mr-2 btn btn-success">text-success</button>
        <button class="mr-2 btn btn-warning">text-warning</button>
        <button class="mr-2 btn btn-danger">text-danger</button>
        <button class="mr-2 btn btn-light">text-light</button>
        <button class="mr-2 btn btn-dark">text-dark</button>
      </div>
      <div class="mb-0">
        <button class="mr-2 btn btn-outline-primary">text-primary</button>
        <button class="mr-2 btn btn-outline-secondary">text-secondary</button>
        <button class="mr-2 btn btn-outline-info">text-info</button>
        <button class="mr-2 btn btn-outline-success">text-success</button>
        <button class="mr-2 btn btn-outline-warning">text-warning</button>
        <button class="mr-2 btn btn-outline-danger">text-danger</button>
        <button class="mr-2 btn btn-outline-light">text-light</button>
        <button class="mr-2 btn btn-outline-dark">text-dark</button>
      </div>
    </div>
  </div>
</section>
<?php get_footer();