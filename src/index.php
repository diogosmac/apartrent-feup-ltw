<!DOCTYPE html>
<html lang="en-US">
<html>
    <head>
        <title> ApartRent </title>
        <meta charset="UTF-8">
    </head>

    <body>
        <header> <h1> ApartRent <h1> </header>

        <a href="login.php"> Log in </a>
        <a href="signup.php"> Sign up </a>

        <form>
            <fieldset>
                <legend><h3>Rent your apartment now!</h3></legend>
                <label>Location <input type="text"></label>
                <label>Check-in <input type="date"></label>
                <label>Check-out <input type="date"></label>
                <button formaction="search.php" formmethod="post">GO!</button>
                <p> or... </p>
                <button formaction="random.php" formmethod="post">Surprise me!</button>
            </fieldset>
        </form>
    </body>
</html>