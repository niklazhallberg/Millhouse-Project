<?php
session_start();
// //connecting to database
include '../classes/call.php';

//save input to varible
$title = $_POST["title"];
$description = $_POST["description"];
$user_id = $_SESSION["user_id"];
$image = $_FILES["image"];
$category = $_POST["category"];

if(empty($title) || empty($description) || empty($image) || empty($category)){
  header('Location: ../views/add_post.php?error= Fill in all fields, please!');
} else {

$temporary_location = $image["tmp_name"];
$new_location = "../images/" . $image["name"];
$upload_ok = move_uploaded_file($temporary_location, $new_location);

if($upload_ok){
$posts->addPost($title, $description, $new_location, $user_id, $category);
// redirect
$user->redirect('../index.php');
}else{
  header('Location: ../views/add_post.php?error= Select a picture, please!');
}
}
