<?php
session_start();
require 'inc/pdo.php';
require 'inc/function.php';
require 'inc/request.php';

$errors = [];
// Checks if form is submitted
if (!empty($_POST['submitted'])) {
  
	//XSS =>
	$pseudo = trim(strip_tags($_POST['pseudo']));
	$email = trim(strip_tags($_POST['email']));
	$password = trim(strip_tags($_POST['password']));
	$password2 = trim(strip_tags($_POST['password2']));

	// inputs validation => Filling up Array with
	$errors = validPseudo($errors,$pseudo,'pseudo',4,25);
	$errors = validRegisterEmail($errors,$email,'email');
	$errors = validPassword($errors,$password,$password2,'password',8,30);

	// if there is no error =>
	if (count($errors) == 0) {

		$password = hashPassword($password); // Hash the user password
		$token = generateToken(20); // generates a token ( paramater = token lengh (not char lengh tho) )

		// Insert a new user in database
		addNewUser($pseudo,$email,$password,$token);

		// redirect the user to the login page
		header("Location: login.php");
		exit;
	}
}

include('inc/header.php');
?>

<!-- sign up Form -->
<form id="register_form" action="" method="post">

	<label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
	<span class="error"><?php if (!empty($errors['pseudo'])) { echo $errors['pseudo']; } ?></span>

	<label for="email">Email</label>
	<input type="text" name="email" id="email" placeholder="Email">
	<span class="error"><?php if (!empty($errors['email'])) { echo $errors['email']; } ?></span>

	<label for="password">Password</label>
	<input type="password" name="password" id="password" placeholder="Password">
	<span class="error"><?php if (!empty($errors['password'])) { echo $errors['password']; } ?></span>

	<label for="password2">Repeat password</label>
	<input type="password" name="password2" id="password2" placeholder="Repeat password">
	<span class="error"><?php if (!empty($errors['password'])) { echo $errors['password']; } ?></span>

	<input type="submit" name="submitted" value="Sign up">

</form> <!-- /sign up Form -->

<?php
include('inc/footer.php');
