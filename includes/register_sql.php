<?php 
session_start();
include '../classes/call.php';

//all input fields need to be filled in to continue
if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["date_of_birth"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"])) 
{
    
   //stores input from user in variable
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $date_of_birth = $_POST["date_of_birth"];
   $email = $_POST["email"];
   $username = $_POST["username"];
   $password = $_POST["password"];
   
   //validates input from user, sends error message if validation fails
   if (!$val->email($email)) 
   {
      $val->redirect('../views/register.php?error=Enter a valid email.');
   } else if ($val->checkIfEmailExists($email)) 
   {
      $val->redirect('../views/register.php?error=This email is already registered, please login.');
   } else if ($val->checkIfUsernameExists($username)) 
   {
      $val->redirect('../views/register.php?error=This username is already registered, please login.');
   } else if (!$val->username($username)) 
   {
      $val->redirect('../views/register.php?error=Username needs to be at least 5 characters.');
   } else if (!$val->password($password)) 
   {
      $val->redirect('../views/register.php?error=Password needs to be at least 7 characters.');
   } else 
   {
      
      if($user->register($first_name,$last_name,$date_of_birth,$email,$username,$password)) 
      {
         //if user is registered, get user and store in session for future usage
         $user_array = $user->getUser($username);
         $_SESSION["username"] = $user_array["username"];
         $_SESSION["user_id"] = $user_array["id"];

         $val->redirect('../index.php');
      }
   }

} else 
{
   $val->redirect('../views/register.php?error=Please fill in all fields to register.');
}