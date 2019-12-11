<?php

    $oldPhotoID = getPhotoID($userID);

    addNewPhoto();

    global $db;
    // Get image ID
    $id = $db->lastInsertId();

    // Generate filename
    $photoDirectory = "../uploadedImages/$id.jpg";

    // Move the uploaded file to its final destination
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $photoDirectory);

    updateProfilePhoto($userID, $id);
    $_SESSION['profile_picture'] = getPhotoPath($id);

    //Deletes old profile photo, to save some space
    if($oldPhotoID['idPhoto'] != 0)
    {
        $oldPhotoPath = getPhotoPath($oldPhotoID['idPhoto']);
        unlink($oldPhotoPath);
    }
?>
