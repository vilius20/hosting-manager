<?php

class ListContr extends Category
{
    
    /**
     * Get products list.
     *
     * @return array
     */
    public function getList()
    {
        return $this->list();
    }

}