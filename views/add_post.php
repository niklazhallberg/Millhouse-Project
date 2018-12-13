<?php
session_start();
include '../classes/call.php';
if(!$user->isLoggedIn()) {
    $user->redirect('login.php');
}
if(!$user->isAdmin()) {
    $user->redirect('../index.php');
}
?>
<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="container-fluid">

         <div class="row justify-content-center">
           <section class="col-12 col-md-9 add-post-section">
             <?php include '../includes/add_form.php'; ?>
           </section>
          </div>

    </main>
    <?php include '../includes/javascript_tag.php' ?>
    <script>
      $('#summernote').summernote({
        placeholder: 'Description..',
        tabsize: 2,
        height: 500
      });
    </script>
    <?php include '../includes/footer.php'; ?>
</body>
