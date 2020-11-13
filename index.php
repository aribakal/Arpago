<?php
  session_start();

  require 'conexion.php';

  if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
<<<<<<< HEAD
    $consulta = mysqli_query($conexion, "SELECT id, username, password, saldo FROM users WHERE id='$id'");
=======
    $consulta = mysqli_query($conexion, "SELECT id, username, password FROM users WHERE id='$id'");
>>>>>>> 6951c95b61fdcea93e30daab4070a34e58994e0f
    $resultado = mysqli_fetch_array($consulta);

    $user = null;

    if (count($resultado) > 0) {
      $user = $resultado;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to Arpago</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br>Welcome back <b><?= $user['username'] ?></b> !
<<<<<<< HEAD
      <br>$ <b style="color:red;"><?= $user['saldo'] ?></b>
      <h1></h1>
      <input type="submit" value="Pagar">
      <h1></h1>
=======
      <br>You are Successfully Logged In
>>>>>>> 6951c95b61fdcea93e30daab4070a34e58994e0f
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1></h1>
      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>
