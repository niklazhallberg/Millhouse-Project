<?php
session_start();
include '../classes/call.php';

//saving get var and session var to strings
$delete_comment = $_GET["delete_comment"];
$post_id = $_SESSION["post_id"];

//calling method in comments to delete comment with comment id 
$comments_to_delete = $comments->deleteCommentWithId($delete_comment);

//back to single_post
$val->redirect("../views/single_post.php?post_id=$post_id");
