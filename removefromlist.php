<?php
session_start();
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');

if (isLogged()) {
	$user = $_SESSION['user']['id'];
	if (!empty($_POST['submitted'])) {
 		// XSS
 		$user = trim(strip_tags($user));
 		$movie = trim(strip_tags($_POST['movie']));

 		removeFromList($movie,$user);
	}
}

header("Location: ".$_SERVER['HTTP_REFERER']);
