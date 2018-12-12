<?php
class Comments
{
    private $pdo;
 
    function __construct($pdo)
    {
      $this->pdo = $pdo;
    }
    
    public function addComment($content, $created_by, $post_id, $post_date) 
    {
        $statement = $this->pdo->prepare("INSERT INTO comments (content, created_by, post_id, comment_date) VALUES (:content, :created_by, :post_id, :comment_date)");
        $statement->execute(
            [
                ":content" => $content,
                ":created_by" => $created_by,
                ":post_id" => $post_id,
                ":comment_date" => $post_date
            ]
        );
        
    }
    
    public function getCommentsWithId($post_id)
    {
        //selects all comments for correct post with post_id
        $comments_to_print = $this->pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id");
        $comments_to_print->execute(
            [
                ":post_id" => $post_id
            ]
        );
        
        return $comments_to_print; 
    
    }
    
    public function deleteCommentWithId($comment_id)
    {
        //selects all comments for correct post with post_id
        $delete_comment = $this->pdo->prepare("DELETE FROM comments WHERE comment_id = :comment_id");
        $delete_comment->execute(
            [
                ":comment_id" => $comment_id
            ]
        );
        
        return $comments_to_print;
         
    }
    
    public function deleteCommentsWithPostId($post_id)
    {
        //delets all comments with same post id 
        $delete_comment_from_post = $this->pdo->prepare("DELETE FROM comments WHERE post_id = :post_id");
        $delete_comment_from_post->execute(
            [
                ":post_id" => $post_id
            ]
        );
        
    }
    

}