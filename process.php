<?php
    //get values from form in login.php
    if(isset($_POST['submit'])){
        $servername = "localhost";
        $username = "root";
        $password = "V00797462";
        $database = "project_saehaana";

        $conn = mysqli_connect($dbServername,$dbusername,$dbpassword,$dbname);
        $username = ($conn,$_POST['username']);
        $password = ($conn,$_POST['password']);
    }

    //prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    //connect to server and select database
    mysqli_connect("localhost","root","","project_saehaana");
    mysqli_select_db("Player");

    //query database for user
    $result = mysqli_query($conn,"SELECT * from Player where Username = '".$username."' and Password = '".$password."'")
        or die("failed to query database".mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if($row['Username'] == $username && $row['Password'] == $password){
        echo "Login successful, welcome " .$row['Username'];
    }else{
        echo "Failed to login";
    }

?>