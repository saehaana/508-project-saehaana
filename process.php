<?php

    session_start();
    //connect to server and select database
    $conn = mysqli_connect("localhost","saehaana","V00797462");
    mysqli_select_db($conn,"project_saehaana");

    //get values from form in login.php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //prevent mysql injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);

        //query database for user
        $result = mysqli_query($conn,"SELECT count(*) as total from Player where Username = '".$username."' and Password = '".$password."'")
        or die(mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        if($row['Username'] == $username && $row['Password'] == $password){
            echo "Login successful, welcome " .$row['Username'];
            header('location:home.php');
        }else{
            echo "Failed to login";
            header('location:index.php');
        }
    }
?>