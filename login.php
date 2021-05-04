<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="login">
        <h1>Login Here</h1>
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
        <h2>Register Here</h2>
        <form action="signup.php" method="POST">
            <p>
                <label>Battletag:</label>
                <input type="text" id="battletag" name="battletag"/>
            </p>
            <p>
                <label>Username:</label>
                <input type="text" id="username" name="username"/>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="password" name="password"/>
            </p>
            <p>
                <label>Email:</label>
                <input type="email" id="email" name="email">
            </p>
            <p>
                <label>First Name:</label>
                <input type="first_name" id="first_name" name="firstName">
            </p>
                <label>Last Name:</label>
                <input type="last_name" id="last_name" name="lastName">
            <p>
                <input type="submit" id="btn2" value="Register" name="Register"/>
            </p>
        </form>
    </div>
</body>
</html>