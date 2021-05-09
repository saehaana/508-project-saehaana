<?php
session_start();
//error handling
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from login form
$username = $password = $email = ;
$usernameErr = $passwordErr = $emailErr ;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"])){
        $usernameErr = "Username required";
    }else{
        $username = test_input($POST["username"]);
    }
    if(empty($_POST["password"])){
        $passwordErr = "Password required";
    }else{
        $password = test_input($POST["password"]);
    }
    if(empty($_POST["username"])){
        $emailErr = "Username required";
    }else{
        $email = test_input($POST["email"]);
    }
}

function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

//login the user and redirect to home.php
$query = "SELECT * FROM Player WHERE Username = '$username' AND Password = '$password'";
$results = mysqli_query($conn,$query);
$num = mysqli_num_rows($results);
if($num == 1){
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('location: home.php');
}else{
    header('location: index.php');
}
?>