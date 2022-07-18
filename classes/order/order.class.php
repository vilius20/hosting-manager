<?php

class Order extends Db
{

    /**
     * Post order in database.
     * 
     * @param string $order_num    Order number
     * @param string $invoice_info Invoice info
     * @param string $order_id     Order id
     * @param string $product_id   Product id
     * @param string $total_price  Total price
     * @param string $service_type Service type
     * @param string $serice_name  Service name
     * @param int    $user_id      User id
     * 
     * @return void
     */
    protected function putOrderInfo($order_num, $invoice_info, $order_id, $product_id, $total_price, $service_type, $service_name, $user_id)
    {
        $stmt = $this->connect()->prepare('INSERT INTO orders (user_id, order_number, order_id, invoice_id, product_id, service_type, service_name, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');


        if (!$stmt->execute(array($user_id, $order_num, $order_id, $invoice_info, $product_id, $service_type, $service_name, $total_price))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    /**
     * Get order information from database.
     * 
     * @param int $user_id User id
     * 
     * @return array
     */
    protected function getOrderInfo($user_id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM orders WHERE user_id = ?;');


        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        
        return $stmt->fetchAll();
    }

}