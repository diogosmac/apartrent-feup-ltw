<?php
    include_once('../includes/session.php');

    $userID = getUserID();

    if(!isset($userID)) //Se nao houver sessao iniciada
    {
        echo '<div id="login_signup">
                <a id="login" href="login.php"> Log in </a>
                <a href="signup.php"> Sign up </a>
              </div>';
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
