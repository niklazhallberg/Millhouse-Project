<?php
class Posts
{
    private $pdo;
 
    function __construct($pdo)
    {
      $this->pdo = $pdo;
    }


    public function getAllPosts() {
        
        try {
        $statement = $this->pdo->prepare("SELECT * FROM posts");
        $statement->execute();
        $get_all_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
  
        return $get_all_posts;

       }
       catch(PDOException $error)
       {
           echo $error->getMessage();
       }
    }

    public function getFiveLatestPosts() {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 5");
            $statement->execute();
            $get_five_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
      
            return $get_five_posts;
    
           }
           catch(PDOException $error)
           {
               echo $error->getMessage();
           }

    }
    public function uploadImage() {

    }

    public function addPost($title, $description, $image, $user_id, $category) {

        try {

            $statement = $this->pdo->prepare("INSERT INTO posts (title, description, created_by, image, category_id) VALUES (:title, :description, :created_by, :image, :category_id)");
            $statement->execute([":title" => $title, ":description" => $description, ":created_by" => $user_id, ":image" => $image, ":category_id" => $category]);
      
            return $statement;
    
           }
           catch(PDOException $error)
           {
               echo $error->getMessage();
           }
        
    }

    public function editPost() {


    }

    public function deletePost() {

    }

    public function addComment() {


    }

    public function deleteComment() {


    }







}