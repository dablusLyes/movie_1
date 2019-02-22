<?php include('../inc/pdo.php'); ?>
<?php include('../inc/function.php'); ?>
<?php include('../inc/request.php'); ?>
<?php include('inc/listing_back.php') ?>
<?php include('inc/header_back.php'); ?>
<?php include('inc/sideBar_back.php'); ?>
<?php include('inc/mobileMenu_back.php'); ?>
<?php include('inc/headerBar_back.php'); ?>

<?php

$genres = ['Drama', 'Action', 'Romance', 'Animation', 'Family', 'Fantasy' ,'Adventure', 'Sci-Fi', 'Music', 'Crime', 'Comedy', 'Biography', 'Mystery','Horror', 'Thriller'];
?>

<div class="breadcome-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="breadcomb-wp">
                <div class="breadcomb-icon">
                <i class="icon nalika-home"></i>
                </div>
                <div class="breadcomb-ctn">
                <h2>Add movie</h2>
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="breadcomb-report">
                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="single-product-tab-area mg-b-30">

<div class="single-pro-review-area">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="review-tab-pro-inner">
    <ul id="myTab3" class="tab-review-design">
    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>All content</a></li>
    </ul>
    <div id="myTabContent" class="tab-content custom-product-edit">
    <div class="product-tab-list tab-pane fade active in" id="description">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="review-content-section">
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Title</span>
    <input type="text" class="form-control" >
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Year</span>
    <input type="number" class="form-control" value="1900">
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Plot</span>
    <textarea name="name" rows="8" cols="80" class=form-control></textarea>
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Directors</span>
    <input type="text" class="form-control">
    </div>
    <select name="select" class="form-control pro-edt-select form-control-primary">
    <option value="opt1">Genres</option>
    <?php foreach ($genres as $genre) {
      echo '<option value="'.$genre.'">'.$genre.'</option>';
    } ?>
    </select>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="review-content-section">
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Cast</span>
     <input type="text" class="form-control">
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Writers</i></span>
    <input type="text" class="form-control">
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Runtime</span>
    <input type="text" class="form-control">
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">MPAA</span>
    <input type="text" class="form-control">
    </div>
    <div class="input-group mg-b-pro-edt">
    <span class="input-group-addon">Picture</span>
    <input type="file" class="form-control" placeholder="Label Name">
    </div>
    <div class="form-group review-pro-edt mg-b-0-pt">
    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Add movie</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </div>
</div>

<?php include('inc/footer_back.php') ?>
