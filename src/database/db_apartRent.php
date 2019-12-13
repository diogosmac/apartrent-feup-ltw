<?php

    function getAllListings($location, $checkIn, $checkOut) 
    {

        global $db;

        if ($checkIn == null) {
            //Dia de hoje
            $tempDateTimeIn = new DateTime('now');
            $checkIn = $tempDateTimeIn->format('d-m-Y');
        }
        else {
            $temp = new DateTime($checkIn);
            $checkIn = $temp->format('d-m-Y');
        }

        if ($checkOut == null) {
            //Dia seguinte ao checkIn
            $tempDateTimeOut = new DateTime($checkIn);
            $checkOut = $tempDateTimeOut->modify('+1 day')->format('d-m-Y');
        }
        else {
            $temp = new DateTime($checkOut);
            $checkOut = $temp->format('d-m-Y');
        }

        if ($location == null) {

            $stmt = $db->prepare('SELECT *
                                  FROM Apartment
                                  WHERE id NOT IN (
                                      SELECT id
                                      FROM Apartment, Rental
                                      WHERE Apartment.id = Rental.apartmentID
                                      AND (
                                          (initDate <= :initDate AND endDate > :initDate)
                                          OR (initDate < :endDate AND endDate >= :endDate)
                                          OR (:initDate <= initDate AND :endDate > initDate)
                                          OR (:initDate < endDate AND :endDate >= endDate)
                                      ))
            ');

            $stmt->bindParam(":initDate", $checkIn, PDO::PARAM_STR);
            $stmt->bindParam(":endDate", $checkOut, PDO::PARAM_STR);
        
        }
        else {
        
            $stmt = $db->prepare('SELECT *
                                  FROM Apartment
                                  WHERE id NOT IN (
                                      SELECT id
                                      FROM Apartment, Rental
                                      WHERE Apartment.id = Rental.apartmentID
                                      AND (
                                          (initDate <= :initDate AND endDate > :initDate)
                                          OR (initDate < :endDate AND endDate >= :endDate)
                                          OR (:initDate <= initDate AND :endDate > initDate)
                                          OR (:initDate < endDate AND :endDate >= endDate)
                                      )
                                  )
                                  AND UPPER(locale) like UPPER("%" || :location || "%")
            ');

            $stmt->bindParam(":endDate", $checkOut, PDO::PARAM_STR);
            $stmt->bindParam(":initDate", $checkIn, PDO::PARAM_STR);
            $stmt->bindParam(":location", $location, PDO::PARAM_STR);

        }

        $stmt->execute();
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

    function getOwnerByID($id)
    {
        global $db;

        $stmt = $db->prepare('SELECT *
                              FROM User
                              Where idUser = :id');

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    function getUserListings($userID)
    {

        
        global $db;
        $stmt = $db->prepare('SELECT id
                              FROM Apartment
                              WHERE owner = :user');

        
        $stmt->bindParam(":user", $userID, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function conflictingReservations($idApartment, $checkIn, $checkOut) {

        global $db;

        $stmt = $db->prepare('SELECT apartmentID
                            FROM Rental
                            WHERE :apart = apartmentID
                            AND (
                                (initDate <= :initDate AND endDate > :initDate)
                                OR (initDate < :endDate AND endDate >= :endDate)
                                OR (:initDate <= initDate AND :endDate > initDate)
                                OR (:initDate < endDate AND :endDate >= endDate)
                                )
        ');
        $stmt->bindParam(":apart", $idApartment, PDO::PARAM_INT);
        $stmt->bindParam(":initDate", $checkIn, PDO::PARAM_STR);
        $stmt->bindParam(":endDate", $checkOut, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    function addReservation($idApartment, $idUser, $checkIn, $checkOut) {

        global $db;

        if (count(conflictingReservations($idApartment, $checkIn, $checkOut)) == 0) {

            $stmt = $db->prepare('INSERT INTO Rental
                VALUES(:apart, :chkIn, :chkOut, :user)');
            $stmt->bindParam(":apart", $idApartment, PDO::PARAM_INT);
            $stmt->bindParam(":chkIn", $checkIn, PDO::PARAM_STR);
            $stmt->bindParam(":chkOut", $checkOut, PDO::PARAM_STR);
            $stmt->bindParam(":user", $idUser, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
        }
        return 1;
    
    }

    function getUserRents($userID) {

        global $db;
        $stmt = $db->prepare('SELECT apartmentID, initDate, endDate
                              FROM Rental
                              WHERE idUser = :user');

        $stmt->bindParam(":user", $userID, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

?>
