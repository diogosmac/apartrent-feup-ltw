<?php

    function getAllListings($location, $checkIn, $checkOut) 
    {
        global $db;
        require('connection.php');

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
                                         WHERE ? < endDate
                                         AND ? > initDate) = 0');
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

    function getAllMatches($uid, $pass)
    {
        global $db;
        require('connection.php');

        $stmt = $db->prepare('SELECT username FROM User
                                WHERE User.username = ?
                                AND User.password = ?');

        $stmt->execute($uid, $pass);

        return $stmt->fetchAll();
    }


?>
