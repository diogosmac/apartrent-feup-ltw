<?php

    // include_once('../includes/init.php');
    include_once('../database/user.php');

    $userID = getUserID();

    if (!isset($userID)) // Se Sessao não iniciada
        header('Location: ../index.php');
?>
