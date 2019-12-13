<?php

    include_once('../templates/listingInfo.php');
    include_once('../database/connection.php');
    include('../database/db_apartRent.php');
    include('../database/photo.php');

    $location = $_GET['location'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];

    $query_results = getAllListings($location, $checkIn, $checkOut);

    $result = $query_results[array_rand($query_results)];

?>

<section id="search_results">
    <?php showListing($result); ?>
</section>
