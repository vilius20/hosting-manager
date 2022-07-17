<?php
include __DIR__.'/../classes/api/services/services.class.php';
include __DIR__.'/../classes/api/services/list-contr.class.php';

$listCategories = new ListContr();
$list = $listCategories->getList();
foreach ($list as $option) {
?>

<form action="services/info.php" method="post">
    <h2>
        <?php echo $option['name'] ?>
    </h2>
    <input type="hidden" name="service_id" value="<?php echo $option['id'] ?>">
    <button type="submit" name="submit">Order</button>
</form>

<?php
} 
?>