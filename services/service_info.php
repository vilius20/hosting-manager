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
<form action="../order/order_checkout.php" method="post">


    <h2><?php echo $order['name']?></h2>
    <h2><?php echo $order['description']?></h2>
    <input type="hidden" name="service_id" value="<?php echo $order['id'] ?>">
    <input type="hidden" name="service_name" value="<?php echo $order['name'] ?>">
    <input type="hidden" name="service_description" value="<?php echo $order['description'] ?>">
    <h4>Price: (VAT 21% included)</h4>
    <select name="pay_info" id="pay_info">
        <?php
            foreach ($order['periods'] as $price) {
        ?>
        <option value="<?php echo $price['value'].' '.$price['title'].' '.$price['price'] ?>">
            <?php echo $price['title'].' '.lt_vat($price['price']) ?></option>
        <?php
            }
        ?>
    </select>

    <button type="submit" name="submit">Order</button>
    <hr>
</form>
<?php
    }
} else {
    echo '<h3>Return to order page and try again!</h3>';
}
?>