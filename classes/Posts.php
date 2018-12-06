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
            $get_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $get_posts;

           }
           catch(PDOException $error)
           {
               echo $error->getMessage();
           }

    }

    public function getLatestWatchPosts($number_of_watch_posts) {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = '1' ORDER BY id DESC LIMIT $number_of_watch_posts");
            $statement->execute();
            $get_watch_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $get_watch_posts;

           }
           catch(PDOException $error)
           {
               echo $error->getMessage();
           }

    }

      public function getLatestSunglassesPosts($number_of_sunglasses_posts) {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = '2' ORDER BY id DESC LIMIT $number_of_sunglasses_posts");
            $statement->execute();
            $get_sunglasses_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $get_sunglasses_posts;

           }
           catch(PDOException $error)
           {
               echo $error->getMessage();
           }

    }

    public function getLatestFurnishingPosts($number_of_furnishing_posts) {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = '3' ORDER BY id DESC LIMIT $number_of_furnishing_posts");
            $statement->execute();
            $get_furnishing_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $get_furnishing_posts;

           }
           catch(PDOException $error)
           {
               echo $error->getMessage();
           }

    }

    public function uploadImage($image) {

      try {

          $temporary_location = $image["tmp_name"];
          $new_location = "../images/" . $image["name"];
          $upload_ok = move_uploaded_file($temporary_location, $new_location);


            return $upload_ok;


         }
         catch(PDOException $error)
         {
             echo $error->getMessage();
         }
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
