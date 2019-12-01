<?php
    session_start();
?>

<header>
    <a href="index.php">
        <img src="resources/logo-white.png" alt="" id="logo">
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
                        <a href="profile.php"><h4>'.$_SESSION['name'].'</h4></a>
                        <img src='.$_SESSION['profile_picture'].'/>
                        <a href="actions/logout_action.php" alt=""> Log out </a>';
            }
        ?>
    </div>
</header>