<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>

<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <a href="logout.php"> Logout </a>
    <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
</body>
</html>