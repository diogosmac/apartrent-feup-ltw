<?php

    function getAllListings($location, $checkIn, $checkOut) 
    {
        global $db;

        if ($checkIn == null)
            $checkIn == date('d-m-Y', strtotime('01/01/1970'));

        if ($checkOut == null)
            $checkOut == date('d-m-Y', strtotime('31/12/3019'));


        if ($location == null) 
        {
            $stmt = $db->prepare('SELECT id
                                  FROM Apartments, Rental
                                  WHERE (SELECT count(*)
                                         FROM Apartments NATURAL JOIN Rental
                                         WHERE :endDate < endDate
                                         AND :initDate > initDate) = 0');

            //Nao testei se funciona assim com datas
            $stmt->bindParam(":endDate", strtotime($checkOut), PDO::PARAM_STR);
            $stmt->bindParam(":initDate", strtotime($checkIn), PDO::PARAM_STR);
            $stmt->execute($checkIn, $checkOut);
        }
        else 
        {
            $stmt = $db->prepare('SELECT id
                                  FROM Apartments, Rental
                                  WHERE (SELECT count(*)
                                         FROM Apartments NATURAL JOIN Rental
                                         WHERE ? < endDate
                                         AND ? > initDate
                                         AND locale = ?) = 0');
            $stmt->execute($checkIn, $checkOut, $location);
        }

        return $stmt->fetchAll();
    }

?>
