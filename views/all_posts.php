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
          <div class="page-heading"><h1>All posts</h1></div>

            <div class="col-12 card-columns pr-0 pl-0">

           <?php


           $number_of_posts = 100;
           $category_posts = $posts->getLatestPosts($number_of_posts);
           include '../includes/views_foreach.php'; ?>
           </div>
          </div>
         </section>

         <aside class="col-12 col-md-3 sidebar with-heading">

        <?php include '../includes/all_sidebar.php'; ?>

        </aside>



      </div>

</main>

<?php include '../includes/javascript_tag.php'; ?>

<?php include '../includes/footer.php'; ?>
