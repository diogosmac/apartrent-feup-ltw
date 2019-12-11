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

    function getIdFromUsername($username)
    {
        global $db;

        $stmt = $db->prepare('SELECT idUser 
                              FROM User
                              WHERE username = :username
                            ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }
    

    function getAllUserInfo($userID)
    {
        global $db;

        $stmt = $db->prepare('SELECT username, name, email, description 
                              FROM User
                              WHERE idUser = :uid');

        $stmt->bindParam(':uid', $userID, PDO::PARAM_STR);
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

    function searchByUsername($username)
    {
        global $db;

        $stmt = $db->prepare('SELECT idUser
                              FROM User
                              WHERE username = :username
                            ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function updateUsername($userID, $newUsername)
    {
        global $db;
        
        $stmt = $db->prepare('
                                UPDATE User
                                SET username = :newUsername
                                WHERE idUser = :userID
                            ');

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':newUsername', $newUsername, PDO::PARAM_STR);
        $stmt->execute();
                    
        return;
    }

    function updatePassword($userID, $newPassword)
    {
        global $db;
        
        $stmt = $db->prepare('
                                UPDATE User
                                SET password = :newPassword
                                WHERE idUser = :userID
                            ');

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $stmt->execute();
                    
        return;
    }

    function updateDescription($userID, $newDescription)
    {
        global $db;
        
        $stmt = $db->prepare('
                                UPDATE User
                                SET description = :newDescription
                                WHERE idUser = :userID
                            ');

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':newDescription', $newDescription, PDO::PARAM_STR);
        $stmt->execute();
                    
        return;
    }

?>
