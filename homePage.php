<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: searchProduct.php");
//     exit;
// }

// Include config file
require_once "mysqlconnect.php";


// Define variables and initialize with empty values
// $username = $password = "";
// $username_err = $password_err = "";

// // Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
// // Check if username is empty
// if(empty(trim($_POST["username"]))){
// $username_err = "Please enter your username.";
// } else{
// $username = trim($_POST["username"]);
// }

// // Check if password is empty
// if(empty(trim($_POST["password"]))){
// $password_err = "Please enter your password.";
// } else{
// $password = trim($_POST["password"]);
// }

// // Validate credentials
// if(empty($username_err) && empty($password_err)){
// // Prepare a select statement
// $sql = "SELECT email_address, password,user_type FROM users WHERE email_address = ?";

// if($stmt = mysqli_prepare($db, $sql)){
// // Bind variables to the prepared statement as parameters
// mysqli_stmt_bind_param($stmt, "s", $param_username);

// // Set parameters
// $param_username = $username;

// // Attempt to execute the prepared statement
// if(mysqli_stmt_execute($stmt)){
// // Store result
// mysqli_stmt_store_result($stmt);

// // Check if username exists, if yes then verify password
// if(mysqli_stmt_num_rows($stmt) == 1){                    
//     // Bind result variables
//     mysqli_stmt_bind_result($stmt, $email, $hashed_password,$user_type);
//     echo $hashed_password;


//     if(mysqli_stmt_fetch($stmt)){


//         //if(password_verify($password, $hashed_password)){
//         if($password== $hashed_password){
            
            
//             // Password is correct, so start a new session
//             // session_start();
            
//             // Store data in session variables
//             $_SESSION["loggedin"] = true;
//             // $_SESSION["id"] = $id;
//             $_SESSION["username"] = $username;                            
            
            
//             if($user_type=="Administrator"){
//                 header("location: admin.php");
//             }
//             if($user_type=="Customer"){
//                 header("location: customer.php");
//             }
//             if($user_type=="Cashier"){
//                 header("location: cashier.php");
//             }
//             // Redirect user to welcome page
//             // header("location: searchProduct.php");
//         } else{
//             // Display an error message if password is not valid
//             $password_err = "The password you entered was not valid.";
//         }
//     }
// } else{
//     // Display an error message if username doesn't exist
//     $username_err = "No account found with that username.";
// }
// } else{
// echo "Oops! Something went wrong. Please try again later.";
// }

// // Close statement
// mysqli_stmt_close($stmt);
// }
// }

// Close connection
// mysqli_close($db);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage.css">

    <style type="text/css">
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
    }
    </style>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" style="background-color: #e3f2fd;">
            
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="searchProduct.php">Search Product</a>
                    </li>
                </ul>
            </div>
        </nav>

        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <!-- <p>Please fill in your credentials to login.</p>
                            <h2>Login</h2> -->
        <p>Please fill in your credentials to login.</p>
        <form action="nextpage.php" method="GET">
        <div class="form-label-group">
                                    
                                    <input type="email" id="email_address" name="email_address" class="form-control" placeholder="email_address" required autofocus>
                                    <label for="email_address">E-mail</label>
                                    
                                </div>    
            <div class="form-label-group">
                                    
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    
                                </div>
            <div class="form-group">
            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Login">
                
                
            </div>
            <p>Don't have an account? <a href="singupfinal.php">Sign up now</a>.</p>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>