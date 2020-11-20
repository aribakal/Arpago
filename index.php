<?php
  session_start();

  require 'conexion.php';

  if (isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];
    $consulta = mysqli_query($conexion, "SELECT id, username, password, saldo FROM users WHERE id='$id'");
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

      <br>Hola, <b><?= $user['username'] ?></b> !

      <br>$ <b style="color:red;"><?= $user['saldo'] ?></b>

      <h1></h1>

      <a href = "payment.php"><input type="submit" value="Pagar"></a>

      <h1></h1>

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
