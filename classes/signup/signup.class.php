<?php

class Signup extends Db
{

    /**
     * Registering user.
     * 
     * @param string $first_name First name
     * @param string $last_name  Last name
     * @param string $pwd        Password
     * @param string $email      Email
     * @param string $country    Country
     * @param string $city       City
     * @param string $address    Address
     * 
     * @return void
     */
    protected function setUser($first_name, $last_name, $pwd, $email, $country, $city, $address)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_firstname, users_lastname, users_pwd, users_email, users_country, users_city, users_address) VALUES (?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($first_name, $last_name, $hashedPwd, $email, $country, $city, $address))) {
            $stmt = null;
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Error, try again later...";
            exit();
        }

        $stmt = null;
    }

    /**
     * Loging user.
     * 
     * @param string $email Email
     * 
     * @return boolean
     */
    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Error, try again later...";
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}