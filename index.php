<?php session_start();

if(empty($_SESSION["user_id"])){
  header('location: ../views/login.php');
}
?>

 <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/header.php'; ?>

  <main class="container-fluid">
  <div class="row">
     <div class="col-12">
       <div class="row">
         <section class="col-12 col-md-8 blogpost-section">
           <?php include 'includes/database_connection.php'; ?>

           <?php include 'includes/index_fetch_all.php'; ?>

           <?php include 'includes/index_foreach_blog_posts.php'; ?>

         </section>

            <aside class="col-12 col-md-4 index-sidebar">
              <?php if(isset($_SESSION["admin"])){
                include 'includes/go_to_add_page_button.php';
              }?>
            <h3>Recent</h3>
            <ul>
          <?php include 'includes/index_sidebar_foreach_recent_post.php'; ?>
            </ul>
            <h3>Watches</h3>
            <ul>
              <?php include 'includes/index_sidebar_foreach_watch_post.php'; ?>
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
