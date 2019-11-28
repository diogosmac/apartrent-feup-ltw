<?php

    function getListings($initDate, $endDate) {

        $db = new PDO('sqlite:database/apartRent.db');

        $stmt = $db->prepare(
            'SELECT * FROM Apartment
            WHERE (SELECT COUNT(*) FROM Rental
                   WHERE apartmentID = id
                   AND NOT(? > endDate
                          OR
                          ? < initDate)
                  ) = 0');

        $stmt->execute(array($initDate, $endDate));
        $listings = $stmt->fetchAll();

        foreach($listings as $listing) {
            echo '<h1>' . $listing['address'] . '</h1>';
            echo '<p>' . $listing['description'] . '</p>';
        }

    }

?>