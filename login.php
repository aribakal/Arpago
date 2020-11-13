<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Arpago');
  }

  require 'conexion.php';

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $consulta = mysqli_query($conexion, "SELECT id, username, password FROM users WHERE username='$username'");
    $resultado = mysqli_fetch_array($consulta);

    $message = '';

    if ($password == $resultado['password']) {
      $_SESSION['user_id'] = $resultado['id'];
      header('Location: /Arpago');

    } else {
      $message = 'Sorry, wrong username/password';
    }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <h1>Login</h1>

    <span>or <a href="signup.php">SignUp</a></span>

    <?php if (!empty($message)) : ?>
      <p><?= $message ?></p>
    <?php endif; ?>


    <form action="login.php" method="post">

      <input type="text" name="username" placeholder="Enter your username">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" value="Send">

    </form>
  </body>
</html>
