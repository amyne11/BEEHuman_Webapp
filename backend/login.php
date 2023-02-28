<?php
if (isset($_POST["login"]))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    include "models/user.php";
    include "controllers/login.php";
    
    $loginContr = new Login();
    $loginContr->create($username, $password);
} 
?>