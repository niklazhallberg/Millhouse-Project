<?php 
session_start();
include '../includes/database_connection.php';
?>

<?php include '../includes/head.php'; ?>
<body>
<?php include '../includes/header.php'; ?>

<main class="container-fluid">
  <div class="row">

    <?php
         $_SESSION["post_id"] = 2;
         $post_id = $_SESSION["post_id"];
         
         $post_to_print = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
         $post_to_print->execute(
             [
                 ":id" => $post_id
             ]
         );
            
            //looping through array and printing post
            foreach($post_to_print as $post){ ?>
            <div class="card"> 
            <img  class="card-img-top" src="../images/<?= $post["image"]; ?>" alt="image not found">
            
            <div class="card-body">
            <h2 class="card-title"> <?= $post["title"]; ?> </h2>
            <p class="card-text"> <?= $post["description"]; ?> </p>
            </div>
            
            <div class="card-footer">
            <small class="text-muted">Last updated on todays date</small>
            </div>
            
            </div>
           <?php } ?>

      </div>
</main>




<?php include '../includes/javascript_tag.php'; ?>
</body>

</html>