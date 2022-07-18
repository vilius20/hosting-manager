<?php
require __DIR__.'/auth.php';
require __DIR__.'/../db.class.php';
require __DIR__.'/../order/order.class.php';
require __DIR__.'/../order/order-contr.class.php';


/**
 * Post order information to database.
 * 
 * @param int $id           Product id
 * @param int $service_name Service name
 * @param int $user_id      User id
 * 
 * @return array
 */
function orderSend($id, $cycle, $service_name, $user_id)
{

    $resp = client()->post(
        "/api/order/$id", [
        'json' => [
            "cycle" => $cycle,
            "pay_method" => 95,
        ]
        ]
    );
    
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
    // Service type
    $service_type = explode(':', $info[4]);
    
    
    if ($resp->getStatusCode() === 200) {
        $order = new OrderContr($order_num[1], $invoice_info[1], $order_id[1], $product_id[1], $total_price[1], $service_type[1], $service_name, $user_id);
        $order->order();
    }
        
    return $info;
}


