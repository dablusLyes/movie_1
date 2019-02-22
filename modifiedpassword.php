<?php
session_start();
include('inc/request.php');
include('inc/pdo.php');
require 'inc/function.php';

$errors = [];

if (!empty($_GET['email']) && !empty($_GET['token'])) {
  $email = urldecode($_GET['email']);
  $token = urldecode($_GET['token']);

  $sql = "SELECT * FROM users WHERE email = :email AND token = :token";
  $query = $pdo->prepare($sql);
  $query->bindValue(':email',$email,PDO::PARAM_STR);
  $query->bindValue(':token',$token,PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();
  if (!empty($user)) {
    if (!empty($_POST['submitted'])) {
      $password = trim(strip_tags($_POST['password']));
      $repeatpassword = trim(strip_tags($_POST['repeatpassword']));
      if (!empty($password) OR !empty($repeatpassword)) {
        if ($password != $repeatpassword) {
          $errors['password'] = 'Vos deux mot de passe ne sont pas identiques';
        }elseif (mb_strlen($password) < 6) {
          $errors['password'] = 'Veuillez indiquez min 7 caractères';
        }
      }else {
        $errors['password'] = 'Veuillez renseignez ce champs';
      }

      if (count($errors) == 0) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $token = generateRandomString(100);
        $sql = "UPDATE users SET password = :password, token = :token, modified_at = NOW() WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':password',$password_hashed,PDO::PARAM_STR);
        $query->bindValue(':token',$token,PDO::PARAM_STR);
        $query->bindValue(':id',$user['id'],PDO::PARAM_STR);
        $query->execute();

        header('Location: login.php');
        die();
      }
    }
  }else {
    die('404');
  }

//}else {
  //die('404');
//}

?>
<?php include('inc/header.php'); ?>

<h1>Modifier votre mot de passe</h1>

<form action="" method="post">
  <label for="password">Votre mot de passe *</label>
  <input type="password" id="password" name="password" value="" placeholder="Votre mot de passe ex: Le mot de passe">
  <span class="error" style="color:red"><?php if (!empty($errors['password'])) { echo $errors['password']; } ?></span>

  <label for="repeatpassword">Répéter votre mot de passe *</label>
  <input type="password" id="repeatpassword" name="repeatpassword" value="" placeholder="Répéter votre mot de passe ex: Le mot de passe">

  <input type="submit" name="submitted" value="Envoyez">
</form>



<?php include('inc/footer.php');
