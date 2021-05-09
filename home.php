<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

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
    <br> Or view your matches below:

<?php
$result = mysqli_query("select * from Match_History");
echo "<tableborder='1'>
<th>MatchID</th>
<th>Game Status</th>
<th>Date</th>
</tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['MatchID'] . "</td>";
echo "<td>" . $row['Game_Status'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
</body>
</html>