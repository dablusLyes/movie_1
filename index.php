<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

$films = getRandomMovies();

include('inc/header.php'); ?>

<form action="search.php" method="post">
    
    <label for="genre-select">select a genre</label>

    <input type="checkbox" id="drama" name="genre[]">
    <label for="drama">drama</label>

    <input type="checkbox" id="fantasy" name="genre[]">
    <label for="fantasy">fantasy</label>

    <input type="checkbox" id="romance" name="genre[]">
    <label for="romance">romance</label>

    <input type="checkbox" id="Action" name="genre[]">
    <label for="Action">Action</label>

    <input type="checkbox" id="Thriller" name="genre[]">
    <label for="Thriller">Thriller</label>
    <input type="checkbox" id="Animation" name="genre[]" >
    <label for="Animation">Animation</label>
    <br>

    <input type="checkbox" id="comedy" name="genre[]">
    <label for="comedy">comedy</label>

    <input type="checkbox" id="Mystery" name="genre[]">
    <label for="Mystery">Mystery</label>

    <input type="checkbox" id="Crime" name="genre[]">
    <label for="Crime">Crime</label>

    <input type="checkbox" id="sci-fi" name="genre[]">
    <label for="sci-fi">sci-fi</label>

    <input type="checkbox" id="Biography" name="genre[]">
    <label for="Biography">Biography</label>

    <label for="year">Release date between</label>
    <select name="year" id="year">
    <?php for ($i = 1900; $i < 2020; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
    </select>

    <label for="year">and</label>
    <select name="year2" id="year">
    <?php for ($i = 1900; $i < 2020; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
    </select>
</form>

<?php foreach($films as $film){ ?>
<ul>
    <a href="details.php?slug=<?php echo $film['slug']; ?>"> <img src="<?php echo poster($film); ?>" alt="<?php echo $film['title'] ?>"></a>
    <p> <?php echo $film['title'] ?> </p>
    <p> year of sortie<?php echo $film['year'] ?> </p>
    <p> rating : <?php echo $film['rating'] ?>/100</p>
</ul>
<?php 
}
?>
<a href="">Plus de films !</a>


<?php
include ('inc/footer.php');