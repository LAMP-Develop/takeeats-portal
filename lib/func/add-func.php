<?php

function get_genres()
{
    $url = 'https://ssl.omomuki.me/api/cuisine-genre';
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $genres = json_decode($json, true);

    return $genres;
}

function get_pref()
{
    $url = 'https://ssl.omomuki.me/api/pref';
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $pref = json_decode($json, true);

    return $pref;
}

function get_menu($restaurants_id = 1)
{
    $url = 'https://ssl.omomuki.me/api/restaurant-menu?restaurants_id='.$restaurants_id;
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $restaurant = json_decode($json, true);

    return $restaurant;
}

function get_restaurant($param = '')
{
    $url = 'https://ssl.omomuki.me/api/restaurants'.$param;
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $restaurant = json_decode($json, true);

    return $restaurant;
}

function get_restaurant_detail($id = 1)
{
    $url = 'https://ssl.omomuki.me/api/restaurants/'.$id;
    $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $restaurant = json_decode($json, true);

    return $restaurant;
}

function search_page_navi($total = 0, $current = 1, $unit = 12)
{
    $range = 3;
    $showitems = ($range * 2)+1;
    $pages = ceil($total / $unit);
    $paged = $current;

    $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $url = trim_url(['pages'], $url);

    if ($pages != 1) {
        echo '<nav class="mt-4 mb-0" aria-label="Page navigation">'."\n".'<ul class="pagination my-0 justify-content-center">'."\n";
        if ($paged > 1 && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="'.$url.'&pages=1"><i class="fas fa-angle-double-left"></i></a></li>'."\n";
            echo '<li class="page-item"><a class="page-link" href="'.$url.'&pages='.($paged-1).'"><i class="fas fa-angle-left"></i></a></li>'."\n";
        }
        for ($i=1; $i <= $pages; $i++) {
            if ($pages != 1 && (!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                if ($i === (int)$paged) {
                    echo '<li class="page-item active"><a class="page-link" href="'.$url.'&pages='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li>'."\n";
                } else {
                    echo '<li class="page-item"><a class="page-link" href="'.$url.'&pages='.$i.'">'.$i.'</a></li>'."\n";
                }
            }
        }
        if ($paged < $pages && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="'.$url.'&pages='.($paged+1).'"><i class="fas fa-angle-right"></i></a></li>'."\n";
            echo '<li class="page-item"><a class="page-link" href="'.$url.'&pages='.$pages.'"><i class="fas fa-angle-double-right"></i></a></li>'."\n";
        }
        echo '</ul>'."\n".'</nav>'."\n";
    }
}

function trim_url($excludes, $url)
{
    $elements = parse_url($url);
    if (!isset($elements['query'])) {
        return $url;
    }
    parse_str($elements['query'], $params);
    $elements['query'] = "";
    foreach (array_diff_key($params, array_flip($excludes)) as $key => $val) {
        $elements['query'] .= ($elements['query'] !== "") ? "&" :  "";
        $elements['query'] .= (isset($val) && $val !== "") ? $key . "=" . $val : $key;
    }
    return build_url($elements);
}

function build_url(array $elements)
{
    $e = $elements;
    return
        (isset($e['host']) ? (
            (isset($e['scheme']) ? "$e[scheme]://" : '//') .
            (isset($e['user']) ? $e['user'] . (isset($e['pass']) ? ":$e[pass]" : '') . '@' : '') .
            $e['host'] .
            (isset($e['port']) ? ":$e[port]" : '')
        ) : '') .
        (isset($e['path']) ? $e['path'] : '/') .
        (isset($e['query']) ? (
            is_array($e['query']) ?
            '?' . http_build_query($e['query'], '', '&') :
            (($e['query'] !== "") ? '?' . $e['query'] : '')
        ) : '') .
        (isset($e['fragment']) ? "#$e[fragment]" : '');
}
