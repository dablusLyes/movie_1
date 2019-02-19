<?php session_start() ?>
<?php include('inc/request.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php

$errors = [];

if (!empty($_POST['submitted'])) {
  $login = trim(strip_tags($_POST['login']));
  $password = trim(strip_tags($_POST['password']));
  if (empty($login) OR empty($password)) {
    $errors['login'] = 'Veuillez renseignez les deux champs pour vous connectez';
  }
  if (count($errors) == 0) {
    // verrifier si il existe un user avec ce mail ou ce pseudo => login
    $sql = "SELECT * FROM users WHERE pseudo = :login OR email = :login";
    $query = $pdo->prepare($sql);
    $query->bindValue(':login',$login,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    if (!empty($user)) {
       debug($user);
       die();
      if (password_verify($password,$user['password'])) {
        //   tout est verifié, creation de la session user
        $_SESSION['user'] = array(
          'email' => $user['email'],
          'pseudo' => $user['pseudo'],
          'password' => $user['password'],
        );
        header('Location: index.php');
              die();
            }else {
              $errors['login'] = 'Erreur de connexion';
            }
          }else {
            $errors['login'] = 'Erreur de connexion';
          }
        }
      }


?>
<?php include('inc/header.php'); ?>

<form action="" method="post">
  <label for="login">Votre pseudo ou email *</label>
  <input type="text" id="login" name="login" value="<?php if (!empty($_POST['login'])) { echo $_POST['login']; } ?>" placeholder="Pseudo ou email ici...">
  <span class="error" style="color:red"><?php if (!empty($errors['login'])) { echo $errors['login']; } ?></span>

  <label for="password">Votre mot de passe *</label>
  <input type="password" id="password" name="password" value="" placeholder="Votre mot de passe ex: Le mot de passe">
  <span class="error" style="color:red"><?php if (!empty($errors['password'])) { echo $errors['password']; } ?></span>

<input type="submit" name="submitted" value="Connexion">
</form>

<a href="forgetpassword.php">Mot de passe oublié</a>

<?php

?>

<?php include('inc/footer.php');
