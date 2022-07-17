<?php

class ShowContr extends Order{

    private $user_id;

    public function __construct($user_id) {
        
        
        $this->user_id = $user_id;

    }      

        public function show() {

           return $this->getOrderInfo($this->user_id);
        }

    }