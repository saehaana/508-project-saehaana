<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

session_start();
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//$errors = array(); //initialize array

if(!empty($_POST['Login'])){
    //get values from form in login.php
$username = $_POST['username'];
$password = $_POST['password'];

    //checks for empty fields in registration form, if empty add into $errors array
//if(empty($username)){ array_push($errors, "Username is required");}
//if(empty($password)){ array_push($errors, "Password is required");}

    //login the user and redirect to home.php
//if(count($errors) == 0){
    //$password = md5($password); //encrypt password
    $query = "SELECT * FROM Player WHERE username='$username' AND password='$password'";
    $results = mysqli_query($conn,$query);
    if(($results) == 1){
        $_SESSION['username'] = $username;
        header('location: home.php');
    }else{
        header('location: index.php');
    }
//}
}
?>