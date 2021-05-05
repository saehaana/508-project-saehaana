<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

session_start();
//if user not logged in, redirect to index.php
/*if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
}
//if user clicks logout, redirect to index.php
if (isset($_GET['logout'])) {
    session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
}***/
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <a href="logout.php"> Logout </a>
    <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
    <p> Things to do: </p>
    <br> Add matches to your match history:
    <br> Edit stats for a match you already entered:
    <br> Or view your matches below:
</body>
</html>