<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

$films = getRandomMovies();

include('inc/header.php'); ?>


<div class="toggle">Filters</div>
<form id="search_form" class="select" action="search.php" method="post">
    
    <p class="genre">Select genre</p>
    
    <div class="checkboxes">
        <div class="checkbox">
            <input type="checkbox" value="drama" name="genre[]">
            <label for="drama">drama</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="fantasy" name="genre[]">
            <label for="fantasy">fantasy</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="romance" name="genre[]">
            <label for="romance">romance</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="Action" name="genre[]">
            <label for="Action">Action</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="Thriller" name="genre[]">
            <label for="Thriller">Thriller</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="Animation" name="genre[]" >
            <label for="Animation">Animation</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="comedy" name="genre[]">
            <label for="comedy">comedy</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="Mystery" name="genre[]">
            <label for="Mystery">Mystery</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="Crime" name="genre[]">
            <label for="Crime">Crime</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="sci-fi" name="genre[]">
            <label for="sci-fi">sci-fi</label>
        </div>
        <div class="checkbox">
            <input type="checkbox" value="Biography" name="genre[]">
            <label for="Biography">Biography</label>
        </div>
    </div>
    <p>Select release date and rating</p>
    <div class="selects">
        <div class="select">
            <label for="year">Released between</label>
            <select name="year" id="year">
            <?php for ($i = 1900; $i < 2020; $i+=10) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
            </select>

            <label for="year2">and</label>
            <select name="year2" id="year">
            <?php for ($i = 1900; $i <= 2020; $i+=10) { ?><option selected="selected" value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
            </select>
        </div>
      
        <div class="select">
        <label for="note">Rating : </label>
        <select name="note" id="note">
            <option value="">note</option>
            <?php for ($i = 0; $i <= 90; $i+=10) { ?><option value="<?php echo $i; ?>"><?php echo $i.'-'.( $i+10) ; ?></option><?php }  ?>
        </select>
        </div>
    </div>
    <p>Custom search</p>
    <div class="custom_search">
        <input name="recherche" type="search" placeholder="titre, actors ou réalisateurs">
        <input type="submit" name="submit" value="search">
    </div>
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