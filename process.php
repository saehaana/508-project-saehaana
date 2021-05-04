<?php
    //get values from form in login.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    //prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    //connect to server and select database
    mysql_connect("localhost","root","","project_saehaana");
    mysql_select_db("Player");

    //query database for user
    $result = mysql_query("SELECT * from Player where Username = '$username' and Password = '$password'")
        or die("failed to query database".mysql_error());
    $row = mysql_fetch_array($result);
    if($row['Username'] == $username && $row['Password'] == $password){
        echo "Login successful, welcome " .$row['Username'];
    }else{
        echo "Failed to login";
    }

?>