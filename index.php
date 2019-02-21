<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

$films = getRandomMovies();

include('inc/header.php'); ?>

<form class="select" action="search.php" method="post">
    
    <label for="genre-select">select a genre</label>

    <input type="checkbox" value="drama" name="genre[]">
    <label for="drama">drama</label>

    <input type="checkbox" value="fantasy" name="genre[]">
    <label for="fantasy">fantasy</label>

    <input type="checkbox" value="romance" name="genre[]">
    <label for="romance">romance</label>

    <input type="checkbox" value="Action" name="genre[]">
    <label for="Action">Action</label>

    <input type="checkbox" value="Thriller" name="genre[]">
    <label for="Thriller">Thriller</label>

    <input type="checkbox" value="Animation" name="genre[]" >
    <label for="Animation">Animation</label>
    <br>

    <input type="checkbox" value="comedy" name="genre[]">
    <label for="comedy">comedy</label>

    <input type="checkbox" value="Mystery" name="genre[]">
    <label for="Mystery">Mystery</label>

    <input type="checkbox" value="Crime" name="genre[]">
    <label for="Crime">Crime</label>

    <input type="checkbox" value="sci-fi" name="genre[]">
    <label for="sci-fi">sci-fi</label>

    <input type="checkbox" value="Biography" name="genre[]">
    <label for="Biography">Biography</label>

    <label for="year">Release date between</label>
    <select name="year" id="year">
    <?php for ($i = 1900; $i < 2020; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
    </select>

    <label for="year2">and</label>
    <select name="year2" id="year">
    <?php for ($i = 1900; $i < 2020; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
    </select>
    <input type="submit" name="submit" value="search">
</form>

<div class="movies">
	<?php foreach($films as $film){ ?>
		<ul class="movie">
		    <a href="details.php?slug=<?php echo $film['slug']; ?>"> <div class="img_container"><img src="<?php echo poster($film); ?>" alt="<?php echo $film['title'] ?>"></div></a>
		    <h2> <?php echo $film['title'] ?> </h2>
		    <p> Release : <span><?php echo $film['year'] ?> </span></p>
		    <p> rating : <span><?php echo $film['rating'] ?>/100</span></p>
		</ul>
	<?php 
} ?>
</div>
<a class="more_movies" href="">More Movies</a>


<?php
include ('inc/footer.php');