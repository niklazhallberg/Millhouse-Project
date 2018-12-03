<?php
session_start();
include '../classes/call.php';

$delete_comment = $_GET["delete_comment"];
$post_id = $_SESSION["post_id"];
    
    //prepares statement to delete all orders from cart db with session user_id
    $delete_comment_from_db = $pdo->prepare("DELETE FROM comments WHERE comment_id = :delete_comment");
    
    $delete_comment_from_db->execute(
        [
            ":delete_comment" => $delete_comment
        ]
    
    );
    
    //back to single_post
    header("location: ../views/single_post.php?post_id=$post_id");
?>