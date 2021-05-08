<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from addMatch form
$email = $_POST['email'];
$Match_ID = $_POST['Match_ID'];
$date = $_POST['date'];
$Game_Status = $_POST['Game_Status'];
$Game_Type = $_POST['Game_Type'];
$Combat_Score = $_POST['Combat_Score'];
$Agent = $_POST['Agent'];
$Map = $_POST['Map'];
$Weapon = $_POST['Weapon'];


//submit form to db
$queryInsert = "insert into Match_History (Email,MatchID,Game_Status,Date)
values ('$email','$Match_ID','$Game_Status','$date')";
mysqli_query($conn,$queryInsert);
echo "match added successfully, go back to view the match under match history";
?>