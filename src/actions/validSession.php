<?php

    // include_once('../includes/init.php');
    include_once('../database/user.php');

    $username = getUsername();

    if (!isset($username)) //Se Sessao não iniciada
        header('Location: ../index.php');
?>