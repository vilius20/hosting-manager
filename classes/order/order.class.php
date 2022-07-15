<?php

class Order extends Db {

    protected function putOrderInfo($order_num, $invoice_info, $order_id, $product_id, $total_price, $user_id) {
        $stmt = $this->connect()->prepare('INSERT INTO orders (user_id, order_number, order_id, invoice_id, product_id, total_price) VALUES (?, ?, ?, ?, ?, ?);');


        if(!$stmt->execute(array($user_id, $order_num, $order_id, $invoice_info, $product_id, $total_price))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getOrderInfo($user_id){
        $stmt = $this->connect()->prepare('SELECT * FROM orders WHERE user_id = ?;');


        if(!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        
        return $stmt->fetchAll();
    }

}