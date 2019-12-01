<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <title>Sign Up - ApartRent</title>
    <meta charset="UTF-8">
    <link href="css/signup.css" rel="stylesheet">
</head>

<body>
    <a href="index.php">
        <img src="resources/logo-black.png" alt="" id="logo">
    </a>
    <header>Sign Up</header>

    <form method="POST" action="actions/signup_action.php">
        <div class="container">
            <div class="Name"><input type="text" name="name" placeholder="Name" required></div>
            <div class="Email"><input type="email" name="email" placeholder="Email" required></div>
            <div class="Username"><input type="text" name="username" placeholder="Username" required></div>
            <div class="Password"><input type="password" name="password" placeholder="Password" required></div>
            <div class="ConfPassword"><input type="password" name="confirm_password" placeholder="Confirm Password" required></div>
            <div class="Register"><input type="submit" name="register_button" value="Submit"></div>
        </div>
    </form>

    <a href="login.php">I already have an account</a>

</body>

</html>