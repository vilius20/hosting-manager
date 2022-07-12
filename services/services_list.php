<?php
require __DIR__.'/../api/auth.php';

$resp = client()->get('/api/category')->getBody();
$res = json_decode($resp, true);

// print_r($res['categories']);
// print_r($res);
?>

<?php 
foreach ($res['categories'] as $option) {
?>

<form action="service_info.php" method="post">
    <h2>
        <?php echo $option['name'] ?>
    </h2>
    <input type="hidden" name="service_id" value="<?php echo $option['id'] ?>">
    <button type="submit" name="submit">Order</button>
</form>

<?php
} 
?>