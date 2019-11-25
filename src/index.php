<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <title> Home - ApartRent </title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href="index.php">
            <img src="resources/logo-white.png" alt="" id="logo">
        </a>
        <div class="signup">
            <a href="login.php"> Log in </a>
            <a href="signup.php"> Sign up </a>
        </div>
    </header>

    <form class="apartmentSearch">
        <div class="flex-container">
            <div>
                <h2>Rent your apartment now!</h2>
            </div>
            <div><label>WHERE</label></div>
            <div> <input type="text"></div>
            <div><label>CHECKIN </label></div>
            <div><input type="date"></div>
            <div><label>CHECKOUT</label></div>
            <div><input type="date"></div>
            <div><button formaction="search.php" formmethod="post">GO!</button></div>
            <div>or... <button formaction="random.php" formmethod="post">Surprise me!</button></div>
        </div>
    </form>
</body>

</html>