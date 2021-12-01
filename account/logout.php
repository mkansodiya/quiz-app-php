<?php include('header.php');
$_SESSION['user_email'] = "";
$_SESSION['login_status'] = false;
header('location: ../account/auth/login.php');
