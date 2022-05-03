<?php

$servername="localhost";
$username="root";
$db="kuruskhetra";
$password="";

$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
    echo  die ( "connection failed" . mysqli_connect_error());
}
?>