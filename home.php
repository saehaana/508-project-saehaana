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

<p> Or maybe try the search filter to compare your games with the above</p>
<input id='myInput' onkeyup='searchTable()' type='text'>
    <table id='myTable'>
    <tr>
    <th>Match ID</th>
    <th>Game Status</th>
    <th>Game Mode</th>
    <th>Date</th>
    <th>Map</th>
    <th>Agent</th>
    <th>Weapon</th>
    <th>Combat Score</th>
    </tr>
<?php
$email = $_SESSION['email'];
$result = mysqli_query($conn,"select MatchID,Game_Status,Game_Type,Date,MapName,AgentName,WeaponName,RatingNumber from Match_History join Game_Type using(MatchID) join Map using(MatchID) join Agent using(MatchID) join Weapon using(MatchID) join Combat_Rating using(MatchID) where Email = '$email'");
?>
<?php while($row = mysqli_fetch_array($result)):?>
<tr>
<td><?php echo $row['MatchID'];?></td>
<td><?php echo $row['Game_Status'];?></td>
<td><?php echo $row['Game_Type'];?></td>
<td><?php echo $row['Date'];?></td>
<td><?php echo $row['MapName'];?></td>
<td><?php echo $row['AgentName'];?></td>
<td><?php echo $row['WeaponName'];?></td>
<td><?php echo $row['RatingNumber'];?></td>
</tr>
<?php endwhile;?>
</table>
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
</body>
</html>