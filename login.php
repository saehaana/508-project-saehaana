<?php
session_start();
//error handling
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');
//if values entered don't match, kill connection
if(!$conn){die('Could not connect:'.mysqli_error());}

//trim() : strips unwanted characters (extra space, tab, newline) from the beginning and end of the data
//stripslashes() : strips any quotes escaped with slashes
//htmlspecialchars() : replace HTML chars  like < and > to their HTML version &lt; and &gt;
        //prevents possible attackers from exploiting our code by injecting HTML or Javascript code
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

//get values from login form
$email = check_input($_POST['email'],"Email required");
$username = check_input($_POST['username'],"Username required");
$password = check_input($_POST['password'],"Password required");

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