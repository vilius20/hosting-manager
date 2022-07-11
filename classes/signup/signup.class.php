<?php

class Signup extends Db {

    protected function setUser($first_name, $last_name, $pwd, $email, $country, $city, $address) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_lastname, users_pwd, users_email, users_country, users_city, users_address) VALUES (?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($first_name, $last_name, $hashedPwd, $email, $country, $city, $address))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($email) {
        $stmt = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}