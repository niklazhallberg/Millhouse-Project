<?php
session_start();
include '../classes/call.php';

$title = strip_tags($_POST["title"]);
$description = strip_tags($_POST["description"]);
$image = $_FILES["image"];
$category = $_POST["category"];
$post_id = $_SESSION["post_id"];

if(empty($title) || empty($description))
{
  $val->redirect('../views/edit_post.php?error= Fill in all fields, please!&post_id='. $post_id);
}
else
{
    //check if title is longer than 100 characters, if so, redirect, else continue
    if ((strlen($title)) <= 100)
    {
      //stores image in temporary location, then upload into database
      $temporary_location = $image["tmp_name"];
      $new_location = "../images/" . $image["name"];
      $upload_ok = move_uploaded_file($temporary_location, $new_location);

        if($upload_ok)
        {
          //if new image chosen, update content in post with new input from user
          $posts->editPost($title, $description, $new_location, $category, $post_id);
          $val->redirect('../index.php');
        }
        else
        {
          //if user wants to keep image, update without image value
          $posts->editPost($title, $description, false, $category, $post_id);
          $val->redirect('../index.php');
        }

    } else
    {
      $val->redirect('../views/edit_post.php?error= The title cannot be longer than 100 characters, please try again.&post_id='. $post_id);
    }
}
