<?php
if (isset($_POST["signup"]))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    include "models/user.php";
    include "controllers/signup.php";
    
    $signupContr = new Signup();
    $signupContr->create($username, $password);
} 
?>