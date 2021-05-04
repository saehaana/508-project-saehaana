<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="login">
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
                <input type="submit" id="btn" name="Login"/>
            </p>
        </form>
    </div>
    <div id="signup">
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
                    <input type="submit" id="btn" name="Register"/>
                </p>
            </form>
        </div>
</body>
</html>