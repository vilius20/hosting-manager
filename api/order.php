<?php
require __DIR__.'/auth.php';
include __DIR__.'/../classes/db.class.php';
include __DIR__.'/../classes/order/order.class.php';
include __DIR__.'/../classes/order/order-contr.class.php';

function order_send($id, $cycle, $user_id) {

    $resp = client()->post("/api/order/$id", [
        'json' => [
            "cycle" => $cycle,
            "pay_method" => 95,
        ]
    ]);

    $info_str = trim($resp->getBody(), '{}');
    $info_str = str_replace('"', '', $info_str);
    $info_str = str_replace('[', ',', $info_str);
    $info_str = str_replace(array('{','}',']'), '', $info_str);
    $info = explode(',', $info_str);

    // Order number
    $order_num = explode(':', $info[0]);
    // Invoice info
    $invoice_info = explode(':', $info[1]);
    // Id
    $order_id = explode(':', $info[5]);
    // Product id
    $product_id = explode(':', $info[7]);
    // Total price
    $total_price = explode(':', $info[2]);


    if ($resp->getStatusCode() === 200) {
      $order = new OrderContr($order_num[1], $invoice_info[1], $order_id[1], $product_id[1], $total_price[1], $user_id);
      $order->order();
    }
    
    return $info;
}