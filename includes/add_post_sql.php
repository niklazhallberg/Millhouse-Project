<?php session_start();
//connecting to database
include 'database_connection.php';

//save input to varible
$blog_title = $_POST["title"];
$blog_description = $_POST["description"];
$user_id = $_SESSION["user_id"];

//
$statement = $pdo->prepare("INSERT INTO (title, description, created_by) VALUES (:title, :description, :created_by)");
$statement->execute(
  [
    ":title" => $blog_title,
    ":description" => $blog_description,
    ":created_by" => $user_id
  ]
);
// redirect
header('location: ../views/add_post.php');
?>
