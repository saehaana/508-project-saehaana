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

$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($conn,$sql);

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
mysqli_close($con);
?>
</body>
</html>