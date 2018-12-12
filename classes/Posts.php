<?php
class Posts 
{
    private $pdo;

    function __construct($pdo) 
    {
      $this->pdo = $pdo;
    }


    // public function getAllPosts() 
    // {
    //     $statement = $this->pdo->prepare("SELECT * FROM posts");
    //     $statement->execute();
    //     $get_all_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    //     return $get_all_posts;

    // }

    public function getLatestPosts($number_of_posts)
    {
        //get posts from all categories and order them in descending order, newest on top, limit to number of posts inserted with method call
        $statement = $this->pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT $number_of_posts");
        $statement->execute();
        $get_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $get_posts;

    }

    public function getLatestCategoryPosts($category_id, $number_of_posts) 
    {
        //get posts from selected category and seleceted amount, and display newest to latest
        $statement = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = $category_id ORDER BY id DESC LIMIT $number_of_posts");
        $statement->execute();
        $get_category_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $get_category_posts;      

    }
  

    // public function uploadImage($image) {

    //     $temporary_location = $image["tmp_name"];
    //     $new_location = "../images/" . $image["name"];
    //     $upload_ok = move_uploaded_file($temporary_location, $new_location);

    //     return $upload_ok;

    // }

    public function addPost($title, $description, $image, $user_name, $category, $post_date) 
    {
        //gets input from user and inserts into database as new post in posts table
        $statement = $this->pdo->prepare("INSERT INTO posts (title, description, created_by, image, category_id, post_date) VALUES (:title, :description, :created_by, :image, :category_id, :post_date)");
        $statement->execute([":title" => $title, ":description" => $description, ":created_by" => $user_name, ":image" => $image, ":category_id" => $category, ":post_date" => $post_date]);

        return $statement;

    }

    public function getPostWithId($post_id) 
    {
        //selects all posts from db with correct post_id
        $post_to_print = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $post_to_print->execute(
            [
                ":id" => $post_id
            ]
        );
        return $post_to_print;

    }

    public function editPost($title, $description, $image, $category, $post_id) 
    {
        if ($image == false) 
        {
            $statement = $this->pdo->prepare("UPDATE posts SET title = :title, description = :description, category_id = :category WHERE id = :id");
            $statement->execute([":title" => $title, ":description" => $description, ":category" => $category, ":id" => $post_id]);

            return $statement;

            
        } else {

            //updates current post in database with new input from user
            $statement = $this->pdo->prepare("UPDATE posts SET title = :title, description = :description, image = :image, category_id = :category WHERE id = :id");
            $statement->execute([":title" => $title, ":description" => $description, ":image" => $image, ":category" => $category, ":id" => $post_id]);

            return $statement;

        }

    }

    public function deletePostWithId($post_id) 
    {
        //selects all posts from db with correct post_id
        $delete_post = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        $delete_post->execute(
            [
                ":id" => $post_id
            ]
        );

    }
    
    public function getRandomPosts($category) 
    {
        //selects 3 posts from db with category id
        $random_posts = $this->pdo->prepare("SELECT * FROM posts WHERE category_id = :category_id ORDER BY RAND() LIMIT 3");
        $random_posts->execute(
            [
                ":category_id" => $category
            ]
        );
    
        return $random_posts;
    }

    public function getCategory($category) 
    {
        //get category
        $get_category = $this->pdo->prepare("SELECT category FROM categories JOIN posts ON categories.id = posts.category_id WHERE category_id = :category");
        $get_category->execute(
            [
                ":category" => $category
            ]
        );

        return $get_category;

    }


}
