<?php
session_start();
include '../classes/call.php';
?>

<?php include '../includes/head.php'; ?>
<body>
<?php include '../includes/header.php'; ?>

<main class="container-fluid">
  <div class="row justify-content-center">

   <div class="col-12"><a href="../index.php">Back to startpage</a></div>
    <?php
      
      //save post id from get to variable and call method in class posts
      $post_id = $_GET["post_id"];
      $_SESSION["post_id"] = $post_id;
      $post_to_print = $posts->getPostWithId($post_id);

      //looping through array and printing post from databse
      foreach($post_to_print as $post){ ?>

           <div class="col-6">

           <h2> <?= $post["title"]; ?> </h2>

           <img class="single-post-img" src="../images/<?= $post["image"]; ?>" alt="image not found">
           </div>

           <div class="col-10">
           <hr>
           <p> <?= $post["description"]; ?> </p>
           <!-- if loged in user is admin, show delete post button -->
            <?php if($user->isAdmin()){ ?>
            <a href="../index.php?delete_post=<?= $post_id ?>">Delete this post</a>
<?php
} ?>
           
           </div>
<?php } ?>   
            <div class="col-10">
            <hr>
            <?php
                $comments_to_print = $comments->getCommentsWithId($post_id);
                foreach($comments_to_print as $comment){ ?>
                
                <div class="card border-light mb-2" style="max-width: 25rem;">
                <div class="card-header">Commented by <?= $comment["created_by"]; ?></div>
                <div class="card-body">
                <p class="card-text"><?= $comment["content"]; ?></p>
                </div>
                
                <!-- if loged in user is admin, show delete comment button -->
        <?php if($user->isAdmin()){ ?>
        <div class="card-footer bg-transparent">
        <a href="../includes/delete_comment_sql.php?delete_comment=<?=$comment["comment_id"]?>"><span>Delete comment</span></a>
        </div>
<?php
}?>
</div>
 <?php } ?>
            </div>

            <div class="col-10">
              <hr>
              <form class="comment-form" action="../includes/add_comment_sql.php" method="POST">
              <label for="comment-field"><h3>Leave comment as <?= $_SESSION["username"]; ?></h3></label><br />
              <textarea name="content" placeholder="Start the discussion..."></textarea><br />

              <input type="hidden" name="id" value="<?= $_SESSION["post_id"] ?>">

              <input type="submit" value="Comment">
              </form>

            </div>
            
   </div>
</main>



<?php include '../includes/footer.php'; ?>
<?php include '../includes/javascript_tag.php'; ?>
</body>


</html>
