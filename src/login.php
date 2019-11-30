<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <title>Log In - ApartRent</title>
    <meta charset="UTF-8">

    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <a href="index.php">
        <img src="resources/logo-black.png" alt="" id="logo">
    </a>
    <header>Log In</header>

    <form method="POST" action="actions/login_action.php">
        <div class="container">
            <div class="Username"> <input type="text" name="username" placeholder="Username/Email" required> </div>
            <div class="Password"> <input type="password" name="password" placeholder="Password" required> </div>
            <div class="Login"> <input type="submit" name="login_button" value="Login"> </div>
        </div>
    </form>

    <div class="bottom-container">
        <a href="signup.php">I don't have an account</a>
    </div>

</body>

</html>