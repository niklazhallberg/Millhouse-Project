<?php
session_start();
include 'classes/call.php';
if(!$user->isLoggedIn()) {
  $user->redirect('views/login.php');
}

//if get is sent from single_post to delete post, delete post and comments
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
    <div class="row justify-content-center">

         <section class="col-12 col-md-9 blogpost-section">
       
          <div class="row mr-0 ml-0">
        
            <div class="col-12 card-columns pr-0">
          <!-- VIEW ADD POST DEMO if user = admin --> 



           <?php

           /* NUMBER OF POSTS DISPLAYED IN MAIN BLOG */

           $number_of_posts = 12;
           $index_posts = $posts->getLatestPosts($number_of_posts);
           include 'includes/index_foreach_blog_posts.php'; ?>
           </div>
          </div>
         </section>

         <!-- ASIDE SECTION WITH ARTICLE CATERGORIES -->

         <aside class="col-12 col-md-3 index-sidebar">

          <?php include 'includes/index_sidebar_blog_posts.php'; ?>

        </aside>

      </div>

</main>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/javascript_tag.php'; ?>

</body>

</html>
