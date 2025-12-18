<?php

require_once "dbh.php";
require_once "functions.php";

session_start();

$userId = $_SESSION["userId"];

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["name"];
    $lastname = $_POST["surname"];
    $age = $_POST["age"];

    //here we should have data validation calls to check that the user filled in the form correctly
    //If not , we should redirect back to the back with an errorin the querystring, just like in the registration page
    //for now we will assume that everything is valid

    editUser($conn, $userId, $username, $password,$firstname, $lastname, $age );
    header("location: ../edit-profile.php?success=true");
    exit();
}

?>