<?php
session_start();
if(!empty($_SESSION)) {
    header("Location: home.php");
}
?>
