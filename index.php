<?php
session_start();
include 'classes/call.php';
if(!$user->isLoggedIn()) {
  $user->redirect('views/login.php');
}

if(isset($_GET["delete_post"])){
    $post_id = $_GET["delete_post"];
    $delete_post = $posts->deletePostWithId($post_id);
    $delete_comment_from_post = $comments->deleteCommentsWithPostId($post_id);
}
?>

<?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/header.php'; ?>

  <main class="container-fluid">
    <div class="row">
     <div class="col-12">
       <div class="row">
         <section class="col-12 col-md-9 blogpost-section">
    

          <div class="card-deck justify-content-center post-row">
          <div class="col-12 col-md-6 col-lg-4">
             <div class="card">
               <img class="card-img-top" src="images/Iris.png" alt="Blogpost image">

             <div class="card-body">
         <h3 class="card-title">Add Title</h3>

        <p class="card-text">Add Description</p>

        

        <hr>
        <?php echo "Posted: " . "Date" . "<br>"; ?>
        <p class="card-text"><small class="text-muted">Created by: YourName from Millhouse</small></p>

        <div class="card-footer">

            <button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Edit post</a></button>

            <button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Delete post</a></button>

            </div>

               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
               
             </div>
             </div>
         </div>

           <?php 

           /* NUMBER OF POSTS DISPLAYED IN MAIN BLOG */

           $number_of_posts = 12;
           $index_posts = $posts->getLatestPosts($number_of_posts);
           include 'includes/index_foreach_blog_posts.php'; ?>

         </section>

         <!-- ASIDE SECTION WITH ARTICLE CATERGORIES --> 

         <aside class="col-12 col-md-2 index-sidebar">

          <?php include 'includes/index_sidebar_blog_posts.php'; ?>

        </aside>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/javascript_tag.php'; ?>

</body>

</html>
