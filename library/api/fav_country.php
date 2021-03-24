<?php

  $res = array();
  session_start();
  require_once('../../connection.php');
  $user_id = $_SESSION['user_id'];

  if(isset($_POST['method']) && $_POST['method'] == 'add_fav'){
    $country = $_POST['country'];
    $sql = "SELECT COUNT(*) c FROM favorite_country WHERE country='".$country."' AND user_id='".$user_id."'";
    $Dbobj = new Connection();
    $query = mysqli_query($Dbobj->connectionDatabase(), $sql);
    $num_of_fav = mysqli_fetch_array($query);
    if($num_of_fav['c'] == 0){
        $sql = "Insert Into favorite_country (country, user_id, created_at) VALUES ('{$country}',{$user_id}, NOW())";
    }
    else{

        $sql = "UPDATE favorite_country SET favorite = 1, created_at = NOW()  WHERE country = '{$country}' AND user_id = {$user_id}";
    }
    mysqli_query($Dbobj->connectionDatabase(), $sql);
    $res = array('result'=>'ok');
    echo json_encode($res,true);

  }
  elseif (isset($_POST['method']) && $_POST['method'] == 'remove_fav'){
    $country = $_POST['country'];
    $sql = "SELECT COUNT(*) c FROM favorite_country WHERE country='".$country."' AND user_id='".$user_id."' AND favorite = '1'";
    $Dbobj = new Connection();
    $query = mysqli_query($Dbobj->connectionDatabase(), $sql);
    $num_of_fav = mysqli_fetch_array($query);
    if($num_of_fav['c'] == 0){
      $res = array('result'=>'not ok', 'message'=>'Something went wrong');
    }
    else{
      $sql = "UPDATE favorite_country SET favorite = '0', created_at = NOW()  WHERE country = '{$country}' AND user_id = {$user_id}";
      mysqli_query($Dbobj->connectionDatabase(), $sql);
      $res = array('result'=>'ok');

    }
    echo json_encode($res,true);

  }
  elseif (isset($_POST['method']) && $_POST['method'] == 'add_comment'){
    $country = $_POST['country'];
    $description = $_POST['description'];
    $Dbobj = new Connection();
    $sql = "UPDATE favorite_country SET description = '{$description}' WHERE country = '{$country}' AND user_id = {$user_id}";
    mysqli_query($Dbobj->connectionDatabase(), $sql);
    header("Location: ../../home.php");

  }
?>
