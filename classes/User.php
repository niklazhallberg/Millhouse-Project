<?php
class User 
{
    private $pdo;
 
    function __construct($pdo) 
    {
      $this->pdo = $pdo;
    }

    public function register($first_name,$last_name,$date_of_birth,$email,$username,$password) 
    {
        //inserts the password as hashed into database for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $statement = $this->pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, date_of_birth) VALUES (:username, :password, :email, :first_name, :last_name, :date_of_birth)");            
        $statement->execute([":username" => $username, ":password" => $hashed_password, ":email" => $email, ":first_name" => $first_name, ":last_name" => $last_name, ":date_of_birth" => $date_of_birth]);
    
        return $statement; 
    }

    public function getUser($username) 
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $statement->execute([":username" => $username]);
    
        $get_user = $statement->fetch(PDO::FETCH_ASSOC);

        return $get_user;
    }


    public function login($username,$password,$user_array) 
    {
        //if user exists
        if((int)$user_array > 0) 
        {   
            //check if password matches user
            if(password_verify($password, $user_array['password'])) 
            {
                return true;
            }  
        }
       
   }
 
   public function logout() 
   {
        session_destroy();
        return true;
   }

}