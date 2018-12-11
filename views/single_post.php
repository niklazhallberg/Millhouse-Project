<?php
session_start();
include '../classes/call.php';
?>

<?php include '../includes/head.php'; ?>
<body>
<?php include '../includes/header.php'; ?>

<main class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-12">

  <div class="row justify-content-center">
   <div class="col-12 col-md-7 col-lg-8 border-right">
    <?php

      //save post id from get to variable and call method in class posts
      $post_id = $_GET["post_id"];
      $_SESSION["post_id"] = $post_id;
      $post_to_print = $posts->getPostWithId($post_id);

      //looping through array and printing post from database
      foreach($post_to_print as $post){
       $category = $post["category_id"];  ?>

           <h1 class="text-center"> <?= $post["title"]; ?> </h1>
           <hr>
           <div class="row text-center">
           <div class="col-12">
               <p><small class="text-muted">By <?= $post["created_by"]; ?> &nbsp; &#9679; &nbsp; <?= $post["post_date"]; ?></small></p>
           </div>
           <div class="col-12 text-center">
           <i class="fab fa-twitter-square"></i>
           <i class="fab fa-facebook-square"></i>
           <i class="fab fa-instagram"></i>
           <i class="fab fa-pinterest-square"></i>
           </div>
           </div>

           <img class="single-post-img" src="../images/<?= $post["image"]; ?>" alt="image not found">

           <hr>
           <p> <?= $post["description"]; ?> </p>

           <!-- if loged in user is admin, show delete post button -->
            <?php if($user->isAdmin()){ ?>
            <hr>
       <i class="far fa-trash-alt"><a href="../index.php?delete_post=<?= $post_id ?>"><span> Delete post</span></a></i>
       <i class="far fa-trash-alt"><a href="../views/edit_post.php?delete_post=<?= $post_id ?>"><span> Edit post</span></a></i>
<?php
} ?>

<?php } ?>

            <hr>
            <?php
              //calls method to print comments and prints it with foreach loop inside a bootstrap card
                $comments_to_print = $comments->getCommentsWithId($post_id);
                foreach($comments_to_print as $comment){ ?>

                <div class="comment-card">
                <div class="card border-light mb-2" style="max-width: 25rem;">
                <div class="card-header blue-header">Commented by <?= $comment["created_by"]; ?></div>
                <div class="card-body">
                <p class="card-text"><?= $comment["content"]; ?></p>
                <div class="small text-right"><?= $comment["comment_date"]; ?></div>
                </div>

                <!-- if loged in user is admin, show delete comment button in card footer -->
                <?php if($user->isAdmin()){ ?>
                <div class="card-footer bg-transparent">
                    <i class="far fa-trash-alt"><a href="../includes/delete_comment_sql.php?delete_comment=<?=$comment["comment_id"]?>"><span> Delete comment</span></a></i>
                </div>
                 <?php
                      }?>
                </div><!--card-->
                </div><!--comment-card-->

          <?php } ?>

             <!-- form for user to add a comment to the post-->
              <hr>
              <form class="comment-form" action="../includes/add_comment_sql.php" method="POST">
              <label for="comment-field"><h3>Leave comment as <?= $_SESSION["username"]; ?></h3></label><br />
              <textarea name="content" placeholder="Start the discussion..."></textarea><br />



              <input type="submit" value="Comment">
              </form>

            </div>

            <!--aside for recommended posts-->
            <?php include '../includes/recommended_posts.php'; ?>

        </div>
        </div>
    </div>
</main>



<?php include '../includes/footer.php'; ?>
<?php include '../includes/javascript_tag.php'; ?>
</body>
