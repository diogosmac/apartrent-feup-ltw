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
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else
    {
        //Executa a query de verificacao
        $query_results = getAllMatches($username, $password);


        echo $query_results;
        echo 'Successful query';
    }
}
else
{
    //Redireciona para a pagina inicial, em caso contrario 
    header("Location: ../index.php");
    exit();
}
