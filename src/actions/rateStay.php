<?php

    include_once('../includes/init.php');
    include('../database/db_apartRent.php');
    include('../database/user.php');

    $rating = $_GET['rating'];

    $apartmentID = htmlspecialchars($_GET['apartmentID']);
    $checkIn = htmlspecialchars($_GET['checkIn']);
    $checkOut = htmlspecialchars($_GET['checkOut']);
    $checkIn = new DateTime(htmlspecialchars($_GET['checkIn']));
    $checkIn = $checkIn->format('Y-m-d');
    $checkOut = new DateTime(htmlspecialchars($_GET['checkOut']));
    $checkOut = $checkOut->format('Y-m-d');

    if (null !== getUserID()) {
        if (isset($_GET['checkIn']) && isset($_GET['checkOut']) && $checkOut > $checkIn) {           
            $response = rateStay($rating, $apartmentID, $checkIn, $checkOut);
            echo json_encode($response);
        }
        else {
            // error getting the dates for the rental
            echo json_encode(2);
        }
    }
    else {
        // user is not logged in (how did he get here then??)
        echo json_encode(3);
    }

?>
