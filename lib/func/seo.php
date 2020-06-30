<?php

function edit_wpseo_title($title)
{
    global $shop_name,$shop_address1,$pref_name,$genre_name;
    if (is_page('restaurant')) {
        return $shop_name.'('.$shop_address1.') | '.get_bloginfo('name');
    } elseif (is_page('search')) {
        if ($pref_name != null && $genre_name != null) {
            return $pref_name.'で'.$genre_name.'がテイクアウトできるおすすめのお店 | '.get_bloginfo('name');
        } elseif ($pref_name == null && $genre_name != null) {
            return $genre_name.'がテイクアウトできるおすすめのお店 | '.get_bloginfo('name');
        } elseif ($pref_name != null && $genre_name == null) {
            return $pref_name.'でテイクアウトできるおすすめのお店 | '.get_bloginfo('name');
        } else {
            return $title;
        }
    } else {
        return $title;
    }
}
add_filter('wpseo_title', 'edit_wpseo_title');
