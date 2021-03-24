<?php
require_once('connection.php');

class login
{
    public function __construct($username = '', $password = '')
    {
        $this->user = $username;
        $this->pass = $password;

    }

    public function user_details(){
        $Dbobj = new Connection();
        $query = mysqli_query($Dbobj->connectionDatabase(), "SELECT * FROM user WHERE username='".$this->user."' AND password ='".md5($this->pass)."'");
        return mysqli_fetch_array($query);
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
    }


}