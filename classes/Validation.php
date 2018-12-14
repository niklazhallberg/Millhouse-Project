<?php
class Validation 
{

    private $pdo;
 
    function __construct($pdo) 
    {
      $this->pdo = $pdo;
    }


    public function password($password) 
    {
        //checks if password is at least 7 characters
        if (strlen($password) >= 7) 
        {
            return true;
        }
    }

    public function username($username) 
    {
        //checks if username is at least 5 characters
        if (strlen($username) >= 5) 
        {
            return true;
        }
    }

    public function email($email) 
    {    
        //if type="email" has been removed - checks if email input by user is valid - ie contains @ and .
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
        return true;
        }
    }

    public function checkIfEmailExists($email) 
    {
        //compares if email input from user exists in table to avoid duplicates
        $statement = $this->pdo->prepare("SELECT COUNT(email) AS user_exists FROM users WHERE email = :email");
        $statement->execute([":email" => $email]);
        $fetched_row = $statement->fetch();

        if ((int)$fetched_row["user_exists"] >= 1) 
        {
            return true;
        } 
    }

    public function checkIfUsernameExists($username) 
    {
        //compares if username input from user exists in table to avoid duplicates
        $statement = $this->pdo->prepare("SELECT COUNT(username) AS user_exists FROM users WHERE username = :username");
        $statement->execute([":username" => $username]);
        $fetched_row = $statement->fetch();


        if ((int)$fetched_row["user_exists"] >= 1) 
        {
            return true;
        } 
    }

    public function isAdmin() 
    {
        if (isset($_SESSION['user_id'])) 
        {
            //if user is logged in and session is set - get user from table, join with admin table and check if user has admin rights. 
            $statement = $this->pdo->prepare("SELECT id as admin_rights FROM users JOIN admin ON id = user_id");
            $statement->execute();

            $is_admin = $statement->fetch();

            if ($_SESSION["user_id"] == (int)$is_admin) 
            {
                return true;
            }
        }
    }
    
    public function isLoggedIn() 
    {
      if(isset($_SESSION['user_id']))
      {
         return true;
      }
    }

    public function redirect($url) 
    {
       header("Location: $url");
    }

}