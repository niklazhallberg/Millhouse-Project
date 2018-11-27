<?php session_start();

if(empty($_SESSION["user_id"])){
  header('location: ../views/login.php');
}
?>

 <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/header.php'; ?>

<main class="container index-main">
   <div class="row">
      <div class="col-12">
         
         <section class="col-12 col-md-8 blogpost-section">
             
         </section>
          <sidebar class="col-12 col-md-4 index-sidebar">
              
          </sidebar>
          
      </div>   
   </div>   
</main>
  <?php include 'includes/javascript_tag.php'; ?>
</body>

</html>
