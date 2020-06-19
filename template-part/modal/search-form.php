<?php
$genres = get_genres();
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>

<div class="modal fade" id="search-restaurant" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="search-form">
<h3 class="modal-body-title">場所指定</h3>
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link active" id="geo-tab" data-toggle="tab" href="#geo" role="tab" aria-controls="geo" aria-selected="true">現在地</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link" id="zipcode-tab" data-toggle="tab" href="#zipcode" role="tab" aria-controls="zipcode" aria-selected="false">郵便番号</a>
</li>
<li class="nav-item" role="presentation">
<a class="nav-link" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="false">エリア一覧</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="geo" role="tabpanel" aria-labelledby="geo-tab">
<button class="btn btn-block btn-light"><i class="fas fa-map-marker-alt mr-2 text-info"></i>位置情報から探す</button>
</div>
<div class="tab-pane fade" id="zipcode" role="tabpanel" aria-labelledby="zipcode-tab">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text border-0" id="zipicon">〒</span>
</div>
<input type="text" class="form-control border-0" placeholder="000-0000" aria-describedby="zipicon">
</div>
</div>
<div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
<a class="btn btn-sm btn-light py-1 px-2" href="">京都</a>
</div>
</div>
</div>
<div class="search-form mt-4">
<h3 class="modal-body-title">ジャンル指定</h3>
<div class="bg-light p-3">
<select name="" id="" class="form-control border-0">
<option value="">---</option>
<?php
foreach ($genres as $key => $val): ?>
<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
<?php endforeach; ?>
</select>
</div>
</div>
</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-block btn-primary"><i class="fas fa-search mr-2"></i>検索</button> -->
<a class="btn btn-block btn-primary" href="<?php echo $home; ?>/search/"><i class="fas fa-search mr-2"></i>検索</a>
</div>
</div>
</div>
</div>