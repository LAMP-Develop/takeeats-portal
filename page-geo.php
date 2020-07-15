<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>

<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyA6caobCHn-IcFLznnEERoWzgHlEQi-YoI"></script>
<script src="//www.google.com/jsapi"></script>
<script src="<?php echo $wp_url; ?>/dist/js/geo.js"></script>
<script src="<?php echo $wp_url; ?>/dist/js/sprintf.js"></script>


<div id="map_canvas"></div>

<script>
var lat = "";
var lng = "";
function GetQueryString() {
  var result = {};
  if (1 < window.location.search.length) {
    var query = window.location.search.substring(1);
    var parameters = query.split("&");
    for (var i = 0; i < parameters.length; i++) {
      var element = parameters[i].split("=");
      var paramName = decodeURIComponent(element[0]);
      var paramValue = decodeURIComponent(element[1]);
      result[paramName] = paramValue;
    }
  }
  return result;
}
function loadShops(json) {
  var shops = '<tr><th>店名</th><th colspan="2">所在地</th><th>駐車場</th><th>詳細</th></tr>';
  $.each(json.points, function () {
    shops +=
      '<tr data-href="detail.php?id=' +
      this.tid +
      '"><td class="name" width="20%">' +
      this.title +
      '</td><td class="address">' +
      this.content +
      '</td><td class="ajikasane" width="15%"></td><td class="parking" width="8%"><span class="pc_none">駐車場：</span>' +
      this.parking +
      '</td><td class="btn" width="15%"><span class="anime">詳しく見る</span></td></tr>';
  });
  $("#shoplist").html(shops);
  $("tr[data-href]")
    .css("cursor", "pointer")
    .click(function (e) {
      if (!$(e.target).is("a")) {
        window.location = $(e.target).closest("tr").data("href");
      }
    });
}
$(document).ready(function () {
  var getParams = GetQueryString();
  var wh = $("body").height();
  var ww = $("body").width();
  var h = sprintf("%d", Math.round((wh - 80) / 2));
  var w = sprintf("%d", Math.round((ww - 200) / 2));
  if (getParams["mode"] == "c") {
    $("body").append('<div id="progress" style="position: absolute; top:' + h + "px; left:" + w + 'px;">位置情報確認中...</div>');
    // (3)位置情報の取得を実行。
    if (navigator.geolocation) {
      var options = { timeout: 60000 };
      navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);
      // (2)位置情報の取得に失敗したときのコールバック関数
      function errorCallback(error) {
        $("#progress").remove();
        setAlert("現在地を取得できません。電波状況の良い所でやり直してください。");
        var option = {
          center: new google.maps.LatLng(35.039426924731, 135.79153161946),
          zoom: 8,
          stype: "",
        };
        var map = viewGoogleMap("map_canvas", option, true, loadShops);
      }
      function successCallback(pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;
        $("#progress").remove();
        viewmap();
      }
    } else {
      //$('#progress').remove();
      viewmap();
    }
  } else {
    //$('#progress').remove();
    viewmap();
  }
  function viewmap() {
    var zm = 13;
    if (getParams["zoom"] != undefined) {
      zm = parseInt(getParams["zoom"]);
    }
    var option = {
      center: new google.maps.LatLng(35.039426924731, 135.79153161946),
      zoom: zm,
      current: {},
      stype: "",
    };
    if (getParams["mode"] == "c" && !isNaN(lat) && !isNaN(lng)) {
      option.current = new google.maps.LatLng(lat, lng);
      option.center = option.current;
    }
    if (getParams["lat"] != undefined && getParams["lng"] != undefined) {
      option.current = new google.maps.LatLng(getParams["lat"], getParams["lng"]);
      option.center = option.current;
    }
    if (Object.keys(option.current).length === 0) {
      option.current = option.center;
    }
    var map = viewGoogleMap("map_canvas", option, true, loadShops);
  }
});
</script>

<?php get_footer();
