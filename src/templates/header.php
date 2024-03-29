<!DOCTYPE html>
<html lang="en-US">
<html>
    <head>
        <?php echo '<title>' . $title . '</title>'; ?>
        <meta charset="utf-8">
        <link rel="icon" href="../resources/logo-mini.ico">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <link href="../css/layout.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    </head>

    <body>

        <div id="page-container">

        <header>
            <a href="index.php">
                <img src="../resources/logo-white.png" alt="" id="logo">
            </a>
            <div class="signup">
                <?php
                    include_once('../templates/userAccountHeader.php');
                ?>
            </div>
        </header>

        <div id="content-wrap">
