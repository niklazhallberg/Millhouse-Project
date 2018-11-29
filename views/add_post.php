<?php include '../includes/head.php' ?>
<body>
  <?php
  if($_SESSION["admin"] === false){
    header('Location: /');
  }
  ?>
  <?php include '../includes/header.php' ?>

  <main class="container-fluid">
  <div class="row">
     <div class="col-12">
       <div class="row">
         <section class="col-12 blogpost-section">
             <?php include '../includes/add_form.php' ?>
         </section>
       </div>
     </div>
  </div>
  </main>

</body>
