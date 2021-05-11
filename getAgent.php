<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

$result = mysqli_query($conn,"select MatchID,Game_Status,Game_Type,Date,MapName,AgentName,WeaponName,RatingNumber from Match_History join Game_Type using(MatchID) join Map using(MatchID) join Agent using(MatchID) join Weapon using(MatchID) join Combat_Rating using(MatchID) where AgentName = '".$q."'");

echo"
<table>
<tr>
<th>Match ID</th>
<th>Game Status</th>
<th>Game Mode</th>
<th>Date</th>
<th>Map</th>
<th>Agent</th>
<th>Weapon</th>
<th>Combat Score</th>
</tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['MatchID'] . "</td>";
echo "<td>" . $row['Game_Status'] . "</td>";
echo "<td>" . $row['Game_Type'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "<td>" . $row['MapName'] . "</td>";
echo "<td>" . $row['AgentName'] . "</td>";
echo "<td>" . $row['WeaponName'] . "</td>";
echo "<td>" . $row['RatingNumber'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>