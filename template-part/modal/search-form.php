<?php
$genres = get_genres();
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
<div class="modal fade" id="search-restaurant" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<form action="<?php echo $home; ?>/search/" method="GET">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="search-form">
<h3 class="modal-body-title">場所指定</h3>
<ul class="nav nav-tabs" id="myTab" role="tablist">
<!-- <li class="nav-item" role="presentation">
<a class="nav-link" id="geo-tab" data-toggle="tab" href="#geo" role="tab" aria-controls="geo" aria-selected="true">現在地</a>
</li> -->
<li class="nav-item" role="presentation">
<a class="nav-link active" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="false">エリア一覧</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link" id="zipcode-tab" data-toggle="tab" href="#zipcode" role="tab" aria-controls="zipcode" aria-selected="false">郵便番号</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<!-- <div class="tab-pane fade" id="geo" role="tabpanel" aria-labelledby="geo-tab">
<button class="btn btn-block btn-light" type="submit" name="gps"><i class="fas fa-map-marker-alt mr-2 text-info"></i>位置情報から探す</button>
</div> -->
<div class="tab-pane fade show active" id="area" role="tabpanel" aria-labelledby="area-tab">
<select name="pref" id="pref-select" class="form-control border-0">
<option value="">すべて</option>
<option value="13" <?php
if ($_GET['pref'] != '' && "13" == $_GET['pref']) {
    echo "selected";
} ?>>東京都</option>
<option value="26" <?php
if ($_GET['pref'] != '' && "26" == $_GET['pref']) {
    echo "selected";
} ?>>京都府</option>
<option value="27" <?php
if ($_GET['pref'] != '' && "27" == $_GET['pref']) {
    echo "selected";
} ?>>大阪府</option>
<?php
// $pref = get_pref();
// foreach ($pref as $key => $val): ?>
<!-- <option value="<?php echo $val['id']; ?>" <?php
// if ($_GET['pref'] != '' && $val['id'] == $_GET['pref']) {
//     echo "selected";
// } ?>><?php // echo $val['name']; ?></option> -->
<?php // endforeach; ?>
</select>
</div>
<div class="tab-pane fade" id="zipcode" role="tabpanel" aria-labelledby="zipcode-tab">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text border-0" id="zipicon">〒</span>
</div>
<input type="text" class="form-control border-0" name="zipcode" placeholder="000-0000" aria-describedby="zipicon">
</div>
</div>
</div>
</div>
<div class="search-form mt-4">
<h3 class="modal-body-title">ジャンル指定</h3>
<div class="bg-light p-3">
<select name="genre" id="genre-select" class="form-control border-0">
<option value="">すべて</option>
<?php
$genres = get_genres();
foreach ($genres as $key => $val): ?>
<option value="<?php echo $val['id']; ?>" <?php
if ($_GET['genre'] != '' && $val['id'] == $_GET['genre']) {
    echo "selected";
} ?>><?php echo $val['name']; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>
<div class="search-form mt-4">
<h3 class="modal-body-title">こだわり条件</h3>
<div class="bg-light p-3">
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="credit" name="credit_card" value="1" <?php if ($_GET['credit_card'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="credit">クレジットカード可</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="electronic" name="electronic_money" value="1" <?php if ($_GET['electronic_money'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="electronic">電子マネー可</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="parking" name="parking_flag" value="1" <?php if ($_GET['parking_flag'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="parking">駐車場あり</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="gnavi" name="gnavi_url" value="1" <?php if ($_GET['gnavi_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="gnavi">ぐるなび掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="tabelog" name="tabelog_url" value="1" <?php if ($_GET['tabelog_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="tabelog">食べログ掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="demaecan" name="demaecan_url" value="1" <?php if ($_GET['demaecan_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="demaecan">出前館掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="ubereats" name="ubereats_url" value="1" <?php if ($_GET['ubereats_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="ubereats">Uber Eats掲載</label>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-block btn-primary"><i class="fas fa-search mr-2"></i>検索する</button>
</div>
</form>
</div>
</div>
</div>