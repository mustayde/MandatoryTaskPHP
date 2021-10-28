<?php
session_start();
$auth = $_SESSION['prince'];


unset($_SESSION['username']);
 $_SESSION['message'] = "You are now logged out";
header("location: index.php");
session_destroy();

