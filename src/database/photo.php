<?php

    function setDefaultPicture($userID)
    {
        global $db;
        
        $stmt = $db->prepare('INSERT INTO [User-Photo] (
            idUser,
            idPhoto
        )
        VALUES
        (
            :uid,
            0
        )
        ');

        $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
        $stmt->execute();

        return;
    }

    function getPhotoPath($photoID)
    {
        return '../uploadedImages/'.$photoID.'.jpg';
    }

    function getPhotoPathUser($userID)
    {
        global $db;
        
        $stmt = $db->prepare('SELECT idPhoto 
                              FROM [User-Photo]
                              WHERE idUser = :uid
                            ');

        $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
        $stmt->execute();

        $photoID = $stmt->fetch();

        return getPhotoPath($photoID['idPhoto']);
    }

    function updateProfilePhoto($userID, $newPhotoID)
    {
        global $db;
        
        $stmt = $db->prepare('
                                UPDATE [User-Photo]
                                SET idPhoto = :newPhotoID
                                WHERE idUser = :userID
                            ');

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':newPhotoID', $newPhotoID, PDO::PARAM_INT);
        $stmt->execute();
                    
        return;
    }

    function addNewPhoto()
    {
        global $db;
        
        $stmt = $db->prepare('
                                INSERT INTO Photo 
                                (
                                    idPhoto
                                )
                                VALUES (NULL);
                            ');

        $stmt->execute();

        return;
    }

    function getPhotoID($userID)
    {
        global $db;
        
        $stmt = $db->prepare('
                                SELECT idPhoto
                                FROM [User-Photo]
                                WHERE idUser = :uid
                            ');

        $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

?>