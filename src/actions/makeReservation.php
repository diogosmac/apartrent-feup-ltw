<?php

    include_once('../includes/init.php');
    include('../database/db_apartRent.php');
    include('../database/user.php');

    $apartmentID = $_GET['apartmentID'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];
    $checkIn = new DateTime($_GET['checkIn']);
    $checkIn = $checkIn->format('Y-m-d');
    $checkOut = new DateTime($_GET['checkOut']);
    $checkOut = $checkOut->format('Y-m-d');

    if (null !== getUserID()) {
        if (isset($_GET['checkIn']) && isset($_GET['checkOut']) && $checkOut > $checkIn) {
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
