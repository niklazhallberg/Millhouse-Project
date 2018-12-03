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

    public function getLatestPosts($number_of_posts) {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT $number_of_posts");
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
    
    public function getPostWithId($post_id){
       
        try{
            //selects all posts from db with correct post_id
            $post_to_print = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
            $post_to_print->execute(
                [
                    ":id" => $post_id
                ]
            );
            
            return $post_to_print;  
            
        }catch(PDOException $error){
            
            echo $error->getMessage();
        }
        
    }

    public function editPost() {


    }

    public function deletePostWithId($post_id) {
        try{
            //selects all posts from db with correct post_id
            $delete_post = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
            $delete_post->execute(
                [
                    ":id" => $post_id
                ]
            );  
            
        }catch(PDOException $error){
            
            echo $error->getMessage();
        }
    }

    







}
