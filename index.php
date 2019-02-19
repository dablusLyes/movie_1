<?php
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

$films = getRandomMovies();


include('inc/header.php');



foreach($films as $film){
?>
<ul>
<img src="posters/<?php echo $film['id']; ?>.jpg" alt="<?php echo $film['title'] ?>">
    <li> <?php echo $film['title'] ?> </li>
    <li> year of sortie<?php echo $film['year'] ?> </li>
    <li> rating : <?php echo $film['rating'] ?>/100</li>
</ul>

<?php 
}