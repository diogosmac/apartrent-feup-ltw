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

    function getAllMatches($uid, $pass)
    {
        global $db;
        require('connection.php');

        $stmt = $db->prepare('SELECT * FROM User
                                WHERE username = :username
                                AND password = :password');

        $stmt->bindParam(':username', $uid, PDO::PARAM_STR);
        $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getAllUsernameMatches($uid)
    {
        global $db;
        require('connection.php');

        $stmt = $db->prepare('SELECT username FROM User
                                WHERE username = :username');

        $stmt->bindParam(':username', $uid, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    
    function addUser($uid, $pwd, $name, $mail)
    {
        global $db;
        require('connection.php');

        $stmt = $db->prepare('INSERT INTO User (
                                username,
                                password,
                                name,
                                email
                            )
                            VALUES
                            (
                                :username,
                                :pass,
                                :name,
                                :email
                            )'
        );

        $stmt->bindParam(':username', $uid, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pwd, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
        $stmt->execute();

        return;
    }

?>
