<?php
session_start();
$_SESSION['login']=="";
$_SESSION['Role'] =="";
session_unset();
$_SESSION['errmsg']="You have successfully logout";
header("location: login.php");
exit();