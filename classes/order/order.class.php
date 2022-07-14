<?php

class Order extends Db {

    protected function putOrderInfo() {
        $stmt = $this->connect()->prepare('INSERT INTO orders (users_name, users_lastname, users_pwd, users_email, users_country, users_city, users_address) VALUES (?, ?, ?, ?, ?, ?, ?);');


        if(!$stmt->execute(array($first_name, $last_name, $hashedPwd, $email, $country, $city, $address))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    

}