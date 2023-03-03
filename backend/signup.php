<?php
if (isset($_POST["signup"]))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    include "models/user.php";
    include "controllers/signup.php";
    include "controllers/login.php";
    
    $signupContr = new Signup();
    $signupContr->create($username, $password);
    $loginContr = new Login();
    $loginContr->startSession();
} 
?>