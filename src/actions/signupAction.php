<?php

    include_once('../includes/init.php');
    include_once('../database/user.php');

    // Verifica se o utilizador chegou a pagina atraves da pagina de signup
    if (isset($_POST['register_button'])) 
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $c_pwd = $_POST['confirm_password'];

        if(empty($username) || empty($email) || empty($pwd) || empty($c_pwd) || empty($name))
        {
            header("Location: ../pages/signup.php?error=emptyfields&username=".$username."&email=".$email."&name=".$name);
            exit();
        }
        else
        {
            $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            $doesUsernameOnlyHaveLetters = preg_match("/^[a-zA-Z0-9]*$/", $username);
            $isValidName = preg_match("/^[a-zA-Z ]*$/", $name);
            $isValidName = ($isValidName and $name != "");

            if(!$isValidName)
            {
                //Retorna para a pagina de signup, mantem username e email
                header("Location: ../pages/signup.php?error=invalidname&email=".$email."&username=".$username);
                exit();
            }
            else if(!$isValidEmail && !$doesUsernameOnlyHaveLetters)
            {
                //Retorna para a pagina de signup, nao mantem nada
                header("Location: ../pages/signup.php?error=invalidusernamemail");
                exit();
            }
            else if(!$isValidEmail) //Verifica se o email introduzido e valido
            {
                //Retorna para a pagina de signup, mantem o username e o nome
                header("Location: ../pages/signup.php?error=invalidmail&username=".$username."&name=".$name);
                exit();
            }
            else if(!$doesUsernameOnlyHaveLetters) //Verifica se o username nao tem caracteres especiais
            {
                //Retorna para a pagina de signup, mantem o email e o nome
                header("Location: ../pages/signup.php?error=invalidusername&email=".$email."&name=".$name);
                exit();
            }
            else if($pwd !== $c_pwd) //Verifica se as passwords coincidem
            {
                //Retorna para a pagina de signup, mantem o email, o username e o nome
                header("Location: ../pages/signup.php?error=passwordsdontmatch&email=".$email."&username=".$username."&name=".$name);
                exit();
            }
            else
            {
                $query_results = getAllUsernameMatches($username);

                if(count($query_results) == 0) //Se ainda n existir nenhum username igual
                {
                    //Pode-se adicionar, visto que n há mais nenhum igual
                    addUser($username, $pwd, $name, $email);


                    $allInfo = getAllMatches($username, $pwd);

                    //Depois de criar conta, faz login automaticamente:
                    session_start();

                    $_SESSION['name'] = $allInfo[0]['name'];
                    $_SESSION['username'] = $allInfo[0]['username'];
                    $_SESSION['profile_picture'] = $allInfo[0]['profile_picture'];

                    header("Location: ../index.php?signup=success");
                    exit();
                }
                else
                {
                    //Retorna para a pagina de signup, mantem o email
                    header("Location: ../pages/signup.php?error=usernamealreadyexists&email=".$email);
                    exit();
                }
            }

        }
    } 
    else 
    { 
        //Redireciona para a pagina signup, em caso contrario 
        header("Location: ../pages/signup.php");
        exit();
    }

?>
