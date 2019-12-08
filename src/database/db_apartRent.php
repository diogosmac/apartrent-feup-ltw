<?php

    function getAllListings($location, $checkIn, $checkOut) 
    {
        global $db;

        if ($checkIn == null)
        {
            //Dia de hoje
            $tempDateTimeIn = new DateTime('now');
            $checkIn = $tempDateTimeIn->format('d-m-Y');
        }
       /* else {
            $temp = $checkIn;
            $checkIn = $temp->format('d-m-Y');
        }*/

        if ($checkOut == null)
        {
            //Dia seguinte ao checkIn
            $tempDateTimeOut = new DateTime($checkIn);
            $checkOut = $tempDateTimeOut->modify('+1 day')->format('d-m-Y');
        }

        echo $checkIn. ' --> ';
        echo $checkOut;
        echo ' ' . $location;

        if ($location == null)
        {
            $stmt = $db->prepare('SELECT id
                                  FROM Apartment
                                  WHERE id NOT IN (SELECT id
                                                    FROM Apartment NATURAL JOIN Rental
                                                    WHERE(
                                                            (initDate <= :initDate AND endDate >= :initDate)
                                                            OR (initDate < :endDate AND endDate >= :endDate)
                                                            OR (:initDate <= initDate AND :endDate >= initDate)
                                                        ))
                                ');

            $stmt->bindParam(":endDate", $checkOut, PDO::PARAM_STR);
            $stmt->bindParam(":initDate", $checkIn, PDO::PARAM_STR);
            $stmt->execute();
        }
        else 
        {
            echo '<p>Pesquisa com localidade</p>';

            $stmt = $db->prepare('SELECT id
                                  FROM Apartment
                                  WHERE id NOT IN (SELECT id
                                                    FROM Apartment NATURAL JOIN Rental
                                                    WHERE(
                                                            (initDate <= :initDate AND endDate >= :initDate)
                                                            OR (initDate < :endDate AND endDate >= :endDate)
                                                            OR (:initDate <= initDate AND :endDate >= initDate)
                                                        ))
                                        AND locale = :location
                                ');

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

    function getUserListings($user) {
        
        global $db;
        $stmt = $db->prepare('SELECT id
                              FROM Apartment
                              WHERE owner = :username');

        
        $stmt->bindParam(":username", $user, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

?>
