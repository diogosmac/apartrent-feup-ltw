<?php

  include_once('../includes/init.php');
  include_once('../database/user.php');
  include_once('../actions/validSession.php');
  include_once ('../database/photo.php');

  if($_FILES["profile_pic"]["size"] == 0 && $_FILES["profile_pic"]["tmp_name"] == NULL) //No file specified
  {
    print("File not specified");
  }
  else
  {
    addNewPhoto();

    global $db;
    
    // Get image ID
    $id = $db->lastInsertId();

    // Generate filenames
    $originalFileName = "../uploadedImages/$id.jpg";

    // Move the uploaded file to its final destination
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $originalFileName);

    updateProfilePhoto($userID, $id);
    $_SESSION['profile_picture'] = getPhotoPath($id);
  }


  header("Location: ../pages/profile.php");
?>