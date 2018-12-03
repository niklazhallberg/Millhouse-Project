<?php
class Comments
{
    private $pdo;
 
    function __construct($pdo)
    {
      $this->pdo = $pdo;
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
}