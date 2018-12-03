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

           <div class="col-10">

           <h2> <?= $post["title"]; ?> </h2>
           <div class="sexy_line"></div>

           <img class="single-post-img" src="../images/<?= $post["image"]; ?>" alt="image not found">
           </div>

           <div class="col-10">
           <div class="sexy_line"></div>
           <p> <?= $post["description"]; ?> </p>
           <!-- if loged in user is admin, show delete post button -->
            <?php if($user->isAdmin()){ ?>
            <a href="../index.php?delete_post=<?= $post_id ?>">Delete this post</a>
<?php
} ?>
           
           </div>

<?php } ?>

            <div class="col-10">
            <div class="sexy_line"></div>
            <?php
                $comments_to_print = $comments->getCommentsWithId($post_id);
                
                foreach($comments_to_print as $comment){ ?>

            <p><?= $comment["content"]; ?></p>
            <h5>Created by <?= $comment["created_by"]; ?></h5>
            <!-- if loged in user is admin, show delete comment button -->
            <?php if($user->isAdmin()){ ?>
            <a href="../includes/delete_comment_sql.php?delete_comment=<?=$comment["comment_id"]?>">Delete comment</a>
<?php
}
 } ?>
            </div>

            <div class="col-10">
              <div class="sexy_line"></div>
              <form class="comment-form" action="../includes/add_comment_sql.php" method="POST">
              <label for="comment-field"><h3>Leave comment as <?= $_SESSION["username"]; ?></h3></label><br />
              <textarea name="content"></textarea><br />

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
