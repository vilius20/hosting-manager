<?php
require __DIR__.'/../api/auth.php';

$resp = client()->post('/api/order/127', [
    'json' => [
        "cycle" => "m",
        "pay_method" => 95,
    ]
]);

echo $resp->getBody();
// $res = json_decode($resp, true);
//     print_r($res['products']);