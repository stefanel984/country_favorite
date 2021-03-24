<?php
require_once('../../connection.php');
$res = array();

if(isset($_POST['method']) && $_POST['method'] == 'add_user'){
    if((!isset($_POST['name']) || (!isset($_POST['surname']))||(!isset($_POST['username']))||(!isset($_POST['phone']))||(!isset($_POST['email'])) || (!isset($_POST['password']))||(!isset($_POST['password_confirm'])))
       || ($_POST['password_confirm'] != $_POST['password']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
        echo "Грешка при внес контактирај администратор";
    }
    else{
        $first_name = $_POST['name'];
        $last_name = $_POST['surname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email= $_POST['email'];
        $phone_1= $_POST['phone_1'];
        $phone_2= $_POST['phone_2'];
        $Dbobj = new Connection();
        $query = mysqli_query($Dbobj->connectionDatabase(), "Insert INTO user (first_name, last_name, username, password, email, phone_1,phone_2) VALUES ('$first_name', '$last_name', '$username', '$password', '$email', '$phone_1','$phone_2')");
        header("Location: ../../home.php");


    }

}
elseif (isset($_POST['method']) && $_POST['method'] == 'check_existing'){
   $username = $_POST['username'];
    $sql = "SELECT COUNT(*) c FROM user WHERE username='".$username."'";
    $Dbobj = new Connection();
    $query = mysqli_query($Dbobj->connectionDatabase(), $sql);
    $num_of_user = mysqli_fetch_array($query);
    if($num_of_user['c'] == 0){
        $res = array('result'=>'not exist');
        echo json_encode($res,true);
    }
    else{
        $res = array('result'=>'exist', 'message'=>'Постои корисник со тоа корисничко име.');
        echo json_encode($res,true);
    }

}
