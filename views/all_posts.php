<?php
session_start();
include '../classes/call.php';
if(!$user->isLoggedIn()) {
  $user->redirect('login.php');
}
?>

<?php include '../includes/head.php'; ?>
<body>
  <?php include '../includes/header.php'; ?>

  <main class="container-fluid">
    <div class="row justify-content-center">

         <section class="col-12 blogpost-section">

          <div class="row mr-0 ml-0">

            <div class="col-12 card-columns all-count pr-0 pl-0">
      
           <?php


           $number_of_posts = 100;
           $category_posts = $posts->getLatestPosts($number_of_posts);
           include '../includes/views_foreach.php'; ?>
           </div>
          </div>
         </section>

         

      </div>

</main>

<?php include '../includes/footer.php'; ?>

<?php include '../includes/javascript_tag.php'; ?>

</body>

</html>
