<?php 

 /**
  * Testing Order.
  */
class OrderTest extends \PHPUnit\Framework\TestCase
{
    public function testOrdersPost() {
        require __DIR__.'/../classes/order/order-contr.class.php';
        require __DIR__.'/../classes/order/order.class.php';
        require __DIR__.'/../classes/db.class.php';

        // Order number
        $order_num = 10;
        // Invoice info
        $invoice_info = 10;
        // Id
        $order_id = 10;
        // Product id
        $product_id = 10;
        // Total price
        $total_price = 10;
        // Service type
        $service_type = 10;
        // Service name
        $service_name = 'host';
        // User id
        $user_id = 10;


        $order = new OrderContr($order_num, $invoice_info, $order_id, $product_id, $total_price, $service_type, $service_name, $user_id);

        $order->order();

        
    }
}