<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//if user not logged in, redirect to index.php
if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <style>
        body{
        background-image: url('cover.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        }
    </style>
    <a href="logout.php"> Logout </a>
    <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
    <p> Things to do: </p>
    <br> Add matches to your match history: <a href="addMatch.php"> Add Matches </a>
    <br> Edit stats for a match you already entered: <a href="editMatch.php"> Edit Matches </a>
    <p> Or view your matches below: </p>
    <style>
    table, th, td {
      border: 1px solid black;
    }
    </style>
    <h2>Match History</h2>
    <input type="text" id="search" placeholder="type to search" />
<?php
$email = $_SESSION['email'];
$result = mysqli_query($conn,"select MatchID,Game_Status,Game_Type,Date,MapName,AgentName,WeaponName,RatingNumber from Match_History join Game_Type using(MatchID) join Map using(MatchID) join Agent using(MatchID) join Weapon using(MatchID) join Combat_Rating using(MatchID) where Email = '$email'");
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
?>
<script>
function showAgent(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getAgent.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<select name="agents" onchange="getAgent(this.value)">
            <option value="1">Astra</option>
            <option value="2">Breach</option>
            <option value="3">Brimstone</option>
            <option value="4">Cypher</option>
            <option value="5">Jett</option>
            <option value="6">Killjoy</option>
            <option value="7">Omen</option>
            <option value="8">Phoenix</option>
            <option value="9">Raze</option>
            <option value="10">Reyna</option>
            <option value="11">Sage</option>
            <option value="12">Skye</option>
            <option value="13">Sova</option>
            <option value="14">Viper</option>
            <option value="15">Yoru</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Matches with selected agent will be listed here...</b></div>
</body>
</html>