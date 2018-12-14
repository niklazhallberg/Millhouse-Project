<?php 
session_start();
include '../classes/call.php';


if(!empty($_POST["username"]) && !empty($_POST["password"]))
{

    $username = $_POST["username"];
    $password = $_POST["password"];

    //if user exists
    if ($user_array = $user->getUser($username)) 
    {
        //if password is correct and matches username
        if ($user->login($username, $password, $user_array)) 
        {
            //store user in session for future use
            $_SESSION["username"] = $user_array["username"];
            $_SESSION["user_id"] = $user_array["id"];

            $val->redirect('../index.php');
        
        } else 
            {
                $val->redirect('../views/login.php?error=Your password is incorrect');
            }

    } else 
        {
            $val->redirect('../views/login.php?error=There is no user with that name, try registering first or check spelling');
        }

} else 
    {
        $val->redirect('../views/login.php?error=You need to fill in both fields.');
    }
