<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

session_start();
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from addMatch form
$game_status = $_POST['Game_Status'];
$game_type = $_POST['Game_Type'];
$combat_score = $_POST['Combat_Score'];
$agent = $_POST['Agent'];
$map = $_POST['Map'];
$weapon = $_POST['Weapon'];

//submit form to db and redirect to home.php
$queryInsert = "insert into Match_History (Game_Status,Game_Mode,Combat_Score,Agent,Map,Weapon)
values ('$game_status','$game_type','$combat_score','$agent','$map','$weapon')";
mysqli_query($conn,$queryInsert);
echo "match added successfully, go back to view the match under match history";
?>