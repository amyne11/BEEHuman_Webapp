<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("Location: signup-page.php");
    exit();
}
?>