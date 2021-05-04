<?php
session_start();

$conn = mysqli_connect('localhost','saehaana','V00797462');
mysqli_select_db($conn,"project_saehaana");

$battletag = $_POST['battletag'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];

$sql = "select * from Player
where Battletag = '$battletag' and Username = '$username' and Password = '$password' Email = '$email'
and $first_name = '$firstName' and $last_name = '$lastName'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num == 3){
    echo "email taken";
}else{
    $reg ="insert into Player (Battletag,Username,Password,Email,firstName,lastName) values ('$battletag','$username','$password','$email','$firstName','$lastName')";
    mysqli_query($conn,$reg);
    echo "signup successful";
}

?>