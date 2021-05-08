<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

//if user not logged in, redirect to index.php
if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
}
if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
}
else{
    echo 'email not set';
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
    <div id="addMatch">
        <h1>Match</h1>
        <p>Please select an option from each drop down box</p>
        <form action="matchData.php" method="POST">
        <label>Game Status:</label>
          <select id="Game_Status" name="Game_Status">
            <option value="Win">Win</option>
            <option value="Loss">Loss</option>
            <option value="Draw">Draw</option>
          </select>
        </form>
        <form action="matchData.php" method="POST">
        <label for="Game_Type">Game Type:</label>
          <select name="Game_Type">
            <option value="Ranked">Ranked</option>
            <option value="Unranked">Unranked</option>
          </select>
        </form>
        <form action="matchData.php" method="POST">
          <p>
          <label>Combat Score:</label>
          <input type="text" placeholder="Enter a number up to 3 digits e.g. 253" name="Combat_Score">
          </p>
        </form>
        <form action="matchData.php" method="POST">
        <label for="Agent">Agent:</label>
          <select name="Agent">
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
        </form>
        <form action="matchData.php" method="POST">
        <label for="Map">Map:</label>
          <select name="Map">
            <option value="Ascent">Ascent</option>
            <option value="Bind">Bind</option>
            <option value="Breeze">Breeze</option>
            <option value="Haven">Haven</option>
            <option value="Icebox">Icebox</option>
            <option value="Split">Split</option>
          </select>
        </form>
        </form>
        <form action="matchData.php" method="POST">
        <label for="Weapon">Weapon:</label>
          <select name="Weapon">
            <option value="Phantom">Phantom</option>
            <option value="Vandal">Vandal</option>
          </select>
          <br><br>
          <input type="submit" value="Submit">
        </form>
</body>
</html>