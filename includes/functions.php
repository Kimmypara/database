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

function registerUser($conn, $username, $password, $firstname, $lastname, $age){
    $sql = "INSERT INTO user (username, password, name, surname,age) 
        VALUES (?,?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    
    
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $hashedPassword, $firstname, $lastname, $age);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    
}


function login($conn, $username, $password){
    $user = userExists($conn, $username);

    if(!$user){
    header("location: ../login.php?error=incorrectlogin");
    exit();    
    }

  $userId =$user["id"];

  $user = getUser($conn, $userId);
  $dbPassword = $user["password"];
  $checkPassword = password_verify($password, $dbPassword);

  if(!$checkPassword){
    header("location:../login.php?error=incorrectlogin");
    exit();
  }

  session_start();

  $_SESSION ["username"] = $username;
  $_SESSION ["userId"] = $userId;

  header("location:../profile.php");
  exit();

}

function userExists($conn, $username){
    $sql = "SELECT id FROM user WHERE username = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    
    // Here, we replace the ? wildcard with an integer, its value being in the userId variable
    mysqli_stmt_bind_param($stmt, "s", $username);
    
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



//Validation functions
function emptyRegistrationInput($username, $password, $firstname, $lastname, $age){
    if(empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($age)){
        return true;
    }
    return false;
}


//we should have a bunch of other functions that check different things 
//Ex. Invalid username - maybe we do no want symbols
//Invalid password - we can check if pw has numbers, letters, or symbols
//
?>

