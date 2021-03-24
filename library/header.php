<?php
include ('login.php');
session_start();
if(empty($_SESSION)) {
    if(!empty($_POST)) {
        $login = new login($_POST['username'], $_POST['password']);
        $user_details = $login->user_details();

        if (is_array($user_details) && !empty($user_details)) {
            $_SESSION["user_id"] = $user_details['id'];
            $_SESSION["logged"] = 'logged';
        }
        else{
            header("Location: index.php");
        }
    }
    else{
        header("Location: index.php");
    }
}
?>