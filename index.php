<?php
session_start();
include 'classes/call.php';
if(!$user->isLoggedIn()) {
  $user->redirect('views/login.php');
}

if(isset($_GET["delete_post"])){
  $post_id = $_GET["delete_post"];
  $delete_post = $posts->deletePostWithId($post_id);
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

           <?php 

           /* NUMBER OF POSTS DISPLAYED IN MAIN BLOG */

           $number_of_posts = 5;
           $index_posts = $posts->getLatestPosts($number_of_posts);
           include 'includes/index_foreach_blog_posts.php'; ?>

         </section>

         <!-- ASIDE SECTION WITH ARTICLE CATERGORIES --> 

         <aside class="col-12 col-md-3 index-sidebar">

          <?php include 'includes/index_sidebar_blog_posts.php'; ?>

        </aside>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/javascript_tag.php'; ?>

</body>

</html>
