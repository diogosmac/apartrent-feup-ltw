<!DOCTYPE html>
<html lang="en-US">
<html>
    <head>
        <title> ApartRent </title>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
    </head>

    <body>
        <header> <h1> ApartRent <h1> </header>

        <a href="login.php"> Log in </a>
        <a href="signup.php"> Sign up </a>

        <form>
                <div class="flex-container">
                    <div><h2>Rent your apartment now!</h2></div>
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