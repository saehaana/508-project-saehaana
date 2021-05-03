<?php
require_once('connections.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<form method='post' action='addMatch.php'>";
    echo "<table style ='border: solid 1px black;>'";
    echo "<tbody>";
    echo "<tr><td>First name</td><td><input name='first_name' type='text' size='25'></td></tr>";
    echo "<tr><td>Last name</td><td><input name='last_name' type='text' size='25'></td></tr>";
    echo "<tr><td>Email</td><td><input name='email' type='email' size='25'></td></tr>";
    echo "<tr><td>Salary</td><td><input name='salary' type='number' min='0.01' step='0.01' size='8'></td></tr>";
    echo "<tr><td>Manager</td><td>";



}
?>