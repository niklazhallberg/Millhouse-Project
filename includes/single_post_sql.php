<?php
include '../includes/database_connection.php';

$post_id = $_GET["post_id"];
         
         $post_to_print = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
         $post_to_print->execute(
             [
                 ":id" => $post_id
             ]
         );

    