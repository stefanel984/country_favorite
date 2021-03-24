<?php
require ('library/login.php');
$login = new login();
$login->logout();
header("Location: index.php");
?>
