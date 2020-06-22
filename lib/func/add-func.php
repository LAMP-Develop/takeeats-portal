<?php

function get_genres()
{
    $url = 'https://ssl.omomuki.me/api/cuisine-genre/';
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $genres = json_decode($json, true);

    return $genres;
}

function get_pref()
{
    $url = 'https://ssl.omomuki.me/api/pref/';
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $pref = json_decode($json, true);

    return $pref;
}

function get_restaurant($param)
{
    $url = 'https://ssl.omomuki.me/api/restaurants/'.$param;
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $restaurant = json_decode($json, true);

    return $restaurant;
}

function get_restaurant_detail($id)
{
    $url = 'https://ssl.omomuki.me/api/restaurants/'.$id;
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $restaurant = json_decode($json, true);

    return $restaurant;
}
