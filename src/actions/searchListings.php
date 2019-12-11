<?php

    include_once('../database/connection.php');
    include('../database/db_apartRent.php');

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
            $apartment = getApartmentByID($apartmentID['id']);
            $apartment_images = getApartmentPhotos($apartmentID['id']); //Gets all images
            $image_path = $apartment_images[0]['path']; //Only displays the 1st one
            $apartment_name = $apartment['listing_name'];
            $apartment_daily_price = $apartment['daily_price'];
            $apartment_max = $apartment['n_guests'];
            $apartment_locale = $apartment['locale'];
            $apartment_rating = $apartment['average_rating'];
            echo    '<article>
                        <img src="' . $image_path . '" alt="">
                        <section class="info">
                            <span id="nome">' . $apartment_name . '</span>
                            <span id="preco"> ' . $apartment_daily_price . '</span>
                            <span id="max_pessoas">' . $apartment_max . '</span>
                            <span id="localidade"> ' . $apartment_locale . ' </span>
                            <span id="rating">' . $apartment_rating . '</span>
                        </section>
                    </article>';
        }
    }
    
?>
