<?php
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

$films = getRandomMovies();


include('inc/header.php');



foreach($films as $film){
?>
<ul>
    <a href="details.php?slug=<?php echo $film['slug']; ?>"> <img src="posters/<?php echo $film['id']; ?>.jpg" alt="<?php echo $film['title'] ?>"></a>
    <p> <?php echo $film['title'] ?> </p>
    <p> year of sortie<?php echo $film['year'] ?> </p>
    <p> rating : <?php echo $film['rating'] ?>/100</p>
</ul>
<?php 
}
?>
<a href="">Plus de films !</a>