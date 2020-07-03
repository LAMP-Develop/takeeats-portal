<?php

// cssの除去
function dp_deregister_styles()
{
    if (!is_page(['contact', 'request'])) {
        wp_dequeue_style('contact-form-7');
    }
    if (!is_single()) {
        wp_dequeue_style('toc-screen');
        wp_dequeue_style('wp-block-library');
    }
}
add_action('wp_print_styles', 'dp_deregister_styles', 100);

// jsの除去
function dp_deregister_scripts()
{
    if (!is_page(['contact', 'request'])) {
        wp_deregister_script('contact-form-7');
    }
    if (!is_single()) {
        wp_deregister_script('toc-front');
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


// 読み込み確認
function dp_display_pluginhandles()
{
    $wp_styles = wp_styles();
    $wp_scripts = wp_scripts();

    foreach ($wp_styles->queue as $handle) {
        echo $handle.'<br>';
    }
    foreach ($wp_scripts->queue as $handle) {
        echo $handle.'<br>';
    }
}
add_shortcode('pluginhandles', 'dp_display_pluginhandles');
