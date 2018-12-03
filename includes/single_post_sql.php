<?php



//save post id with get to session 
$_SESSION["post_id"] = $_GET["post_id"];
         
//selects all posts from db with correct post_id
$post_to_print = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$post_to_print->execute(
    [
        ":id" => $_SESSION["post_id"]
    ]
);

//selects all comments for correct post with post_id
$comments_to_print = $pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id");
$comments_to_print->execute(
    [
        ":post_id" => $_SESSION["post_id"]
    ]
);





    