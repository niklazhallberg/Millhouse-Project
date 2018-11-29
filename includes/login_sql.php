<?php
session_start(); 
include 'database_connection.php';

/**
* 1. Koppla upp till databasen
* 2. Hämta användaren från databasen
* 3. Kolla så att lösenordet stämmer
* överrens med lösenordet som användaren
* fyllt i formuläret: password_verify
*/

//if user fills in both login fields
if(!empty($_POST["username"]) && !empty($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $select_all_with_username = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $select_all_with_username->execute([":username" => $username]);

    $fetched_user = $select_all_with_username->fetch();

    // compare password
    $is_password_correct = password_verify($password, $fetched_user["password"]);

        if($is_password_correct){
            //save user globally to session
            $_SESSION["username"] = $fetched_user["username"];
            $_SESSION["user_id"] = $fetched_user["id"];

            //joins tables to see if user has admin rights
            $statement = $pdo->prepare("SELECT id as admin_rights FROM users JOIN admin ON id = user_id");
            $statement->execute();

            $is_admin = $statement->fetch();

                //check if logged in user is admin, if so - stores admin in session to use on other pages
                if ($_SESSION["user_id"] == (int)$is_admin) {
                    $_SESSION["admin"] = true;
                } 

            //go to blog page
            header('Location: ../index.php');
    
        }else{
            //handle errors, go back to front page and populate $_GET
            header('Location: ../views/login.php?error=Your username or password is incorrect');
        }
//if post is missing input values, go back to page and populate $_GET
} else {
    header('Location: ../views/login.php?error=Your need to fill in both fields to log in.');
}