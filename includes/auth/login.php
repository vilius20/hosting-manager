<?php

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    include __DIR__."/../../classes/db.class.php";
    include __DIR__."/../../classes/login/login.class.php";
    include __DIR__."/../../classes/login/login-contr.class.php";
    $login = new LoginContr($email, $pwd);

    $login->loginUser();

    header("location: ../index.php?error=none");
}