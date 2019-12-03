<?php

    session_start();
    session_unset(); //Frees all session variables
    session_destroy();
    header("Location: ../index.php");