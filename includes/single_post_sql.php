<?php
session_start();
include '../includes/database_connection.php';

if(isset($_GET["post_id"])){
    $post_id = $_GET["post_id"];
         
         $post_to_print = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
         $post_to_print->execute(
             [
                 ":id" => $post_id
             ]
         );

    header('location: ../views/single_post.php');
    
} else {
    
    header('location: ../views/single_post.php?error=Det finns inga inlägg att hämta');
}