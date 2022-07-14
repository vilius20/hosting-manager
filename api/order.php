<?php
require __DIR__.'/auth.php';

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


    if ($resp->getStatusCode() === 200) {
      
    }
    
    return $info;
}