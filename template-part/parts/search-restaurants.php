<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
?>
<div class="modal d-block position-static">
<form action="<?php echo $home; ?>/search/" method="GET">
<div class="modal-header">
</div>
<div class="modal-body">
<div class="search-form">
<h3 class="modal-body-title">場所指定</h3>
<ul class="nav nav-tabs" id="sideTab" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link active" id="areaS-tab" data-toggle="tab" href="#areaS" role="tab" aria-controls="areaS" aria-selected="false">エリア一覧</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link" id="zipcodeS-tab" data-toggle="tab" href="#zipcodeS" role="tab" aria-controls="zipcodeS" aria-selected="false">郵便番号</a>
</li>
</ul>
<div class="tab-content" id="sideTabContent">
<div class="tab-pane fade show active" id="areaS" role="tabpanel" aria-labelledby="areaS-tab">
<select name="pref" class="form-control border-0">
<option value="">すべて</option>
<option value="13" <?php
if ($_GET['pref'] != '' && "13" == $_GET['pref']) {
    echo "selected";
} ?>>東京都</option>
<option value="23" <?php
if ($_GET['pref'] != '' && "23" == $_GET['pref']) {
    echo "selected";
} ?>>愛知県</option>
<option value="26" <?php
if ($_GET['pref'] != '' && "26" == $_GET['pref']) {
    echo "selected";
} ?>>京都府</option>
<option value="27" <?php
if ($_GET['pref'] != '' && "27" == $_GET['pref']) {
    echo "selected";
} ?>>大阪府</option>
</select>
</div>
<div class="tab-pane fade" id="zipcodeS" role="tabpanel" aria-labelledby="zipcodeS-tab">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text border-0" id="zipiconS">〒</span>
</div>
<input type="text" class="form-control border-0" name="zipcode" placeholder="000-0000" aria-describedby="zipiconS">
</div>
</div>
</div>
</div>
<div class="search-form mt-4">
<h3 class="modal-body-title">ジャンル指定</h3>
<div class="bg-light p-3">
<select name="genre" class="form-control border-0">
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
<input class="form-check-input" type="checkbox" id="Scredit" name="credit_card" value="1" <?php if ($_GET['credit_card'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Scredit">クレジットカード可</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="Selectronic" name="electronic_money" value="1" <?php if ($_GET['electronic_money'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Selectronic">電子マネー可</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="Sparking" name="parking_flag" value="1" <?php if ($_GET['parking_flag'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Sparking">駐車場あり</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="Sgnavi" name="gnavi_url" value="1" <?php if ($_GET['gnavi_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Sgnavi">ぐるなび掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="Stabelog" name="tabelog_url" value="1" <?php if ($_GET['tabelog_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Stabelog">食べログ掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="Sdemaecan" name="demaecan_url" value="1" <?php if ($_GET['demaecan_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Sdemaecan">出前館掲載</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" id="Subereats" name="ubereats_url" value="1" <?php if ($_GET['ubereats_url'] != '') {
    echo "checked";
} ?>>
<label class="form-check-label" for="Subereats">Uber Eats掲載</label>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-block btn-primary"><i class="fas fa-search mr-2"></i>検索する</button>
</div>
</form>
</div>