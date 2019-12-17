<?php

    include_once('../includes/init.php');
    include_once('../database/user.php');
    include_once('../database/photo.php');

    // Verifica se o utilizador chegou a pagina atraves da pagina de login
    if(isset($_POST['login_button'])) {

        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        // Se a password ou username estiverem em branco
        if(empty($username) || empty($password)) 
        {
            // redireciona para a pagina inicial
            header("Location: ../pages/login.php?error=emptyfields");
            exit();
        }
        else {

            $validation = validateUser($username, $password);

            // username and password match
            if($validation != false) {

                $_SESSION['userID'] = $validation['idUser'];
                $_SESSION['name'] = $validation['name'];
                $_SESSION['username'] = $validation['username'];
                $_SESSION['profile_picture'] = getPhotoPathUser($_SESSION['userID']);


                header("Location: ../index.php?login=success");
                exit();
            }
            else {
                header("Location: ../pages/login.php?error=wrongpassword");
                exit();
            }
        }
    }
    else {
        // Redireciona para a pagina login, em caso contrario 
        header("Location: ../pages/login.php");
        exit();
    }

?>
