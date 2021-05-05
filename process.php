<?php
session_start();

//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

if(!empty($_POST['Login'])){
    //get values from form in login.php
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    //checks for empty fields in registration form, if empty add into $errors array
    if(empty($username)){ array_push($errors, "Username is required");}
    if(empty($password)){ array_push($errors, "Password is required");}

    //login the user and redirect to home.php
    if(count($errors) == 0){
        $password = md5($password); //encrypt password
        $query = "SELECT * FROM Players WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn,$query);
        if(mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        }else{
            array_push($errors, "Wrong username or password");
        }
    }
}
?>