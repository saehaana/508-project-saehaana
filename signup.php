<?php
session_start();

$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from Player where Username = '$username' and Password = '$password'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num == 1){
    echo "username taken";
}else{
    $reg ="insert into Player (Username,Password) values ('$username', '$password')";
    mysqli_query($conn,$reg);
    echo "signup successful";
}

?>