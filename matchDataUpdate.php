<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from editMatch form
$email = $_SESSION['email'];
$Match_ID = $_POST['Match_ID'];
$emailUpdate = $_POST['emailUpdate'];
$dateUpdate = $_POST['dateUpdate'];
$Game_StatusUpdate = $_POST['Game_StatusUpdate'];
$Game_TypeUpdate = $_POST['Game_TypeUpdate'];
$Combat_ScoreUpdate = $_POST['Combat_ScoreUpdate'];
$AgentUpdate = $_POST['AgentUpdate'];
$MapUpdate = $_POST['MapUpdate'];
$WeaponUpdate = $_POST['WeaponUpdate'];


//associate all agents with their agent type
$AgentTypeUpdate;
if($AgentUpdate == 'Astra' || $AgentUpdate == 'Brimstone' || $AgentUpdate == 'Omen' || $AgentUpdate == 'Viper'){$AgentTypeUpdate = 'Controller';}
if($AgentUpdate == 'Breach' || $AgentUpdate == 'Skye' || $AgentUpdate == 'Sova'){$AgentTypeUpdate = 'Initiator';}
if($AgentUpdate == 'Cypher' || $AgentUpdate == 'Killjoy' || $AgentUpdate == 'Sage'){$AgentTypeUpdate = 'Sentinel';}
if($AgentUpdate == 'Jett' || $AgentUpdate == 'Phoenix' || $AgentUpdate == 'Raze' || $AgentUpdate == '$Reyna' || $AgentUpdate == 'Yoru'){$AgentTypeUpdate = 'Duelist';}

//associate weapons with weapon type
$WeaponTypeUpdate;
if($WeaponUpdate == 'Phantom' || $WeaponUpdate == 'Vandal'){$WeaponTypeUpdate = 'Rifle';}

//submit form to db
if($Match_ID == 1){
    if($emailUpdate != ''){
        $queryUpdate1 = "UPDATE Player SET Email = '$emailUpdate' where Email = '$email' AND MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate1);
    }else{
        ;
    }
    if($emailUpdate != ''){
        $queryUpdate2a = "UPDATE Match_History SET Email = '$emailUpdate' where Email = '$email'";
        mysqli_query($conn,$queryUpdate2a);
    }else{
        ;
    }
    if($Game_StatusUpdate != ''){
        $queryUpdate2b = "UPDATE Match_History SET Game_Status = '$Game_StatusUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate2b);
    }else{
        ;
    }
    if($dateUpdate != ''){
        $queryUpdate2c = "UPDATE Match_History SET Date = '$dateUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate2c);
    }else{
        ;
    }
    if($Game_TypeUpdate != ''){
        $queryUpdate3 = "UPDATE Game_Type SET Game_Type = '$Game_TypeUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate3);
    }else{
        ;
    }
    if($Combat_ScoreUpdate != ''){
        $queryUpdate4 = "UPDATE Combat_Rating SET RatingNumber = '$Combat_ScoreUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate4);
    }else{
        ;
    }
    if($MapUpdate != ''){
        $queryUpdate4 = "UPDATE Map SET MapName = '$MapUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate4);
    }else{
        ;
    }
    if($AgentUpdate != ''){
        $queryUpdate5a = "UPDATE Agent SET AgentName = '$AgentUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate5a);
    }else{
        ;
    }
    if($AgentUpdate != ''){
        $queryUpdate5b = "UPDATE Agent SET AgentType = '$AgentTypeUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate5b);
    }else{
        ;
    }
if($WeaponUpdate != ''){
        $queryUpdate6a = "UPDATE Weapon SET WeaponName = '$WeaponUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate6a);
    }else{
        ;
    }
if($WeaponUpdate != ''){
        $queryUpdate6b = "UPDATE Weapon SET WeaponType = '$WeaponTypeUpdate' where MatchID = '$Match_ID'";
        mysqli_query($conn,$queryUpdate6b);
    }else{
        ;
    }
}else{
    echo "No match found for Match ID: $Match_ID";
}
echo "match added successfully, go back to view the match under match history";
?>