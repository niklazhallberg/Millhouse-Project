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
    <div class="row justify-content-center">

         <section class="col-12 col-md-9 blogpost-section">

          <!-- VIEW ADD POST DEMO if user = admin -->

          <?php if($user->isAdmin()){

           include 'includes/index_add_post_demo.php';

           }?>

           <?php

           /* NUMBER OF POSTS DISPLAYED IN MAIN BLOG */

           $number_of_posts = 12;
           $index_posts = $posts->getLatestPosts($number_of_posts);
           include 'includes/index_foreach_blog_posts.php'; ?>

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
