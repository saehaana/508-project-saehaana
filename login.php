<?php
session_start();
//error handling
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from login form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$hash = password_hash($password,PASSWORD_DEFAULT);

//login the user and redirect to home.php
if(password_verify($password,$hash)){
header('location: home.php');
}
else{
header('location: index.php');
}
?>