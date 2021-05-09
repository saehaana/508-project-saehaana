<!DOCTYPE HTML>
<html>
<head>
    <title>Valorant Stat Tracker</title>

<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
//get values from login form
$username;
$password;
$email;

$usernameErr;
$passwordErr;
$emailErr;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"])){
        $usernameErr = "Username required";
    }else{
        $username = test_input($POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
              $usernameErr = "Only letters and white space allowed";
        }
    }
    if(empty($_POST["password"])){
        $passwordErr = "Password required";
    }else{
        $password = test_input($POST["password"]);
    }
    if(empty($_POST["email"])){
        $emailErr = "email required";
    }else{
        $email = test_input($POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
        }
    }
}

function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
    <h1>Valorant Stat Tracker</h1>
    <br>Welcome to Valorant Stat Tracker! Login or register below to view or add your matches.
    <br><div id="Login">
            <h2>Login Here</h2>
            <p><span class="error">* required field</span></p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <p>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
                </p>
                <p>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username;?>">
                <span class="error">* <?php echo $usernameErr;?></span>
                </p>
                <p>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $password;?>">
                <span class="error">* <?php echo $passwordErr;?></span>
                </p>
                <p>
                <input type="submit" value="Login" name="Login">
                </p>

            </form>
        <div id="Register">
            <h3>Register Here</h3>
            <p>Please fill in all fields below</p>
            <form action="register.php" method="POST">
                <p>
                <label>Battletag:</label>
                <input type="text" placeholder="4 characters e.g. #NA1" name="battletag">
                </p>
                <p>
                <label>Username:</label>
                <input type="text" name="username">
                </p>
                <p>
                <label>Password:</label>
                <input type="password" name="password">
                </p>
                <p>
                <label>Email:</label>
                <input type="email" name="email" >
                </p>
                <p>
                <label>First Name:</label>
                <input type="text" name="firstName">
                </p>
                <p>
                <label>Last Name:</label>
                <input type="text" name="lastName">
                </p>
                <p>
                <input type="submit" value="Register" name="Register">
                </p>
            </form>
        </div>
</body>
</html>
<?php
session_start();
//error handling
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//login the user and redirect to home.php
$query = "SELECT * FROM Player WHERE Username = '$username' AND Password = '$password'";
$results = mysqli_query($conn,$query);
$num = mysqli_num_rows($results);
if($num == 1){
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('location: home.php');
}else{
    header('location: index.php');
}
?>