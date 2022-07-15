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
    <section>
        <?php
    if (isset($_SESSION['userid'])) {
      ?>
        <li><a href="#"><?php echo $_SESSION['firstname']; ?></a></li>
        <li><a href="includes/logout.php">LOGOUT</a></li>
        <?php }
      else {
        ?>
        <li><a href="register.php">REGISTER</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <?php
      }
      ?>
        <h1>Host VPS servers!</h1>
        <?php include 'services/services_list.php' ?>
    </section>
</body>

</html>