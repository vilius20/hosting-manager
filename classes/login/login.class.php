<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;

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

            $client = new Client([
                'base_uri' => 'https://billing.time4vps.com',
                'auth' => [$email, $pwd]
            ]);
            setcookie('time4vps', json_encode($client));

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["firstname"] = $user[0]["users_name"];

            $stmt = null;
        }

        $stmt = null;
    }

    

}