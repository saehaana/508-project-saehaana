<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from addMatch form
$email = $_SESSION['email'];
$date = $_POST['date'];

if($Match_ID == $_POST['']){
;}else{$Match_ID = $_POST['Match_ID'];}

if($Game_Status == $_POST['']){
;}else{$Game_Status = $_POST['Game_Status'];}

if($Game_Type == $_POST['']){
;}else{$Game_Type = $_POST['Game_Type'];}

if($Combat_Score == $_POST['']){
;}else{$Combat_Score = $_POST['Combat_Score'];}

if($Agent == $_POST['']){
;}else{$Agent = $_POST['Agent'];}

if($Map == $_POST['']){
;}else{$Map = $_POST['Map'];}

if($Weapon == $_POST['']){
;}else{$Weapon = $_POST['Weapon'];}

//associate all agents with their agent type
$AgentType;
if($Agent == 'Astra' || $Agent == 'Brimstone' || $Agent == 'Omen' || $Agent == 'Viper'){$AgentType = 'Controller';}
if($Agent == 'Breach' || $Agent == 'Skye' || $Agent == 'Sova'){$AgentType = 'Initiator';}
if($Agent == 'Cypher' || $Agent == 'Killjoy' || $Agent == 'Sage'){$AgentType = 'Sentinel';}
if($Agent == 'Jett' || $Agent == 'Phoenix' || $Agent == 'Raze' || $Agent == '$Reyna' || $Agent == 'Yoru'){$AgentType = 'Duelist';}

//associate weapons with weapon type
$WeaponType;
if($Weapon == 'Phantom' || $Weapon == 'Vandal'){$WeaponType = 'Rifle';}

//submit form to db
$queryInsert1 = "insert into Match_History (Email,MatchID,Game_Status,Date) values ('$email','$Match_ID','$Game_Status','$date')";
mysqli_query($conn,$queryInsert1);

$queryInsert2 = "insert into Game_Type (MatchID,Game_Type) values ('$Match_ID','$Game_Type')";
mysqli_query($conn,$queryInsert2);

$queryInsert3 = "INSERT INTO Combat_Rating (MatchID,RatingNumber) VALUES ('$Match_ID','$Combat_Score')";
mysqli_query($conn,$queryInsert3);

$queryInsert4 = "INSERT INTO Map (MatchID,MapName) VALUES ('$Match_ID','$Map')";
mysqli_query($conn,$queryInsert4);

$queryInsert4 = "INSERT INTO Agent (MatchID,AgentName,AgentType) VALUES ('$Match_ID','$Agent','$AgentType')";
mysqli_query($conn,$queryInsert4);

$queryInsert5 = "INSERT INTO Weapon (MatchID,WeaponName,WeaponType) VALUES ('$Match_ID','$Weapon','$WeaponType')";
mysqli_query($conn,$queryInsert5);

echo "match added successfully, click home button below to view the match under match history or add another match";
?>
<!DOCTYPE HTML>
<html>
<body>
<p>
<a href="home.php">Home</a>
</p>
<p>
<a href="addMatch.php">Add another match</a>
</p>
</body>
</html>