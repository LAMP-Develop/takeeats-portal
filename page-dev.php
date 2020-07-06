<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
?>
<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script src="<?php echo $wp_url; ?>/assets/js/geo.js"></script>

<div class="py-5">
<div class="container">
</div>
</div>

<script>
let options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0,
};

function getPosition() {
  let geo = navigator.geolocation.getCurrentPosition(success, error, options);
}

function success(pos) {
  let crd = pos.coords;
  let data = {
    lat: crd.latitude,
    lng: crd.longitude,
    accuracy: crd.accuracy, // 単位：meter
  };
}

function error(e) {
  console.warn(`ERROR(${e.code}): ${e.message}`);
}
</script>

<?php get_footer();
