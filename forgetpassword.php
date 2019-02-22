<?php
session_start();
include('inc/request.php');
include('inc/pdo.php');
require 'inc/function.php';

$errors = [];

if (!empty($_POST['submitted'])) {
  $email = trim(strip_tags($_POST['email']));
  if (empty($email) || (filter_var($email,FILTER_VALIDATE_EMAIL) === false)) {
    $errors['email'] = 'votre Adresse email invalide';
  }else {
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    if (!empty($user)) {
      $tokenEncode = urlencode($user['token']);
      $emailEncode = urlencode($user['email']);
      $url = 'modifiedpassword.php?' . $emailEncode . '&token=' . $tokenEncode;
      $html = '<p>Veuillez cliquer sur le lien ci-dessous pour reinitialiser le mot de passe de votre session</p>';
      $html = '<p><a href="'.$url.'">Cliquer ici pour modifier le mot de passe</a></p>';
      echo $html;
           die();

    }else {
      $errors['email'] = 'votre adresse mail est  incorrect';
    }
  }
}

?>
<?php include('inc/header.php'); ?>

<h1 class="reset"> Reset Password</h1>
<form class="reset" action="" method="post">
  <label for="email"> Enter your email to get a reset link :</label>
  <input type="text" name="email" id="email" value="<?php if (!empty($_POST['email'])) { echo $_POST['email']; } ?>" placeholder="ex: michel@gmail.com">
  <span class="error reset" style="color:red"><?php if (!empty($errors['email'])) { echo $errors['email']; } ?></span>

  <input type="submit" name="submitted" value="Send">
</form>


<?php


?>


<?php include('inc/footer.php');
