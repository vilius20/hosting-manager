<?php
require __DIR__.'/../api/auth.php';
require __DIR__.'/../vat/lt_vat.php';

if(isset($_POST['submit'])) {
    // Data
    $id = $_POST['service_id']; 
    $resp = client()->get("/api/category/$id/product")->getBody();
    $res = json_decode($resp, true);
    // print_r($res['products']);
?>
<?php
    foreach ($res['products'] as $order) {
?>
<h2><?php echo $order['name']?></h2>
<h2><?php echo $order['description']?></h2>
<h4>Price: (VAT 21% included)</h4>
<?php
    foreach ($order['periods'] as $price) {
?>
<hr>
<p><?php echo $price['title']?></p>
<p><?php echo lt_vat($price['price']) ?></p>
<button>Order</button>
<hr>
<?php
}
?>
<?php
    }
} else {
    echo '<h3>Return to order page and try again!</h3>';
}
?>