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

           $number_of_posts = 5;
           $index_posts = $posts->getLatestPosts($number_of_posts);
           include 'includes/index_foreach_blog_posts.php'; ?>

         </section>

            <aside class="col-12 col-md-3 index-sidebar">

            <?php if($user->isAdmin()) {
            include 'includes/go_to_add_page_button.php';
              }?>
              
            <h3>Recent</h3>
            <ul>
            <?php   

            $number_of_posts = 10;
            $aside_posts = $posts->getLatestPosts($number_of_posts);
            include 'includes/index_sidebar_foreach_recent_post.php'; ?>

            </ul>
            <h3>Watches</h3>
            <ul>

                <?php $number_of_watch_posts = 10;
                  $watch_posts = $posts->getLatestPosts($number_of_posts);
                  include 'includes/index_sidebar_foreach_watch_post.php'; ?>

            </ul>
            <h3>Sunglasses</h3>
            <ul>
              <?php include 'includes/index_sidebar_foreach_sunglasses_post.php'; ?>
            </ul>
            <h3>Furnishing articles</h3>
            <ul>
             <?php include 'includes/index_sidebar_foreach_furnishing_post.php'; ?>
            </ul>
          </aside>
       </div>
     </div>
  </div>
</main>

<?php include 'includes/javascript_tag.php'; ?>

</body>

</html>
