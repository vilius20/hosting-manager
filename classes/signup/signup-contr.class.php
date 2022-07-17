<?php

require_once __DIR__.'/../../vendor/autoload.php';

class SignupContr extends Signup{

    private $first_name;
    private $last_name;
    private $country;
    private $city;
    private $address;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($first_name, $last_name, $pwd, $pwdRepeat, $email, $country, $city, $address) {
        
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->country = $country;
        $this->city = $city;
        $this->address = $address;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;

    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit(); 
        } 
        if($this->invalidFirstName() == false) {
            header("location: ../index.php?error=invalidfirstname");
            exit(); 
        }
        if($this->invalidLastName() == false) {
            header("location: ../index.php?error=invalidlastname");
            exit(); 
        }
        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=invalidemail");
            exit(); 
        } 
        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passmatch");
            exit(); 
        } 
        if($this->emailTakenCheck() == false) {
            header("location: ../index.php?error=emailtaken");
            exit(); 
        }

        $this->setUser($this->first_name, $this->last_name, $this->pwd, $this->email, $this->country, $this->city, $this->address);
    }

    private function emptyInput() {
        $result = false;
        if(empty($this->first_name) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email) || empty($this->last_name) || empty($this->country) || empty($this->city) || empty($this->address)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidFirstName() {
        $result = false;
        if(!preg_match("/^[a-zA-Z]*$/", $this->first_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidLastName() {
        $result = false;
        if(!preg_match("/^[a-zA-Z]*$/", $this->last_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        $result = false;
        if($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function emailTakenCheck() {
        $result = false;
        if(!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}