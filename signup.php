<?php
<html>
<body>

    <section class="main-container">
            <div class = main-wrapper>
                <h2>Sign-up</h2>
                    <form class = "signup-form" action="includes/signup-inc.php" method="POST">
                        <input type="text" name ="battletag" placeholder="#NA1*">
                        <input type="text" name ="username" placeholder="Username*">
                        <input type="password" name="password" placeholder="Password*">
                        <input type="text" name ="email" placeholder="emailname@gmail.com*">
                        <input type="text" name ="first" placeholder="First Name*">
                        <input type="text" name ="last" placeholder="Last Name*">

                        <button type="submit" name="submit">Sign up</button>
                    </form>
            </div>
        </section>

</body>
</html>
?>