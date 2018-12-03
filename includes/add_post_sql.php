<?php 
// session_start();
// //connecting to database
// include '../classes/call.php';

//save input to varible
$blog_title = $_POST["title"];
$blog_description = $_POST["description"];
$user_id = $_SESSION["user_id"];
$image = $_FILES["image"];
$category = $_POST["drone"];

if(empty($blog_title) || empty($blog_description) || empty($image) || empty($category)){
  header('Location: ../views/add_post.php?error= Fill in all fields, please!');
} else {

$temporary_location = $image["tmp_name"];

$new_location = "../images/" . $image["name"];

$upload_ok = move_uploaded_file($temporary_location, $new_location);

if($upload_ok){
$statement = $pdo->prepare("INSERT INTO posts (title, description, created_by, image, category_id) VALUES (:title, :description, :created_by, :image, :category_id)");
$statement->execute(
  [
    ":title" => $blog_title,
    ":description" => $blog_description,
    ":created_by" => $user_id,
    ":image" => $new_location,
    ":category_id" => $category
  ]
);
// redirect
header('location: ../');
}else{
  header('Location: ../views/add_post.php?error= Select a picture, please!');
}
}
