<?php

// cssの除去
function dp_deregister_styles()
{
    if (!is_page('contact')) {
        wp_dequeue_style('contact-form-7');
    }
    if (!is_single()) {
        wp_dequeue_style('toc-screen');
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-social-bookmarking-light');
    }
}
add_action('wp_print_styles', 'dp_deregister_styles', 100);

// jsの除去
function dp_deregister_scripts()
{
    if (!is_page('contact')) {
        wp_deregister_script('contact-form-7');
    }
    if (!is_single()) {
      wp_dequeue_style('toc-screen');
      wp_dequeue_style('wp-block-library');
      wp_dequeue_style('wp-social-bookmarking-light');
  }
}
add_action('wp_print_scripts', 'dp_deregister_scripts', 100);

// 標準のjquery消去
function my_delete_local_jquery()
{
    if (!is_admin() && !is_single() && !is_page('request') && !is_page('contact')) {
        wp_deregister_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'my_delete_local_jquery');