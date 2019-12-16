<?php

    function getApartComments($apartID) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Comments
        WHERE apartmentID = :apart
        ORDER BY numComment DESC LIMIT 10
        ');

        $stmt->bindParam(':apart', $apartID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getMaxNumComment($apartID) {
        global $db;

        $stmt = $db->prepare('SELECT numComment FROM Comments
            WHERE apartmentID = :apart
            ORDER BY numComment DESC LIMIT 1
            ');

        $stmt->bindParam(':apart', $apartID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch()['numComment'];
    }

    function addComment($apartID, $idUser, $text) {

        if ($text != "") {

            $num = getMaxNumComment($apartID) + 1;
            $now = new DateTime('now');
            $time = $now->format('Y-m-d H:i:s');

            global $db;

            $stmt = $db->prepare('INSERT INTO Comments
                VALUES(:apart, :num, :user, :dat, :tex)
            ');

            $stmt->bindParam(':apart', $apartID, PDO::PARAM_STR);
            $stmt->bindParam(':num', $num, PDO::PARAM_STR);
            $stmt->bindParam(':user', $idUser, PDO::PARAM_STR);
            $stmt->bindParam(':dat', $time, PDO::PARAM_STR);
            $stmt->bindParam(':tex', $text, PDO::PARAM_STR);
            $stmt->execute();

        }

    }

?>
