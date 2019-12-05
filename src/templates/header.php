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
        
                    if(!isset($_SESSION['username'])) //Se nao houver sessao iniciada
                    {
                        echo '<a id="login" href="login.php"> Log in </a>';
                        echo '<a href="signup.php"> Sign up </a>';
                    }
                    else //Se houver sessao iniciada
                    {
                        echo '
                            <div id="profile_section">
                                <img src='.$_SESSION['profile_picture'].'/>
                                <div id="profile_section_text">
                                    <a href="profile.php"><h4>'.$_SESSION['name'].'</h4></a>
                                    <a href="../actions/logoutAction.php" alt=""> Log out </a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </header>
