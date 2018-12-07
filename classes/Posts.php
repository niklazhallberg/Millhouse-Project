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

    public function getLatestCategoryPosts($category_id, $number_of_posts) {

        try {
            $statement = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = $category_id ORDER BY id DESC LIMIT $number_of_posts");
            $statement->execute();
            $get_category_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $get_category_posts;

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

    public function addPost($title, $description, $image, $user_name, $category, $post_date) {

        try {

            $statement = $this->pdo->prepare("INSERT INTO posts (title, description, created_by, image, category_id, post_date) VALUES (:title, :description, :created_by, :image, :category_id, :post_date)");
            $statement->execute([":title" => $title, ":description" => $description, ":created_by" => $user_name, ":image" => $image, ":category_id" => $category, ":post_date" => $post_date]);

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
    
    public function getRandomPosts($category){
            //selects 3 posts from db with category id
            $random_posts = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = :category_id ORDER BY RAND() LIMIT 3");
            $random_posts->execute(
                [
                    ":category_id" => $category
                ]
            );
        
        return $random_posts;
}









}
