<?php
session_start();
include('inc/request.php');
include('inc/pdo.php');
require 'inc/function.php';

$errors = [];

if (!empty($_POST['submitted'])) {
  $email = trim(strip_tags($_POST['email']));
  if (empty($email) || (filter_var($email,FILTER_VALIDATE_EMAIL) === false)) {
    $errors['email'] = 'Adresse email invalide';
  }else {
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    if (!empty($user)) {
      $tokenEncode = urlencode($user['token']);
      $emailEncode = urlencode($user['email']);
      $url = '' . $emailEncode . '&token=' . $tokenEncode;
      $html = '<p>Veuillez cliquer sur le lien ci-dessous</p>';
      $html .= '<p><a href="'.$url.'">Cliquer ici pour modifier ton mot de passe</a></p>';

      echo $html;
      die('Attention normalement on doit encoyer le lien par mail');

    }else {
      $errors['email'] = 'Ne marche pas';
    }
  }
}

?>
<?php include('inc/header.php'); ?>

<h1>reinitialiser le mot de passe de votre session</h1>

<form action="" method="post">
  <label for="email">Votre Email *</label>
  <input type="text" name="email" id="email" value="<?php if (!empty($_POST['email'])) { echo $_POST['email']; } ?>" placeholder="ex: michel@gmail.com">
  <span class="error" style="color:red"><?php if (!empty($errors['email'])) { echo $errors['email']; } ?></span>

  <input type="submit" name="submitted" value="Envoyez">
</form>

<?php

?>

<?php include('inc/footer.php');
