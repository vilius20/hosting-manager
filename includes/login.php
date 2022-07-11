<?php

if(isset($_POST['submit'])) {

    // Data
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // SignupContr class
    include __DIR__."/../classes/db.class.php";
    include __DIR__."/../classes/login/login.class.php";
    include __DIR__."/../classes/login/login-contr.class.php";
    $login = new LoginContr($email, $pwd);

    // Error handlers
    $login->loginUser();

    // Going to front page
    header("location: ../index.php?error=none");
}