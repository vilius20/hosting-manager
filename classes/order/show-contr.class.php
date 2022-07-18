<?php

class ShowContr extends Order
{

    private $user_id;

    /**
     * Construct.
     * 
     * @param string $user_id User id
     * 
     * @return void
     */
    public function __construct($user_id)
    {
        
        
        $this->user_id = $user_id;

    }      

    /**
     * Returning order info.
     *
     * @return array
     */
    public function show()
    {

        return $this->getOrderInfo($this->user_id);
    }

}