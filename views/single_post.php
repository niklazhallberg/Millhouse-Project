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

          <!-- printing post title -->
           <h1 class="text-center"> <?= $post["title"]; ?> </h1>
           <hr>
           <div class="row text-center">
           <div class="col-12">
             
              <!-- printing created by and date -->
               <p><small class="text-muted">By <?= $post["created_by"]; ?> &nbsp; &#9679; &nbsp; <?= $post["post_date"]; ?></small></p>
           </div>
           <div class="col-12 text-center">
           
           <!--social media logos-->
           <a href="#"><img class="d-inline social-media-logo" src="../images/CircleColor/Facebook.svg" alt="facebook-logo"></a>
           <a href="#"><img class="d-inline social-media-logo" src="../images/CircleColor/Instagram.svg" alt="insta-logo"></a>
           <a href="#"><img class="d-inline social-media-logo" src="../images/CircleColor/Pinterest.svg" alt="pinterest-logo"></a>
           <a href="#"><img class="d-inline social-media-logo" src="../images/CircleColor/Twitter.svg" alt="twitter-logo"></a>
           
           </div>
           </div>
           <div class="row justify-content-center">
          <div class="col-12 col-md-11">
          <!--printing post image-->
           <img class="single-post-img" src="../images/<?= $post["image"]; ?>" alt="image not found">

           <hr>
           <p> <?= $post["description"]; ?> </p>

           <!-- if loged in user is admin, show delete post button -->
            <?php if($user->isAdmin()){ ?>
            
            <a href="../views/edit_post.php?post_id=<?= $post_id ?>"><span><i class="fas fa-wrench"></i> Edit post</span></a>
            <a href="../index.php?delete_post=<?= $post_id ?>"><span><i class="far fa-trash-alt"></i> Delete post</span></a>
       
<?php
} ?>
</div>
</div>
<?php } ?>
           <hr>
            <?php
              //calls method to print comments and prints it with foreach loop inside a bootstrap card
                $comments_to_print = $comments->getCommentsWithId($post_id);
        
              //calls method to count the comments for this post
                $counter = $comments->countingComments($comments_to_print); ?>
                <h3 class="text-center">This post has <?= $counter ?> comments</h3>
       
            <?php 
                //calls method to print comments and prints it with foreach loop inside a bootstrap card
                $comments_to_print = $comments->getCommentsWithId($post_id);
                foreach($comments_to_print as $comment){ 
            ?>
                
                <!-- bootsrap card with comment-->
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
                    <a href="../includes/delete_comment_sql.php?delete_comment=<?=$comment["comment_id"]?>"><span><i class="far fa-trash-alt"> Delete comment</i></span></a>
                </div>
                 <?php
                      }?>
                </div><!--card-->
                </div><!--comment-card-->

          <?php } ?>

            
             <!-- form for user to add a comment to the post-->
              <hr>
              <form class="comment-form" id="commentarea" action="../includes/add_comment_sql.php" method="POST">
              <label for="comment-field"><h3>Leave comment as <?= $_SESSION["username"]; ?></h3></label><br />
              <textarea name="content" placeholder="Start the discussion..."></textarea><br />

              <button class="button-static"><span>Comment </span></button>
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
