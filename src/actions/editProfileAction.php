<?php

  include_once('../includes/init.php');
  include_once('../database/user.php');
  include_once('../actions/validSession.php');
  include_once ('../database/photo.php');

  //Verifica se o user chegou a esta pagina atraves do butao
  if(isset($_POST['edit_profile_button']))
  {

    //Verifica se foi carregada alguma foto de perfil nova
    if(!($_FILES["profile_pic"]["size"] == 0 && $_FILES["profile_pic"]["tmp_name"] == NULL)) //No file specified
      include_once('../actions/updatePhoto.php');

    //Verifica se foi pedida uma alteracao de username
    if($_POST['username'] != null)
      updateUsername($userID, $_POST['username']);

    //Verifica se foi pedida uma alteracao de password
    if($_POST['password'] != null)
    {
      if($_POST['password'] == $_POST['confirm_password'])
      {
        updatePassword($userID, $_POST['password']);
      }
    }

    //Redireciona para a pagina de perfil
    header("Location: ../pages/profile.php");
  }
  else
  {
    header("Location: ../index.php");
  }
?>