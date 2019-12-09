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
        return '../uploadedImages/'.$photoID.'.png';
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

?>