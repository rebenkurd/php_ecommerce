
<?php


session_start();


$conn=new mysqli('localhost','root','','db');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}


?>