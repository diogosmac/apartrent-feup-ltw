<?php

    function getAllMatches($uid, $pass)
    {
        global $db;

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

        $stmt = $db->prepare('SELECT username FROM User
                              WHERE username = :username');

        $stmt->bindParam(':username', $uid, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    
    function addUser($uid, $pwd, $name, $mail)
    {
        global $db;

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
