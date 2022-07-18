<?php

require_once __DIR__.'/../../vendor/autoload.php';

class SignupContr extends Signup
{

    private $first_name;
    private $last_name;
    private $country;
    private $city;
    private $address;
    private $pwd;
    private $pwdRepeat;
    private $email;

    /**
     * Construct.
     * 
     * @param string $first_name First name
     * @param string $last_name  Last name
     * @param string $pwd        Password
     * @param string $pwdRepeat  Password repeat
     * @param string $email      Email
     * @param string $country    Country
     * @param string $city       City
     * @param string $address    Addres
     * 
     * @return void
     */
    public function __construct($first_name, $last_name, $pwd, $pwdRepeat, $email, $country, $city, $address)
    {
        
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->country = $country;
        $this->city = $city;
        $this->address = $address;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;

    }

    /**
     * Registering user.
     *
     * @return void
     */
    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Empty input...";
            exit(); 
        } 
        if ($this->invalidFirstName() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Invalid first name...";
            exit(); 
        }
        if ($this->invalidLastName() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Invalid last name...";
            exit(); 
        }
        if ($this->invalidEmail() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Invalid email...";
            exit(); 
        } 
        if ($this->pwdMatch() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Passwords not match...";
            exit(); 
        } 
        if ($this->emailTakenCheck() == false) {
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Email already taken...";
            exit(); 
        }

        $this->setUser($this->first_name, $this->last_name, $this->pwd, $this->email, $this->country, $this->city, $this->address);
    }

    /**
     * Error handling
     *
     * @return void
     */
    private function emptyInput()
    {
        $result = false;
        if (empty($this->first_name) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email) || empty($this->last_name) || empty($this->country) || empty($this->city) || empty($this->address)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

        /**
         * Error handling
         *
         * @return void
         */
    private function invalidFirstName()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z]*$/", $this->first_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    /**
     * Error handling
     *
     * @return void
     */
    private function invalidLastName()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z]*$/", $this->last_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    /**
     * Error handling
     *
     * @return void
     */
    private function invalidEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    /**
     * Error handling
     *
     * @return void
     */
    private function pwdMatch()
    {
        $result = false;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    /**
     * Error handling
     *
     * @return void
     */
    private function emailTakenCheck()
    {
        $result = false;
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}