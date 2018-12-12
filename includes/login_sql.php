<?php 
session_start();
include '../classes/call.php';


if(!empty($_POST["username"]) && !empty($_POST["password"]))
{

    $username = $_POST["username"];
    $password = $_POST["password"];


    if ($user_array = $user->getUser($username)) 
    {
        if ($user->login($username, $password, $user_array)) 
        {
            $_SESSION["username"] = $user_array["username"];
            $_SESSION["user_id"] = $user_array["id"];

            $user->redirect('../index.php');
        
        } else 
            {
                header('Location: ../views/login.php?error=Your password is incorrect');
            }

    } else 
        {
            header('Location: ../views/login.php?error=There is no user with that name, try registering first or check spelling');
        }

} else 
    {
        header('Location: ../views/login.php?error=You need to fill in both fields.');
    }
