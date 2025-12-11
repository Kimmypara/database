<?php

if(!isset($_POST["submit"])){
    header("location:../login.php");
    exit();
}
else{
    $username = $_POST["username"];
    $password = $_POST["password"];

    //validate user's input
if(empty($username) || empty($password)){
    header("location:../login.php?error=emptyinput");
    exit();
}

require_once "dbh.php";
require_once "functions.php";

//
login($conn, $username, $password);

}
?>