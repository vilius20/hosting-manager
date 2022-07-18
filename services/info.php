<?php
session_start();
require __DIR__.'/../vat/lt_vat.php';
require __DIR__.'/../classes/api/services/services.class.php';
require __DIR__.'/../classes/api/services/info-contr.class.php';
require __DIR__.'/../body/header.php';

if(isset($_POST['submit']) && isset($_SESSION['userid'])) {
    $id = $_POST['service_id'];
    $service = new InfoContr($id);
    ?>
<link rel="stylesheet" href="../styles/main/main.css">
<h2 class="plan-title">Choose plan</h2>
<div class="plan-cards">
    <?php
    foreach ($service->getInfo() as $order) {
        ?>
        <div class="card">
            <form action="../order/checkout.php" method="post">
                <h3><?php echo $order['name']?></h3>
                <h4><?php echo $order['description']?></h4>
                <input type="hidden" name="service_id" value="<?php echo $order['id'] ?>">
                <input type="hidden" name="service_name" value="<?php echo $order['name'] ?>">
                <input type="hidden" name="service_description" value="<?php echo $order['description'] ?>">
                <h4>Price: (VAT 21% included)</h4>
                <select class="price-dropdown" name="pay_info" id="pay_info">
                    <?php
                    foreach ($order['periods'] as $price) {
                        ?>
                    <option value="<?php echo $price['value'].' '.$price['title'].' '.$price['price'] ?>">
                        <?php echo $price['title'].' '.lt_vat($price['price']) ?> EUR</option>
                        <?php
                    }
                    ?>
                </select>
            
                <button type="submit" name="submit">Order</button>
            </form>
        </div>
        <?php
    } ?>
    </div>
    <?php 
    include __DIR__.'/../body/footer.php';
} else {
    echo '<h3>Return to order page and try again!</h3>';
}
?>