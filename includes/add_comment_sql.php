<?php 
session_start();
//connecting to database
include '../classes/call.php';

//save input to varible
$content = $_POST["content"];
$created_by = $_SESSION["username"];
$post_id = $_SESSION["post_id"];
$comment_date = date("Y/m/d");

//method to add comments
$comments->addComment($content, $created_by, $post_id, $comment_date);

// redirect
header("location: ../views/single_post.php?post_id=$post_id#commentarea");
?>