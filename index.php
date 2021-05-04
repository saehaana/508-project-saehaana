<html>
<head>
    <title>Valorant Stat Tracker</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Valorant Stat Tracker</h1>
    <br>Welcome to Valorant Stat Tracker! Login below to view or add your matches.
    <br><div id="login">
            <h2>Login Here</h2>
            <form action="process.php" method="POST">
                <p>
                    <label>Username:</label>
                    <input type="text" id="username" name="username"/>
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" id="password" name="password"/>
                </p>
                <p>
                    <input type="submit" id="btn1" value="Register" name="Login"/>
                </p>
            </form>
        <div id="signup">
            <h3>Register Here</h3>
            <form action="signup.php" method="POST">
                <p>
                    <label>Username:</label>
                    <input type="text" id="username" name="username"/>
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" id="password" name="password"/>
                </p>
                <p>
                    <input type="submit" id="btn2" value="Register" name="Register"/>
                </p>
            </form>
        </div>

//<ul>
//    <li><a href="login.php">Login</a></li>
//</ul>
</body>
</html>