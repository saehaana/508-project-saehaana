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
                <input type="submit" id="btn1" value="Login" name="Login"/>
                </p>
            </form>
        <div id="signup">
            <h3>Register Here</h3>
            <p>Please fill in all fields below</p>
            <form action="signup.php" method="POST">
                <p>
                <label>Battletag:</label>
                <input type="text" id="battletag" placeholder="4 characters e.g. #NA1" name="battletag"/>
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
                <input type="text" id="first_name" name="firstName">
                </p>
                <label>Last Name:</label>
                <input type="text" id="last_name" name="lastName">
                <p>
                <input type="submit" id="btn2" value="Register" name="Register"/>
                </p>
            </form>
        </div>
</body>
</html>