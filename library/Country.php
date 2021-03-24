<?php

require_once('../connection.php');
class Country
{
    public function __construct()
    {
       $this->url = 'https://restcountries.eu/rest/v2/';
    }

    public function takeAllCountryDetails(){

        return $this->callAPI('all');

    }

    public function takeFavCountryDetails(){

        session_start();
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM favorite_country WHERE  user_id='".$user_id."' AND favorite = '1'";
        $Dbobj = new Connection();
        $query = mysqli_query($Dbobj->connectionDatabase(), $sql);
        $fav = array();
        while ($row = mysqli_fetch_array($query)){
            $fav[] = $row;
        }
        return $fav;

    }

    private function callAPI($method){
        $this->url = $this->url.$method;
        $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$this->url);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
        $res=json_decode(curl_exec($curl_handle),true);
        return $res;

    }


}