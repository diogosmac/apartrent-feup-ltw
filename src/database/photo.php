<?php

    function getApartmentPhotos($idApartment)
    {
        global $db;

        $stmt = $db->prepare('SELECT idPhoto
                              FROM [Apartment-Photo]
                              WHERE idApartment = :idWantedApartment');

        $stmt->bindParam(":idWantedApartment", $idApartment, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

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

    function deletePhoto($idPhoto)
    {
        global $db;
        
        $stmt = $db->prepare('
                                DELETE FROM Photo
                                WHERE idPhoto = :idPhoto
                            ');

        $stmt->bindParam(':idPhoto', $idPhoto, PDO::PARAM_INT);
        $stmt->execute();

        return;
    }

    function deletePhotosFromApartment($apartmentID)
    {
        $allPhotos = getApartmentPhotos($apartmentID);

        global $db;

        /* Cleans [Apartment-Photo] relation */
        $stmt = $db->prepare('
                                DELETE FROM [Apartment-Photo]
                                WHERE idApartment = :apartmentID
                ');

        
        $stmt->bindParam(":apartmentID", $apartmentID, PDO::PARAM_INT);
        $stmt->execute();


        foreach($allPhotos as $Photo)
        {
            //Deletes photo from db
            deletePhoto($Photo['idPhoto']);

            //Deletes photo from server
            unlink(getPhotoPath($Photo['idPhoto']));
        }

        return;
    }

    function addApartmentPhoto($apartmentID, $photoID)
    {
        global $db;
        
        $stmt = $db->prepare('
                                INSERT INTO [Apartment-Photo] 
                                (
                                    idApartment,
                                    idPhoto
                                )
                                VALUES 
                                (
                                    :apartmentID,
                                    :photoID
                                );
                            ');


        $stmt->bindParam(":apartmentID", $apartmentID, PDO::PARAM_INT);
        $stmt->bindParam(":photoID", $photoID, PDO::PARAM_INT);          
        $stmt->execute();

        return;
    }

    function addApartmentPhotosAUX($apartmentID, $photo)
    {
        global $db;

        if($photo["size"] > 0 && $photo["tmp_name"] != null)
        {
            addNewPhoto();
            $photoID = $db->lastInsertId();
            $photoDirectory = "../uploadedImages/$photoID.jpg";
            move_uploaded_file($photo["tmp_name"], $photoDirectory);
            addApartmentPhoto($apartmentID, $photoID);
        }
    }

    function addApartmentPhotos($apartmentID, $photo1, $photo2, $photo3, $photo4, $photo5, $photo6)
    {
        addApartmentPhotosAUX($apartmentID, $photo1);
        addApartmentPhotosAUX($apartmentID, $photo2);
        addApartmentPhotosAUX($apartmentID, $photo3);
        addApartmentPhotosAUX($apartmentID, $photo4);
        addApartmentPhotosAUX($apartmentID, $photo5);
        addApartmentPhotosAUX($apartmentID, $photo6);
    }

?>