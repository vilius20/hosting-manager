<?php
session_start();
require __DIR__.'/../vat/lt_vat.php';
require __DIR__.'/../classes/api/order.php';
require __DIR__.'/../body/header.php';

if(isset($_POST['submit']) && isset($_SESSION['userid'])) {
    require_once __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();
    // Data
    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $pay_period = $_POST['pay_period'];
    $pay_total = $_POST['pay_total'];
    $pay_bank_method = $_POST['bank_transfer'];

    $order_details = orderSend($service_id, $pay_period, $service_name, $_SESSION["userid"]);
    // Order number
    $order_num = explode(':', $order_details[0]);
    // Invoice info
    $invoice_info = explode(':', $order_details[1]);



    if ($pay_bank_method == 'bank_transfer') {
        ?>
<link rel="stylesheet" href="../styles/main/main.css">
<div class="invoice-card">
    <h2>Details for payment</h2>
    <h4>Name: <strong><?php echo $_ENV['USER_COMPANY_NAME']; ?></strong></h4>
    <h4>IBAN: <strong><?php echo $_ENV['USER_IBAN']; ?></strong></h4>
    <h4>Purpose field information: <strong>
            Order number: <?php echo $order_num[1] ?>
            Invoice Id: <?php echo $invoice_info[1] ?>
        </strong></h4>
        <div class="price-card">
            <h3>Total price to transfer: </h3>
            <p><?php echo $pay_total; ?> EUR</p>
        </div>
</div>

        <?php
    }
    include __DIR__.'/../body/footer.php';
} else {
    echo '<h3>Return to order page and try again!</h3>';
}