<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        die($problem);
    }
    return $data;
}

//get values from registration form
$battletag = check_input($_POST['battletag'],"Battletag required");
$username = check_input($_POST['username'],"Username required");
$password = check_input($_POST['password'],"Password required");
$email = check_input($_POST['email'],"Email required");
$firstName = check_input($_POST['firstName'],"First Name required");
$lastName = check_input($_POST['lastName'],"Last Name required");

//check Player table if email already exists
$querySelect = "SELECT * FROM Player WHERE email = '$email' LIMIT 1";
$results = mysqli_query($conn,$querySelect);
$num = mysqli_num_rows($results);
    if($num == 1){
        echo "email already taken,please choose another email";
    }else{ //registers user if no errors exist
        $queryInsert = "insert into Player (Battletag,Username,Password,Email,firstName,lastName)
        values ('$battletag','$username','$password','$email','$firstName','$lastName')";
        mysqli_query($conn,$queryInsert);
        echo "registration successful, please go back and login";
    }
    //*******add if field empty please enter in form; problem:
    //registering blank form still counts as registration*******//
?>