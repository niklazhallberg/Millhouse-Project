<?php
class Comments
{
    private $pdo;
 
    function __construct($pdo)
    {
      $this->pdo = $pdo;
    }
    
    public function addComment($content, $created_by, $post_id) {
        try{
            $statement = $this->pdo->prepare("INSERT INTO comments (content, created_by, post_id) VALUES (:content, :created_by, :post_id)");
            $statement->execute(
                [
                    ":content" => $content,
                    ":created_by" => $created_by,
                    ":post_id" => $post_id
                ]
            );
        
        }catch(PDOException $error){
            
            echo $error->getMessage();
        }
    }
    
    public function getCommentsWithId($post_id){
        
        try{
            //selects all comments for correct post with post_id
            $comments_to_print = $this->pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id");
            $comments_to_print->execute(
                [
                    ":post_id" => $post_id
                ]
            );
            
            return $comments_to_print;
            
        }catch(PDOException $error){
            
            echo $error->getMessage();
        }
    }
    
    public function deleteCommentWithId($comment_id){
        try{
            //selects all comments for correct post with post_id
            $delete_comment = $this->pdo->prepare("DELETE FROM comments WHERE comment_id = :comment_id");
            $delete_comment->execute(
                [
                    ":comment_id" => $comment_id
                ]
            );
            
            return $comments_to_print;
            
        }catch(PDOException $error){
            
            echo $error->getMessage();
        }   
    }

}