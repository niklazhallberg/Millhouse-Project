<?php session_start() ?>
<?php include '../includes/head.php' ?>
<body>
  <?php
  if((empty($_SESSION["admin"]))){
    header('Location: /');
  } ?>
    <?php include '../includes/header.php'; ?>
    <main class="container-fluid">
    <div class="row">
       <div class="col-12">
         <div class="row">
           <section class="col-12 add-post-section">
             <?php include '../includes/add_form.php'; ?>
           </section>
          </div>
        </div>
      </div>
    </main>
</body>
