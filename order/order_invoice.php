<?php
session_start();
require __DIR__.'/../vat/lt_vat.php';
require __DIR__.'/../api/order.php';

if(isset($_POST['submit'])) {
    // Data
    $service_id = $_POST['service_id']; 
    $pay_period = $_POST['pay_period'];
    $pay_total = $_POST['pay_total'];
    $pay_bank_method = $_POST['bank_transfer'];

    $order_details = order_send($service_id, $pay_period, $_SESSION["userid"]);
    print_r(order_send($service_id, $pay_period, $_SESSION["userid"]));
    // Order number
    $order_num = explode(':', $order_details[0]);
    // Invoice info
    $invoice_info = explode(':', $order_details[1]);



 if ($pay_bank_method == 'bank_transfer') {
    ?>
<h2>Details for payment</h2>
<h4>Name: <strong>UAB"VPS Manager"</strong></h4>
<h4>IBAN: <strong>LT12 1000 0111 0100 1000</strong></h4>
<h4>Purpose field information: <strong>
        Order number: <?php echo $order_num[1] ?>
        Invoice Id: <?php echo $invoice_info[1] ?>
    </strong></h4>
<h3>Total price to transfer: </h3>
<p><?php echo $pay_total; ?> EUR</p>

<?php
 }


} else {
    echo '<h3>Return to order page and try again!</h3>';
}