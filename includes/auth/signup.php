<?php

if(isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    include __DIR__."/../../classes/db.class.php";
    include __DIR__."/../../classes/signup/signup.class.php";
    include __DIR__."/../../classes/signup/signup-contr.class.php";
    $signup = new SignupContr($first_name, $last_name, $pwd, $pwdRepeat, $email, $country, $city, $address);

    $signup->signupUser();

    header("location: ../index.php?error=none");
}