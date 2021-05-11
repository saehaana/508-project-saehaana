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
    <br> Filter games on our comparison page: <a href="compareMatch.php"> Compare Matches </a>
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
<script>
//  sortTable(f,n)
//  f : 1 ascending order, -1 descending order
//  n : n-th child(<td>) of <tr>
function sortTable(f,n){
    var rows = $('#mytable tbody  tr').get();

    rows.sort(function(a, b) {

        var A = getVal(a);
        var B = getVal(b);

        if(A < B) {
            return -1*f;
        }
        if(A > B) {
            return 1*f;
        }
        return 0;
    });

    function getVal(elm){
        var v = $(elm).children('td').eq(n).text().toUpperCase();
        if($.isNumeric(v)){
            v = parseInt(v,10);
        }
        return v;
    }

    $.each(rows, function(index, row) {
        $('#mytable').children('tbody').append(row);
    });
}
var f_sl = 1; // flag to toggle the sorting order
var f_nm = 1; // flag to toggle the sorting order
$("#sl").click(function(){
    f_sl *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_sl,n);
});
$("#nm").click(function(){
    f_nm *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_nm,n);
});
</script>
</body>
</html>