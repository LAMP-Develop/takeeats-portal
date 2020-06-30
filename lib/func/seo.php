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

function filter_wpseo_metadesc($wpseo_replace_vars)
{
    global $shop_name,$shop_address1,$pref_name,$genre_name;
    if (is_page('restaurant')) {
        return $shop_name.'('.$shop_address1.') | '.get_bloginfo('name');
    } elseif (is_page('search')) {
        if ($pref_name != null && $genre_name != null) {
            return $pref_name.'で'.$genre_name.'がテイクアウトできるおすすめのお店一覧ページです。テイクアウトを活用してお家で美味しいごはんを食べませんか？';
        } elseif ($pref_name == null && $genre_name != null) {
            return $genre_name.'がテイクアウトできるおすすめのお店一覧ページです。テイクアウトを活用してお家で美味しいごはんを食べませんか？';
        } elseif ($pref_name != null && $genre_name == null) {
            return $pref_name.'でテイクアウトできるおすすめのお店一覧ページです。テイクアウトを活用してお家で美味しいごはんを食べませんか？';
        } else {
            return $wpseo_replace_vars;
        }
    } else {
        return $wpseo_replace_vars;
    }
}
add_filter('wpseo_metadesc', 'filter_wpseo_metadesc');
