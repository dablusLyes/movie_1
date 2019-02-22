<?php
session_start();
include('inc/request.php');
include('inc/pdo.php');
require 'inc/function.php';



$errors = [];

if (!empty($_GET['email']) && !empty($_GET['token'])) {
	$email = urldecode($_GET['email']);
	$token = urldecode($_GET['token']);
	$sql = "SELECT * FROM users
			WHERE email = :email
			AND token = :token";
			$query = $pdo->prepare($sql);
			$query->bindValue(':email',$email, PDO::PARAM_STR);
			$query->bindValue(':token',$token, PDO::PARAM_STR);
			$query->execute();
			$user = $query->fetch();

	if (!empty($user)) {
		debug($user);
		$id = $user["id"];

		if (!empty($_POST['submitted'])) {
			// XSS =>
			$password = trim(strip_tags($_POST['password']));
			$password2 = trim(strip_tags($_POST['password2']));

			$errors = validPassword($errors,$password,$password2,'password',8,50);

			if (count($errors) == 0) {


				$password = hashPassword($password);
				$token = generateToken(20);

				$sql = "UPDATE users
						SET password = :password,
						token = '$token'
						WHERE id = :id";
				$query = $pdo->prepare($sql);
				// injection SQL =>
				$query->bindValue(':password',$password, PDO::PARAM_STR);
				$query->bindValue(':id',$user['id'], PDO::PARAM_INT);
				$query->execute();

				header("Location: login.php");
				exit;
			}
		}
	} else {
		die('empty user');
	}
} 

?>

	<section>
		<div class="wrap">
			<form action="" method="post">
				<label for="password">Mot de passe</label>
				<input type="password" name="password" id="password" placeholder="Mot de passe">
				<span id="error"><?php if (!empty($errors['password'])) { echo $errors['password']; } ?></span>

				<label for="password2">Répéter le mot de passe</label>
				<input type="password" name="password2" id="password2" placeholder="Répéter le mot de passe">
				<span id="error"><?php if (!empty($errors['password2'])) { echo $errors['password2']; } ?></span>

				<input type="submit" name="submitted" value="Valider">
			</form>
		</div>
	</section>

<?php
include ('inc/footer.php');
