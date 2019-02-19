<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Recommandation sur les meilleurs film à voir">

    <title>Movies</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>
	<body>
	    <header>
			<h1>MOVIES</h1>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<?php if (!isLogged()) {
						echo '<li><a href="register.php">Sign up</a></li>';
						echo '<li><a href="login.php">Login</a></li>';
					} else {
						echo '<li><a href="logout.php">Logout</a></li>';
						echo '<li><p>Bonjour <span>' . $_SESSION['user']['pseudo'] . '</span></p></li>';
					}

<<<<<<< HEAD
<form action="search.php" method="post">
    
    <label for="pet-select">select a genre</label>
    
        <div>
        <input type="checkbox" id="drama" name="drama"
                >
        <label for="drama">drama</label>
        </div>

        <div>
        <input type="checkbox" id="fantasy" name="fantasy"
                >
        <label for="fantasy">fantasy</label>
        </div>

        <div>
        <input type="checkbox" id="romance" name="romance"
                >
        <label for="romance">romance</label>
        </div>

        <div>
        <input type="checkbox" id="Action" name="Action"
                >
        <label for="Action">Action</label>
        </div>   

        <div>
        <input type="checkbox" id="Thriller" name="Thriller"
                >
        <label for="Thriller">Thriller</label>
        </div>

        <div>
        <input type="checkbox" id="Animation" name="Animation"
                >
        <label for="Animation">Animation</label>
        </div>

        <div>
        <input type="checkbox" id="comedy" name="comedy"
                >
        <label for="comedy">comedy</label>
        </div>

        <div>
        <input type="checkbox" id="Mystery" name="Mystery"
                >
        <label for="Mystery">Mystery</label>
        </div>

        <div>
        <input type="checkbox" id="Crime" name="Crime">
        <label for="Crime">Crime</label>
        </div>

        <div>
        <input type="checkbox" id="sci-fi" name="sci-fi"
                >
        <label for="sci-fi">sci-fi</label>
        </div>

        <div>
        <input type="checkbox" id="Biography" name="Biography"
                >
        <label for="Biography">Biography</label>
        </div>

            <label for="year">Release date between</label>
    <select name="year" id="year">
        <?php for ($i = 1900; $i < 2020; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
    </select>

    <label for="year">and</label>
    <select name="year2" id="year">
        <?php for ($i = 1900; $i < 2020; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }  ?>
    </select>
</form>
        
    </header>              <!--fin header-->
     <div id="section">    <!--debut section-->
=======
					if (isAdmin()) {
						echo '<li><a href="admin/index.php">Back office</a></li>';
					} ?>	
				</ul>
			</nav>
		</header>
     	<section id="section">
>>>>>>> d7da64fd3b576b5d578182d7901566e2fae43bbc


    