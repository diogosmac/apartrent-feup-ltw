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

        <?php include('templates/common/header.php') ?>

        <form class="apartmentSearch" action="search.php" method="GET">
            <div class="flex-container">
                <div>
                    <h2>Rent your apartment now!</h2>
                </div>
                <div><label>WHERE</label></div>
                <div> <input class="data" type="text" name="location"></div>
                <div><label>CHECKIN </label></div>
                <div><input class="data" type="date" name="checkIn"></div>
                <div><label>CHECKOUT</label></div>
                <div><input class="data" type="date" name="checkOut"></div>
                <div><input class="button" id="submit" name="submit" type="submit" value="Go!"></div>
                <div id="surprise">or ... <input class="button" name="random" type="submit" value="Surprise me!" formaction="random.php"></div>
            </div>
        </form>

        <?php include('templates/common/footer.php') ?>

    </body>

</html>
