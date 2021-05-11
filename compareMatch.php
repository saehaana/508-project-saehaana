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
    <style>
        table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #dddddd;
            }
            tr:nth-child(odd) {
                  background-color: gray;
                }
        </style>
<h1> Compare Matches</h1>
<p>Filter through your matches to find patterns in your games</p>
<h2>Table 1</h2>
<input id='myInput' placeholder="Filter here" onkeyup='searchTable()' type='text'>
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
    <th>Econ Score</th>
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
<td><?php echo $row['EconRatingNumber'];?></td>
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


<br><br>
<h3>Table 2</h3>
<input id='myInput2' placeholder="Filter here" onkeyup='searchTable2()' type='text'>
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
    <th>Econ Score</th>
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
<td><?php echo $row['EconRatingNumber'];?></td>
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

<br><br>
<h4>Table 3</h4>
<input id='myInput3' placeholder="Filter here" onkeyup='searchTable3()' type='text'>
    <table id='myTable3'>
    <tr>
    <th>Match ID</th>
    <th>Game Status</th>
    <th>Game Mode</th>
    <th>Date</th>
    <th>Map</th>
    <th>Agent</th>
    <th>Weapon</th>
    <th>Combat Score</th>
    <th>Econ Score</th>
    </tr>
<?php
$email = $_SESSION['email'];
$result3 = mysqli_query($conn,"select MatchID,Game_Status,Game_Type,Date,MapName,AgentName,WeaponName,RatingNumber,EconRatingNumber from Match_History join Game_Type using(MatchID) join Map using(MatchID) join Agent using(MatchID) join Weapon using(MatchID) join Combat_Rating using(MatchID) join Econ_Rating using(MatchID) where Email = '$email'");
?>
<?php while($row = mysqli_fetch_array($result3)):?>
<tr>
<td><?php echo $row['MatchID'];?></td>
<td><?php echo $row['Game_Status'];?></td>
<td><?php echo $row['Game_Type'];?></td>
<td><?php echo $row['Date'];?></td>
<td><?php echo $row['MapName'];?></td>
<td><?php echo $row['AgentName'];?></td>
<td><?php echo $row['WeaponName'];?></td>
<td><?php echo $row['RatingNumber'];?></td>
<td><?php echo $row['EconRatingNumber'];?></td>
</tr>
<?php endwhile;?>
</table>
<script>
function searchTable3() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput3");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable3");
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