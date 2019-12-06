<?php

    function getAllListings($location, $checkIn, $checkOut) 
    {
        global $db;

        if ($checkIn == null)
            $checkIn = date('01/01/1970');

        if ($checkOut == null)
            $checkOut = date('31/12/3019');

        if ($location == null)
        {
            $stmt = $db->prepare('SELECT id
                                  FROM Apartment, Rental
                                  WHERE (SELECT count(*)
                                         FROM Apartment NATURAL JOIN Rental
                                         WHERE :endDate < endDate
                                         AND :initDate > initDate) = 0');

            $stmt->bindParam(":endDate", $checkOut, PDO::PARAM_STR);
            $stmt->bindParam(":initDate", $checkIn, PDO::PARAM_STR);
            $stmt->execute();
        }
        else 
        {
            $stmt = $db->prepare('SELECT id
                                  FROM Apartment, Rental
                                  WHERE (SELECT count(*)
                                         FROM Apartment NATURAL JOIN Rental
                                         WHERE :endDate < endDate
                                         AND :initDate > initDate
                                         AND locale LIKE :location) = 0');

            $stmt->bindParam(":endDate", $checkOut, PDO::PARAM_STR);
            $stmt->bindParam(":initDate", $checkIn, PDO::PARAM_STR);
            $stmt->bindParam(":location", $location, PDO::PARAM_STR);
            $stmt->execute();
        }

        return $stmt->fetchAll();
    }

    function getApartmentByID($id)
    {
        global $db;

        $stmt = $db->prepare('SELECT *
                                  FROM Apartment
                                  WHERE id = :id');

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

?>
