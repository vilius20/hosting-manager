<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/main/main.css">
    <title>Hosting Manager</title>
</head>

<body>
        <div class="brand-logo">
            <h1>Hosting manager</h1>
            <h2>Powered by Time4VPS</h2>
        </div>
    <section>
        <?php
        if (isset($_SESSION['userid'])) {
            ?>
            <div class="nav-menu">
                <li><a href="#"><?php echo $_SESSION['firstname']; ?></a></li>
                <li><a href="order/show.php">ORDERS</a></li>
                <li><a href="includes/auth/logout.php">LOGOUT</a></li>
            </div>
        <?php }
        else {
            include __DIR__.'/body/auth.php';
        }
        ?>
        <h1 class="title">Host VPS servers!</h1>
        <?php if (isset($_SESSION['userid'])) {
            include __DIR__.'/services/list.php';
        }
        else {
            ?>
        <h3 class="info">Login or register to order services</h3>
            <?php
        }
        ?>
    </section>
        <?php include __DIR__.'/body/footer.php'; ?>
    <script src="js/main.js"></script>
</body>

</html>