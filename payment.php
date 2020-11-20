<?php
require 'conexion.php';

$message = '';

if (isset($_POST['pay'])) {

  if (!empty($_POST['username']) && !empty($_POST['receiver_username']) && ($_POST['amount'] >= 1)) {

    $username = trim($_POST['username']);
    $receiver = trim($_POST['receiver_username']);
    $amount = $_POST['amount'];
    $receiver_query = mysqli_query($conexion, "SELECT id, username, saldo FROM users WHERE username='$receiver'");
    $receiver_result = mysqli_fetch_array($receiver_query);
    $user_query = mysqli_query($conexion, "SELECT id, username, saldo FROM users WHERE username='$username'");
    $user_result = mysqli_fetch_array($user_query);

    if ($receiver == $receiver_result['username'] && $username == $user_result['username'] && $receiver_result['saldo'] >= $amount) {

      $receiver_saldo = $receiver_result['saldo'];
      $user_saldo = $user_result['saldo'];
      $pay_query = mysqli_query($conexion, "UPDATE users SET saldo = $receiver_saldo + $amount WHERE username = '$receiver'");
      $withdraw_query = mysqli_query($conexion, "UPDATE users SET saldo = $user_saldo - $amount WHERE username = '$username'");
      $message = 'Se realizo el pago';

    } else {

      $message = 'Please enter a valid receiver, username and amount';

      }

  } else {

    $message = 'Please, enter valid usernames and an amount higher than or equal $1';

    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Arpago</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)) : ?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <h2>Payments</h2>

    <form action="payment.php" method="post">

      <input type="text" name="username" placeholder="Enter your username">
      <input type="text" name="receiver_username" placeholder="Receiver's username">
      <input type="text" name="amount" placeholder="Amount">
      <input type="submit" name="pay" value="Send">

    </form>

    <a href="index.php">
      Volver
    </a>

  </body>
</html>
