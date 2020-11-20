<?php
  include("conexion.php");

  $message = '';



 if (isset($_POST['register'])){

   if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1) {

     $username = trim($_POST['username']);
     $user_query = mysqli_query($conexion, "SELECT id, username FROM users WHERE username='$username'");
     $user_result = mysqli_fetch_array($user_query);

     if ($username == $user_result['username']) {

       $message = 'User already registered';

     } else {

       $user_result = 1;
       $password = trim($_POST['password']);
       $registerdate = date("d/m/y");
       $saldoinicio = 0;
       $register_query = mysqli_query($conexion, "INSERT INTO users(username, password, registerdate, saldo) VALUES ('$username','$password','$registerdate','$saldoinicio')");

        if ($register_query) {

         $message = 'Successfully created new user';

        } else {

         $message = 'Sorry there must have been an issue creating your account';

         }

     }

   }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>
    <?php if(!empty($message)): ?>
     <p> <?= $message ?></p>
   <?php endif; ?>

    <h1>SingUp</h1>
    <span>or <a href="login.php">Login</a></span>

      <form action="signup.php" method="post">

        <input type="text" name="username" placeholder="Enter your username">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">
        <input type="submit" name="register" value="Send">

      </form>


  </body>
</html>
