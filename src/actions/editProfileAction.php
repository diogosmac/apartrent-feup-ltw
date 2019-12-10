<?php

  include_once('../includes/init.php');
  include_once('../database/user.php');
  include_once('../actions/validSession.php');
  include_once ('../database/photo.php');

  if(!($_FILES["profile_pic"]["size"] == 0 && $_FILES["profile_pic"]["tmp_name"] == NULL)) //No file specified
    include_once('../actions/upload.php');

  header("Location: ../pages/profile.php");
?>