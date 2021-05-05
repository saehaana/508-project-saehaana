<?php include('signup.php'); ?>

<html>
<head>
    <title>Valorant Stat Tracker</title>
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
    <h1>Valorant Stat Tracker</h1>
    <br>Welcome to Valorant Stat Tracker! Login or register below to view or add your matches.
    <br><div id="Login">
            <h2>Login Here</h2>
            <p>Please enter username and password</p>
            <form action="signup.php" method="POST">
                <?php include('errors.php'); ?>
                <p>
                <label>Username:</label>
                <input type="text" name="username"/>
                </p>
                <p>
                <label>Password:</label>
                <input type="password" name="password"/>
                </p>
                <p>
                <input type="submit" value="Login" name="Login"/>
                </p>
            </form>
        <div id="Register">
            <h3>Register Here</h3>
            <p>Please fill in all fields below</p>
            <form action="signup.php" method="POST">
                <?php include('errors.php'); ?>
                <p>
                <label>Battletag:</label>
                <input type="text" placeholder="4 characters e.g. #NA1" name="battletag"/>
                </p>
                <p>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>"/>
                </p>
                <p>
                <label>Password:</label>
                <input type="password" name="password"/>
                </p>
                <p>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
                </p>
                <p>
                <label>First Name:</label>
                <input type="text" name="firstName">
                </p>
                <label>Last Name:</label>
                <input type="text" name="lastName">
                <p>
                <input type="submit" value="Register" name="Register"/>
                </p>
            </form>
        </div>
</body>
</html>