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
    $query = "select * from Player where email = '$email' LIMIT 1";
    $result = mysqli_query($conn,$query);
    $checkEmail = mysqli_fetch_assoc($result);

    if($checkEmail){ //if email exists
        if($email['email'] === $email){ //if email identical (equal to and of same type) to email in database
            echo "Email already taken, please enter a unique email address";
        }
    }

    //registers user if no errors exist
    //if(count($errors) == 0){
        $password = md5($password); //encrypt password
        $query = "insert into Player (Battletag,Username,Password,Email,firstName,lastName)
        values ('$battletag','$username','$password','$email','$firstName','$lastName')";
        mysqli_query($conn,$query);
        $_SESSION['username'] = $username;
        header('location: index.php');
    //}
//}
?>