<?php
class User
{
    private $pdo;
 
    function __construct($pdo)
    {
      $this->pdo = $pdo;
    }


    public function checkIfUserExists($username) {
        try{
            $statement = $this->pdo->prepare("SELECT COUNT(username) AS user_exists FROM users WHERE username = :username");
            $statement->execute([":username" => $username]);
            $fetched_row = $statement->fetch();

            if ((int)$fetched_row["user_exists"] >= 1) {
                return true;
            } 

        } catch(PDOExeception $error) {
            echo $error->getMessage();
        }
    }

    public function register($first_name,$last_name,$date_of_birth,$email,$username,$password)
    {
       try
       {
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   
           $statement = $this->pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, date_of_birth) VALUES (:username, :password, :email, :first_name, :last_name, :date_of_birth, :is_admin)");            
           $statement->execute([":username" => $username, ":password" => $hashed_password, ":email" => $email, ":first_name" => $first_name, ":last_name" => $last_name, ":date_of_birth" => $date_of_birth, ":is_admin" => 1]);
        
           return $statement; 
       }
       catch(PDOException $error)
       {
           echo $error->getMessage();
       }    
    }

    public function getUser($username) {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $statement->execute([":username" => $username]);
    
        $get_user = $statement->fetch(PDO::FETCH_ASSOC);

        return $get_user;
    }

    public function isAdmin() {

        $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $statement->execute([":username" => $_SESSION['username']]);

        $is_admin = $statement->fetch(PDO::FETCH_ASSOC);

        if ((int)$is_admin["is_admin"] == 1) {
            return true;
        }
        
        // $statement = $this->pdo->prepare("SELECT id as admin_rights FROM users JOIN admin ON id = user_id");
        // $statement->execute();

        // $is_admin = $statement->fetch();

        // if ($_SESSION["user_id"] == (int)$is_admin) {
        //     return true;
        // }
    }

    public function login($username,$password,$user_array)
    {
       try
       {
          if((int)$user_array > 0)
          {
             if(password_verify($password, $user_array['password']))
             {

                return true;
             }
             
          }
       }
       catch(PDOException $error)
       {
           echo $error->getMessage();
       }
   }


   public function isLoggedIn() {
    // if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
      if(isset($_SESSION['user_id']))
      {
         return true;
      }
   }

   public function redirect($url) {
       header("Location: $url");
   }
 
   public function logout() {
        session_destroy();
        // session_unset();
        return true;
   }
}