<?php

class OrderContr extends Order{

    private $order_num;
    private $invoice_info;
    private $order_id;
    private $product_id;
    private $total_price;
    private $user_id;

    public function __construct($order_num, $invoice_info, $order_id, $product_id, $total_price, $user_id) {
        
        $this->order_num = $order_num;
        $this->invoice_info = $invoice_info;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->total_price = $total_price;
        $this->user_id = $user_id;

    }      

        public function order() {

            $this->putOrderInfo($this->order_num, $this->invoice_info, $this->order_id, $this->product_id, $this->total_price, $this->user_id);
        }

    }