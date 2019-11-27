<!DOCTYPE html>
<html lang="en-US">
<html>
    <head>
        <title> Your profile </title>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">        
        <link href="css/profile.css" rel="stylesheet">        
    </head>
    <body>

        <?php include('templates/common/header.php') ?>

        <div class="main-container">
            <div class="profile_picture"><img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png"></div>
            <div class="name_and_desc">
                <div class="name"><h1>Name</h1></div>
                <div class="description">
                    <article>description</article>
                </div>
            </div>
        </div>
        
        <div class="left-menu">
            <a href="edit_profile.php">Edit Profile</a>
            <a href="add_listings.php">Add Listings</a>
            <a href="view_listings.php">My Listings</a>
            <a href="view_rentals.php">My Rentals</a>
        </div>
        
        <?php include('templates/common/footer.php') ?>

    </body>
</html>