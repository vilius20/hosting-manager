<?php

class InfoContr extends Category
{
    private $id;

    /**
     * Construct.
     * 
     * @param int $id Product id
     * 
     * @return void
     */
    public function __construct($id)
    {
        
        $this->id= $id;

    }

    /**
     * Get order information from database.
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->info($this->id);
    }
}