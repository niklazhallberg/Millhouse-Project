<?php 
session_start();
include '../classes/call.php';

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["date_of_birth"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"])) 
{
    
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $date_of_birth = $_POST["date_of_birth"];
   $email = $_POST["email"];
   $username = $_POST["username"];
   $password = $_POST["password"];
 

   if ($user->checkIfUserExists($username) == true) {
      header('Location: ../views/register.php?error=Username taken');
   } else {

      if($user->register($first_name,$last_name,$date_of_birth,$email,$username,$password)) 
          {
            
            $user_array = $user->getUser($username);
            $_SESSION["username"] = $user_array["username"];
            $_SESSION["user_id"] = $user_array["id"];

            $user->redirect('../index.php');
          }
   }

} else {
   header('Location: ../views/register.php?error=You nedd to fill in all fields to register.');
}