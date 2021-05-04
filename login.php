<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="frm">
        <form action="process.php" method="POST">
            <p>
                <label>Username:</label>
                <input type="text" id="username" name="username"/>
            </p>
            <p>
                <label>Password:</label>
                <input type="text" id="password" name="password"/>
            </p>
            <p>
                <input type="submit" id="btn" value="Login"/>
            </p>
        </form>
    </div>
</body>
</html>