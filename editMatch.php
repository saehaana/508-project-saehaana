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
        <h1>Login Here</h1>
        <p>Please enter username and password</p>
        <form action="process.php" method="POST">
        <p>
        <label>Username:</label>
        <input type="text" name="username">
        </p>
        <p>
        <label>Password:</label>
        <input type="password" name="password">
        </p>
        <p>
        <input type="submit" value="Login" name="Login">
        </p>
        </form>

</body>
</html>