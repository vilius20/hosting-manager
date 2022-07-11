<?php

if(isset($_POST['submit'])) {

    // Data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    // SignupContr class
    include __DIR__."/../classes/db.class.php";
    include __DIR__."/../classes/signup/signup.class.php";
    include __DIR__."/../classes/signup/signup-contr.class.php";
    $signup = new SignupContr($first_name, $last_name, $pwd, $pwdRepeat, $email, $country, $city, $address);

    // Error handlers
    $signup->signupUser();

    // Going to front page
    header("location: ../index.php?error=none");
}