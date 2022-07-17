<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hosting Manager</title>
</head>

<body>
    <?php include __DIR__.'/body/header.php' ?>
    <section>
        <?php
    if (isset($_SESSION['userid'])) {
      ?>
        <li><a href="#"><?php echo $_SESSION['firstname']; ?></a></li>
        <li><a href="includes/logout.php">LOGOUT</a></li>
        <li><a href="order/order_show.php">ORDERS</a></li>
        <?php }
      else {
        include __DIR__.'/body/auth.php';
      }
      ?>
        <h1>Host VPS servers!</h1>
        <?php if (isset($_SESSION['userid'])) {
          include __DIR__.'/services/list.php';
        }
        else {
          ?>
        <h3>Login or register to order services</h3>
        <?php
        }
        ?>
    </section>
</body>

</html>