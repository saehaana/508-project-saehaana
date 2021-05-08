<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from addMatch form
$Game_Status = $_POST['Game_Status'] ?? '';
$Game_Type = $_POST['Game_Type'] ?? '';
$Combat_Score = $_POST['Combat_Score']?? '';
$Agent = $_POST['Agent']?? '';
$Map = $_POST['Map']?? '';
$Weapon = $_POST['Weapon']?? '';
$email = $_POST['email']?? '';
if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
}
else{
    echo 'email not set';
}

//submit form to db and redirect to home.php
$queryInsert = "insert into Match_History (Email,Game_Status,Game_Type,Combat_Score,Agent,Map,Weapon)
values ('$email','$Game_Status','$Game_Type','$Combat_Score','$Agent','$Map','$Weapon')";
mysqli_query($conn,$queryInsert);
//echo "match added successfully, go back to view the match under match history";
?>