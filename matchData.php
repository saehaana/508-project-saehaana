<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

session_start();
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');
if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
}
else{
    echo 'email not set';
}

//get values from addMatch form
$Game_Status = $_POST['Game_Status'];
$Game_Type = $_POST['Game_Type'];
$Combat_Score = $_POST['Combat_Score'];
$Agent = $_POST['Agent'];
$Map = $_POST['Map'];
$Weapon = $_POST['Weapon'];


//submit form to db and redirect to home.php
$queryInsert = "insert into Match_History (Email,Game_Status,Game_Type,Combat_Score,Agent,Map,Weapon)
values (echo $_SESSION['email'],'$Game_Status','$Game_Type','$Combat_Score','$Agent','$Map','$Weapon')";
mysqli_query($conn,$queryInsert);
//echo "match added successfully, go back to view the match under match history";
?>