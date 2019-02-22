<?php include('../inc/pdo.php'); ?>
<?php include('../inc/function.php'); ?>
<?php include('../inc/request.php'); ?>
<?php include('inc/listing_back.php') ?>
<?php include('inc/header_back.php'); ?>
<?php include('inc/sideBar_back.php'); ?>
<?php include('inc/mobileMenu_back.php'); ?>
<?php include('inc/headerBar_back.php'); ?>

<?php

$errors = [];

if(!empty($_POST['submit'])){

  $title = trim(strip_tags($_POST['title']));
  $year = trim(strip_tags($_POST['year']));
  $plot = trim(strip_tags($_POST['plot']));
  $directors = trim(strip_tags($_POST['directors']));
  $genre = trim(strip_tags($_POST['genre']));
  $cast = trim(strip_tags($_POST['cast']));
  $writers = trim(strip_tags($_POST['writers']));
  $runtime = trim(strip_tags($_POST['runtime']));
  $mpaa = trim(strip_tags($_POST['mpaa']));
  $picture = trim(strip_tags($_POST['picture']));

  $errors = validTextInput($errors, $title, 'title', 10, 255);
  $errors = validNumInput($errors, $year, 'year', 1899, 2021);
  $errors = validTextInput($errors, $plot, 'plot', 10, 5000);
  $errors = validTextInput($errors, $directors, 'directors', 10, 255);
  $errors = validTextInput($errors, $cast, 'cast', 10, 255);
  $errors = validTextInput($errors, $writers, 'writers', 10, 255);
  $errors = validNumInput($errors, $runtime, 'runtime', 0, 500);

  if(!count($errors)){

  }
}

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
                  <form action="#" method="post">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="review-content-section">
                            <div class="input-group mg-b-pro-edt">
                              <span class="input-group-addon">Title</span>
                              <input type="text" name="title" class="form-control" >
                            </div>
                            <div class="input-group mg-b-pro-edt">
                              <span class="input-group-addon">Year</span>
                              <input type="number" name="year" class="form-control" value="1900">
                            </div>
                            <div class="input-group mg-b-pro-edt">
                              <span class="input-group-addon">Plot</span>
                              <textarea name="plot" rows="8" cols="80" class=form-control></textarea>
                            </div>
                            <div class="input-group mg-b-pro-edt">
                              <span class="input-group-addon">Directors</span>
                              <input type="text" name="directors" class="form-control">
                            </div>
                            <select name="genre" class="form-control pro-edt-select form-control-primary">
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
                            <input type="text" name="cast" class="form-control">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon">Writers</i></span>
                            <input type="text" name="writers" class="form-control">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon">Runtime</span>
                            <input type="number" name="runtime" class="form-control">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon">MPAA</span>
                            <input type="text" name="mpaa" class="form-control">
                          </div>
                          <div class="input-group mg-b-pro-edt">
                            <span class="input-group-addon">Picture</span>
                            <input type="input" name="picture" class="form-control">
                          </div>
                          <div class="form-group review-pro-edt mg-b-0-pt">
                            <input type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light" value="Add movie">
                          </div>
                        </div>
                      </div>
                    </form>
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
