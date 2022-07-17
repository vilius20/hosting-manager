<?php

class InfoContr extends Category {
    private $id;

    public function __construct($id) {
        
        $this->id= $id;

    }

    public function getInfo() {
        return $this->info($this->id);
    }
}