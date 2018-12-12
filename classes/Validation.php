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
        if (strlen($password) >= 7) 
        {
            return true;
        }
    }

    public function username($username) 
    {
        if (strlen($username) >= 5) 
        {
            return true;
        }
    }

    public function email($email) 
    {    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
        return true;
        }
    }

    public function checkIfEmailExists($email) 
    {
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
        if (isset($_SESSION['username'])) 
        {
            $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $statement->execute([":username" => $_SESSION['username']]);

            $is_admin = $statement->fetch(PDO::FETCH_ASSOC);

            if ((int)$is_admin["is_admin"] == 1) 
            {
                return true;
            }
        }
       
        
        // $statement = $this->pdo->prepare("SELECT id as admin_rights FROM users JOIN admin ON id = user_id");
        // $statement->execute();

        // $is_admin = $statement->fetch();

        // if ($_SESSION["user_id"] == (int)$is_admin) {
        //     return true;
        // }
    }




    public function isLoggedIn() 
    {
    // if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
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