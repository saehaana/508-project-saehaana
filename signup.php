<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

session_start();
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//$errors = array(); //initialize array

//register
//if(isset($_POST['Register'])){
    //get values from registration form
    $battletag = $_POST['battletag'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    //checks for empty fields in registration form, if empty add into $errors array
    /**if(empty($battletag)){ array_push($errors, "Battletag is required");}
    if(empty($username)){ array_push($errors, "Username is required");}
    if(empty($password)){ array_push($errors, "Password is required");}
    if(empty($email)){ array_push($errors, "Email is required");}
    if(empty($first_name)){ array_push($errors, "First name is required");}
    if(empty($last_name)){ array_push($errors, "Last name is required");}**/

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
            echo "registration successful";
        }

    //registers user if no errors exist
    //if(count($errors) == 0){
        //$password = md5($password); //encrypt password
        //$queryInsert = "insert into Player (Battletag,Username,Password,Email,firstName,lastName)
        //values ('$battletag','$username','$password','$email','$firstName','$lastName')";
        //mysqli_query($conn,$queryInsert);
        //$_SESSION['username'] = $username;
        //header('location: index.php');
    //}
//}
?>