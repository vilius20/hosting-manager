<?php

class Login extends Db
{

    /**
     * Loging user.
     * 
     * @param string $email Email
     * @param string $pwd   Password
     * 
     * @return void
     */
    protected function getUser($email, $pwd) :void
    {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_email = ?;');


        if (!$stmt->execute(array($email))) {
            $stmt = null;
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Error, try again later...";
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt =null;
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "User not found...";
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if ($checkPwd == false) {
            $stmt =null;
            session_start();
            header("location: ../../index.php");
            $_SESSION["error"] = "Wrong password...";
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_email= ? OR users_email = ? AND users_pwd= ?;');

            if (!$stmt->execute(array($email, $email, $pwd))) {
                $stmt = null;
                session_start();
                header("location: ../../index.php");
                $_SESSION["error"] = "Error, try again later...";
                exit();
            }

            if ($stmt->rowCount() == 0) {
                session_start();
                header("location: ../../index.php");
                $_SESSION["error"] = "User not found...";
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