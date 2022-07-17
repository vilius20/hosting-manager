<?php
session_start();
include __DIR__.'/../body/header.php';
require __DIR__.'/../vat/lt_vat.php';

if(isset($_POST['submit']) && isset($_SESSION['userid'])) {
    // Data
    $service_id = $_POST['service_id']; 
    $service_name = $_POST['service_name']; 
    $service_description = $_POST['service_description']; 
    $pay_info = $_POST['pay_info'];
    $pay_info_arr = explode(' ', $pay_info);
?>
<a href="../index.php">Back</a>
<h2>Select payment method and confirm order</h2>
<h3>Total price: </h3>
<p><?php echo $pay_info_arr[1].' '.lt_vat($pay_info_arr[2]); ?> EUR</p>
<h3>Order information: </h3>
<p><?php echo $service_name; ?></p>
<p><?php echo $service_description; ?></p>
<form action="order_invoice.php" method="post">
    <h3>Payment method: </h3>
    <label for="bank_transfer">Bank transfer</label>
    <input type="hidden" name="service_id" id="service_id" value="<?php echo $service_id; ?>">
    <input type="hidden" name="service_name" id="service_name" value="<?php echo $service_name; ?>">
    <input type="hidden" name="pay_total" id="pay_total" value="<?php echo lt_vat($pay_info_arr[2]); ?>">
    <input type="hidden" name="pay_period" id="pay_period" value="<?php echo $pay_info_arr[0]; ?>">
    <input type="radio" id="bank_transfer" value="bank_transfer" name="bank_transfer" required>
    <button type="submit" name="submit">Pay</button>
</form>
<?php

} else {
    echo '<h3>Return to order page and try again!</h3>';
}