<?php

    include_once('../templates/listingInfo.php');
    include_once('../database/connection.php');
    include('../database/db_apartRent.php');
    include('../database/photo.php');

    function utf8ize($d) {
        if (is_array($d))
            foreach($d as $k => $v)
                $d[$k] = utf8ize($v); 

        else if (is_object($d))
            foreach ($d as $k => $v)
                $d[$k] = utf8ize($v); 

        else if (is_string($d))
            return utf8_encode($d);

        return $d;
    }

    $location = $_GET['location'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];
    
    $query_results = getAllListings($location, $checkIn, $checkOut);

    if (count($query_results) == 0) {
        echo '<p>No results found for you search parameters!</p>';
    }
    else {
        foreach ($query_results as $apartmentID) {
            showListing($apartmentID);
        }
    }
    
?>
