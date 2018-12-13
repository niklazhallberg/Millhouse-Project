<?php
session_start();
include '../classes/call.php';
if(!$val->isLoggedIn()) {
  $val->redirect('login.php');
}
?>

<?php include '../includes/head.php'; ?>
<body>
  <?php include '../includes/header.php'; ?>

  <main class="container-fluid">
    <div class="row justify-content-center ml-0 mr-0">

         <section class="col-12 col-md-9 blogpost-section pr-0 pl-0">

          <div class="row mr-0 ml-0">
          <div class="page-heading"><h1>Furniture articles</h1></div>

            <div class="col-12 card-columns pr-0 pl-0">
      
           <?php

           /* NUMBER OF POSTS DISPLAYED IN MAIN BLOG */

           $number_of_posts = 12;
           $category_id = 3;
           $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
           include '../includes/views_foreach.php'; ?>
           </div>
          </div>
         </section>

         <!-- ASIDE SECTION WITH ARTICLE CATERGORIES -->

         <aside class="col-12 col-md-3 sidebar with-heading">

          <?php include '../includes/furnishing_sidebar.php'; ?>

        </aside>

      </div>

</main>

<?php include '../includes/footer.php'; ?>

<?php include '../includes/javascript_tag.php'; ?>

</body>

</html>
