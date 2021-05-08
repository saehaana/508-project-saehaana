<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from editMatch form
$email = $_SESSION['email'];
$Match_ID = $_POST['Match_ID'];
$date = $_SESSION['date'];
$Game_Status = $_SESSION['Game_Status'];
$Game_Type = $_SESSION['Game_Type'];
$Combat_Score = $_SESSION['Combat_Score'];
$Agent = $_SESSION['Agent'];
$Map = $_SESSION['Map'];
$Weapon = $_SESSION['Weapon'];

$emailUpdate = $_POST['emailUpdate'];
$dateUpdate = $_POST['dateUpdate'];
$Game_StatusUpdate = $_POST['Game_Status'];
$Game_TypeUpdate = $_POST['Game_Type'];
$Combat_ScoreUpdate = $_POST['Combat_Score'];
$AgentUpdate = $_POST['Agent'];
$MapUpdate = $_POST['Map'];
$WeaponUpdate = $_POST['Weapon'];


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
$queryUpdate1 = "UPDATE Player SET Email = '$emailUpdate' where Email = '$email'";
mysqli_query($conn,$queryUpdate1);

$queryUpdate2 = "UPDATE Match_History SET Email = '$emailUpdate' where Email = '$email'";
mysqli_query($conn,$queryUpdate2);

$queryUpdate3 = "UPDATE Game_Type SET Game_Type = '$Game_TypeUpdate' where Email = '$email'";
mysqli_query($conn,$queryUpdate3);

echo "match added successfully, go back to view the match under match history";
?>