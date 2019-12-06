<?php
    include_once('../includes/session.php');

    $usr = getUsername();

    if(!isset($usr)) //Se nao houver sessao iniciada
    {
        echo '<a id="login" href="login.php"> Log in </a>';
        echo '<a href="signup.php"> Sign up </a>';
    }
    else //Se houver sessao iniciada
    {
        echo '
            <div id="profile_section">
                <img src="'.$_SESSION['profile_picture'].'">
                <div id="profile_section_text">
                    <a href="profile.php"><h4>'.$_SESSION['name'].'</h4></a>
                    <a href="../actions/logoutAction.php" alt=""> Log out </a>
                </div>
            </div>';
    }

?>