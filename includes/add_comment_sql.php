<?php session_start();
//connecting to database
include '../classes/call.php';

//save input to varible
$content = $_POST["content"];
$created_by = $_SESSION["username"];
$post_id = $_SESSION["post_id"];

//
$statement = $pdo->prepare("INSERT INTO comments (content, created_by, post_id) VALUES (:content, :created_by, :post_id)");
$statement->execute(
  [
    ":content" => $content,
    ":created_by" => $created_by,
    ":post_id" => $post_id
  ]
);
// redirect
header("location: ../views/single_post.php?post_id=$post_id");
?>