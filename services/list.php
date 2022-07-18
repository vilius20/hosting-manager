<?php
require __DIR__.'/../classes/api/services/services.class.php';
require __DIR__.'/../classes/api/services/list-contr.class.php';

$service = new ListContr();

?>

<div class="list-cards">
    <?php foreach ($service->getList() as $option) { ?>    
    
        <form action="services/info.php" method="post">
            <div class="card">
                    <h2>
                        <?php echo $option['name'] ?>
                    </h2>
                    <input type="hidden" name="service_id" value="<?php echo $option['id'] ?>">
                    <button type="submit" name="submit">Order</button>
            </div>
        </form>
    <?php } ?>
</div>