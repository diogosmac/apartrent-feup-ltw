<?php

    include_once('../templates/listingInfo.php');
    include_once('../database/connection.php');
    include('../database/db_apartRent.php');
    include('../database/photo.php');

    $location = htmlspecialchars($_GET['location']);
    $checkIn = htmlspecialchars($_GET['checkIn']);
    $checkOut = htmlspecialchars($_GET['checkOut']);

    $query_results = getAllListings($location, $checkIn, $checkOut);

    $result = $query_results[array_rand($query_results)];

    header('Location: ../pages/apartment.php?id='.$result['id']);
?>
