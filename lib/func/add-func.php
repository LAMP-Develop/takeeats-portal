<?php

function get_genres()
{
    $genres = [
        ["id" => 1,"name" => "寿司"],
        ["id" => 2,"name" => "魚料理"],
        ["id" => 3,"name" => "和食"],
        ["id" => 4,"name" => "ラーメン・麺類"],
        ["id" => 5,"name" => "お好み焼き・粉物"],
        ["id" => 6,"name" => "日本料理・郷土料理"],
        ["id" => 7,"name" => "アジア・エスニック"],
        ["id" => 8,"name" => "中華"],
        ["id" => 9,"name" => "イタリアン"],
        ["id" => 10,"name" => "洋食・西洋料理"],
        ["id" => 11,"name" => "フレンチ"],
        ["id" => 12,"name" => "アメリカ料理"],
        ["id" => 13,"name" => "珍しい各国料理"],
        ["id" => 14,"name" => "焼肉・ステーキ"],
        ["id" => 15,"name" => "焼き鳥・串料理"],
        ["id" => 16,"name" => "しゃぶしゃぶ・すき焼き"],
        ["id" => 17,"name" => "カフェ・スイーツ"],
        ["id" => 18,"name" => "ビュッフェ・バイキング"],
        ["id" => 19,"name" => "居酒屋・バー"],
        ["id" => 20,"name" => "ファミレス"],
        ["id" => 21,"name" => "ファストフード"],
        ["id" => 22,"name" => "その他"],
    ];

    return $genres;
}

function get_pref()
{
    $pref = [
        ["id" => 1,"name" => "北海道"],
        ["id" => 2,"name" => "青森県"],
        ["id" => 3,"name" => "岩手県"],
        ["id" => 4,"name" => "宮城県"],
        ["id" => 5,"name" => "秋田県"],
        ["id" => 6,"name" => "山形県"],
        ["id" => 7,"name" => "福島県"],
        ["id" => 8,"name" => "茨城県"],
        ["id" => 9,"name" => "栃木県"],
        ["id" => 10,"name" => "群馬県"],
        ["id" => 11,"name" => "埼玉県"],
        ["id" => 12,"name" => "千葉県"],
        ["id" => 13,"name" => "東京都"],
        ["id" => 14,"name" => "神奈川県"],
        ["id" => 15,"name" => "新潟県"],
        ["id" => 16,"name" => "富山県"],
        ["id" => 17,"name" => "石川県"],
        ["id" => 18,"name" => "福井県"],
        ["id" => 19,"name" => "山梨県"],
        ["id" => 20,"name" => "長野県"],
        ["id" => 21,"name" => "岐阜県"],
        ["id" => 22,"name" => "静岡県"],
        ["id" => 23,"name" => "愛知県"],
        ["id" => 24,"name" => "三重県"],
        ["id" => 25,"name" => "滋賀県"],
        ["id" => 26,"name" => "京都府"],
        ["id" => 27,"name" => "大阪府"],
        ["id" => 28,"name" => "兵庫県"],
        ["id" => 29,"name" => "奈良県"],
        ["id" => 30,"name" => "和歌山県"],
        ["id" => 31,"name" => "鳥取県"],
        ["id" => 32,"name" => "島根県"],
        ["id" => 33,"name" => "岡山県"],
        ["id" => 34,"name" => "広島県"],
        ["id" => 35,"name" => "山口県"],
        ["id" => 36,"name" => "徳島県"],
        ["id" => 37,"name" => "香川県"],
        ["id" => 38,"name" => "愛媛県"],
        ["id" => 39,"name" => "高知県"],
        ["id" => 40,"name" => "福岡県"],
        ["id" => 41,"name" => "佐賀県"],
        ["id" => 42,"name" => "長崎県"],
        ["id" => 43,"name" => "熊本県"],
        ["id" => 44,"name" => "大分県"],
        ["id" => 45,"name" => "宮崎県"],
        ["id" => 46,"name" => "鹿児島県"],
        ["id" => 47,"name" => "沖縄県"],
    ];

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
    $range = 2;
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
