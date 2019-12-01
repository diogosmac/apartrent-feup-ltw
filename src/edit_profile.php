<!DOCTYPE html>
<html lang="en-US">
<html>
    <head>
        <title> Edit profile </title>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">
    </head>
    <body>
        <?php include('templates/common/header.php') ?>
    
        <div class="main-container">
            <div class="profile_picture">
                <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png">
                <button id="profile-pic-upload" type="button">Change photo</button>
            </div>

            <div class="description"> <textarea id="about" name="description" rows="5"></textarea> </div>
        </div>
    </body>
</html>