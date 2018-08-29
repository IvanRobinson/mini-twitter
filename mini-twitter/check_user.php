<?php
session_start();
$auth_username = $_SESSION['username'];
$auth_name = $_SESSION['name'];
if (!isset($auth_username)){
   header("Location: login.php");
}
?>