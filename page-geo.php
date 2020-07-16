<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>

<?php get_template_part('template-part/modal/search-form'); ?>

<section class="py-4 search">
<div class="container">

<div class="search__filter">
<button type="button" class="btn btn-secondary font-weight-bold" data-toggle="modal" data-target="#search-restaurant"><i class="fas fa-filter mr-2"></i>絞り込み</button>
</div>

<div class="search__current my-3">
<span class="badge badge-light p-2 mr-2">現在地から探す</span>
</div>

<div id="spinner-load" class="text-center">
<div class="spinner-grow text-primary" role="status">
<span class="sr-only">Loading...</span>
</div>
<small class="d-block text-center mt-1">検索中・・・</small>
</div>

<div id="geo-result" class="search__result">
</div>
</div>
</section>

<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyA6caobCHn-IcFLznnEERoWzgHlEQi-YoI"></script>
<script src="<?php echo $wp_url; ?>/dist/js/perf-genre.js"></script>
<script>

$(document).ajaxStop(function() {
  $('#spinner-load').css('display', 'none');
});

navigator.geolocation.getCurrentPosition(success, fail);
function success(pos) {
  let latlng = {
    lat: pos.coords.latitude,
    lng: pos.coords.longitude,
  };
  const geocoder = new google.maps.Geocoder();
  geocoder.geocode(
    {
      latLng: latlng,
    },
    function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        let address = results[0].address_components[3].long_name+results[0].address_components[2].long_name;
        let get_url = "https://ssl.omomuki.me/api/restaurants?keyword="+address;
        $('[name="keyword"]').val(address);
        $.when(
          $.ajax({
            url: get_url,
            type: "GET",
            dataType: "json",
            timeout: 5000,
            error: function () {
              alert('位置情報が取得できませんでした。');
            },
            success: function (result) {
              if (result.data.length == 0) {
                $('#geo-result').append('<p>検索結果：0件</p>');
              }
              result.data.forEach(function(val) {
                let ribbon,
                tags,
                tag_html = '',
                menu_flag = '',
                cregit;

                if (val.fixed > 0) {
                  ribbon = '<span class="shop-buzz__list-inner-ribbon"><img src="<?php echo $wp_url; ?>/dist/images/icon_check.png" srcset="<?php echo $wp_url; ?>/dist/images/icon_check.png 1x, <?php echo $wp_url; ?>/dist/images/icon_check@2x.png 2x" alt="アイコン">ネット注文可</span>';
                  menu_flag = '<div class="shop-buzz__list-inner-imgs" data-id="'+val.id+'"></div>';
                } else {
                  ribbon = '';
                }

                tag_html = '<div class="shop-buzz__list-inner-label">';
                if (val.tags != null) {
                  tags = val.tags.split(',');
                  tags.forEach(function(tag) {
                    tag_html += '<span>'+tag+'</span>';
                  });
                } else {
                  tags = '';
                }
                if (val.credit_card != '') {
                  tag_html += '<span>クレカ可</span>';
                }
                tag_html += '</div>';
                if (tags == '' && val.credit_card == '') {
                  tag_html = '';
                }

                let html = '<a class="shop-buzz__list-inner shadow-sm text-body" href="<?php echo $home; ?>/restaurant?id='+val.id+'">'
                + ribbon + "\n"
                + '<h3>'+val.name+'</h3>' + "\n"
                + '<div class="shop-buzz__list-inner-wrap">' + "\n"
                + menu_flag + "\n"
                + '<div class="shop-buzz__list-inner-tag">' + "\n"
                + '<span class="shop-buzz__list-inner-tag-genre">'+array_genre[0]+'</span>' + "\n"
                + '<span class="shop-buzz__list-inner-tag-map">'+val.access+'</span>' + "\n"
                + tag_html + "\n"
                + '<div class="shop-buzz__list-inner-time text-muted">' + "\n"
                + '<span class="d-block">'+val.business_hours+'</span>' + "\n"
                + '<span class="d-block mt-1">定休日：'+val.regular_holiday+'</span>' + "\n"
                + '</div>' + "\n"
                + '</div>' + "\n"
                + '<div class="shop-buzz__list-inner-link">お店の詳細を見る<i class="fas fa-chevron-right ml-2"></i></div>' + "\n"
                + '</div>' + "\n"
                + '</a>' + "\n";
                // create html
                $('#geo-result').append(html);
              });
            },
          })
        ).done(function() {
          $('.shop-buzz__list-inner-imgs').each(function(index, el) {
            let dataid = parseInt($(this).attr('data-id'));
            let menu_url = 'https://ssl.omomuki.me/api/restaurant-menu?restaurants_id='+dataid;
            let element = $(this);
            $.ajax({
              url: menu_url,
              type: "GET",
              dataType: "json",
              timeout: 5000,
              success: function (menus) {
                if (menus != null) {
                  for (let i = 0; i < 3; i++) {
                    element.append('<div><img src="//ssl.omomuki.me/storage/'+menus.data[i].thumbnail+'" alt="'+menus.data[i].name+'"></div>');
                  }
                }
              }
            });
          });
        });
      }
    }
  );
}

function fail(error){
  alert('位置情報が取得できませんでした。');
}
</script>

<?php get_footer();
