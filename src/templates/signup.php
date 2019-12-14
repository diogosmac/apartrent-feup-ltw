<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <title>Sign Up - ApartRent</title>
    <meta charset="UTF-8">
    <link href="../css/signup.css" rel="stylesheet">
</head>

<body>
    <a href="index.php">
        <img src="../resources/logo-#000.png" alt="" id="logo">
    </a>
    <header>Sign Up</header>

    <script src="../js/confirmPasswords.js"></script>
    <form method="POST" action="../actions/signupAction.php" onsubmit="return checkMatch();">
        <div class="container">
            <div class="Name"><input type="text" name="name" placeholder="Name"
            pattern="^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$" 
            title="Names can only have letters, no numbers nor special caracters"
            required></div>

            <div class="Email"><input type="email" name="email" placeholder="Email" required></div>

            <div class="Username"><input type="text" name="username" placeholder="Username" 
            pattern='^(?=.{5,12}$)(?!.*[._-]{2})[a-zA-Z][a-zA-Z0-9._-]*[a-zA-Z0-9]$'
            title="A username must have between 5 and 12 characters. It cannot start nor end with special characters and those cannot appear more than once in a row"
            required></div>
            
            <div class="Password"><input type="password" id="password" name="password" placeholder="Password"
                                         pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" 
                                         title="Password must contain at least 8 characters, with one Uppercase letter, one lowercase letter, and one number"
                                         required onkeyup='checkMatch();'></div>

            <div class="ConfPassword"><input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required onkeyup='checkMatch();'></div>
            <span id='message'></span>
            <div class="Register"><input type="submit" name="register_button" value="Submit"></div>
        </div>
    </form>

    <a href="login.php">I already have an account</a>

</body>

</html>
