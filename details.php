<?php
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

include('inc/header.php');

if(!empty($_GET['slug'])){
    $slug = $_GET['slug'];

   $film = getSingleFilm($slug);

   if(!empty($film)) {

   } else {
     die('404');
   }

}else{
    die('404');
}

?>
<div class="details">
  <div class="img_container"><img src="posters/<?php echo $film['id']; ?>.jpg" alt="<?php echo $film['title'] ?>"></div>
  <ul>
      <li> <?php echo $film['title'] ?> </li>
      <li> year of sortie<?php echo $film['year'] ?> </li>
      <li> rating : <?php echo $film['rating'] ?>/100</li>
      <li> <?php echo $film['genres'] ?> </li>
      <li> <?php echo $film['plot'] ?> </li>
      <li> <?php echo $film['directors'] ?> </li>
      <li> <?php echo $film['cast'] ?> </li>
      <li> <?php echo $film['writers'] ?> </li>
      <li> <?php echo $film['popularity'] ?> </li>
  </ul>
</div>
<?php
include('inc/footer.php');