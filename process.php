<?php
session_start();

//connect to server and select database
$conn = mysqli_connect('localhost','saehaana','V00797462');
mysqli_select_db($conn,'project_saehaana');

//get values from form in login.php
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from Player where Username='$username' && Password='$password'";
//query database for user
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['username'] = $username;
    header('location:home.php');
}else{
    echo "Invalid username or password, please try again";
    header('location:index.php');
}
?>