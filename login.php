<?php
session_start();
//error handling
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');
//if values entered don't match, kill connection
if(!$conn){die('Could not connect:'.mysqli_error());}

//get values from login form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$hash = password_hash($password,PASSWORD_DEFAULT);

//login the user and redirect to home.php
$query = "SELECT * FROM Player WHERE Email = '$email' AND Username = '$username' AND Password = '$password'";
$results = mysqli_query($conn,$query);
$num = mysqli_num_rows($results);
if(empty($username)){
    echo "Username field is empty. Please enter a username.";
    header('location:index.php');
}
if(empty($password)){
    echo "Password field is empty. Please enter a password.";
    header('location:index.php');
}
if(empty($email)){
    echo "Email field is empty. Please enter an email.";
    header('location:index.php');
}
if($num == 1){
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('location: home.php');
}else{
    header('location: index.php');
}
?>