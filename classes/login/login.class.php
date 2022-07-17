<?php

class Login extends Db {

    protected function getUser($email, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_email = ?;');


        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt =null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false) {
            $stmt =null;
            header("location: ../index.php?error=wrongpass");
            exit();
        } elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_email= ? OR users_email = ? AND users_pwd= ?;');

            if(!$stmt->execute(array($email, $email, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt =null;
                header("location: ../index.php?error=usernotfound2");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["firstname"] = $user[0]["users_firstname"];

            $stmt = null;
        }

        $stmt = null;
    }

    

}