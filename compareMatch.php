<!DOCTYPE HTML>
<html>
<head>
    <title>Compare Match</title>
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
    <a href="home.php"> Home </a>
    <br>
    <a href="logout.php"> Logout </a>
<h1> Compare Matches</h1>
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

<input id='myInput2' onkeyup='searchTable2()' type='text'>
    <table id='myTable2'>
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
$result2 = mysqli_query($conn,"select MatchID,Game_Status,Game_Type,Date,MapName,AgentName,WeaponName,RatingNumber from Match_History join Game_Type using(MatchID) join Map using(MatchID) join Agent using(MatchID) join Weapon using(MatchID) join Combat_Rating using(MatchID) where Email = '$email'");
?>
<?php while($row = mysqli_fetch_array($result2)):?>
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
function searchTable2() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable2");
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