<?php
//we need an open connection to the database, so we access dbh for that
require_once "dbh.php";
require_once "functions.php";

$result = getProducts($conn);

while($row = mysqli_fetch_assoc($result)){
    //print_r($row);
   // echo"<br/>";

    $id =$row['id'];
    $name =$row['name'];
    $description =$row['description'];
    $qty =$row['qty'];
    $imageUrl =$row['imageUrl'];

   echo "<div class='col'>";
   echo "<h2>{$name}</h2><p>{$description} <p> <h4>{$qty}</h4> <img src='{$imageUrl}' alt=''>";
   echo "</div>";
}

?>