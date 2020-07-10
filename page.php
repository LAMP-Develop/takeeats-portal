<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); the_post(); ?>
<section class="py-md-5 py-4 pages">
<div class="container">
<h2 class="ttl-h2"><?php the_title(); ?></h2>
<div class="post-main">
<?php the_content(); ?>
</div>
</div>
</section>
<?php get_footer();
