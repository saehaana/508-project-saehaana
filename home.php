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
    <table id='myTable'>
    <tr>
    <th id ="mID">Match ID</th>
    <th id ="gs">Game Status</th>
    <th id="gm">Game Mode</th>
    <th id="d">Date</th>
    <th id="m">Map</th>
    <th id="a">Agent</th>
    <th id="w">Weapon</th>
    <th id="cs">Combat Score</th>
    </tr>
<?php
$email = $_SESSION['email'];
$result = mysqli_query($conn,"select MatchID,Game_Status,Game_Type,Date,MapName,AgentName,WeaponName,RatingNumber from Match_History join Game_Type using(MatchID) join Map using(MatchID) join Agent using(MatchID) join Weapon using(MatchID) join Combat_Rating using(MatchID) where Email = '$email'");
?>
<?php while($row = mysqli_fetch_array($result)):?>
<tbody>
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
</tbody>
</table>
<script>
//  sortTable(f,n)
//  f : 1 ascending order, -1 descending order
//  n : n-th child(<td>) of <tr>
function sortTable(f,n){
    var rows = $('#myTable tbody  tr').get();

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
        $('#myTable').children('tbody').append(row);
    });
}
var f_mID = 1; // flag to toggle the sorting order
var f_gs = 1; // flag to toggle the sorting order
var f_gm = 1; // flag to toggle the sorting order
var f_d = 1; // flag to toggle the sorting order
var f_m = 1; // flag to toggle the sorting order
var f_a = 1; // flag to toggle the sorting order
var f_w = 1; // flag to toggle the sorting order
var f_cs = 1; // flag to toggle the sorting order
$("#mID").click(function(){
    f_mID *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_mID,n);
});
$("#gs").click(function(){
    f_gs *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_gs,n);
});
$("#gm").click(function(){
    f_gm *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_gm,n);
});
$("#d").click(function(){
    f_d *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_d,n);
});
$("#m").click(function(){
    f_m *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_m,n);
});
$("#a").click(function(){
    f_a *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_a,n);
});
$("#w").click(function(){
    f_w *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_w,n);
});
$("#cs").click(function(){
    f_cs *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_cs,n);
});
</script>

</body>
</html>