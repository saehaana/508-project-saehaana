<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

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
    <div id="addMatch">
        <h1>Match</h1>
        <p>Please select an option from each drop down box</p>
        <form action="matchData.php" method="POST">
        <label for="Match_History">Game status:</label>
          <select name="Match_History" id="Match_History">
            <option value="Win">Win</option>
            <option value="Loss">Loss</option>
            <option value="Draw">Draw</option>
          </select>
          <br><br>
          <input type="submit" value="Submit">
        </form>
        <form action="matchData.php" method="POST">
        <label for="Game_Mode">Game type:</label>
          <select name="Game_Mode" id="Game_Mode">
            <option value="Ranked">Ranked</option>
            <option value="Unranked">Unranked</option>
          </select>
          <br><br>
          <input type="submit" value="Submit">
        </form>
        <form action="matchData.php" method="POST">
          <p>
          <label>Combat Score:</label>
          <input type="text" placeholder="Enter a number up to 3 digits e.g. 253" name="Combat Score">
          </p>
          <input type="submit" value="Combat_score" name="Combat_score">
          </p>
        </form>
        <form action="matchData.php" method="POST">
        <label for="Agent">Agent:</label>
          <select name="Agent" id="Agent">
            <option value="Astra"></option>
            <option value="Breach"></option>
            <option value="Brimstone"></option>
            <option value="Cypher"></option>
            <option value="Jett"></option>
            <option value="Killjoy"></option>
            <option value="Omen"></option>
            <option value="Phoenix"></option>
            <option value="Raze"></option>
            <option value="Reyna"></option>
            <option value="Sage"></option>
            <option value="Skye"></option>
            <option value="Sova"></option>
            <option value="Viper"></option>
            <option value="Yoru"></option>
          </select>
          <br><br>
          <input type="submit" value="Submit">
        </form>
        <form action="matchData.php" method="POST">
        <label for="Map">Map:</label>
          <select name="Map" id="Map">
            <option value="Ascent">Ascent</option>
            <option value="Bind">Breeze</option>
            <option value="Breeze">Breeze</option>
            <option value="Haven">Breeze</option>
            <option value="Icebox">Breeze</option>
            <option value="Split">Breeze</option>
          </select>
          <br><br>
          <input type="submit" value="Submit">
        </form>
        </form>
        <form action="matchData.php" method="POST">
        <label for="Weapon">Weapon:</label>
          <select name="Weapon" id="Weapon">
            <option value="Phantom">Phantom</option>
            <option value="Vandal">Vandal</option>
          </select>
          <br><br>
          <input type="submit" value="Submit">
        </form>
</body>
</html>
