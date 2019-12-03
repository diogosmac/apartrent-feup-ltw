<?php

    include_once('includes/init.php');
    include_once('database/user.php');

    // Verifica se o utilizador chegou a pagina atraves da pagina de login
    if(isset($_POST['login_button']))
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Se a password ou username estiverem em branco
        if(empty($username) || empty($password))
        {
            // redireciona para a pagina inicial
            header("Location: login.php?error=emptyfields");
            exit();
        }
        else
        {
            // Executa a query de verificacao
            $query_results = getAllMatches($username, $password);

            // username and password match
            if(count($query_results) == 1)
            {
                session_start();

                $_SESSION['name'] = $query_results[0]['name'];
                $_SESSION['username'] = $query_results[0]['username'];
                $_SESSION['profile_picture'] = $query_results[0]['profile_picture'];

                // echo 'Hello ';
                // echo $query_results[0]['name'];

                header("Location: index.php?login=success");
                exit();
            }
            else
            {
                header("Location: login.php?error=wrongpassword");
                // header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
    else
    {
        // Redireciona para a pagina login, em caso contrario 
        header("Location: login.php");
        exit();
    }

?>
