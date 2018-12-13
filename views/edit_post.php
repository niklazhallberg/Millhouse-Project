<?php
session_start();
include '../classes/call.php';
if(!$user->isLoggedIn()) {
    $user->redirect('login.php');
}
if(!$user->isAdmin()) {
    $user->redirect('../index.php');
}
$post_id = $_GET["post_id"];
$_SESSION["post_id"] = $post_id;
$post_to_edit = $posts->getPostWithId($post_id);
?>
<?php include '../includes/head.php' ?>

<body>

  <?php include '../includes/header.php' ?>

    <main class="container-fluid">

                <div class="row justify-content-center">
                    <section class="col-12 col-md-9 edit-post-section">
                    <div class="page-heading"><h1>Edit post</h1></div>
                    <hr>

                        <?php include '../includes/edit_post_form.php' ?>
                    


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
