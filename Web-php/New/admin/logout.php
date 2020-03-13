<?php 
session_start();

session_destroy();

// unset($_SESSION['admin_login_c1807i']);

header('location: login.php');

 ?>