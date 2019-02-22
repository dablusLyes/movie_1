<?php include('../inc/pdo.php'); ?>
<?php include('../inc/function.php'); ?>
<?php include('../inc/request.php'); ?>
<?php include('inc/listing_back.php') ?>

<?php include('inc/header_back.php'); ?>
<?php include('inc/sideBar_back.php'); ?>
<?php include('inc/mobileMenu_back.php'); ?>
<?php include('inc/headerBar_back.php'); ?>

<?php

require '../vendor/autoload.php';

use JasonGrimes\Paginator;

$totalItems = countAllFilms();
$itemsPerPage = 25;
$currentPage = 1;
$offset = ($currentPage * $itemsPerPage) - $itemsPerPage;
$urlPattern = 'listingFilm_back.php?page=(:num)';

if(!empty($_GET['page']) && is_numeric($_GET['page'])){
  $currentPage = $_GET['page'];
  $offset = ($currentPage * $itemsPerPage) - $itemsPerPage;
}

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

$movies = getAllMoviesLimitBy($offset);

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
              <h2>Listing Films</h2>
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
      <div class="product-status mg-b-30">
        <div class="container-fluid">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="product-status-wrap">
          <h4>Films List</h4>
      <div class="add-product">
        <a href="addFilm_back.php">Add Film</a>
      </div>

      <table>
      <tr>
        <th>id</th>
        <th>Title</th>
        <th>Years</th>
        <th>Genre</th>
        <th>Directors</th>
        <th>Cast</th>
        <th>Writers</th>
        <th>Rating</th>
        <th>Modification date</th>
        <th>Created date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>

      <?php create_listingMoviesBack($movies); ?>

      </table>

      <div class="custom-pagination">
      <ul class="pagination">
      <?php echo $paginator ?>
      </ul>


<?php include('inc/footer_back.php') ?>
