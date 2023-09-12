<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassowrd = '';
$dbName = 'informations';

$connection = new mysqli($dbHost, $dbUsername, $dbPassowrd, $dbName);

//Check if the connect was been done or not
//if ($connection->connect_errno){
//   print("error");
//   }else{
//   print("OK");
//   }
?>