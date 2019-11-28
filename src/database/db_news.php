<?php

    include_once('database/connection.php');

    function getAllListings($location, $checkIn, $checkOut) {
        global $db;

        $stmt = $db->prepare('SELECT *
                              FROM Rental');
        $stmt->execute();

        return $stmt->fetchAll();
    }

?>
