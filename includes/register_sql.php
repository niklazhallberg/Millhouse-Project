<?php 
session_start();
include '../classes/call.php';

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["date_of_birth"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $date_of_birth = $_POST["date_of_birth"];
   $email = $_POST["email"];
   $username = $_POST["username"];
   $password = $_POST["password"];
   

   if (!$val->email($email)) {
      $user->redirect('../views/register.php?error=Enter a valid email.');
   } else if ($val->checkIfEmailExists($email)) {
      $user->redirect('../views/register.php?error=This email is already registered, please login.');
   } else if ($val->checkIfUsernameExists($username)) {
      $user->redirect('../views/register.php?error=This username is already registered, please login.');
   } else if (!$val->username($username)) {
      $user->redirect('../views/register.php?error=Username needs to be at least 5 characters.');
   } else if (!$val->password($password)) {
      $user->redirect('../views/register.php?error=Password needs to be at least 7 characters.');
   } else {

      if($user->register($first_name,$last_name,$date_of_birth,$email,$username,$password)) {
            
         $user_array = $user->getUser($username);
         $_SESSION["username"] = $user_array["username"];
         $_SESSION["user_id"] = $user_array["id"];

         $user->redirect('../index.php');
      }
   }

} else {
   $user->redirect('../views/register.php?error=Please fill in all fields to register.');
}