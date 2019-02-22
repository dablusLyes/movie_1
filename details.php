<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');
include('inc/header.php');
if (isLogged()) {
   $user = $_SESSION['user']['id'];
}

if(!empty($_GET['slug'])){
  $slug = $_GET['slug'];
  $film = getSingleFilm($slug);
  $movieid = $film['id'];

  if(!empty($film)) {
  } else {
     die('404');
  }
}else{
    die('404');
}

?>
<div class="details">
  <div class="img_container"><img src="<?php echo poster($film); ?>" alt="<?php echo $film['title'] ?>"></div>
  <ul>
      <li><h2><?php echo $film['title'] ?></h2></li>
      <li><p class="released"><?php echo $film['year'] ?></p></li>
      <li><p class="genre"> <?php echo $film['genres'] ?> </p></li>
      <li><p class="plot"> <?php echo $film['plot'] ?> </p></li>
      <li><p class="movie_details"> Rating : <span><?php echo $film['rating'] ?>/100</span></p></li>
      <li><p class="movie_details"> Director : <span><?php echo $film['directors'] ?> </span></p></li>
      <li><p class="movie_details"> Casting : <span><?php echo $film['cast'] ?> </span></p></li>
      <li><p class="movie_details"> Writers : <span><?php echo $film['writers'] ?> </span></p></li>
      <li><p class="movie_details"> Popularity : <span><?php echo $film['popularity'] ?> </span></p></li>
      <?php if (isLogged()) { 
        if (empty(checkList($movieid, $user))) { ?>
            <form class="addtolist" action="addtolist.php" method="post">
              <input type="hidden" name="movie" value="<?php echo $film['id'] ?>">
              <input type="submit" name="submitted" value="Add to list">
            </form>
        <?php } else { ?>
          <form class="removefromlist" action="removefromlist.php" method="post">
              <input type="hidden" name="movie" value="<?php echo $film['id'] ?>">
              <input type="submit" name="submitted" value="Remove from list">
            </form>
        <?php }
      } ?>
      
  </ul>
</div>

<a class="retour" href="index.php">Go back</a>

<?php
include('inc/footer.php');