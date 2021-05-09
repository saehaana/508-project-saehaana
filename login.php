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
$hash = "$2y$10$6ZOUkdv5iaU.KrDEF.8fp.v8QhEe.0Z9ERD/PVXo6BUe1rtj4DEN2";
$verify = password_verify($password,$hash);

//login the user and redirect to home.php
if($verify){
$query = "SELECT * FROM Player WHERE Username = '$username' AND Password = '$password'";
$results = mysqli_query($conn,$query);
$num = mysqli_num_rows($results);
if($num == 1){
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('location: home.php');
}
}else{
 header('location: index.php');
 }
?>