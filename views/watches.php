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
    <div class="row justify-content-center mr-0 ml-0">

         <section class="col-12 col-md-9 blogpost-section pl-0 pr-0">

          <div class="row mr-0 ml-0">
          <div class="page-heading"><h1>Watches</h1></div>
                    

            <div class="col-12 card-columns pr-0 pl-0">

           <!-- NUMBER OF POSTS DISPLAYED IN MAIN BLOG  -->

           <?php $number_of_posts = 12;
           $category_id = 1;
           $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
           include '../includes/views_foreach.php'; ?>
           </div>
          </div>
         </section>

         <!-- ASIDE SECTION WITH ARTICLE CATERGORIES -->

         <aside class="col-12 col-md-3 sidebar with-heading">

          <?php include '../includes/watches_sidebar.php'; ?>

        </aside>

      </div>

</main>

<?php include '../includes/javascript_tag.php'; ?>
<?php include '../includes/footer.php'; ?>

