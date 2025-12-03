<?PHP
//This file will be used for all code that interact with database
function getUsers($conn){
   $sql = "SELECT * FROM user";
$stmt = mysqli_stmt_init($conn);


if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo"<p>We have an error.</p>";
    exit();
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt); 

return $result;
}


function getProducts($conn){
   $sql = "SELECT * FROM products";
$stmt = mysqli_stmt_init($conn);


if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo"<p>We have an error.</p>";
    exit();
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt); 

return $result;
}

function getUser($conn, $userId){
        /*
            This function is very similar to the one above. It gets all details from the users table, but only for one user.
            We add a userId parameter to be able to receive it from elsewhere, and then we can use it to filter out the results through SQL. 
        */
        $sql = "SELECT * FROM user WHERE id = ?;";
        // The ? above is called a wildcard. It's used to test the SQL statement and then replace it with an actual value.
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "<p>We have an error - Could not load user.</p>";
            exit();
        }

        // Here, we replace the ? wildcard with an integer, its value being in the userId variable
        mysqli_stmt_bind_param($stmt, "i", $userId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }
    }
?>

