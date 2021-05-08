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

//associate all agents with their agent type
if($Agent == Astra){$AgentType=$_POST['Controller'];}


//submit form to db
$queryInsert1 = "insert into Match_History (Email,Game_Status,Date)
values ('$email','$Game_Status','$date')";
mysqli_query($conn,$queryInsert1);

$queryInsert2 = "insert into Game_Type (MatchID,Game_Type) values ('$Match_ID','$Game_Type')";
mysqli_query($conn,$queryInsert2);

$queryInsert3 = "INSERT INTO Combat_Rating (Email,MatchID,RatingNumber) VALUES ('$email','$Match_ID','$Combat_Score')";
mysqli_query($conn,$queryInsert3);

$queryInsert4 = "INSERT INTO Map (MatchID,MapName) VALUES ('$Match_ID','$Map')";
mysqli_query($conn,$queryInsert4);

$queryInsert4 = "INSERT INTO Agent (Email,MatchID,AgentName,AgentType) VALUES ('$email','$Match_ID','$Agent','$AgentType')";
mysqli_query($conn,$queryInsert4);

echo "match added successfully, go back to view the match under match history";
?>