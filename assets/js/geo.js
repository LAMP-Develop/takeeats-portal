function getPosition() {
  navigator.geolocation.getCurrentPosition(success);
}

function success(pos) {
  let date = new Date(pos.timestamp);
  let lat = pos.coords.latitude;
  let lng = pos.coords.longitude;
  let acc = pos.coords.accuracy;
}

getPosition();
