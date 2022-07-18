<?php
session_start();
require __DIR__.'/../classes/db.class.php';
require __DIR__.'/../classes/order/order.class.php';
require __DIR__.'/../classes/order/show-contr.class.php';
require __DIR__.'/../body/header.php';

$orders_list = new showContr($_SESSION["userid"]);
if (isset($_SESSION['userid'])) {
    ?>
<link rel="stylesheet" href="../styles/main/main.css">
<div class="orders-card">
    <h3>Orders information</h3>
    <table>
        <tr>
            <th>Service type</th>
            <th>Service name</th>
            <th>Order number</th>
            <th>Order id</th>
            <th>Invoice id</th>
            <th>Total price</th>
        </tr>
        <?php foreach ($orders_list->show() as $order) { ?>
        <tr>
            <td><?php echo $order['service_type'] ?></td>
            <td><?php echo $order['service_name'] ?></td>
            <td><?php echo $order['order_number'] ?></td>
            <td><?php echo $order['order_id'] ?></td>
            <td><?php echo $order['invoice_id'] ?></td>
            <td><?php echo $order['total_price'] ?> EUR</td>
        </tr>
        <?php } ?>
    
    </table>
</div>
    <?php
}