<?php
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');


if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

   $film = getSingleFilm($id);

}else{
    die('404');
}



?>
<ul>
    <a href="details.php?id=<?php echo $film['id']; ?>"> <img src="posters/<?php echo $film['id']; ?>.jpg" alt="<?php echo $film['title'] ?>"></a>
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




