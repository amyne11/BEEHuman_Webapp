<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("Location: signup-page.php");
    exit();
} else {
    echo "<meta name='username' content='{$_SESSION['username']}' >";
}
?>