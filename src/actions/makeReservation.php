<?php

    include_once('../includes/init.php');
    include('../database/db_apartRent.php');
    include('../database/user.php');

    $apartmentID = $_GET['apartmentID'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];

    if (null !== getUserID()) {
        if (isset($checkIn) && isset($checkOut) && $checkOut > $checkIn) {
            $userID = getUserID();            
            $response = addReservation($apartmentID, $userID, $checkIn, $checkOut);
            echo json_encode($response);
        }
        else {
            echo json_encode(2);
        }
    }
    else {
        echo json_encode(3);
    }

?>
