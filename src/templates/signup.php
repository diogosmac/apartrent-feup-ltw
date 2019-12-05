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

    <form method="POST" action="../actions/signupAction.php">
        <div class="container">
            <div class="Name"><input type="text" name="name" placeholder="Name" required></div>
            <div class="Email"><input type="email" name="email" placeholder="Email" required></div>
            <div class="Username"><input type="text" name="username" placeholder="Username" required></div>
            <div class="Password"><input type="password" name="password" placeholder="Password"
                                         pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" 
                                         title="Password must contain at least 8 characters, with one Uppercase letter, one lowercase letter, and one number"
                                         required></div>
            <div class="ConfPassword"><input type="password" name="confirm_password" placeholder="Confirm Password" required></div>
            <div class="Register"><input type="submit" name="register_button" value="Submit"></div>
        </div>
    </form>

    <a href="login.php">I already have an account</a>

</body>

</html>
