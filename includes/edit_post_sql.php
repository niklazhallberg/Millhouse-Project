<?php
session_start();
include '../classes/call.php';

$title = $_POST["title"];
$description = strip_tags($_POST["description"]);
$image = $_FILES["image"];
$category = $_POST["category"];
$post_id = $_SESSION["post_id"];
// $post_date = $_POST["post_date"];
// $created_by = $_POST["created_by"];



if(empty($title) || empty($description) || empty($image) || empty($category))
{
  header('Location: ../views/edit_post.php?error= Fill in all fields, please!');
  } else 
  {

    if ((strlen($title)) <= 100) 
    {
      $temporary_location = $image["tmp_name"];
      $new_location = "../images/" . $image["name"];
      $upload_ok = move_uploaded_file($temporary_location, $new_location);

        if($upload_ok)
        {
          $posts->editPost($title, $description, $new_location, $category, $post_id);
          // redirect
          $user->redirect('../index.php');
    
        } else 
          {
            header('Location: ../views/edit_post.php?error= Select a picture, please!');
          }


    } else 
      {
        header('Location: ../views/edit_post.php?error= The title cannot be longer than 100 characters, please try again.');
      }
      
}
