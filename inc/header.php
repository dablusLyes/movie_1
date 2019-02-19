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

					if (isAdmin()) {
						echo '<li><a href="admin/index.php">Back office</a></li>';
					} ?>	
				</ul>
			</nav>
		</header>
     	<section id="section">


    