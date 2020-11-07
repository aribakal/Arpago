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
    <form class="" action="index.html" method="post">

    <form action="login.php" method="post">

      <input type="text" name="username" placeholder="Enter your username">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" value="Send">

    </form>
  </body>
</html>
