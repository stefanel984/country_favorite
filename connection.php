<?php


class Connection
{
    public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        $this->db = "country";
    }

    function connectionDatabase(){
        $conn = mysqli_connect($this->host, $this->user ,$this->pass, $this->db) or die("Couldn't connect");
        return $conn;
    }

}