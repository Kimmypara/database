<?php

//This is a database handler
$server = "localhost";
$dbName = "first-database";
$dbUsername= "root";
$dbPassword = "";

 
$conn = mysqli_connect($server,  $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>