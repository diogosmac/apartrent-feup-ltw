<!DOCTYPE html>
<html lang="en-US">
<html>
    <head>
        <?php echo '<title>' . $title . '</title>'; ?>
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <link href="../css/layout.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
    </head>

    <body>

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
