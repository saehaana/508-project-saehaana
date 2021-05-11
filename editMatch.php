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
    <title>Edit Match</title>
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
    <div id="editMatch">
        <h1>Edit Match</h1>
        <form action="matchDataUpdate.php" method="POST">
        <p>
        <label>Which Match are you updating for?:</label>
        <input type="text" placeholder="Enter Match ID" name="Match_ID">
        </p>
<p>Match History</p>
<input type="text" input id='myInput2' onkeyup='searchTable2()' placeholder="Search">
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

        <p>Please refill fields of the match you want to update</p>
        <p>Filling out a field indicates you are going to change your current value to the value you typed in</p>
        <p>e.g. 'Email: email@example.com' changes your current email to the email inputted</p>
        <p>
        <label>Email:</label>
        <input type="email" name="emailUpdate">
        </p>
        <p>
        <label>Date:</label>
        <input type="date" placeholder="mm/dd/yyyy" name="dateUpdate">
        </p>
        <label for="Game_Status">Game Status:</label>
        <select id="Game_StatusUpdate" name="Game_StatusUpdate">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Win">Win</option>
            <option value="Loss">Loss</option>
            <option value="Draw">Draw</option>
        </select>
        <label for="Game_Type">Game Type:</label>
        <select id="Game_TypeUpdate" name="Game_TypeUpdate">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Ranked">Ranked</option>
            <option value="Unranked">Unranked</option>
        </select>
        <p>
        <label>Combat Score :</label>
        <input type="text" placeholder="Enter a number up to 3 digits e.g. 253" name="Combat_ScoreUpdate">
        </p>
        <label for="Agent">Agent:</label>
        <select id = "AgentUpdate" name="AgentUpdate">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Astra">Astra</option>
            <option value="Breach">Breach</option>
            <option value="Brimstone">Brimstone</option>
            <option value="Cypher">Cypher</option>
            <option value="Jett">Jett</option>
            <option value="Killjoy">Killjoy</option>
            <option value="Omen">Omen</option>
            <option value="Phoenix">Phoenix</option>
            <option value="Raze">Raze</option>
            <option value="Reyna">Reyna</option>
            <option value="Sage">Sage</option>
            <option value="Skye">Skye</option>
            <option value="Sova">Sova</option>
            <option value="Viper">Viper</option>
            <option value="Yoru">Yoru</option>
        </select>
        <label for="Map">Map:</label>
        <select id="MapUpdate" name="MapUpdate">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Ascent">Ascent</option>
            <option value="Bind">Bind</option>
            <option value="Breeze">Breeze</option>
            <option value="Haven">Haven</option>
            <option value="Icebox">Icebox</option>
            <option value="Split">Split</option>
        </select>
        <label for="Weapon">Weapon:</label>
        <select id="WeaponUpdate" name="WeaponUpdate">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Phantom">Phantom</option>
            <option value="Vandal">Vandal</option>
        </select>
        <br><br>
        <input type="submit">
        </form>
    </div>
</body>
</html>