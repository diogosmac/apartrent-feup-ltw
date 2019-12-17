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
        <img src="../resources/logo-black.png" alt="" id="logo">
    </a>
    <header>Sign Up</header>

    <script src="../js/confirmPasswords.js"></script>
    <form method="POST" action="../actions/signupAction.php" onsubmit="return checkMatch();">
        <div class="container">
            <div class="Name"><input type="text" name="name" placeholder="Name"
            pattern="^(?!.*[ ] {1})^[A-Za-zéáãç ]{1,20}$" 
            title="Names can only have letters, no numbers nor special caracters"
            required></div>

            <div class="Email"><input type="email" name="email" placeholder="Email" required></div>

            <div class="Username"><input type="text" name="username" placeholder="Username" 
            pattern='^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{5,16}$'
            title="A username must have between 5 and 16 characters. Only special characters allowed: _ and ."
            required></div>
            
            <div class="Password"><input type="password" id="password" name="password" placeholder="Password"
                                         pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,64})" 
                                         title="Password must contain at least 8 characters, with one Uppercase letter, one lowercase letter, one number and one special character."
                                         required onkeyup='checkMatch();'></div>

            <div class="ConfPassword"><input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required onkeyup='checkMatch();'></div>
            <span id='message'></span>
            <div class="Register"><input type="submit" name="register_button" value="Submit"></div>
        </div>
    </form>

    <a href="login.php">I already have an account</a>

</body>

</html>
