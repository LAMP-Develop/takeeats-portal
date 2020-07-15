let geocode = {};

var setConf = function (str) {
  var tmpFrame = document.createElement("iframe");
  tmpFrame.setAttribute("src", "data:text/plain,");
  document.documentElement.appendChild(tmpFrame);
  var conf = window.frames[0].window.confirm(str);
  tmpFrame.parentNode.removeChild(tmpFrame);
  return conf;
};

var setAlert = function (str) {
  var tmpFrame = document.createElement("iframe");
  tmpFrame.setAttribute("src", "data:text/plain,");
  document.documentElement.appendChild(tmpFrame);
  var conf = window.frames[0].window.alert(str);
  tmpFrame.parentNode.removeChild(tmpFrame);
  return conf;
};

var infoWindow = new google.maps.InfoWindow();
function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, "click", function () {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}

/**
 * GoogleMapの表示
 */
var viewGoogleMap = function (id, option, isNumberPin, callback) {
  var setMarkerClickListener = function (marker, markerData) {
    google.maps.event.addListener(marker, "click", function (event) {
      if (openInfoWindow) {
        openInfoWindow.close();
      }
      openInfoWindow = new google.maps.InfoWindow({
        content: markerData.content,
      });
      google.maps.event.addListener(openInfoWindow, "closeclick", function () {
        openInfoWindow = null;
      });
      openInfoWindow.open(marker.getMap(), marker);
    });
  };

  var setLinkClickEvent = function (lnk, marker) {
    lnk.bind("click", function () {
      google.maps.event.trigger(marker, "click");
    });
  };

  var setMarkerData = function (markerData) {
    for (var i = 0; i < markerData.length; i++) {
      var name = markerData[i].title;
      var addr = markerData[i].content;
      var tid = markerData[i].tid;
      var tel = markerData[i].tel;
      var latlng = markerData[i].position;
      var html = '<div style="text-align:left; height: 110px; width: 200px"><b><font-color="black">' + name + "</font></b><br>" + addr + "<br>";
      html += '<a href="detail.php?id=' + tid + '" target="_blank">店�?詳細</a>';
      html +=
        '<form action="http://maps.google.co.jp/maps" method="get" target="_blank">' +
        '<input value="ここへのルート検索" type="submit">' +
        '<input type="hidden" name="daddr" value="' +
        latlng.lat() +
        "," +
        latlng.lng() +
        '"/></form></div>';
      var marker = new google.maps.Marker({
        map: gmap,
        position: markerData[i].position,
        title: markerData[i].title,
      });
      markerArray.push(marker);
      bindInfoWindow(marker, gmap, infoWindow, html);
    }
  };

  // マーカーの削除
  var clearMarkerData = function () {
    var i;
    if (markerArray.length > 0) {
      for (i = 0; i < markerArray.length; i++) {
        markerArray[i].setMap();
      }
      markerArray.length = 0;
    }
  };

  var refleshMarker = function () {
    clearMarkerData();

    var bounds = gmap.getBounds();
    var northEastLatLng = bounds.getNorthEast();
    var southWestLatLng = bounds.getSouthWest();
    var latlng = {
      lat: parseFloat(northEastLatLng.lat()),
      lng: parseFloat(northEastLatLng.lng()),
    };
    // 緯度経度から住所を求める
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode(
      {
        latLng: latlng,
      },
      function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          console.log(results);
          // 店舗情報の取得
          // $.ajax({
          //   url: "gettenpow.php?neLat=" + northEastLatLng.lat() + "&neLng=" + northEastLatLng.lng() + "&swLat=" + southWestLatLng.lat() + "&swLng=" + southWestLatLng.lng() + "&stype=" + option.stype,
          //   type: "GET",
          //   dataType: "json",
          //   timeout: 5000,
          //   error: function () {
          //     alert("地図データの読み込みに失敗しました");
          //   },
          //   success: function (json) {
          //   },
          // });
        }
      }
    );
  };

  option = option ? option : {};
  if (id == null) {
    return;
  }
  var mapOption = {
    zoom: option.zoom || 16,
    center: option.center,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
      position: google.maps.ControlPosition.TOP_RIGHT,
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    navigationControl: true,
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.SMALL,
      position: google.maps.ControlPosition.LEFT_TOP,
    },
    scaleControl: true,
    scaleControlOptions: {},
  };

  var gmap = new google.maps.Map(document.getElementById(id), mapOption);
  var openInfoWindow;
  var markerData;
  var markerArray = new Array();

  google.maps.event.addListener(gmap, "idle", function () {
    refleshMarker();
  });
};
