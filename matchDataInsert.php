<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

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

//get values from addMatch form
$email = $_SESSION['email'];
$Match_ID = check_input($_POST['Match_ID'],"Match ID required");
$date = check_input($_POST['date'],"Date required");
$Game_Status = check_input($_POST['Game_Status'],"Game Status required");
$Game_Type = check_input($_POST['Game_Type'],"Game Type required");
$Combat_Score = check_input($_POST['Combat_Score'],"Combat Score required");
$Econ_Score = check_input($_POST['Econ_Score'],"Econ Score required");
$Agent = check_input($_POST['Agent'],"Agent required");
$Map = check_input($_POST['Map'],"Map required");
$Weapon = check_input($_POST['Weapon'],"Weapon required");

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

$queryInsert4 = "INSERT INTO Econ_Rating (MatchID,EconRatingNumber) VALUES ('$Match_ID','$Econ_Score')";
mysqli_query($conn,$queryInsert4);

$queryInsert5 = "INSERT INTO Map (MatchID,MapName) VALUES ('$Match_ID','$Map')";
mysqli_query($conn,$queryInsert5);

$queryInsert5 = "INSERT INTO Agent (MatchID,AgentName,AgentType) VALUES ('$Match_ID','$Agent','$AgentType')";
mysqli_query($conn,$queryInsert5);

$queryInsert6 = "INSERT INTO Weapon (MatchID,WeaponName,WeaponType) VALUES ('$Match_ID','$Weapon','$WeaponType')";
mysqli_query($conn,$queryInsert6);

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