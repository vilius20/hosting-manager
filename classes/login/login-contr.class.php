<?php

class LoginContr extends Login
{

    private $email;
    private $pwd;

    /**
     * Construct.
     * 
     * @param string $email Email
     * @param string $pwd   Password
     * 
     * @return void
     */
    public function __construct($email, $pwd)
    {
        
        $this->email = $email;
        $this->pwd = $pwd;

    }

    /**
     * Loging user.
     * 
     * @return void
     */
    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Empty input...";
            exit(); 
        } 
        

        $this->getUser($this->email, $this->pwd);
    }

    /**
     * Error handling.
     * 
     * @return void
     */
    private function emptyInput()
    {
        $result = false;
        if (empty($this->email) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    
}