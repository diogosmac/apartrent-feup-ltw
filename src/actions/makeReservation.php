<?php

    include_once('../includes/init.php');
    include('../database/db_apartRent.php');
    include('../database/user.php');

    $apartmentID = $_GET['apartmentID'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];

    if (null !== getUserID() && isset($checkIn) && isset($checkOut)) {
        $userID = getUserID();
        addReservation($apartmentID, $userID, $checkIn, $checkOut);
    }

?>
