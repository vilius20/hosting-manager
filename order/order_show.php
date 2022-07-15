<?php
session_start();
include __DIR__.'/../classes/db.class.php';
include __DIR__.'/../classes/order/order.class.php';
include __DIR__.'/../classes/order/show-contr.class.php';

$orders_list = new showContr($_SESSION["userid"]);
echo $_SESSION["userid"];

foreach ($orders_list->show() as $order) {
    echo $order['order_id'].' '.$order['total_price'];
}
// echo $order_item['0'];
// echo $order_item['1'];
// print_r($orders_list->show());