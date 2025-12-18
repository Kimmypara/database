<?php

require_once "dbh.php";
require_once "functions.php";

if(!isset($_POST["submit"])){
    header("location:  ../edit.profile.php");
    exit();
}
else{
    session_start();

    if($_POST["submit"] == "upload"){
        $userId =$_SESSION["userId"];
print_r($_FILES);
die();
        $fileName = $_FILES["userfile"]["name"];
    }
}

?>