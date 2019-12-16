<?php

    include_once('../includes/init.php');
    include_once('../database/user.php');
    include_once('../database/photo.php');

    // Verifica se o utilizador chegou a pagina atraves da pagina de login
    if(isset($_POST['login_button'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Se a password ou username estiverem em branco
        if(empty($username) || empty($password)) {
            // redireciona para a pagina inicial
            header("Location: ../pages/login.php?error=emptyfields");
            exit();
        }
        else {
            // $options = ['cost' => 12];
            // $securePassword = password_hash($password, PASSWORD_DEFAULT, $options);

            // Executa a query de verificacao
            $query_results = getAllMatches($username, $password);

            // username and password match
            if(count($query_results) == 1) {

                $_SESSION['userID'] = $query_results[0]['idUser'];
                $_SESSION['name'] = $query_results[0]['name'];
                $_SESSION['username'] = $query_results[0]['username'];
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
