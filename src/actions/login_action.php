<?php

// Verifica se o utilizador chegou a pagina atraves da pagina de login
if(isset($_POST['login_button']))
{
    require '../database/db_apartRent.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    //Se a password ou username estiverem em branco
    if(empty($username) || empty($password))
    {
        //redireciona para a pagina inicial
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else
    {
        //Executa a query de verificacao
        $query_results = getAllMatches($username, $password);

        //username and password match
        if(count($query_results) == 1)
        {
            echo 'Logged as: ';
            echo $query_results[0]['username'];
        }
        else
        {
            header("Location: ../login.php?error=wrongpassword");
            exit();
        }
    }
}
else
{
    //Redireciona para a pagina login, em caso contrario 
    header("Location: ../login.php");
    exit();
}
