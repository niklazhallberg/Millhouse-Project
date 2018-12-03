<?php
session_start();
include '../includes/database_connection.php';

$post_id = $_SESSION["post_id"];
    
    //prepares statement to delete all orders from cart db with session user_id
    $delete_post_from_db = $pdo->prepare("DELETE FROM posts WHERE id = :post_id");
    
    $delete_post_from_db->execute(
        [
            ":post_id" => $post_id
        ]
    
    );
    
    //back to index
    header("location: ../index.php");
?>